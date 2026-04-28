document.getElementById('pai').addEventListener('click', () => {
  console.log('Fase de CAPTURA: Evento no PAI');
}, true); // Ouve na fase de captura

document.getElementById('filho').addEventListener('click', () => {
  console.log('Fase de CAPTURA: Evento no FILHO');
}, true); // Ouve na fase de captura

document.getElementById('botao').addEventListener('click', (event) => {
  console.log('Fase de CAPTURA: Evento no BOTÃO');
}); // Ouve na fase de captura