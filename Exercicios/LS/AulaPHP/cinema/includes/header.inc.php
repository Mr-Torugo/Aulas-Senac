   <header class="fixed w-full z-50 bg-gray-900/80 backdrop-blur-md">
      <div
        class="container mx-auto px-4 py-3 flex justify-between items-center">
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
          <a href="#" class="hover:text-red-400 transition">Filmes</a>
          <a href="#" class="hover:text-red-400 transition">Séries</a>
          <a href="#" class="hover:text-red-400 transition">Em Breve</a>
          <a href="#" class="hover:text-red-400 transition">Contato</a>
          <a href="login.php" class="hover:text-red-400 transition">Login</a>
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
    </header>