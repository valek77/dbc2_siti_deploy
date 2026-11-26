<?php
/**
 * Azione "Invia lead a DBC2" per il widget Form di Elementor Pro.
 * Nell'editor: Form → Azioni dopo l'invio → "Invia lead a DBC2", poi nella sezione
 * "DBC2 Lead" si indica l'ID di ciascun campo del form (scheda Avanzate del campo).
 */

if (!defined('ABSPATH')) {
    exit;
}

use Elementor\Controls_Manager;
use ElementorPro\Modules\Forms\Classes\Action_Base;

class DBC2_Lead_Form_Action extends Action_Base
{
    const MSG_GENERIC = 'Errore invio. Riprova tra qualche minuto.';

    public function get_name()
    {
        return 'dbc2_lead';
    }

    public function get_label()
    {
        return 'Invia lead a DBC2';
    }

    /** Campi mappabili: chiave del controllo => [etichetta, default, descrizione]. */
    private function field_controls()
    {
        return [
            'dbc2_field_nome' => ['Campo nome e cognome', 'name', 'Obbligatorio.'],
            'dbc2_field_telefono' => ['Campo telefono', 'telefono', 'Obbligatorio. Cellulare italiano.'],
            'dbc2_field_email' => ['Campo email', 'email', 'Facoltativo.'],
            'dbc2_field_consenso_0' => ['Consenso ricontatto/commerciale (consenso_0)', 'consenso_ricontatto', 'Campo Accettazione o Casella di controllo.'],
            'dbc2_field_consenso_1' => ['Consenso privacy (consenso_1)', 'consenso_privacy', 'Campo Accettazione o Casella di controllo.'],
            'dbc2_field_consenso_2' => ['Consenso marketing (consenso_2)', '', 'Facoltativo. Vuoto se il form non lo mostra.'],
            'dbc2_field_offerta' => ['Campo offerta_id', '', 'Facoltativo. Se vuoto si usa ?offerta= nell\'URL della pagina, se numerico.'],
        ];
    }

    public function register_settings_section($widget)
    {
        $widget->start_controls_section('section_dbc2_lead', [
            'label' => 'DBC2 Lead',
            'condition' => ['submit_actions' => $this->get_name()],
        ]);

        $widget->add_control('dbc2_lead_help', [
            'type' => Controls_Manager::RAW_HTML,
            'raw' => 'Scrivi l\'<strong>ID</strong> di ogni campo del form (scheda Avanzate del campo). '
                . 'Token e LANDING_PAGE_ID si impostano in wp-config.php e in Impostazioni → DBC2 Lead.',
            'content_classes' => 'elementor-descriptor',
        ]);

        foreach ($this->field_controls() as $key => [$label, $default, $desc]) {
            $widget->add_control($key, [
                'label' => $label,
                'type' => Controls_Manager::TEXT,
                'default' => $default,
                'description' => $desc,
                'ai' => ['active' => false],
            ]);
        }

        $widget->end_controls_section();
    }

    public function on_export($element)
    {
        foreach (array_keys($this->field_controls()) as $key) {
            unset($element['settings'][$key]);
        }
        return $element;
    }

    /**
     * @param \ElementorPro\Modules\Forms\Classes\Form_Record  $record
     * @param \ElementorPro\Modules\Forms\Classes\Ajax_Handler $ajax_handler
     */
    public function run($record, $ajax_handler)
    {
        $missing = DBC2_Lead_Client::missing_config();
        if ($missing) {
            $ajax_handler->add_admin_error_message('DBC2: configurazione incompleta (' . implode(', ', $missing) . ').');
            $ajax_handler->add_error_message(self::MSG_GENERIC);
            return;
        }

        $settings = $record->get('form_settings');
        $fields = $record->get('fields');
        $map = function ($key) use ($settings) {
            return isset($settings[$key]) ? trim((string) $settings[$key]) : '';
        };
        $value = function ($fieldId) use ($fields) {
            if ($fieldId === '' || !isset($fields[$fieldId])) {
                return '';
            }
            $v = $fields[$fieldId]['raw_value'] ?? ($fields[$fieldId]['value'] ?? '');
            if (is_array($v)) {
                $v = implode(',', $v);
            }
            return trim((string) $v);
        };

        // Campi obbligatori del form mappati su ID inesistenti: errore di configurazione.
        foreach (['dbc2_field_nome', 'dbc2_field_telefono'] as $key) {
            if ($map($key) === '' || !isset($fields[$map($key)])) {
                $ajax_handler->add_admin_error_message('DBC2: il campo "' . $map($key) . '" indicato in "'
                    . $this->field_controls()[$key][0] . '" non esiste nel form.');
                $ajax_handler->add_error_message(self::MSG_GENERIC);
                return;
            }
        }

        $landing = DBC2_Lead_Client::get_landing();

        // Consensi: valori reali scelti dal visitatore (0=ricontatto, 1=privacy, 2=marketing).
        $consents = [];
        foreach ([0, 1, 2] as $i) {
            $consents[$i] = $value($map('dbc2_field_consenso_' . $i)) !== '';
        }
        // Ricontatto e privacy sono obbligatori quando la landing li mostra
        // (se la landing non è leggibile li consideriamo mostrati, come lead-form.js).
        foreach ([0, 1] as $i) {
            $shown = $landing ? DBC2_Lead_Client::consent_shown($landing, $i) : true;
            if (!$shown) {
                continue;
            }
            $fieldId = $map('dbc2_field_consenso_' . $i);
            if ($fieldId === '' || !isset($fields[$fieldId])) {
                $ajax_handler->add_admin_error_message('DBC2: la landing mostra consenso_' . $i
                    . ' ma il form non ha il campo corrispondente (sezione DBC2 Lead).');
                $ajax_handler->add_error_message(self::MSG_GENERIC);
                return;
            }
            if (!$consents[$i]) {
                $msg = $i === 1 ? 'Per continuare accetta l\'informativa privacy.' : 'Per continuare accetta di essere ricontattato.';
                $ajax_handler->add_error($fieldId, $msg);
                $ajax_handler->add_error_message($msg);
                return;
            }
        }

        $email = $value($map('dbc2_field_email'));
        $payload = [
            'nome_cognome' => $value($map('dbc2_field_nome')),
            'telefono' => DBC2_Lead_Client::normalize_phone($value($map('dbc2_field_telefono'))),
            'email' => $email !== '' ? $email : null,
            'landing_page_url' => DBC2_Lead_Client::landing_url($landing),
            'consenso_0' => $consents[0],
            'consenso_1' => $consents[1],
            'consenso_2' => $consents[2],
            'ip' => DBC2_Lead_Client::visitor_ip(),
            'user_agent' => DBC2_Lead_Client::visitor_user_agent(),
        ];
        $offerta = $this->offerta_id($record, $value($map('dbc2_field_offerta')));
        if ($offerta !== null) {
            $payload['offerta_id'] = $offerta;
        }

        $res = DBC2_Lead_Client::send_lead($payload);
        $status = $res['status'];
        if ($status >= 200 && $status < 300) {
            return; // successo: Elementor mostra il suo messaggio di conferma
        }

        if ($status === 401 || $status === 403) {
            // Token scaduto/errato o landing non coperta dal token: non è colpa del visitatore.
            $ajax_handler->add_admin_error_message('DBC2: l\'API ha risposto ' . $status
                . ' (token o landing non autorizzati). Dettagli nel log PHP.');
            $ajax_handler->add_error_message(self::MSG_GENERIC);
            return;
        }

        $ajax_handler->add_error_message($this->visitor_message($status, $res['data'], $map, $ajax_handler));
    }

    /** offerta_id: dal campo mappato o da ?offerta= nell'URL della pagina; solo interi positivi. */
    private function offerta_id($record, $fromField)
    {
        $candidate = $fromField;
        if ($candidate === '') {
            $meta = $record->get_form_meta(['page_url']);
            $pageUrl = $meta['page_url']['value'] ?? '';
            $query = (string) wp_parse_url((string) $pageUrl, PHP_URL_QUERY);
            parse_str($query, $q);
            $candidate = isset($q['offerta']) && is_string($q['offerta']) ? trim($q['offerta']) : '';
        }
        return ctype_digit($candidate) && (int) $candidate > 0 ? (int) $candidate : null;
    }

    /** Stessi messaggi di lead-form.js; sul 422 segnala anche il campo interessato. */
    private function visitor_message($status, $data, $map, $ajax_handler)
    {
        $data = is_array($data) ? $data : [];
        $errors = isset($data['errors']) && is_array($data['errors']) ? $data['errors'] : [];
        $fieldError = function ($key, $msg) use ($map, $ajax_handler) {
            if ($map($key) !== '') {
                $ajax_handler->add_error($map($key), $msg);
            }
            return $msg;
        };
        if ($status === 422) {
            if (($data['message'] ?? '') === 'Telefono non valido.' || isset($errors['telefono'])) {
                return $fieldError('dbc2_field_telefono', 'Inserisci un numero di cellulare valido (es. 3331234567).');
            }
            if (isset($errors['email'])) {
                return $fieldError('dbc2_field_email', 'Inserisci un indirizzo email valido.');
            }
            if (isset($errors['nome_cognome'])) {
                return $fieldError('dbc2_field_nome', 'Inserisci nome e cognome.');
            }
            return 'Non è stato possibile completare la richiesta. Controlla i dati inseriti.';
        }
        if ($status === 429) {
            return 'Troppe richieste in poco tempo. Riprova più tardi.';
        }
        return self::MSG_GENERIC;
    }
}
