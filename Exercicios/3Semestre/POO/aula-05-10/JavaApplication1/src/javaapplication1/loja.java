import javax.swing.JOptionPane;
import java.time.LocalDate; // Importação opcional para obter o ano do sistema automaticamente
 
public class loja {
 
    public static void main(String[] args) {
        
        // Entrada de dados solicitada ao utilizador
        String nome = JOptionPane.showInputDialog("Digite o nome do produto (ex: Mouse Gamer):");
        String codigo = JOptionPane.showInputDialog("Digite o código do produto (ex: MOU123):");
        int anoCadastro = Integer.parseInt(JOptionPane.showInputDialog("Digite o ano em que o produto foi cadastrado (ex: 2024):"));
        
        // 1. Chamando o método mostrarDados() (tipo void)
        mostrarDados(nome, codigo, anoCadastro);
        
        // 2. Chamando o método gerarEnderecoProduto() e guardando o retorno (String)
        String enderecoCompleto = gerarEnderecoProduto(codigo);
        JOptionPane.showMessageDialog(null, "Endereço do produto na loja:\n" + enderecoCompleto);
        
        // 3. Chamando o método obterAno() e guardando o retorno (int)
        int anoAtual = obterAno();
        JOptionPane.showMessageDialog(null, "Ano atual: " + anoAtual);
    }
 
    // 1. Método void: recebe 3 parâmetros e mostra os dados sem retornar nada
    private static void mostrarDados(String nomeProd, String codProd, int anoCad) {
        String mensagem = "=== Dados do Produto ===\n"
                        + "Nome: " + nomeProd + "\n"
                        + "Código: " + codProd + "\n"
                        + "Ano de Cadastro: " + anoCad;
                        
        JOptionPane.showMessageDialog(null, mensagem);
    }
 
    // 2. Método com retorno String e 1 parâmetro: junta o link padrão ao código
    private static String gerarEnderecoProduto(String codProd) {
        return "www.minhaloja.com/produto/" + codProd;
    }
 
    // 3. Método com retorno int e sem parâmetros: devolve o ano atual
    private static int obterAno() {

        return LocalDate.now().getYear();
    }
}