package javaapplication2;

import java.util.Scanner;

public class exe02 {
        
    public static void main(String[] args){
        Scanner input = new Scanner(System.in);
        
        System.out.println("digite a renda mensal do cliente:");
        double rendaMensal = input.nextDouble();

        System.out.println("digite o total de dividas do cliente:");
        double TotalDividas = input.nextDouble();

        double calcularPerc = ((TotalDividas / rendaMensal) * 100);


        if ( calcularPerc <= 30 ){
            System.out.println("o percentual de compromentimento é:" + calcularPerc);
            System.out.println("Baixo" );
        } else if( calcularPerc > 30 && calcularPerc < 50){
            System.out.println("o percentual de compromentimento é:" + calcularPerc);
            System.out.println("Medio" );
        } else {
            System.out.println("o percentual de compromentimento é:" + calcularPerc);
            System.out.println("Alto" );
        }   
    }
}