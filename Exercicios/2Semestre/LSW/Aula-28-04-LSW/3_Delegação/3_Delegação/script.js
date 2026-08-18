// Onde colocaríamos um listener para cada item (evitar isso)
// const itens = document.querySelectorAll('li');
// itens.forEach(item => {
//   item.addEventListener('click', () => { ... });
// });

// A solução: delegação!
const lista = document.getElementById('lista');

// Adicionamos um ÚNICO listener no elemento pai (o <ul>)
lista.addEventListener('click', (event) => {
  // Verificamos se o elemento clicado (event.target) é um <li>
  if (event.target.tagName === 'LI') {
    console.log('Você clicou no item:', event.target.textContent);
    event.target.style.color = 'blue';
  }
});

// Adiciona novos itens dinamicamente
document.getElementById('adicionar').addEventListener('click', () => {
  const novoItem = document.createElement('li');
  novoItem.textContent = `Item ${lista.children.length + 1}`;
  lista.appendChild(novoItem);
});