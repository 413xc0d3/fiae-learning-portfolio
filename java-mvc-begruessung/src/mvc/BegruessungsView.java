package mvc;

import java.util.Scanner;

// Anzeige und Entgegennahme von Daten
public class BegruessungsView {

    Scanner scanner = new Scanner(System.in);

    public String frageName() {
        System.out.println("Wie ist Dein Name?");
        return scanner.nextLine();
    }

    public void zeigeAusgabe(String text) {
        System.out.println(text);
    }
}
