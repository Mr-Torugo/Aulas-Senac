package aula.pkg31.pkg08;

import java.util.Scanner;

public class ControleVendas {
    public static void main(String[] args) {
        Scanner scanner = new Scanner(System.in);

        System.out.print("Digite a quantidade de dias da campanha: ");
        int dias = scanner.nextInt();

        double totalFaturamento = 0;

        for (int i = 1; i <= dias; i++) {
            System.out.printf("Digite o valor vendido no dia %d: ", i);
            double vendaDia = scanner.nextDouble();
            totalFaturamento += vendaDia;
        }

        System.out.printf("\nFaturamento total: R$ %.2f\n", totalFaturamento);

        scanner.close();
    }
}
