
package javaapplication2;

import java.util.Scanner;

public class JavaApplication2 {

    public static void main(String[] args) {
        Scanner input = new Scanner(System.in);
        
        System.out.println("digite a primeira nota:");
        float nota1 = input.nextFloat();

        System.out.println("digite a segunda nota:");
        float nota2 = input.nextFloat();

        System.out.println("digite a terceira nota:");
        float nota3 = input.nextFloat();

   
   if ( nota1 <= nota2 && nota1 <= nota3){
        System.out.println("a menor nota é:" + nota1);
   } else if ( nota2 <= nota1 && nota2 <= nota3 ){
       System.out.println("a menor nota é:" + nota2);
   } else {
       System.out.println("a menor nota é:" + nota3);
    }   
    
      
    }
    
}