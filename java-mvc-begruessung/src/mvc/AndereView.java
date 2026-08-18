package mvc;

import java.util.Scanner;

public class AndereView {

    Scanner scanner = new Scanner(System.in);

    public String askName() {
        System.out.println("Whats your name?");
        return scanner.nextLine();
    }

    public void showText(String text) {
        System.out.println("**********");
        System.out.println(text);
        System.out.println("noch mehr ....");
    }
}
