(function () {
  const ENDPOINT_URL = 'lead.php';

  const form = document.getElementById('leadForm') || document.getElementById('contatto-form');
  if (!form) return;

  const btnSubmit = document.getElementById('btnSubmit');
  const conferma = document.getElementById('conferma');
  const originalBtnText = btnSubmit ? btnSubmit.textContent : '';

  const validators = {
    fNome: v => v.trim().length >= 2 ? '' : 'Inserisci nome e cognome',
    fTel: v => /^3\d{8,9}$/.test(v.replace(/[\s.\-]/g, '').replace(/^(\+39|0039)/, '')) ? '' : 'Inserisci un cellulare valido (es. 3331234567)',
    fEmail: v => !v || /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(v.trim()) ? '' : 'Email non valida'
  };

  function getCommercialConsent() {
    return form.consenso_commerciale || form.consenso_ricontatto || null;
  }

  function refreshSubmit() {
    if (!btnSubmit) return;
    const allFieldsOk = Object.keys(validators).every(id => {
      const el = document.getElementById(id);
      return !el || !validators[id](el.value);
    });
    // I consensi possono essere nascosti dalla landing (mostra_consenso_*): un
    // consenso ASSENTE nel DOM non è obbligatorio; se PRESENTE deve essere spuntato.
    const commercial = getCommercialConsent();
    const commercialOk = !commercial || commercial.checked;
    const privacyOk = !form.consenso_privacy || form.consenso_privacy.checked;
    btnSubmit.disabled = !(allFieldsOk && commercialOk && privacyOk);
  }

  const telField = document.getElementById('fTel');
  if (telField) {
    telField.addEventListener('input', () => {
      const stripped = telField.value.replace(/^\s*\+\s*39\s*/, '');
      if (stripped !== telField.value) telField.value = stripped;
    });
  }

  Object.keys(validators).forEach(id => {
    const el = document.getElementById(id);
    if (!el) return;
    el.addEventListener('input', () => {
      const msg = validators[id](el.value);
      const errBox = document.querySelector('[data-error-for="' + id + '"]');
      if (errBox) errBox.textContent = msg;
      refreshSubmit();
    });
  });
  form.addEventListener('change', refreshSubmit);

  // Messaggio per il visitatore in base alla risposta di lead.php / API.
  function leadErrorMessage(err) {
    const status = err && err.status;
    const data = (err && err.data) || {};
    const errors = data.errors || {};
    if (status === 422) {
      if (data.message === 'Telefono non valido.' || errors.telefono) return 'Inserisci un numero di cellulare valido (es. 3331234567).';
      if (errors.email) return 'Inserisci un indirizzo email valido.';
      if (errors.nome_cognome) return 'Inserisci nome e cognome.';
      return 'Non è stato possibile completare la richiesta. Controlla i dati inseriti.';
    }
    if (status === 429) return 'Troppe richieste in poco tempo. Riprova più tardi.';
    return 'Errore invio. Riprova tra qualche minuto.';
  }

  form.addEventListener('submit', async e => {
    e.preventDefault();
    if (btnSubmit) {
      btnSubmit.textContent = 'Invio in corso...';
      btnSubmit.disabled = true;
    }
    try {
      const commercial = getCommercialConsent();
      const emailValue = form.email && form.email.value.trim();
      const selectedOffer = form.offerta && form.offerta.value ? parseInt(form.offerta.value, 10) : null;
      const payload = {
        nome_cognome: form.nome.value.trim(),
        email: emailValue || null,
        telefono: form.telefono.value.trim().replace(/\D/g, ''),
        landing_page_url: window.location.origin,
        user_agent: navigator.userAgent,
        data_registrazione: new Date().toISOString(),
        offerta_id: Number.isInteger(selectedOffer) ? selectedOffer : null,
        consenso_0: !!(commercial && commercial.checked),
        consenso_1: !!(form.consenso_privacy && form.consenso_privacy.checked),
        consenso_2: !!(form.consenso_marketing && form.consenso_marketing.checked)
      };

      const res = await fetch(ENDPOINT_URL, {
        method: 'POST',
        body: JSON.stringify(payload),
        headers: {
          'Content-Type': 'application/json',
          'Accept': 'application/json'
        }
      });
      if (!res.ok) {
        const err = new Error('HTTP ' + res.status);
        err.status = res.status;
        try { err.data = await res.json(); } catch (_) {}
        throw err;
      }
      form.hidden = true;
      if (conferma) conferma.hidden = false;
    } catch (err) {
      if (btnSubmit) {
        btnSubmit.textContent = originalBtnText || 'Invia';
        btnSubmit.disabled = false;
      }
      alert(leadErrorMessage(err));
    }
  });

})();
