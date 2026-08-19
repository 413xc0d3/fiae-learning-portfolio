const kennzeichenInput = document.getElementById("kennzeichen-input");
const ticketButton = document.getElementById("ticket-button");
const displayMessage = document.getElementById("display-message");
const parkedCarsListContainer = document.getElementById("parked-cars-list");

const geparkteAutos = [];

function showMessage(text, isError) {
    displayMessage.textContent = text;
    displayMessage.style.color = isError ? "red" : "yellow";
}

function renderParkedCars() {
    parkedCarsListContainer.innerHTML = "";

    geparkteAutos.forEach((fahrzeug, index) => {
        const listItem = document.createElement("li");

        const deleteButton = document.createElement("button");
        deleteButton.textContent = "Ausparken";

        const paymentButton = document.createElement("button");
        paymentButton.textContent = "Bezahlen und ausparken";
        paymentButton.hidden = true;

        deleteButton.addEventListener("click", () => {
            const ausfahrt = new Date();
            const parkdauerMinuten = Math.ceil((ausfahrt - fahrzeug.einfahrt) / 60000);
            const angefangeneStunden = Math.ceil(parkdauerMinuten / 60);
            const parkgebuehr = Math.min(angefangeneStunden * 2.50, 15);

            showMessage(`Parkdauer für ${fahrzeug.kennzeichen}: ${parkdauerMinuten} Minuten. Zu zahlen: ${parkgebuehr.toFixed(2)} €`, false);
            paymentButton.hidden = false;
        });

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

function createSuccessMessage(kennzeichen) {
    return `Ticket für das Fahrzeug ${kennzeichen} wurde erstellt`;
}

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

ticketButton.addEventListener("click", handleTicketButtonClick);
