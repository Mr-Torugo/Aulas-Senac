const produtos = [
  {
    id: 1,
    nome: "Notebook",
    categoria: "Eletrônicos",
    preco: 3500,
    descricao: "Notebook para estudos e trabalho.",
  },
  {
    id: 2,
    nome: "Smartphone",
    categoria: "Eletrônicos",
    preco: 2200,
    descricao: "Smartphone com câmera de alta resolução.",
  },
  {
    id: 3,
    nome: "Camiseta",
    categoria: "Roupas",
    preco: 79.9,
    descricao: "Camiseta de algodão.",
  },
  {
    id: 4,
    nome: "Tênis",
    categoria: "Roupas",
    preco: 299.9,
    descricao: "Tênis confortável para uso diário.",
  },
  {
    id: 5,
    nome: "Mochila",
    categoria: "Acessórios",
    preco: 189.9,
    descricao: "Mochila com compartimento para notebook.",
  },
  {
    id: 6,
    nome: "Relógio",
    categoria: "Acessórios",
    preco: 250,
    descricao: "Relógio moderno e resistente.",
  },
];

// Elementos DOM
const campoPesquisa = document.getElementById("campo-pesquisa");
const filtroCategoria = document.getElementById("filtro-categoria");
const contadorProdutos = document.getElementById("contador-produtos");
const areaProdutos = document.getElementById("area-produtos");
const detalhesProduto = document.getElementById("detalhes-produto");

// Renderizar produtos
function renderizarProdutos(lista) {
  areaProdutos.innerHTML = "";

  contadorProdutos.textContent = `${lista.length} produto(s) encontrado(s)`;

  if (lista.length === 0) {
    areaProdutos.innerHTML = `
            <div class="estado-vazio">
                Nenhum produto encontrado.
            </div>
        `;

    return;
  }

  lista.forEach((produto) => {
    const card = document.createElement("article");

    card.classList.add("produto");

    card.innerHTML = `
            <h3>${produto.nome}</h3>

            <p class="categoria">
                ${produto.categoria}
            </p>

            <p class="preco">
                ${formatarPreco(produto.preco)}
            </p>
        `;

    card.addEventListener("click", () => mostrarDetalhes(produto));

    areaProdutos.appendChild(card);
  });
}

// Mostrar detalhes
function mostrarDetalhes(produto) {
  detalhesProduto.innerHTML = `
        <h2>${produto.nome}</h2>

        <p>
            <strong>Categoria:</strong>
            ${produto.categoria}
        </p>

        <p>
            <strong>Preço:</strong>
            ${formatarPreco(produto.preco)}
        </p>

        <p>
            <strong>Descrição:</strong>
            ${produto.descricao}
        </p>
    `;
}

// Filtrar produtos
function filtrarProdutos() {
  const textoPesquisa = campoPesquisa.value.toLowerCase().trim();

  const categoriaSelecionada = filtroCategoria.value;

  // const produtosFiltrados = produtos.filter(() => {
  
    const produtosFiltrados = produtos.filter((produto) => {
    const correspondePesquisa = produto.nome
      .toLowerCase()
      .includes(textoPesquisa);

    const correspondeCategoria =
      categoriaSelecionada === "todos" ||
      produto.categoria === categoriaSelecionada;

    return correspondePesquisa && correspondeCategoria;
  });

  renderizarProdutos(produtosFiltrados);
}

// Formatar preço
function formatarPreco(preco) {
  return preco.toLocaleString("pt-BR", {
    style: "currency",
    currency: "BRL",
  });
}

// Eventos
campoPesquisa.addEventListener("input", filtrarProdutos);

filtroCategoria.addEventListener("change", filtrarProdutos);

// Estado inicial
renderizarProdutos(produtos);
