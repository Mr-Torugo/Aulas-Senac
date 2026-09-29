
package aula2809;

import javax.swing.JOptionPane;

public class Aula2809 {

     public static void main(String[] args) {
        // Declaração das variáveis
        String ra, nome, disciplina;
        double av1, av2, media;
//Entrada dos dados
        ra = JOptionPane.showInputDialog("Digite RA:");
        nome = JOptionPane.showInputDialog("Digite Nome:");
        disciplina = JOptionPane.showInputDialog("Digite Disciplina:");
        av1 = Double.parseDouble(JOptionPane.showInputDialog("Digite AV1:"));
        av2 = Double.parseDouble(JOptionPane.showInputDialog("Digite AV2:"));
        //Calculo da media
        media = (av1 + av2)/2;
        //Apresentaçao dos resultados
        JOptionPane.showMessageDialog(null, nome + " sua media é " + media + " na disciplina " + disciplina);
    }  }


