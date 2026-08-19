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
        deleteButton.addEventListener("click", () => {
            geparkteAutos.splice(index, 1);
            showMessage(`Fahrzeug ${fahrzeug.kennzeichen} wurde ausgeparkt!`, false);
            renderParkedCars();
        });
        listItem.textContent = `${fahrzeug.kennzeichen} seit ${fahrzeug.einfahrt.toLocaleString()}`;
        listItem.appendChild(deleteButton);
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
