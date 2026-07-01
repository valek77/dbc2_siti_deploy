(function () {
  const ENDPOINT_URL = 'https://dbc2.datalia.it/api/lead';

  const form = document.getElementById('leadForm') || document.getElementById('contatto-form');
  if (!form) return;

  const btnSubmit = document.getElementById('btnSubmit');
  const conferma = document.getElementById('conferma');
  const originalBtnText = btnSubmit ? btnSubmit.textContent : '';

  const validators = {
    fNome: v => v.trim().length >= 2 ? '' : 'Inserisci nome e cognome',
    fTel: v => /^[0-9 +]{8,}$/.test(v.trim()) ? '' : 'Numero non valido',
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
    const commercial = getCommercialConsent();
    const consensiOk = commercial && commercial.checked && form.consenso_privacy && form.consenso_privacy.checked;
    btnSubmit.disabled = !(allFieldsOk && consensiOk);
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

  async function getClientIp() {
    try {
      const res = await fetch('https://api.ipify.org?format=json');
      if (!res.ok) return null;
      const data = await res.json();
      return data.ip || null;
    } catch (e) {
      return null;
    }
  }

  form.addEventListener('submit', async e => {
    e.preventDefault();
    if (btnSubmit) {
      btnSubmit.textContent = 'Invio in corso...';
      btnSubmit.disabled = true;
    }
    try {
      const ip = await getClientIp();
      const commercial = getCommercialConsent();
      const emailValue = form.email && form.email.value.trim();
      const payload = {
        nome_cognome: form.nome.value.trim(),
        email: emailValue || null,
        telefono: form.telefono.value.trim().replace(/\D/g, ''),
        ip: ip,
        landing_page_url: window.location.origin,
        data_registrazione: new Date().toISOString(),
        consenso_0: !!(form.consenso_privacy && form.consenso_privacy.checked),
        consenso_1: !!(commercial && commercial.checked),
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
      if (!res.ok) throw new Error('HTTP ' + res.status);
      form.hidden = true;
      if (conferma) conferma.hidden = false;
    } catch (err) {
      if (btnSubmit) {
        btnSubmit.textContent = originalBtnText || 'Invia';
        btnSubmit.disabled = false;
      }
      alert('Errore invio.');
    }
  });

  const params = new URLSearchParams(window.location.search);
  const offer = params.get('offerta');
  if (offer) {
    const msgField = document.getElementById('messaggio');
    if (msgField) {
      msgField.value = "Sono interessato all'offerta: " + offer;
    } else {
      const infoMsg = document.createElement('div');
      infoMsg.style.cssText = 'background:rgba(29,78,216,.08);color:#0f3ea8;padding:12px;border-radius:8px;font-weight:600;margin-bottom:16px;font-size:14px;border:1px solid rgba(29,78,216,.18);';
      infoMsg.textContent = 'Richiesta per: ' + offer;
      form.prepend(infoMsg);
    }
  }
})();
