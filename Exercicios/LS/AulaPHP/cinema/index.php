<?php

  $json = file_get_contents('data/filmes.json');
  $dados = json_decode($json, true);
  $destaques = $dados["destaque"];
  $proximos_lancamento = $dados["proximo_lancamento"];
  $melhores = $dados["melhor_avaliado"];

?>

<!DOCTYPE html>
<html lang="pt-BR">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>CineFront - Seu Universo Cinematográfico</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
    />
    <link rel="stylesheet" href="css/estilos.css" />
  </head>

  <body class="text-gray-100">
    <!-- Header -->
     <?php require_once "includes/header.inc.php" ?>

      <!-- Mobile Menu -->
      <div
        class="md:hidden hidden bg-gray-800 w-full py-3 px-4"
        id="mobile-menu"
      >
        <div class="flex flex-col space-y-3">
          <a href="#" class="hover:text-red-400 transition">Início</a>
          <a href="#" class="hover:text-red-400 transition">Filmes</a>
          <a href="#" class="hover:text-red-400 transition">Séries</a>
          <a href="#" class="hover:text-red-400 transition">Em Breve</a>
          <a href="#" class="hover:text-red-400 transition">Contato</a>
          <a href="login.html" class="hover:text-red-400 transition">Login</a>
        </div>
      </div>
    </header>

    <!-- Hero Section -->
    <section class="hero-section flex items-center pt-16">
      <div class="container mx-auto px-4">
        <div class="max-w-2xl">
          <h1 class="text-4xl md:text-6xl font-bold mb-4 animate-fade-in" style="animation-delay: 0.1s"
          >
            Explore o Universo do Cinema
          </h1>
          <p            class="text-lg md:text-xl mb-8 text-gray-300 animate-fade-in"
            style="animation-delay: 0.3s"
          >
            Descubra os melhores filmes, críticas e trailers em um só lugar.
          </p>

          <div
            class="relative max-w-xl animate-fade-in"
            style="animation-delay: 0.5s"
          >
            <input
              type="text"
              placeholder="Pesquisar filmes..."
              class="w-full py-3 px-5 pr-12 rounded-full search-input focus:outline-none focus:ring-2 focus:ring-red-500"
            />
            <button
              class="absolute right-3 top-1/2 transform -translate-y-1/2 text-red-500"
            >
              <i class="fas fa-search"></i>
            </button>
          </div>
        </div>
      </div>
    </section>

    <!-- Main Content -->
    <main class="container mx-auto px-4 py-12">
      <!-- Trending Movies -->
      <section class="mb-16">
        <div class="flex justify-between items-center mb-8">
          <h2 class="text-2xl md:text-3xl font-bold">Filmes em Destaque</h2>
          <a href="#" class="text-red-400 hover:text-red-300 flex items-center">
            Ver todos <i class="fas fa-chevron-right ml-2"></i>
          </a>
        </div>

        <div
          class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6"
        >
          <?php foreach ($destaques as $filmes) : ?> 
          <!-- Movie Card 1 -->
          <div
            class="movie-card bg-gray-800 rounded-lg overflow-hidden shadow-lg hover:shadow-red-500/20 transition duration-300"
          >
            <div class="relative overflow-hidden">
              <a href="<?php echo $filmes ["pagina"]; ?>">
                <img
                  src="<?php echo $filmes ["imagem"]; ?>"
                  alt="<?php echo $filmes ["alt"]; ?>"
                  class="<?php echo $filmes ["rating_class"]; ?>"
                />
              </a>
              <div class="absolute bottom-3 left-3">
                <div class="rating-circle <?php echo $filmes ["rating_class"]; ?>">
                  <?php echo $filmes ["nota"]; ?>
                </div>
              </div>
            </div>
            <div class="p-4">
              <h3 class="font-bold text-lg mb-1">
                <?php echo $filmes ["titulo"]; ?>
              </h3>
              <div class="flex flex-wrap gap-2 mb-3">
                <?php foreach($filmes["generos"] as $genero) : ?>
                  <span class="genre-tag text-xs <?php echo $genero["classe"] ; ?> px-2 py-1 rounded-full"  "><?php echo $genero["nome"] ; ?> </span>
                <?php endforeach ?>
              </div>
              <p class="text-gray-400 text-sm line-clamp-2">
                <?php echo $filmes ["descricao"]; ?>
              </p>
            </div>
          </div>
        <?php endforeach; ?>

      </section>

      <!-- Upcoming Movies -->
      <section class="mb-16">
        <div class="flex justify-between items-center mb-8">
          <h2 class="text-2xl md:text-3xl font-bold">Próximos Lançamentos</h2>
          <a href="#" class="text-red-400 hover:text-red-300 flex items-center">
            Ver todos <i class="fas fa-chevron-right ml-2"></i>
          </a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
          <!-- Upcoming Movie 1 -->
          <div class="bg-gray-800 rounded-lg overflow-hidden shadow-lg flex">
            <div class="w-1/3">
              <img
                src="imagens/iADOJ8Zymht2JPMoy3R7xceZprc.webp"
                alt="Furiosa"
                class="w-full h-full object-cover"
              />
            </div>
            <div class="w-2/3 p-4 flex flex-col">
              <h3 class="font-bold text-lg mb-1">Furiosa: Uma Saga Mad Max</h3>
              <span class="text-yellow-400 text-sm mb-2"
                ><i class="fas fa-calendar-alt mr-1"></i> 23 de Maio, 2024</span
              >
              <div class="flex flex-wrap gap-2 mb-3">
                <span
                  class="genre-tag text-xs bg-red-900/50 text-red-300 px-2 py-1 rounded-full"
                  >Ação</span
                >
                <span
                  class="genre-tag text-xs bg-gray-900/50 text-gray-300 px-2 py-1 rounded-full"
                  >Ficção Científica</span
                >
              </div>
              <p class="text-gray-400 text-sm line-clamp-3">
                A história da jovem Imperatriz Furiosa antes de conhecer Max
                Rockatansky.
              </p>
              <button
                class="mt-auto bg-red-600 hover:bg-red-700 text-white py-2 px-4 rounded-full text-sm transition"
              >
                + Minha Lista
              </button>
            </div>
          </div>

          <!-- Upcoming Movie 2 -->
          <div class="bg-gray-800 rounded-lg overflow-hidden shadow-lg flex">
            <div class="w-1/3">
              <img
                src="imagens/xq4v7JE8niZ75OYYPDGNn6Gzpyt.webp"
                alt="Deadpool & Wolverine"
                class="w-full h-full object-cover"
              />
            </div>
            <div class="w-2/3 p-4 flex flex-col">
              <h3 class="font-bold text-lg mb-1">Deadpool & Wolverine</h3>
              <span class="text-yellow-400 text-sm mb-2"
                ><i class="fas fa-calendar-alt mr-1"></i> 25 de Julho,
                2024</span
              >
              <div class="flex flex-wrap gap-2 mb-3">
                <span
                  class="genre-tag text-xs bg-red-900/50 text-red-300 px-2 py-1 rounded-full"
                  >Ação</span
                >
                <span
                  class="genre-tag text-xs bg-blue-900/50 text-blue-300 px-2 py-1 rounded-full"
                  >Comédia</span
                >
                <span
                  class="genre-tag text-xs bg-purple-900/50 text-purple-300 px-2 py-1 rounded-full"
                  >Ficção Científica</span
                >
              </div>
              <p class="text-gray-400 text-sm line-clamp-3">
                Deadpool muda a história do MCU ao se juntar a Wolverine em uma
                jornada que vai desafiar o multiverso.
              </p>
              <button
                class="mt-auto bg-red-600 hover:bg-red-700 text-white py-2 px-4 rounded-full text-sm transition"
              >
                + Minha Lista
              </button>
            </div>
          </div>

          <!-- Upcoming Movie 3 -->
          <div class="bg-gray-800 rounded-lg overflow-hidden shadow-lg flex">
            <div class="w-1/3">
              <img
                src="imagens/jNttwl5CYgnxNwQ8157BxyYJqu2.webp"
                alt="Joker 2"
                class="w-full h-full object-cover"
              />
            </div>
            <div class="w-2/3 p-4 flex flex-col">
              <h3 class="font-bold text-lg mb-1">Joker: Folie à Deux</h3>
              <span class="text-yellow-400 text-sm mb-2"
                ><i class="fas fa-calendar-alt mr-1"></i> 3 de Outubro,
                2024</span
              >
              <div class="flex flex-wrap gap-2 mb-3">
                <span
                  class="genre-tag text-xs bg-purple-900/50 text-purple-300 px-2 py-1 rounded-full"
                  >Drama</span
                >
                <span
                  class="genre-tag text-xs bg-pink-900/50 text-pink-300 px-2 py-1 rounded-full"
                  >Musical</span
                >
                <span
                  class="genre-tag text-xs bg-gray-900/50 text-gray-300 px-2 py-1 rounded-full"
                  >Thriller</span
                >
              </div>
              <p class="text-gray-400 text-sm line-clamp-3">
                Arthur Fleck encontra Harley Quinn em Arkham Asylum e sua
                loucura se transforma em um romance distorcido.
              </p>
              <button
                class="mt-auto bg-red-600 hover:bg-red-700 text-white py-2 px-4 rounded-full text-sm transition"
              >
                + Minha Lista
              </button>
            </div>
          </div>
        </div>
      </section>

      <!-- Top Rated -->
      <section>
        <div class="flex justify-between items-center mb-8">
          <h2 class="text-2xl md:text-3xl font-bold">Melhores Avaliados</h2>
          <a href="#" class="text-red-400 hover:text-red-300 flex items-center">
            Ver todos <i class="fas fa-chevron-right ml-2"></i>
          </a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
          <!-- Top Rated 1 -->
          <div class="bg-gray-800 rounded-lg overflow-hidden shadow-lg">
            <div class="relative">
              <img
                src="imagens/7g6wvsWHxBQujUcSXvZLhdFpDUy.webp"
                alt="O Poderoso Chefão"
                class="w-full h-48 object-cover"
              />
              <div
                class="absolute inset-0 bg-gradient-to-t from-gray-900 to-transparent"
              ></div>
              <div class="absolute bottom-0 left-0 p-4">
                <h3 class="font-bold text-xl">O Poderoso Chefão</h3>
                <div class="flex items-center mt-1">
                  <div class="rating-circle rating-high mr-2">9.2</div>
                  <span class="text-sm">(1972)</span>
                </div>
              </div>
            </div>
            <div class="p-4">
              <p class="text-gray-400 text-sm line-clamp-3">
                O patriarca de uma dinastia do crime organizado transfere o
                controle de seu império clandestino para seu filho relutante.<br />&nbsp;
              </p>
              <button
                class="mt-4 w-full bg-gray-700 hover:bg-gray-600 text-white py-2 px-4 rounded-full text-sm transition"
              >
                Assistir Trailer
              </button>
            </div>
          </div>

          <!-- Top Rated 2 -->
          <div class="bg-gray-800 rounded-lg overflow-hidden shadow-lg">
            <div class="relative">
              <img
                src="imagens/4lj1ikfsSmMZNyfdi8R8Tv5tsgb.webp"
                alt="O Cavaleiro das Trevas"
                class="w-full h-48 object-cover"
              />
              <div
                class="absolute inset-0 bg-gradient-to-t from-gray-900 to-transparent"
              ></div>
              <div class="absolute bottom-0 left-0 p-4">
                <h3 class="font-bold text-xl">O Cavaleiro das Trevas</h3>
                <div class="flex items-center mt-1">
                  <div class="rating-circle rating-high mr-2">8.5</div>
                  <span class="text-sm">(2008)</span>
                </div>
              </div>
            </div>
            <div class="p-4">
              <p class="text-gray-400 text-sm line-clamp-3">
                Quando o Coringa mergulha Gotham City na anarquia, Batman deve
                enfrentar o caos enquanto luta com seus próprios limites.<br />&nbsp;
              </p>
              <button
                class="mt-4 w-full bg-gray-700 hover:bg-gray-600 text-white py-2 px-4 rounded-full text-sm transition"
              >
                Assistir Trailer
              </button>
            </div>
          </div>

          <!-- Top Rated 3 -->
          <div class="bg-gray-800 rounded-lg overflow-hidden shadow-lg">
            <div class="relative">
              <img
                src="imagens/bik2BZjmVjeE6LOZqtuTjb4jJPQ.webp"
                alt="Parasita"
                class="w-full h-48 object-cover"
              />
              <div
                class="absolute inset-0 bg-gradient-to-t from-gray-900 to-transparent"
              ></div>
              <div class="absolute bottom-0 left-0 p-4">
                <h3 class="font-bold text-xl">Parasita</h3>
                <div class="flex items-center mt-1">
                  <div class="rating-circle rating-high mr-2">8.5</div>
                  <span class="text-sm">(2019)</span>
                </div>
              </div>
            </div>
            <div class="p-4">
              <p class="text-gray-400 text-sm line-clamp-3">
                Uma família pobre se infiltra na casa de uma família rica,
                desencadeando eventos inesperados que mudam suas vidas para
                sempre.
              </p>
              <button
                class="mt-4 w-full bg-gray-700 hover:bg-gray-600 text-white py-2 px-4 rounded-full text-sm transition"
              >
                Assistir Trailer
              </button>
            </div>
          </div>
        </div>
      </section>
    </main>

    
    <!-- Newsletter -->
    <section class="bg-gradient-to-r from-gray-700 to-gray-700 py-12">
      <div class="container mx-auto px-4 text-center">
        <h2 class="text-2xl md:text-3xl font-bold mb-4">
          Receba as últimas novidades do cinema
        </h2>
        <p class="max-w-2xl mx-auto text-gray-300 mb-6">
          Assine nossa newsletter e fique por dentro dos lançamentos, trailers
          exclusivos e promoções especiais.
        </p>
        
        <div class="max-w-md mx-auto flex">
          <input
          type="email"
          placeholder="Seu melhor e-mail"
          class="flex-grow py-3 px-4 rounded-l-full bg-gray-300 focus:outline-none focus:ring-2 focus:ring-red-500"
          />
          <button
          class="bg-red-600 hover:bg-red-00 text-white py-3 px-6 rounded-r-full transition"
          >
            Assinar
          </button>
        </div>
      </div>
    </section>
    
    <!-- Footer -->

     <?php require_once "includes/footer.inc.php" ?>
    
    
    <script>
      // Mobile menu toggle
      const mobileMenuButton = document.getElementById("mobile-menu-button");
      const mobileMenu = document.getElementById("mobile-menu");

      mobileMenuButton.addEventListener("click", () => {
        mobileMenu.classList.toggle("hidden");
      });

      // Animate elements on scroll
      const animateOnScroll = () => {
        const elements = document.querySelectorAll(".animate-fade-in");

        elements.forEach((element) => {
          const elementPosition = element.getBoundingClientRect().top;
          const screenPosition = window.innerHeight / 1.3;

          if (elementPosition < screenPosition) {
            element.style.opacity = "1";
            element.style.transform = "translateY(0)";
          }
        });
      };

      window.addEventListener("scroll", animateOnScroll);
      window.addEventListener("load", animateOnScroll);

      // Simulate loading movies (in a real app, this would be an API call)
      setTimeout(() => {
        const loadingElements = document.querySelectorAll(
          ".loading-placeholder"
        );
        loadingElements.forEach((el) =>
          el.classList.remove("loading-placeholder")
        );
      }, 1500);
    </script>
  </body>
</html>
