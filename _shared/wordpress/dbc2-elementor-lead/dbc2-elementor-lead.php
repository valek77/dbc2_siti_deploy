<?php
/**
 * Plugin Name:       DBC2 Lead per Elementor
 * Description:       Aggiunge ai form di Elementor Pro l'azione "Invia lead a DBC2": a ogni invio il lead viene inoltrato lato server a POST {DBC2_API_BASE}/lead, con il token che resta sul server.
 * Version:           1.0.0
 * Requires at least: 5.8
 * Requires PHP:      7.4
 * Author:            Datalia
 * Text Domain:       dbc2-elementor-lead
 *
 * Configurazione in wp-config.php (prima di "That's all, stop editing!"):
 *   define('DBC2_TOKEN', '2|xxxxx');                          // obbligatorio, segreto
 *   define('DBC2_API_BASE', 'https://dbc2.datalia.it/api');   // facoltativo (questo è il default)
 *   define('DBC2_LANDING_PAGE_ID', '123');                    // facoltativo: altrimenti da Impostazioni → DBC2 Lead
 *   define('DBC2_IP_HEADER', 'HTTP_CF_CONNECTING_IP');        // facoltativo: header fidato con l'IP del visitatore
 *
 * Vedi LEGGIMI.md nella cartella del plugin.
 */

if (!defined('ABSPATH')) {
    exit;
}

define('DBC2_LEAD_VERSION', '1.0.0');
define('DBC2_LEAD_DIR', __DIR__);
define('DBC2_LEAD_OPTION_LANDING', 'dbc2_lead_landing_id');

require_once DBC2_LEAD_DIR . '/includes/class-dbc2-client.php';

// --- Azione per i form di Elementor Pro --------------------------------------
// L'hook esiste solo con Elementor Pro attivo (3.5+): senza, il plugin non fa nulla.
add_action('elementor_pro/forms/actions/register', function ($registrar) {
    require_once DBC2_LEAD_DIR . '/includes/class-dbc2-form-action.php';
    $registrar->register(new DBC2_Lead_Form_Action());
});

// Avviso in bacheca se manca Elementor Pro o la configurazione.
add_action('admin_notices', function () {
    if (!current_user_can('manage_options')) {
        return;
    }
    if (!defined('ELEMENTOR_PRO_VERSION')) {
        echo '<div class="notice notice-warning"><p><strong>DBC2 Lead per Elementor</strong>: serve Elementor Pro attivo (il widget Form è solo nella versione Pro).</p></div>';
        return;
    }
    $missing = DBC2_Lead_Client::missing_config();
    if ($missing) {
        $url = esc_url(admin_url('options-general.php?page=dbc2-lead'));
        echo '<div class="notice notice-error"><p><strong>DBC2 Lead per Elementor</strong>: configurazione incompleta ('
            . esc_html(implode(', ', $missing)) . '). <a href="' . $url . '">Apri le impostazioni</a>.</p></div>';
    }
});

// --- Pagina Impostazioni → DBC2 Lead -----------------------------------------

add_action('admin_init', function () {
    register_setting('dbc2_lead', DBC2_LEAD_OPTION_LANDING, [
        'type' => 'string',
        'sanitize_callback' => function ($v) {
            $v = trim((string) $v);
            return ctype_digit($v) ? $v : '';
        },
        'default' => '',
    ]);
});

// Al cambio di LANDING_PAGE_ID la cache della landing precedente non vale più.
add_action('update_option_' . DBC2_LEAD_OPTION_LANDING, function () {
    DBC2_Lead_Client::clear_cache();
});

add_action('admin_menu', function () {
    add_options_page('DBC2 Lead', 'DBC2 Lead', 'manage_options', 'dbc2-lead', 'dbc2_lead_render_settings');
});

// Pulsante "Ricarica dati da DBC2": svuota la cache e rilegge la landing.
add_action('admin_post_dbc2_lead_refresh', function () {
    if (!current_user_can('manage_options')) {
        wp_die('Permesso negato.', 403);
    }
    check_admin_referer('dbc2_lead_refresh');
    DBC2_Lead_Client::clear_cache();
    DBC2_Lead_Client::get_landing();
    wp_safe_redirect(admin_url('options-general.php?page=dbc2-lead&refreshed=1'));
    exit;
});

function dbc2_lead_render_settings()
{
    if (!current_user_can('manage_options')) {
        return;
    }
    $fromConstant = defined('DBC2_LANDING_PAGE_ID') && (string) DBC2_LANDING_PAGE_ID !== '';
    $landingId = DBC2_Lead_Client::landing_id();
    $landing = $landingId !== '' && DBC2_Lead_Client::token() !== '' ? DBC2_Lead_Client::get_landing() : null;
    $siteHost = DBC2_Lead_Client::norm_host(home_url());
    ?>
    <div class="wrap">
        <h1>DBC2 Lead</h1>
        <?php if (isset($_GET['refreshed'])) : ?>
            <div class="notice notice-success is-dismissible"><p>Dati della landing riletti da DBC2.</p></div>
        <?php endif; ?>

        <h2>Configurazione</h2>
        <table class="form-table" role="presentation">
            <tr>
                <th scope="row">Token (DBC2_TOKEN)</th>
                <td><?php echo DBC2_Lead_Client::token() !== ''
                    ? '<span style="color:#008a20">Impostato in wp-config.php</span>'
                    : '<span style="color:#b32d2e">Mancante</span>: aggiungi <code>define(\'DBC2_TOKEN\', \'...\');</code> in wp-config.php'; ?></td>
            </tr>
            <tr>
                <th scope="row">Indirizzo API</th>
                <td><code><?php echo esc_html(DBC2_Lead_Client::api_base()); ?></code></td>
            </tr>
            <tr>
                <th scope="row">IP del visitatore</th>
                <td><?php echo DBC2_Lead_Client::ip_header() !== ''
                    ? 'Header <code>' . esc_html(DBC2_Lead_Client::ip_header()) . '</code>, poi REMOTE_ADDR'
                    : 'REMOTE_ADDR'; ?></td>
            </tr>
        </table>

        <form method="post" action="options.php">
            <?php settings_fields('dbc2_lead'); ?>
            <table class="form-table" role="presentation">
                <tr>
                    <th scope="row"><label for="dbc2_lead_landing_id">LANDING_PAGE_ID</label></th>
                    <td>
                        <?php if ($fromConstant) : ?>
                            <code><?php echo esc_html($landingId); ?></code>
                            <p class="description">Impostato con la costante <code>DBC2_LANDING_PAGE_ID</code> in wp-config.php.</p>
                        <?php else : ?>
                            <input name="<?php echo esc_attr(DBC2_LEAD_OPTION_LANDING); ?>" id="dbc2_lead_landing_id" type="text"
                                   inputmode="numeric" pattern="[0-9]*" class="small-text"
                                   value="<?php echo esc_attr(get_option(DBC2_LEAD_OPTION_LANDING, '')); ?>">
                            <p class="description">ID della landing di questo sito in DBC2.</p>
                        <?php endif; ?>
                    </td>
                </tr>
            </table>
            <?php if (!$fromConstant) {
                submit_button('Salva');
            } ?>
        </form>

        <h2>Landing collegata</h2>
        <?php if ($landingId === '' || DBC2_Lead_Client::token() === '') : ?>
            <p>Imposta token e LANDING_PAGE_ID per vedere i dati della landing.</p>
        <?php elseif (!$landing) : ?>
            <p style="color:#b32d2e">Non riesco a leggere la landing <?php echo esc_html($landingId); ?> da DBC2. Controlla ID e token; i dettagli sono nel log degli errori PHP.</p>
        <?php else :
            $lp = $landing['landing_page'] ?? [];
            $lpHost = DBC2_Lead_Client::norm_host((string) ($lp['url'] ?? ''));
            ?>
            <table class="form-table" role="presentation">
                <tr><th scope="row">URL registrato</th><td><code><?php echo esc_html((string) ($lp['url'] ?? '')); ?></code>
                    <?php if ($lpHost !== '' && $lpHost !== $siteHost) : ?>
                        <p style="color:#b32d2e">Non corrisponde al dominio di questo sito (<code><?php echo esc_html($siteHost); ?></code>): probabilmente l'ID è di un'altra landing.</p>
                    <?php endif; ?></td></tr>
                <tr><th scope="row">Azienda</th><td><?php echo esc_html((string) ($landing['company']['company_name'] ?? '')); ?></td></tr>
                <tr><th scope="row">Operatore</th><td><?php echo esc_html((string) ($landing['operatore_energetico']['nome_marketing'] ?? '')); ?></td></tr>
                <tr><th scope="row">Consensi mostrati</th><td><?php
                    $labels = [0 => 'ricontatto (consenso_0)', 1 => 'privacy (consenso_1)', 2 => 'marketing (consenso_2)'];
                    $shown = [];
                    foreach ($labels as $i => $label) {
                        if (DBC2_Lead_Client::consent_shown($landing, $i)) {
                            $shown[] = $label;
                        }
                    }
                    echo esc_html($shown ? implode(', ', $shown) : 'nessuno');
                ?></td></tr>
            </table>
        <?php endif; ?>

        <?php if ($landingId !== '' && DBC2_Lead_Client::token() !== '') : ?>
            <form method="post" action="<?php echo esc_url(admin_url('admin-post.php')); ?>">
                <input type="hidden" name="action" value="dbc2_lead_refresh">
                <?php wp_nonce_field('dbc2_lead_refresh'); ?>
                <?php submit_button('Ricarica dati da DBC2', 'secondary'); ?>
            </form>
        <?php endif; ?>
    </div>
    <?php
}
