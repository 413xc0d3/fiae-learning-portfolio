console.log("datei geladen");
// Elemente selektieren
const kennzeichenInput = document.getElementById("kennzeichen-input");
const ticketButton = document.getElementById("ticket-button");
const displayMessage = document.getElementById("display-message");

const parkedCarsListContainer = document.getElementById("parked-cars-list");

let geparkteAutos = [];

function showMessage(text, isError){
    displayMessage.textContent = text;
    if(isError){
        displayMessage.style.color = "red";
    }else{
         displayMessage.style.color = "yellow";
    }
}

function renderParkedCars(){
    // anzeige aktualisieren
    console.log("neue anzeige");
    console.log(geparkteAutos);

    // LIste erst leeren - bevor neu befüllt wird
    parkedCarsListContainer.innerHTML = ""; 
    // wieviele Autos in geparkteAutos --> Schleife
   /*
    for(let i = 0; i < geparkteAutos.length; i++){
        // aktuelles Fahrzeug abgreifen --> über index
        let fahrzeug = geparkteAutos[i];
         // li erzeugen (createElement)
         const listItem = document.createElement("li");         
         // li als Inhalt das aktuelle Fahrzeug geben (textcontent)
         listItem.textContent = `${fahrzeug.kennzeichen} seit ${fahrzeug.einfahrt.toLocaleString()}`;
        // fertiges LI zu Liste (ul) hinzzufügen (appendChild)
        parkedCarsListContainer.appendChild(listItem);
    }
    */
  

      geparkteAutos.forEach((fahrzeug) => {      
         // li erzeugen (createElement)
         const listItem = document.createElement("li");         
         // li als Inhalt das aktuelle Fahrzeug geben (textcontent)
         listItem.textContent = `${fahrzeug.kennzeichen} seit ${fahrzeug.einfahrt.toLocaleString()}`;
        // fertiges LI zu Liste (ul) hinzzufügen (appendChild)
        parkedCarsListContainer.appendChild(listItem);
    });   

}

function createSuccesMessage(kennzeichen){
    return `Ticket für das Fahrzeug ${kennzeichen} wurde erstellt`;
}
function handleTicketButtonClick(event){
     console.log("Ticket Button geklickt");
    // Standard-Neuladen der Seite bei Submit unterdrücken 
    event.preventDefault();
    let aktuellesKennzeichen = kennzeichenInput.value;

    // test:
    // showMessage("testausgabe: " + aktuellesKennzeichen , false);

    if(aktuellesKennzeichen === ""){
        showMessage("Fehler: Kein Kennzeichen", true);
    }else{
        let nachricht = createSuccesMessage(aktuellesKennzeichen);
        showMessage(nachricht, false);


        let neuesFahrzeug = {
            kennzeichen: aktuellesKennzeichen,
            einfahrt: new Date()
        }

        geparkteAutos.push(neuesFahrzeug);   
        
        renderParkedCars();
        kennzeichenInput.value = "";

    }


    //  prüfen, ob kein Kennzeichen eingegeben wurde
        // wenn kein kennzeichen: fehlermeldung (showMessage - "fehler", rot (true))
        /* wenn kennzeichen: erfolgsmeldung (showMessage - "Erfolg", grün (false))
                             fahrzeug in liste eintragen
                             */
         
        // Anzeige aktualisieren
        // Eingabefeld leeren

}
// Button Funktion bei click übergeben
ticketButton.addEventListener("click", handleTicketButtonClick);

