
package Exe1;

import javax.swing.JOptionPane;

public class Exe1 {

     public static void main(String[] args) {
        // Declaração das variáveis
        String nome, cargo;

        double salreajuste, salario;

        //Entrada dos dados
        salreajuste = 0;
        salario = Double.parseDouble(JOptionPane.showInputDialog("Digite Salário:"));
        nome = JOptionPane.showInputDialog("Digite Nome:");
        cargo = JOptionPane.showInputDialog("Digite Cargo:");

        if (cargo.equalsIgnoreCase("Gerente")) {
            salreajuste = salario + (salario * .15);
        } else if (cargo.equalsIgnoreCase("Vendedor")) {
            salreajuste = salario + (salario * .08);
        } else {
            salreajuste = salario + (salario * .03);
        }


        //Apresentaçao dos resultados
        JOptionPane.showMessageDialog(null, nome + " seu salário é " + salreajuste );
    }
}