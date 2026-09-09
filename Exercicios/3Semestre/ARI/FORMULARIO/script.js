const cepInput = document.getElementById("cep");

cepInput.addEventListener("blur", async () => {
    let cep = cepInput.value.replace(/\D/g, "");

    if (cep.length !== 8) {
        alert("CEP inválido!");
        return;
    }

    try {
        const response = await fetch(`https://viacep.com.br/ws/${cep}/json/`);
        const data = await response.json();

        if (data.erro) {
            alert("CEP não encontrado!");
            return;
        }

        document.getElementById("logradouro").value = data.logradouro;
        document.getElementById("bairro").value = data.bairro;
        document.getElementById("cidade").value = data.localidade;
        document.getElementById("estado").value = data.uf;

    } catch (error) {
        console.error(error);
        alert("Erro ao consultar o CEP.");
    }
});

cepInput.addEventListener("input", (e) => {
    let value = e.target.value.replace(/\D/g, "");

    if (value.length > 5) {
        value = value.replace(/^(\d{5})(\d)/, "$1-$2");
    }

    e.target.value = value;
});