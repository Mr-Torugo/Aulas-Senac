// A função que lança o erro
function dividir(dividendo, divisor) {
    if (divisor === 0) {
        // Lançamos um erro personalizado
        throw new Error("Erro: Não é possível dividir por zero!");
    }
    return dividendo / divisor;
}

// Ouve o evento de submit no formulário
document.getElementById('form-divisao').addEventListener('submit', (event) => {
    event.preventDefault(); // Evita o recarregamento da página

    const dividendo = parseFloat(document.getElementById('dividendo').value);
    const divisor = parseFloat(document.getElementById('divisor').value);
    const resultadoMensagem = document.getElementById('resultado-mensagem');

    // Limpa a mensagem anterior
    resultadoMensagem.textContent = '';
    resultadoMensagem.className = 'mensagem';

     
    // O bloco try...catch para lidar com o erro
    try {
        const resultado = dividir(dividendo, divisor);
        
        // Se a divisão for bem-sucedida, exibe o resultado
        resultadoMensagem.textContent = `O resultado da divisão é: ${resultado}`;
        resultadoMensagem.classList.add('sucesso');
        
    } catch (error) {
        // Se a função 'dividir' lançar um erro, ele é capturado aqui
        resultadoMensagem.textContent = error.message;
        resultadoMensagem.classList.add('erro');
    }
});