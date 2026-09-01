
package aula.pkg31.pkg08;

import java.util.Scanner;

public class exe01 {

    public static void main(String[] args) {

        int opcao;
        Scanner entrada = new Scanner(System.in);
        do {
            System.out.println("\t\tMenu de opções ");
            System.out.println("\t1.consultar saldo conta corrente");
            System.out.println("\t2.consultar saldo conta poupança ");
            System.out.println("\t3.consultar saldo aplicação ");
            System.out.println("\t4.fazer transferencia de valor ");
            System.out.println("\t5.fazer deposito");
            System.out.println("\t0.Sair ");
            System.out.printf(
                    "*********************************************************************************************************************************************%n");
            System.out.println("\nInsira sua opção ");
            opcao = entrada.nextInt();
            
            if(opcao == 1){
            System.out.println("Saldo conta corrente é :");
            System.out.printf(
              "*********************************************************************************************************************************************%n");
            } else if (opcao == 2){
            System.out.println("Saldo conta poupança é :");
            System.out.printf(
              "*********************************************************************************************************************************************%n");
            } else if (opcao == 3) {
            System.out.println("Saldo aplicação é :");
            System.out.printf(
              "*********************************************************************************************************************************************%n");
            } else if (opcao == 4) {
            System.out.println("Digitar o valor a ser transferido :");
            System.out.printf(
              "*********************************************************************************************************************************************%n");
            } else if (opcao == 5){
            System.out.println("Digitar o valor a ser depositado :");
            System.out.printf(
              "*********************************************************************************************************************************************%n");
            }
        } while (opcao != 0);
            System.out.println("Programa Finalizado");
            System.out.printf(
              "*********************************************************************************************************************************************%n");
    }
}

