
package javaapplication2;

import java.util.Scanner;

public class exe03 {
    public static void main(String[] args){
        Scanner input = new Scanner(System.in);
        
        System.out.println("digite o valor da compra:");
        double ValorCompra = input.nextDouble();

        //operador ternario
        double valorFrete = (ValorCompra >= 200 ) ? 0.0 : 25.0 ;

        double valorFinal = valorFrete + ValorCompra;
        
        System.out.printf("o valor total da compra foi R$ %.2f\n" , valorFinal );
        System.out.printf("o valor do frete foi %.2f\n" , valorFrete);
        input.close();
    }
    
}
