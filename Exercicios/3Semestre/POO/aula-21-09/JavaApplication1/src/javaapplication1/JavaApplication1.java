package javaapplication1;

import java.util.Scanner;

public class JavaApplication1 {

    public static void main(String[] args) {
        Scanner scanner = new Scanner(System.in);
        double [][] matriz = new double[3][3];

        //leitura da matriz
        for (int i = 0; i < 3; i++) {
            for (int j = 0; j < 3; j++) {
                System.out.printf("Digite o valor para a posição [%d][%d]: ", i, j);
                matriz[i][j] = scanner.nextDouble();
            }
        }

        //a. soma dos elementos da matriz
        double soma = 0;
        for (int i = 0; i < 3; i++) {
            for (int j = 0; j < 3; j++) {
                soma += matriz[i][j];
            }
        }
        System.out.printf("A soma dos elementos da matriz é: %.2f\n", soma);
        
        // b. soma de cada linha da matriz
        for (int i = 0; i < 3; i++) {
            double somaLinha = 0;
            for (int j = 0; j < 3; j++) {
                somaLinha += matriz[i][j];
            }
            System.out.printf("A soma da linha %d é: %.2f\n", i, somaLinha);
        }

        //c. soma de cada coluna da matriz
        for (int j = 0; j < 3; j++) {
            double somaColuna = 0;
            for (int i = 0; i < 3; i++) {
                somaColuna += matriz[i][j];
            }
            System.out.printf("A soma da coluna %d é: %.2f\n", j, somaColuna);
        }

        //d. soma dos elementos da diagonal principal
        double somaDiagonalPrincipal = 0;
        for (int i = 0; i < 3; i++) {
            somaDiagonalPrincipal += matriz[i][i];
        }
        System.out.printf("A soma dos elementos da diagonal principal é: %.2f\n", somaDiagonalPrincipal);

        scanner.close();
    }
    
    
}
