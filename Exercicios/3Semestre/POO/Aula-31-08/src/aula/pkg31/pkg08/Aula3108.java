package aula.pkg31.pkg08;
import java.util.Scanner;
public class Aula3108 {

    public static void main(String[] args) {

        int opcao;
        Scanner entrada = new Scanner(System.in);
        do {
            System.out.println("\t\tMenu de opções ");
            System.out.println("\t1.Ver o Menu ");
            System.out.println("\t2.Ler o Menu ");
            System.out.println("\t3.Repetir o Menu ");
            System.out.println("\t4.Tudo de Novo ");
            System.out.println("\t5.Não Li, pode Repetir?");
            System.out.println("\t0.Sair ");
            System.out.printf(
                    "*********************************************************************************************************************************************%n");
            System.out.println("\nInsira sua opção ");
            opcao = entrada.nextInt();

        } while (opcao != 0);
        System.out.println("Programa Finalizado");
        System.out.printf(
                "*********************************************************************************************************************************************%n");

    }
}
