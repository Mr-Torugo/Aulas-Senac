// Função que acessa o comprimento de um nome de usuário
function getUsernameLength(user) {
  return user.name.length;
}

//---------------------------------------------------------
// Cenário 1: SUCESSO
//---------------------------------------------------------
console.log("--- Cenário de Sucesso ---");
const user1 = { name: "Maria" };
try {
  const nameLength = getUsernameLength(user1);
  console.log("Comprimento do nome:", nameLength);
  
  // Exibe mensagem na página
  document.getElementById('status-mensagem').textContent = `Sucesso! O comprimento do nome '${user1.name}' é ${nameLength}.`;
  document.getElementById('status-mensagem').classList.add('sucesso');
  
} catch (error) {
  console.error("Ops, um erro ocorreu:", error.message);
} finally {
  console.log("Cenário de sucesso finalizado.");
}

//---------------------------------------------------------
// Cenário 3: ERRO NÃO CAPTURADO
//---------------------------------------------------------
console.log("\n--- Cenário de Erro não capturado---");
const user3 = null; // Causa o erro

// Tenta executar o código que pode falhar
getUsernameLength(user3);

//---------------------------------------------------------
// Cenário 2: ERRO
//---------------------------------------------------------
console.log("\n--- Cenário de Erro ---");
const user2 = null; // Causa o erro

// Tenta executar o código que pode falhar
try {
  getUsernameLength(user2);
  
} catch (error) {
  // Captura o erro e impede o travamento da página
  console.error("Erro capturado:", error.message);
  
  // Exibe mensagem de erro na página
  document.getElementById('status-mensagem').textContent = `Erro Capturado: ${error.message}`;
  document.getElementById('status-mensagem').classList.add('erro');
  
} finally {
  console.log("Cenário de erro finalizado.");
}




  



