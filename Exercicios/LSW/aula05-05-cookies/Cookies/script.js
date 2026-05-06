// SOLUÇÃO COMPLETA: Manipulação Dinâmica de Cookies

function salvar() {
    const nome = document.getElementById('inputNome').value;
    const temaEscolhido = document.getElementById('selectTema').value; // Captura a escolha do aluno
    
    if (!nome) {
        alert("Por favor, digite seu nome.");
        return;
    }

    // Configura expiração para 7 dias
    const data = new Date();
    data.setDate(data.getDate() + 7);
    const expiracao = "expires=" + data.toUTCString();

    // GRAVAÇÃO: Salva os dois cookies[cite: 1]
    document.cookie = "usuario=" + nome + "; " + expiracao + "; path=/";
    document.cookie = "tema=" + temaEscolhido + "; " + expiracao + "; path=/";

    alert("Preferências salvas!");
    aplicarLogica();
}

function lerCookie(nomeChave) {
    // LEITURA: Separa a string de cookies e busca pela chave[cite: 1]
    const nomeProcurado = nomeChave + "=";
    const listaCookies = document.cookie.split(';');

    for (let i = 0; i < listaCookies.length; i++) {
        let c = listaCookies[i].trim();
        if (c.indexOf(nomeProcurado) == 0) {
            return c.substring(nomeProcurado.length, c.length);
        }
    }
    return "";
}

function limpar() {
    // EXCLUSÃO: Seta data no passado[cite: 1]
    const expiraAgora = "expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/";
    document.cookie = "usuario=; " + expiraAgora;
    document.cookie = "tema=; " + expiraAgora;
    
    alert("Configurações limpas!");
    location.reload(); 
}

function aplicarLogica() {
    const user = lerCookie("usuario");
    const theme = lerCookie("tema");

    // Aplica o nome na mensagem
    if (user) {
        document.getElementById('msg').innerText = "Olá, " + user + "!";
        document.getElementById('inputNome').value = user;
    }

    // Aplica o tema visual[cite: 1]
    if (theme === "escuro") {
        document.body.classList.add('dark-mode');
        document.getElementById('selectTema').value = "escuro";
    } else {
        document.body.classList.remove('dark-mode');
        document.getElementById('selectTema').value = "claro";
    }
}

// Inicializa ao carregar a página[cite: 1]
window.onload = aplicarLogica;