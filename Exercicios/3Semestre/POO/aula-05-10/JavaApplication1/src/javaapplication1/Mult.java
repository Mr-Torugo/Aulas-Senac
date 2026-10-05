
package javaapplication1;

import javax.swing.JOptionPane;

public class Mult {
    public static void main(String[] args) {
        
        int n1, n2, n3, resultado, ano;
        
        //Entrando com os valores n1 e n2
        n1 = Integer.parseInt(JOptionPane.showInputDialog("Digite o primeiro número"));
        n2 = Integer.parseInt(JOptionPane.showInputDialog("Digite o segundo número"));

        //Chamando o método multiplicar(n1, n2, n3) e armazenando seu valor retornado na variável resultado
        resultado = multiplicar(n1, n2);

        ano = obterAno();
        JOptionPane.showMessageDialog(null, "O ano atual é: " + ano);
        
        //Apresentando o resultado
        JOptionPane.showMessageDialog(null, "O resultado da multiplicação é " + resultado);
    }




    private static int multiplicar(int n1, int n2) {
        return n1 * n2 ;
    }

    //metodo obterAno() que retorna o ano atual
    private static int obterAno() {return 2021;}

}
