// =====================================================================
// DEFINIÇÃO DOS REGEX
// 
// DESAFIO: O ALUNO DEVE INSERIR AS EXPRESSÃOES REGULARES CORRETAS AQUI!
// =====================================================================

// 1. Apenas Letras e Espaços (Ex: "Rio de Janeiro")
const REGEX_CIDADE = /^[A-Za-zÀ-ÖØ-öø-ÿ\s]+$/; 

// 2. Formato de Data DD/MM/AAAA (Ex: "25/12/2025")
const REGEX_DATA = /^\d{2}\/\d{2}\/\d{4}$/;

// 3. Valor Flutuante (Decimal com . ou ,) (Ex: "100.50" ou "100,50")
const REGEX_VALOR = /^\d+([,\.]\d+)?$/;

// 4. Nome de Usuario (Alfanumerico + _, 3 a 16 caracteres) (Ex: "user_dev_123")
const REGEX_USERNAME = /^[a-zA-Z0-9_](3,16)$/;

// 5. Senha Forte (Min. 8 caracteres, 1 maiuscula, 1 minuscula, 1 numero)
const REGEX_SENHA = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,}$/;

// =====================================================================
// LOGICA DO FORMULARIO (PRONTA PARA TESTAR OS REGEX)
// =====================================================================

const form = document.getElementById('desafioForm');
const statusEnvio = document.getElementById('status-envio');

form.addEventListener('submit', function(event) {
    event.preventDefault(); 
    let formValido = true;

    // Limpa estados anteriores
    document.querySelectorAll('.mensagem-erro').forEach(el => el.textContent = '');
    document.querySelectorAll('input').forEach(el => el.classList.remove('erro'));
    statusEnvio.textContent = '';
    statusEnvio.classList.remove('status-sucesso', 'status-falha');

    // Mapeamento dos campos e suas regras
    const campos = [
        { id: 'cidade', regex: REGEX_CIDADE, erroMsg: 'Use apenas letras e espaços.' },
        { id: 'data', regex: REGEX_DATA, erroMsg: 'Use o formato DD/MM/AAAA.' },
        { id: 'valor', regex: REGEX_VALOR, erroMsg: 'Use o formato decimal (ex: 100.50 ou 100,50).' },
        { id: 'username', regex: REGEX_USERNAME, erroMsg: 'Deve ter 3-16 caracteres, apenas letras, numeros ou _.' },
        { id: 'senha', regex: REGEX_SENHA, erroMsg: 'Mi­n. 8 caracteres, 1 maiuscula, 1 minuscula e 1 numero.' },
    ];

    campos.forEach(campo => {
        const input = document.getElementById(campo.id);
        const valor = input.value.trim();
        
        // Verifica se a REGEX falhou OU se o campo estão vazio
        if (valor === '' || !campo.regex.test(valor)) {
            const erroElement = document.getElementById(`erro-${campo.id}`);
            
            // Define a mensagem de erro
            if (valor === '') {
                erroElement.textContent = 'Campo obrigatorio.';
            } else {
                erroElement.textContent = campo.erroMsg;
            }
            
            input.classList.add('erro');
            formValido = false;
        }
    });

    if (formValido) {
        // Simulação de envio com sucesso (Fetch API)
        statusEnvio.textContent = 'Sucesso! Todos os campos estão no formato correto.';
        statusEnvio.classList.add('status-sucesso');
    } else {
        statusEnvio.textContent = 'Falha na validação. Corrija os campos em vermelho.';
        statusEnvio.classList.add('status-falha');
    }
});