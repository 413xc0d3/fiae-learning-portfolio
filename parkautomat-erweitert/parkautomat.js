// --- Referenzen auf die benötigten HTML-Elemente ---
const kennzeichenInput = document.getElementById("kennzeichen-input");
const ticketButton = document.getElementById("ticket-button");
const displayMessage = document.getElementById("display-message");
const parkedCarsListContainer = document.getElementById("parked-cars-list");
const kapazitaetAnzeige = document.getElementById("kapazitaet-anzeige");

const accessForm = document.getElementById("access-form");
const accessInput = document.getElementById("access-input");
const accessListContainer = document.getElementById("access-list");

// Zentraler Datenspeicher: jedes Element ist {kennzeichen, einfahrt}
const geparkteAutos = [];

// Maximale Anzahl gleichzeitig geparkter Fahrzeuge
const maxKapazitaet = 10;

// Zugangsliste: nur Kennzeichen aus diesem Array dürfen einparken.
// Ein paar Beispieleinträge als Startbestand.
const erlaubteKennzeichen = ["M-AB 123", "B-XY 456"];

// Zeigt eine Statusmeldung an (gelb = normal, rot = Fehler)
function showMessage(text, isError) {
    displayMessage.textContent = text;
    displayMessage.style.color = isError ? "red" : "yellow";
}

// Vereinheitlicht ein Kennzeichen für den Vergleich:
// Groß-/Kleinschreibung und überflüssige Leerzeichen sollen keine Rolle spielen
function normalisiereKennzeichen(kennzeichen) {
    return kennzeichen.trim().toUpperCase().replace(/\s+/g, " ");
}

// Prüft, ob ein Kennzeichen auf der Zugangsliste steht
function istZugangErlaubt(kennzeichen) {
    const gesucht = normalisiereKennzeichen(kennzeichen);
    return erlaubteKennzeichen.some(eintrag => normalisiereKennzeichen(eintrag) === gesucht);
}

// Baut die Liste der geparkten Fahrzeuge komplett neu auf
// (wird nach jedem Einparken/Ausparken erneut aufgerufen)
function renderParkedCars() {
    parkedCarsListContainer.innerHTML = "";

    // Belegungsanzeige: aktuelle Anzahl vs. maximale Kapazität
    kapazitaetAnzeige.textContent = `Belegt: ${geparkteAutos.length} von ${maxKapazitaet} Plätzen`;

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

// Baut die Liste der freigegebenen Kennzeichen neu auf,
// jeweils mit einem Button zum Entfernen aus der Zugangsliste
function renderAccessList() {
    accessListContainer.innerHTML = "";

    erlaubteKennzeichen.forEach((kennzeichen, index) => {
        const listItem = document.createElement("li");
        const removeButton = document.createElement("button");
        removeButton.textContent = "Entfernen";

        removeButton.addEventListener("click", () => {
            erlaubteKennzeichen.splice(index, 1);
            showMessage(`Kennzeichen ${kennzeichen} wurde aus der Zugangsliste entfernt`, false);
            renderAccessList();
            renderKennzeichenOptions();
        });

        listItem.textContent = kennzeichen + " ";
        listItem.appendChild(removeButton);
        accessListContainer.appendChild(listItem);
    });
}

// Baut das Auswahl-Dropdown im Bedienfeld neu auf, damit es immer nur
// die aktuell freigegebenen Kennzeichen zur Auswahl anbietet
function renderKennzeichenOptions() {
    kennzeichenInput.innerHTML = "";

    const platzhalter = document.createElement("option");
    platzhalter.value = "";
    platzhalter.textContent = "-- Kennzeichen wählen --";
    kennzeichenInput.appendChild(platzhalter);

    erlaubteKennzeichen.forEach(kennzeichen => {
        const option = document.createElement("option");
        option.value = kennzeichen;
        option.textContent = kennzeichen;
        kennzeichenInput.appendChild(option);
    });
}

// Baut den Erfolgstext für ein neu ausgestelltes Ticket
function createSuccessMessage(kennzeichen) {
    return `Ticket für das Fahrzeug ${kennzeichen} wurde erstellt`;
}

// Klick auf "Parkticket ziehen": validiert die Auswahl, prüft die
// Zugangsliste und legt bei Erfolg ein neues Fahrzeug im Array an
function handleTicketButtonClick(event) {
    event.preventDefault();

    const aktuellesKennzeichen = kennzeichenInput.value.trim();

    if (aktuellesKennzeichen === "") {
        showMessage("Fehler: Kein Kennzeichen ausgewählt", true);
        return;
    }

    // Zugangskontrolle: ohne Freigabe kein Ticket
    if (!istZugangErlaubt(aktuellesKennzeichen)) {
        showMessage(`Zugang verweigert: ${aktuellesKennzeichen} steht nicht auf der Zugangsliste`, true);
        return;
    }

    // Kapazitätsgrenze: analog zur Ressourcenprüfung in barista.js (bruehen())
    if (geparkteAutos.length >= maxKapazitaet) {
        showMessage("Parkhaus voll: Bitte später erneut versuchen", true);
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

// Klick auf "Freigeben": nimmt ein neues Kennzeichen in die Zugangsliste auf
function handleAccessFormSubmit(event) {
    event.preventDefault();

    const neuesKennzeichen = accessInput.value.trim();

    if (neuesKennzeichen === "") {
        showMessage("Fehler: Kein Kennzeichen zum Freigeben angegeben", true);
        return;
    }

    if (istZugangErlaubt(neuesKennzeichen)) {
        showMessage(`Kennzeichen ${neuesKennzeichen} ist bereits freigegeben`, true);
        return;
    }

    erlaubteKennzeichen.push(neuesKennzeichen);
    showMessage(`Kennzeichen ${neuesKennzeichen} wurde freigegeben`, false);
    renderAccessList();
    renderKennzeichenOptions();
    accessInput.value = "";
}

// Einstiegspunkte: Klick auf Ticket-Button startet den Einparkvorgang,
// Absenden des Zugangs-Formulars pflegt die Freigabeliste
ticketButton.addEventListener("click", handleTicketButtonClick);
accessForm.addEventListener("submit", handleAccessFormSubmit);

// Zugangsliste, Auswahl-Dropdown und Belegungsanzeige beim Laden der Seite direkt anzeigen
renderAccessList();
renderKennzeichenOptions();
renderParkedCars();
