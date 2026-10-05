<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Annulla Iscrizione SMS</title>
    <style>
        body { font-family: sans-serif; text-align: center; padding-top: 50px; background-color: #f9f9f9; }
        .container { max-width: 400px; margin: 0 auto; padding: 20px; background: white; border-radius: 8px; box-shadow: 0 4px 6px rgba(0,0,0,0.1); }
        button { padding: 12px 24px; font-size: 16px; font-weight: bold; cursor: pointer; background: #dc3545; color: white; border: none; border-radius: 5px; transition: background 0.2s; }
        button:hover { background: #bd2130; }
        button:disabled { background: #6c757d; cursor: not-allowed; }
        .hidden { display: none; }
        .success { color: #28a745; }
    </style>
</head>
<body>

    <div class="container">
        <div id="box-action">
            <h2>Annulla Iscrizione</h2>
            <p>Clicca sul bottone qui sotto per non ricevere più SMS pubblicitari da questa azienda.</p>
            <button id="btn-revoke">Conferma Disiscrizione</button>
        </div>

        <div id="box-status" class="hidden">
            <h3 id="status-message"></h3>
        </div>
    </div>

    <script src="revoke.js"></script>
</body>
</html>