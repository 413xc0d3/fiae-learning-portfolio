// --- Referenzen auf die benötigten HTML-Elemente ---
const kennzeichenInput = document.getElementById("kennzeichen-input");
const ticketButton = document.getElementById("ticket-button");
const displayMessage = document.getElementById("display-message");
const parkedCarsListContainer = document.getElementById("parked-cars-list");

// Zentraler Datenspeicher: jedes Element ist {kennzeichen, einfahrt}
const geparkteAutos = [];

// Zeigt eine Statusmeldung an (gelb = normal, rot = Fehler)
function showMessage(text, isError) {
    displayMessage.textContent = text;
    displayMessage.style.color = isError ? "red" : "yellow";
}

// Baut die Liste der geparkten Fahrzeuge komplett neu auf
// (wird nach jedem Einparken/Ausparken erneut aufgerufen)
function renderParkedCars() {
    parkedCarsListContainer.innerHTML = "";

    geparkteAutos.forEach((fahrzeug, index) => {
        const listItem = document.createElement("li");

        // Button 1: berechnet nur die Gebühr, parkt noch nicht aus
        const deleteButton = document.createElement("button");
        deleteButton.textContent = "Ausparken";

        // Button 2: erscheint erst nach Klick auf Button 1,
        // entfernt das Fahrzeug dann tatsächlich aus der Liste
        const paymentButton = document.createElement("button");
        paymentButton.textContent = "Bezahlen und ausparken";
        paymentButton.hidden = true;

        // Klick auf "Ausparken": Parkdauer und Gebühr berechnen und anzeigen,
        // Bezahlbutton einblenden
        deleteButton.addEventListener("click", () => {
            const ausfahrt = new Date();
            const parkdauerMinuten = Math.ceil((ausfahrt - fahrzeug.einfahrt) / 60000);
            const angefangeneStunden = Math.ceil(parkdauerMinuten / 60);
            // 2,50 € pro angefangener Stunde, gedeckelt auf max. 15 €
            const parkgebuehr = Math.min(angefangeneStunden * 2.50, 15);

            showMessage(`Parkdauer für ${fahrzeug.kennzeichen}: ${parkdauerMinuten} Minuten. Zu zahlen: ${parkgebuehr.toFixed(2)} €`, false);
            paymentButton.hidden = false;
        });

        // Klick auf "Bezahlen und ausparken": Fahrzeug endgültig aus dem
        // Array entfernen und die Liste neu anzeigen
        paymentButton.addEventListener("click", () => {
            geparkteAutos.splice(index, 1);
            showMessage(`Fahrzeug ${fahrzeug.kennzeichen} wurde ausgeparkt!`, false);
            renderParkedCars();
        });

        listItem.textContent = `${fahrzeug.kennzeichen} seit ${fahrzeug.einfahrt.toLocaleString()}`;
        listItem.appendChild(deleteButton);
        listItem.appendChild(paymentButton);
        parkedCarsListContainer.appendChild(listItem);
    });
}

// Baut den Erfolgstext für ein neu ausgestelltes Ticket
function createSuccessMessage(kennzeichen) {
    return `Ticket für das Fahrzeug ${kennzeichen} wurde erstellt`;
}

// Klick auf "Ticket erstellen": validiert die Eingabe, legt bei Erfolg
// ein neues Fahrzeug im Array an und aktualisiert die Anzeige
function handleTicketButtonClick(event) {
    event.preventDefault();

    const aktuellesKennzeichen = kennzeichenInput.value.trim();

    if (aktuellesKennzeichen === "") {
        showMessage("Fehler: Kein Kennzeichen", true);
        return;
    }

    showMessage(createSuccessMessage(aktuellesKennzeichen), false);

    const neuesFahrzeug = {
        kennzeichen: aktuellesKennzeichen,
        einfahrt: new Date()
    };

    geparkteAutos.push(neuesFahrzeug);
    renderParkedCars();
    kennzeichenInput.value = "";
}

// Einstiegspunkt: Klick auf den Ticket-Button startet den Ablauf
ticketButton.addEventListener("click", handleTicketButtonClick);
