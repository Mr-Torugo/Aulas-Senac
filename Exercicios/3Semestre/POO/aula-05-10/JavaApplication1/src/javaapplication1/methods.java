import javax.swing.JOptionPane;
 
public class methods {
 
    public static void main(String[] args) {
        
        // --- a) ---
        double base = Double.parseDouble(JOptionPane.showInputDialog("Digite a base do triângulo:"));
        double altura = Double.parseDouble(JOptionPane.showInputDialog("Digite a altura do triângulo:"));
        
        double area = calcularAreaTriangulo(base, altura);
        JOptionPane.showMessageDialog(null, "A área do triângulo é: " + area);
        
        
        // ---  b) ---
        double celsius = Double.parseDouble(JOptionPane.showInputDialog("Digite a temperatura em graus Celsius (°C):"));
        
        // Como o método é void (não retorna nada), apenas fazemos a chamada direta:
        converterCelsiusParaFahrenheit(celsius);
        
        
        // ---  c) ---
        // Chamada sem parâmetros que guarda a frase retornada numa variável String:
        String mensagem = obterFrase();
        JOptionPane.showMessageDialog(null, mensagem);
    }
 
    // a) Recebe parâmetros (base e altura) e retorna o cálculo da área (double)
    private static double calcularAreaTriangulo(double b, double h) {
        return (b * h) / 2;
    }
 
    // b) Recebe parâmetro (celsius), não retorna nada (void) e mostra o resultado internamente
    private static void converterCelsiusParaFahrenheit(double c) {
        double f = (c * 1.8) + 32;
        JOptionPane.showMessageDialog(null, c + " °C equivalem a " + f + " °F");
    }
 
    // c) Não recebe parâmetros () e retorna uma frase (String)
    private static String obterFrase() {
        return "Estamos estudando Java";
    }
}