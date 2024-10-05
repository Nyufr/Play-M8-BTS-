import java.util.ArrayList;
import javax.swing.JFrame;
import javax.swing.JLabel;

public class Launcher {
public static void main(String[] args) {
// Création de la fenêtre
JFrame window = new JFrame("Play M8 Launcher");
window.setSize(800, 600);
window.setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);

// Création d'un texte pour les news
JLabel newsText = new JLabel("<html>Dernières news : <br> - Nouveau jeu ajouté <br> - Promotion de 80% sur les jeux</html>");
newsText.setBounds(50, 50, 500, 100);

// Création d'une liste de jeux
ArrayList<String> games = new ArrayList<String>();
games.add("Jeu 1");
games.add("Jeu 2");
games.add("Jeu 3");
games.add("Jeu 4");
games.add("Jeu 5");

// Création d'un texte pour la liste de jeux
JLabel gamesText = new JLabel();
gamesText.setBounds(50, 200, 500, 200);

// Boucle principale
while (true) {
// Affichage des éléments
window.getContentPane().removeAll();
window.getContentPane().add(newsText);

// Affichage de la liste de jeux
for (int i = 0; i < games.size(); i++) {
gamesText.setText(games.get(i));
window.getContentPane().add(gamesText);
gamesText.setLocation(50, 200 + i * 50);
}

window.setVisible(true);
}
}
}