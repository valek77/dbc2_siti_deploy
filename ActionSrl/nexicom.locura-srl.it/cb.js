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
          font-family: var(--font-body), sans-serif;
          animation: slideUp 0.5s cubic-bezier(.16,1,.3,1) forwards;
        }
        @keyframes slideUp {
          from { transform: translateY(100%); }
          to { transform: translateY(0); }
        }
        .cookie-banner-container {
          background: #ffffff;
          box-shadow: 0 -10px 48px rgba(9, 13, 22, 0.12);
          padding: 28px 40px;
          width: 100%;
          display: flex;
          flex-direction: row;
          align-items: center;
          gap: 40px;
          pointer-events: auto;
          border-top: 1px solid var(--line, #e2e8f0);
        }
        .cookie-content {
          flex: 1;
        }
        .cookie-content strong {
          display: block;
          font-size: 16px;
          color: var(--ink, #0f172a);
          margin-bottom: 6px;
          font-weight: 700;
        }
        .cookie-content p {
          font-size: 14px;
          line-height: 1.6;
          color: var(--muted, #64748b);
          margin: 0;
        }
        .cookie-content a {
          color: var(--primary, #0d9488);
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
          padding: 12px 24px;
          border-radius: var(--r-pill, 9999px);
          font-size: 13.5px;
          font-weight: 700;
          cursor: pointer;
          text-align: center;
          transition: all 0.25s cubic-bezier(.16,1,.3,1);
          border: none;
          font-family: inherit;
        }
        .cookie-btn-primary {
          background: var(--grad-accent, linear-gradient(102deg, #34d399 0%, #10b981 60%, #059669 100%));
          color: #fff;
          box-shadow: 0 4px 14px rgba(16, 185, 129, 0.3);
        }
        .cookie-btn-primary:hover {
          transform: translateY(-2px);
          box-shadow: 0 8px 20px rgba(16, 185, 129, 0.4);
        }
        .cookie-btn-secondary {
          background: var(--bg-soft, #f5f5f4);
          color: var(--ink, #0f172a);
        }
        .cookie-btn-secondary:hover {
          background: var(--line, #e2e8f0);
          transform: translateY(-2px);
        }
        @media (max-width: 768px) {
          .cookie-banner-container {
            flex-direction: column;
            align-items: stretch;
            gap: 20px;
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
            <strong>Informativa sui Cookie 🍪</strong>
            <p>Utilizziamo i cookie tecnici per garantirti la migliore esperienza di navigazione. Maggiori dettagli nella nostra <a href="privacy-policy.html">Informativa Privacy</a>.</p>
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
