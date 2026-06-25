(function() {
  if (!localStorage.getItem('cookieConsent')) {
      const style = document.createElement('style');
      style.innerHTML = `
        .cookie-banner-wrapper {
          position: fixed;
          bottom: 0;
          left: 0;
          right: 0;
          z-index: 99999;
          display: flex;
          justify-content: center;
          pointer-events: none;
          font-family: inherit;
          animation: slideUp 0.5s ease-out forwards;
        }
        @keyframes slideUp {
          from { transform: translateY(100%); }
          to { transform: translateY(0); }
        }
        .cookie-banner-container {
          background: #ffffff;
          box-shadow: 0 -10px 40px rgba(0, 0, 0, 0.15);
          padding: 32px 40px;
          width: 100%;
          display: flex;
          flex-direction: row;
          align-items: center;
          gap: 40px;
          pointer-events: auto;
          border-top: 1px solid rgba(0,0,0,0.05);
        }
        .cookie-content {
          flex: 1;
        }
        .cookie-content strong {
          display: block;
          font-size: 17px;
          color: #0B1220;
          margin-bottom: 8px;
          font-weight: 700;
        }
        .cookie-content p {
          font-size: 14.5px;
          line-height: 1.6;
          color: #4a5568;
          margin: 0;
        }
        .cookie-content a {
          color: #0057C8;
          text-decoration: underline;
          font-weight: 600;
        }
        .cookie-actions {
          display: flex;
          flex-direction: column;
          gap: 12px;
          min-width: 220px;
        }
        .cookie-btn {
          padding: 14px 24px;
          border-radius: 12px;
          font-size: 14px;
          font-weight: 700;
          cursor: pointer;
          text-align: center;
          transition: all 0.2s ease;
          border: none;
          font-family: inherit;
        }
        .cookie-btn-primary {
          background: #0057C8;
          color: #fff;
          box-shadow: 0 4px 12px rgba(0, 87, 200, 0.3);
        }
        .cookie-btn-primary:hover {
          background: #003F9A;
          transform: translateY(-2px);
        }
        .cookie-btn-secondary {
          background: #f1f5f9;
          color: #0B1220;
        }
        .cookie-btn-secondary:hover {
          background: #e2e8f0;
          transform: translateY(-2px);
        }
        @media (max-width: 768px) {
          .cookie-banner-container {
            flex-direction: column;
            align-items: stretch;
            gap: 24px;
            padding: 24px;
          }
          .cookie-actions {
            flex-direction: row;
          }
          .cookie-btn {
            flex: 1;
          }
        }
        @media (max-width: 480px) {
          .cookie-actions {
            flex-direction: column;
          }
        }
      `;
      document.head.appendChild(style);

      const wrapper = document.createElement('div');
      wrapper.className = 'cookie-banner-wrapper';
      wrapper.innerHTML = `
        <div class="cookie-banner-container">
          <div class="cookie-content">
            <strong>Utilizziamo i cookie per migliorare la tua esperienza sul sito. 🍪</strong>
            <p>Puoi accettare tutti i cookie e continuare la navigazione.<br>
            Trovi tutte le informazioni sui cookie utilizzati nella nostra <a href="cookie-policy.html">cookie policy</a>.</p>
          </div>
          <div class="cookie-actions">
            <button class="cookie-btn cookie-btn-primary" id="btn-accept-cookie">Accetta tutto</button>
          </div>
        </div>
      `;
      document.body.appendChild(wrapper);

      document.getElementById('btn-accept-cookie').addEventListener('click', function() {
        localStorage.setItem('cookieConsent', 'accepted');
        wrapper.remove();
      });
  }
})();
