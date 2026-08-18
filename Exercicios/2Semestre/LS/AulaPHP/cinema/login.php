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
    <header class="fixed w-full z-50 bg-gray-900/80 backdrop-blur-md">
      <div
        class="container mx-auto px-4 py-3 flex justify-between items-center"
      >
        <div class="flex items-center space-x-2">
          <a href="index.html">
            <img
              src="imagens/cinefront.png"
              alt="CineFront Logo"
              class="h-20"
            />
          </a>
        </div>

        <nav class="hidden md:flex space-x-8">
          <a href="index.php" class="hover:text-red-400 transition">Filmes</a>
          <a href="#" class="hover:text-red-400 transition">Séries</a>
          <a href="#" class="hover:text-red-400 transition">Em Breve</a>
          <a href="#" class="hover:text-red-400 transition">Contato</a>
          <a href="login.html" class="hover:text-red-400 transition">Login</a>
        </nav>

        <div class="flex items-center space-x-4">
          <button class="p-2 rounded-full hover:bg-gray-700 transition">
            <i class="fas fa-search"></i>
          </button>
          <button
            class="md:hidden p-2 rounded-full hover:bg-gray-700 transition"
            id="mobile-menu-button"
          >
            <i class="fas fa-bars"></i>
          </button>
        </div>
      </div>

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

    <!-- Main Content -->
    <main class="container mx-auto px-4 flex items-center justify-center min-h-screen">
        <div class="bg-white rounded-2xl shadow-lg p-10 max-w-md w-full">
            <h2 class="text-2xl font-bold text-center mb-6 text-gray-800">Login</h2>
            <form class="space-y-4">
              <input
                type="text"
                placeholder="Usuário"
                required
                class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"
              />
              <input
                type="password"
                placeholder="Senha"
                required
                class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"
              />
              <button
                type="submit"
                class="w-full bg-indigo-600 text-white py-2 rounded-lg hover:bg-indigo-700 transition"
              >
                Entrar
              </button>
            </form>
          </div>
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
