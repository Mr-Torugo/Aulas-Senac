const botao = document.querySelector("#btnBuscar");
const loading = document.querySelector("#loading");
const resultado = document.querySelector("#resultado");

botao.addEventListener("click", function () {
    loading.style.display = "block";
    resultado.innerHTML = "";

    fetch("https://jsonplaceholder.typicode.com/users/1")
        .then(response => {
            loading.style.display = "none";

            if (!response.ok) {
                throw new Error("Erro HTTP: " + response.status);
            }

            return response.json();
        })
        .then(usuario => {
            resultado.innerHTML = `
                <h3>${usuario.name}</h3>
                <p>${usuario.email}</p>
            `;
        })
        .catch(erro => {
            loading.style.display = "none";
            resultado.innerHTML = `Erro ao realizar a requisição. <br>
                ${erro.message}`;
        });
});