console.log("Externe JS geladen ")
 /* Variablen, Selektion */
        let anzeige = document.getElementById("display");
        let btnHeizen = document.getElementById("btnHeizen");
        let btnStart = document.getElementById("btnStart");

        let temperatur = 20;
        let wahl = "";

        /* Funktionen */
        /* Aufheizen */
        function aufheizen(){
            console.log("aufheizen gedrückt");
            while(temperatur < 90){
                //temperatur = temperatur + 10;
                temperatur += 10;
                console.log("Temperatur steigt: "+ temperatur);
            }
            anzeige.innerHTML = "Status: Temperatur von "+temperatur+"° erreicht";
            btnStart.disabled = false;
        }


        /* Getränke-Auswahl */
        function auswahl(getraenk){
            console.log("Getränk wurde ausgewählt:", getraenk);
            wahl = getraenk;
            switch(wahl){
                case "Espresso":
                    anzeige.innerHTML = "Auswahl: Espresso";
                    break;
                case "Latte":
                    anzeige.innerHTML = "Auswahl: Latte";
                    break;
                default:
                    /* falls in wahl etwas anderes stehen würde ....
                    kann bei uns aber eigentlich nicht passieren */
        
            }

        }
        /* Zubereitung */
        function bruehen(){
            console.log("Start wurde gedrückt");
            // 1. Prüfung - Temperatur
            // 2. Prfüung - welches Getränk?
            if(temperatur < 90){
                anzeige.innerHTML = "Fehler: Maschine muss noch heizen";
            }else if(wahl == ""){
                anzeige.innerHTML = "Fehler: Keine Auswahl getroffen ";
            }
            else{
                anzeige.innerHTML = (":-)");
            }
        }

        /* Bindung der Events */
        btnHeizen.onclick = aufheizen;
        btnStart.onclick = bruehen;