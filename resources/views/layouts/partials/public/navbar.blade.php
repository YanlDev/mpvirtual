<!-- Navbar Principal con Colores FluxUI -->
<header>
    <nav class="bg-zinc-900 border-b border-zinc-800 shadow-xl">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">

                <!-- Logo y Título -->
                <div class="flex items-center space-x-3">
                    <div class="bg-gradient-to-br from-blue-500 to-purple-600 rounded-lg p-2 shadow-lg">
                        <i class="fas fa-file-alt text-white text-xl"></i>
                    </div>
                    <div>
                        <h1 class="text-white text-lg font-semibold">Mesa de Partes</h1>
                        <p class="text-zinc-400 text-xs">Virtual</p>
                    </div>
                </div>

                <!-- Menú Principal - Desktop -->
                <div class="hidden md:flex items-center space-x-8">
                    <a href="/"
                        class="text-zinc-300 hover:text-white transition-all duration-200 flex items-center space-x-2 hover:bg-zinc-800 px-3 py-2 rounded-lg">
                        <i class="fas fa-home text-sm"></i>
                        <span class="font-medium">Inicio</span>
                    </a>

                    <a href="#"
                        class="text-zinc-300 hover:text-white transition-all duration-200 flex items-center space-x-2 hover:bg-zinc-800 px-3 py-2 rounded-lg">
                        <i class="fas fa-info-circle text-sm"></i>
                        <span class="font-medium">Información</span>
                    </a>

                    <a href="#"
                        class="text-zinc-300 hover:text-white transition-all duration-200 flex items-center space-x-2 hover:bg-zinc-800 px-3 py-2 rounded-lg">
                        <i class="fas fa-phone text-sm"></i>
                        <span class="font-medium">Contacto</span>
                    </a>
                </div>

                <!-- Botones de Autenticación - Desktop -->
                <div class="hidden md:flex items-center space-x-3">
                    <a href="{{ route('login') }}"
                        class="bg-zinc-800 hover:bg-zinc-700 text-zinc-300 hover:text-white px-4 py-2 rounded-lg transition-all duration-200 flex items-center space-x-2 border border-zinc-700 hover:border-zinc-600">
                        <i class="fas fa-sign-in-alt text-sm"></i>
                        <span class="font-medium">Iniciar Sesión</span>
                    </a>

                    <a href="{{ route('register') }}"
                        class="bg-gradient-to-r from-blue-500 to-purple-600 hover:from-blue-600 hover:to-purple-700 text-white px-4 py-2 rounded-lg transition-all duration-200 flex items-center space-x-2 shadow-lg hover:shadow-xl">
                        <i class="fas fa-user-plus text-sm"></i>
                        <span class="font-medium">Registrarse</span>
                    </a>
                </div>

                <!-- Botón Hamburguesa - Mobile -->
                <div class="md:hidden">
                    <button id="mobile-menu-button" type="button"
                        class="text-zinc-400 hover:text-white focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 focus:ring-offset-zinc-900 rounded-lg p-2 transition-all duration-200">
                        <span class="sr-only">Abrir menú principal</span>
                        <i class="fas fa-bars text-xl"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Menú Mobile -->
        <div id="mobile-menu" class="md:hidden hidden bg-zinc-800 border-t border-zinc-700">
            <div class="px-4 py-4 space-y-2">

                <!-- Enlaces de navegación móvil -->
                <a href="/"
                    class="block text-zinc-300 hover:text-white hover:bg-zinc-700 py-3 px-4 rounded-lg transition-all duration-200 flex items-center space-x-3">
                    <i class="fas fa-home text-sm w-5 text-zinc-400"></i>
                    <span class="font-medium">Inicio</span>
                </a>

                <a href="#"
                    class="block text-zinc-300 hover:text-white hover:bg-zinc-700 py-3 px-4 rounded-lg transition-all duration-200 flex items-center space-x-3">
                    <i class="fas fa-info-circle text-sm w-5 text-zinc-400"></i>
                    <span class="font-medium">Información</span>
                </a>

                <a href="#"
                    class="block text-zinc-300 hover:text-white hover:bg-zinc-700 py-3 px-4 rounded-lg transition-all duration-200 flex items-center space-x-3">
                    <i class="fas fa-phone text-sm w-5 text-zinc-400"></i>
                    <span class="font-medium">Contacto</span>
                </a>

                <!-- Separador -->
                <div class="border-t border-zinc-700 my-4"></div>

                <!-- Botones de autenticación móvil -->
                <a href="{{ route('login') }}"
                    class="block bg-zinc-700 hover:bg-zinc-600 text-zinc-300 hover:text-white py-3 px-4 rounded-lg mb-3 text-center transition-all duration-200 border border-zinc-600">
                    <i class="fas fa-sign-in-alt mr-2"></i>
                    <span class="font-medium">Iniciar Sesión</span>
                </a>

                <a href="{{ route('register') }}"
                    class="block bg-gradient-to-r from-blue-500 to-purple-600 hover:from-blue-600 hover:to-purple-700 text-white py-3 px-4 rounded-lg text-center transition-all duration-200 shadow-lg">
                    <i class="fas fa-user-plus mr-2"></i>
                    <span class="font-medium">Registrarse</span>
                </a>
            </div>
        </div>
    </nav>
</header>

<!-- JavaScript para el menú mobile -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const mobileMenuButton = document.getElementById('mobile-menu-button');
        const mobileMenu = document.getElementById('mobile-menu');

        if (mobileMenuButton && mobileMenu) {
            mobileMenuButton.addEventListener('click', function() {
                const isHidden = mobileMenu.classList.contains('hidden');

                if (isHidden) {
                    mobileMenu.classList.remove('hidden');
                    mobileMenu.classList.add('animate-fade-in');
                } else {
                    mobileMenu.classList.add('hidden');
                    mobileMenu.classList.remove('animate-fade-in');
                }
            });
        }

        // Cerrar menú al hacer click fuera
        document.addEventListener('click', function(event) {
            const isClickInsideMenu = mobileMenu.contains(event.target);
            const isClickOnButton = mobileMenuButton.contains(event.target);

            if (!isClickInsideMenu && !isClickOnButton && !mobileMenu.classList.contains('hidden')) {
                mobileMenu.classList.add('hidden');
            }
        });
    });
</script>

<!-- CSS adicional para animaciones FluxUI style -->
<style>
    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(-8px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .animate-fade-in {
        animation: fadeIn 0.15s ease-out;
    }

    /* Efecto hover personalizado para enlaces */
    .nav-link {
        position: relative;
        overflow: hidden;
    }

    .nav-link::before {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        width: 0;
        height: 2px;
        background: linear-gradient(90deg, #3b82f6, #8b5cf6);
        transition: width 0.3s ease;
    }

    .nav-link:hover::before {
        width: 100%;
    }

    /* Estilo de focus mejorado */
    .focus-ring:focus {
        outline: none;
        box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.3);
    }
</style>
