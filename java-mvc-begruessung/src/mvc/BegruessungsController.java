package mvc;

// Vermittler zwischen Model und View
public class BegruessungsController {

    private BegruessungsModel model;
    private AndereView view;

    public BegruessungsController(BegruessungsModel model, AndereView view) {
        this.model = model;
        this.view = view;
    }

    public void starten() {
        // 1. Eingabe über die View anfordern
        String eingabeName = view.askName();

        // 2. Daten an das Model zur Verarbeitung weitergeben
        String ergebnisGruss = model.erstelleGruss(eingabeName);

        // 3. Ergebnis über die View anzeigen
        view.showText(ergebnisGruss);
    }

    public static void main(String[] args) {
        System.out.println("Main wird gestartet");

        BegruessungsModel m = new BegruessungsModel();
        AndereView v = new AndereView();

        BegruessungsController meinController = new BegruessungsController(m, v);
        meinController.starten();
    }
}
