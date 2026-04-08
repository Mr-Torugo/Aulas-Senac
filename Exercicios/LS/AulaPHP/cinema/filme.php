<?php
  $id = isset($_GET["id"]) ? (int) $_GET["id"] : 2 ;
  $json = file_get_contents("data/filmes.json");
  $dados = json_decode($json, true);

  $filmes = array_merge(
      $dados["destaque"],
      $dados["proximo_lancamento"],
      $dados["melhor_avaliado"]
  );

  $filmeencontrado = null;
  
  foreach($filmes as $filme){
    if($filme["id"] == $id){
      $filmeencontrado = $filme;
    }
  }
?>

<!DOCTYPE html>
<html lang="pt-BR">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?php echo  $filmeencontrado ["titulo"]?></title>
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
          <a href="index.php" class="hover:text-red-400 transition">Início</a>
          <a href="#" class="hover:text-red-400 transition">Filmes</a>
          <a href="#" class="hover:text-red-400 transition">Séries</a>
          <a href="#" class="hover:text-red-400 transition">Em Breve</a>
          <a href="#" class="hover:text-red-400 transition">Contato</a>
          <a href="login.php" class="hover:text-red-400 transition">Login</a>
        </div>
      </div>
    </header>

    <!-- Main Content -->
    <main class="max-w-6xl mx-auto px-4 py-12 pt-48">
      <div class="flex flex-col lg:flex-row gap-8">
        <?php
          if(!$filmeencontrado){
        ?>

        <h1 class="text-3xl md:text-4xl font-bold mb-2">
          filme não encontrado
        </h1>
        <?php
          }
          else{
        ?>
        <!-- Poster -->
        <div class="w-full lg:w-1/3">
          <img
            src="<?php echo $filmeencontrado ["imagem"]; ?>"
            alt="<?php echo  $filmeencontrado ["titulo"]?>"
            class="<?php echo $filmeencontrado ["rating_class"]; ?>"
          />
        </div>

        <!-- Details -->
        <div class="w-full lg:w-2/3 flex flex-col justify-between">
          <div>
            <h1 class="text-3xl md:text-4xl font-bold mb-2">
              <?php echo  $filmeencontrado ["titulo"]?>
            </h1>
            <p class="text-gray-400 text-sm mb-4 flex items-center">
              <i class="fas fa-calendar-alt mr-2 text-red-400"></i> <?php echo  $filmeencontrado ["data_lancamento"]?>
            </p>
            <div class="flex flex-wrap gap-2 mb-4">
              <?php foreach($filmeencontrado["generos"] as $genero) : ?>
                  <span class="genre-tag text-xs <?php echo $genero["classe"] ; ?> px-2 py-1 rounded-full"  "><?php echo $genero["nome"] ; ?> </span>
                <?php endforeach ?>
            </div>
            <p class="text-gray-300 mb-6 leading-relaxed">
              <?php echo $filmeencontrado ["descricao"]; ?>
            </p>
            <div class="flex flex-col sm:flex-row gap-4">
              <button
                class="bg-red-600 hover:bg-red-700 text-white py-2 px-6 rounded-full text-sm transition"
              >
                <i class="fas fa-play mr-2"></i> Assistir Trailer
              </button>
              <button
                class="bg-gray-700 hover:bg-gray-600 text-white py-2 px-6 rounded-full text-sm transition"
              >
                <i class="fas fa-plus mr-2"></i> Adicionar à Minha Lista
              </button>
            </div>
          </div>

          <div class="mt-8">
            <h2 class="text-xl font-semibold mb-2">Avaliação</h2>
            <div class="flex items-center">
              <div
                class="rating-circle <?php echo $filmeencontrado ["rating_class"]; ?> text-white w-12 h-12 flex items-center justify-center rounded-full text-lg font-bold"
              >
                <?php echo $filmeencontrado ["nota"]; ?>
              </div>
              <span class="ml-4 text-gray-400 text-sm"
                >Baseado em mais de 40.000 votos</span
              >
            </div>
          </div>
        </div>
      </div>

      <!-- Trailer -->
      <div class="mt-12">
        <h2 class="text-2xl font-bold mb-4">Trailer Oficial</h2>
        <div class="aspect-w-16 aspect-h-9">
          <iframe
            class="w-full rounded-lg shadow-lg"
            height="400"
            src="https://www.youtube.com/embed/frJyVXO1XWc"
            title="Trailer <?php echo  $filmeencontrado ["titulo"]?>"
            frameborder="0"
            allowfullscreen
          ></iframe>
        </div>
      </div>
      <?php
  }
?>
    </main>

    <!-- Footer -->

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


