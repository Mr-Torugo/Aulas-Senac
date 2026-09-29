import javax.swing.JOptionPane;

public class Exe2 {

    public static void main(String[] args) {
        int opcao;

        do {
            // Menu de opções
            String menu = "EXE2: CALCULADORA - Vitor Hugo \n\n"
                    + "1 - Somar (+)\n"
                    + "2 - Subtrair (-)\n"
                    + "3 - Multiplicar (*)\n"
                    + "4 - Dividir (/)\n"
                    + "5 - Sair\n\n"
                    + "Escolha uma opção:";

            String entradaOpcao = JOptionPane.showInputDialog(null, menu, "Menu Principal", JOptionPane.QUESTION_MESSAGE);

            // Verifica se o usuário cancelou ou fechou a janela
            if (entradaOpcao == null) {
                opcao = 5;
            } else {
                opcao = Integer.parseInt(entradaOpcao);
            }

            // Validação e execução das operações
            if (opcao >= 1 && opcao <= 4) {
                String strNum1 = JOptionPane.showInputDialog(null, "Digite o primeiro número:", "Entrada de Dados", JOptionPane.QUESTION_MESSAGE);
                double num1 = Double.parseDouble(strNum1);

                String strNum2 = JOptionPane.showInputDialog(null, "Digite o segundo número:", "Entrada de Dados", JOptionPane.QUESTION_MESSAGE);
                double num2 = Double.parseDouble(strNum2);

                double resultado = 0;
                boolean operacaoValida = true;

                if (opcao == 1) {
                    resultado = num1 + num2;
                } else if (opcao == 2) {
                    resultado = num1 - num2;
                } else if (opcao == 3) {
                    resultado = num1 * num2;
                } else if (opcao == 4) {
                    if (num2 != 0) {
                        resultado = num1 / num2;
                    } else {
                        JOptionPane.showMessageDialog(null, "Erro: Divisão por zero não é permitida!", "Erro", JOptionPane.ERROR_MESSAGE);
                        operacaoValida = false;
                    }
                }

                if (operacaoValida) {
                    JOptionPane.showMessageDialog(null, "O resultado é: " + resultado, "Resultado", JOptionPane.INFORMATION_MESSAGE);
                }

            } else if (opcao == 5) {
                JOptionPane.showMessageDialog(null, "Encerrando o programa...", "Sair", JOptionPane.INFORMATION_MESSAGE);
            } else {
                JOptionPane.showMessageDialog(null, "Opção inválida! Escolha um número de 1 a 5.", "Aviso", JOptionPane.WARNING_MESSAGE);
            }

        } while (opcao != 5);
    }
}