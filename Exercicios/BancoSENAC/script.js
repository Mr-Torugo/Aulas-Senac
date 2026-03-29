// 1. DADOS EM MEMÓRIA (Simulação de Banco de Dados)
const clientes = [
    { conta: "1001", senha: "123", nome: "Dennis Lopes", saldo: 5000 },
    { conta: "1002", senha: "123", nome: "Nicolas Silva", saldo: 1500 },
    { conta: "1003", senha: "123", nome: "Ana Maria", saldo: 3000 },
    { conta: "1004", senha: "123", nome: "Bruno Costa", saldo: 500 },
    { conta: "1005", senha: "123", nome: "Carla Souza", saldo: 10000 }
];

// Variável global para armazenar quem está logado no momento
let usuarioLogado = null;

// 2. SELEÇÃO DE ELEMENTOS (DOM)
const secaoLogin = document.querySelector('#login-section');
const secaoPainel = document.querySelector('#painel-section');
const campoSaldo = document.querySelector('#saldo-valor');
const boasVindas = document.querySelector('#boas-vindas');
const msgErro = document.querySelector('#login-erro');

// 3. FUNÇÕES DE INTERFACE
function atualizarInterface() {
    // Exibe o saldo com duas casas decimais
    campoSaldo.textContent = `R$ ${usuarioLogado.saldo.toFixed(2)}`;
    // Personaliza a saudação
    boasVindas.textContent = `Olá, ${usuarioLogado.nome}`;
}

// 4. EVENTO DE LOGIN (DESAFIO 01)
document.querySelector('#btn-login').addEventListener('click', () => {
    // Coleta os valores dos inputs
    const numConta = document.querySelector('#input-conta').value;
    const senhaDigitada = document.querySelector('#input-senha').value;

    // BUSCA: Procura o cliente que tenha a conta E a senha iguais ao digitado
    usuarioLogado = clientes.find(cliente =>
        cliente.conta === numConta && cliente.senha === senhaDigitada
    );

    // VALIDAÇÃO E INTERAÇÃO
    if (usuarioLogado) {
        // Sucesso: Limpa erros, troca telas e atualiza dados
        msgErro.style.display = 'none';
        secaoLogin.style.display = 'none';
        secaoPainel.style.display = 'block';

        atualizarInterface();
    } else {
        // Falha: Exibe o alerta de erro para o usuário
        msgErro.style.display = 'block';
        msgErro.textContent = "Conta ou senha incorretos!";
    }
});

// 5. OPERAÇÕES BANCÁRIAS (PRÓXIMAS ETAPAS)

document.querySelector('#btn-depositar').addEventListener('click', () => {
    // Lógica para somar ao saldo atual
});

document.querySelector('#btn-sacar').addEventListener('click', () => {
    // Lógica para subtrair do saldo (não esquecer de validar se há saldo!)
});

document.querySelector('#btn-transferir').addEventListener('click', () => {
    // Lógica para tirar de um e colocar em outro cliente do array
});

// Botão Sair: Reinicia a aplicação limpando a memória
document.querySelector('#btn-sair').addEventListener('click', () => {
    location.reload();
});