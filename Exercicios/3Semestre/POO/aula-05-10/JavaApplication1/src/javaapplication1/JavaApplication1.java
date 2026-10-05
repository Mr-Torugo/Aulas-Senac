import javax.swing.JOptionPane;

package javaapplication1;


public class JavaApplication1 {


    public static void main(String[] args) {
        
        int n1, n2, resultado;
        
        //Entrando com os valores n1 e n2
        n1 = Integer.parseInt(JOptionPane.showInputDialog("Digite o primeiro número"));
        n2 = Integer.parseInt(JOptionPane.showInputDialog("Digite o segundo número"));
        
        //Chamando o método somar(n1, n2) e armazenando seu valor retornado na variável resultado
        resultado = somar(n1, n2); //toda vez que se chama um método e ele retorna alguma coisa, é necessário
                                   //uma variável para receber o que é retornado
        
        //Apresentando o resultado
        JOptionPane.showMessageDialog(null, "O resultado da soma é " + resultado);
        //poderíamos eliminar a variável resultado e fazer a chamado do método dentro da linha acima:
        // JOptionPane.showMessageDialog(null, "O resultado da soma é " + somar(n1, n2));
    }

    //Método somar(n1, n2)
    private static int somar(int n1, int n2) {
        //aqui é static pq onde somar vai ser chamado (o método principal - main() ) é static.
        //É private pq o método somar vai ser chamado dentro do
        //mesmo programa (classe -> AulaMetodo)
 
        return n1 + n2;
        //Note que o retorno vai ser do tipo int pq o método somar foi declarado como int
        //Note também na assinatura do método, com seus parâmetros sendo do tipo int,
        //já que n1 e n2 foram declarados como int na classe principal
    }
}
