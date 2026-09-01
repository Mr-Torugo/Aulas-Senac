
package aula.pkg31.pkg08;
import java.util.Scanner;
public class Calculadora {
     public static void main(String[] args) {

        int opcao;
        Scanner entrada = new Scanner(System.in);
        do {
            System.out.println("\t\tCalculadora");
            System.out.println("\t1.soma");
            System.out.println("\t2.subtração");
            System.out.println("\t3.multiplicação");
            System.out.println("\t4.divisão");
            System.out.println("\t0.Sair");
            System.out.printf(
                    "*********************************************************************************************************************************************%n");
            System.out.println("\nInsira sua opção ");
            opcao = entrada.nextInt();

            if (opcao == 1) {
                System.out.println("Digite o primeiro número: ");
                double num1 = entrada.nextDouble();
                System.out.println("Digite o segundo número: ");
                double num2 = entrada.nextDouble();
                System.out.println("Resultado da soma: " + (num1 + num2));
            } else if (opcao == 2) {
                System.out.println("Digite o primeiro número: ");
                double num1 = entrada.nextDouble();
                System.out.println("Digite o segundo número: ");
                double num2 = entrada.nextDouble();
                System.out.println("Resultado da subtração: " + (num1 - num2));
            } else if (opcao == 3) {
                System.out.println("Digite o primeiro número: ");
                double num1 = entrada.nextDouble();
                System.out.println("Digite o segundo número: ");
                double num2 = entrada.nextDouble();
                System.out.println("Resultado da multiplicação: " + (num1 * num2));
            } else if (opcao == 4) {
                System.out.println("Digite o primeiro número: ");
                double num1 = entrada.nextDouble();
                System.out.println("Digite o segundo número: ");
                double num2 = entrada.nextDouble();
                if (num2 != 0) {
                    System.out.println("Resultado da divisão: " + (num1 / num2));
                } 
            }
        } while (opcao != 0);
        System.out.println("Programa Finalizado");
    }

}
