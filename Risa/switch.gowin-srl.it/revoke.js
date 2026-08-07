const queryParams = new URLSearchParams(window.location.search);
const id = queryParams.get("id");

const origin = window.location.origin;
let path = window.location.pathname;
path = path.split('/')[1];
const url = origin + '/' + path;

const btnRevoke = document.getElementById("btn-revoke");
const boxAction = document.getElementById("box-action");
const boxStatus = document.getElementById("box-status");
const statusMessage = document.getElementById("status-message");

const ENDPOINT_URL = `http://localhost:8000/api/revoke`;

if (!id) {
    boxAction.innerHTML = "<h2>Errore</h2><p>Link non valido o mancante.</p>";
} else {
    btnRevoke.addEventListener("click", () => {
        revoke();
    });
}

async function revoke() {
    btnRevoke.disabled = true;
    btnRevoke.innerText = "Elaborazione in corso...";

    try {
        const res = await fetch(ENDPOINT_URL, {
            method: "POST", 
            headers: {
                "Content-Type": "application/json",
                "Accept": "application/json",
            },
            body: JSON.stringify({ revoca_code: id, landing_page_url : url }) 
        });

        if (!res.ok) throw new Error("HTTP " + res.status);

        boxAction.classList.add("hidden");
        boxStatus.classList.remove("hidden");
        statusMessage.className = "success";
        statusMessage.innerText = "Disiscrizione completata con successo. Non riceverai più comunicazioni.";

    } catch (error) {
        btnRevoke.disabled = false;
        btnRevoke.innerText = "Conferma Disiscrizione";
        alert("Si è verificato un errore durante la revoca. Riprova.");
    }
}