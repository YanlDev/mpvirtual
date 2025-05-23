<!-- Footer Alternativo - Versión más compacta -->
<footer class="bg-zinc-800 text-white py-8">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Contenido principal -->
        <div class="flex flex-col md:flex-row justify-between items-center mb-6">
            <!-- Logo e información -->
            <div class="mb-6 md:mb-0">
                <h3 class="text-xl font-bold">Mesa de Partes Virtual</h3>
                <p class="text-zinc-300 text-sm mt-1">Sistema de gestión documental</p>
            </div>

            <!-- Enlaces Rápidos -->
            <div class="flex flex-wrap justify-center gap-6 mb-6 md:mb-0">
                <a href="{{ route('login') }}"
                    class="text-zinc-300 hover:text-white transition-colors duration-200">Iniciar Sesión</a>
                <a href="{{ route('register') }}"
                    class="text-zinc-300 hover:text-white transition-colors duration-200">Registrarse</a>
                <a href="#" class="text-zinc-300 hover:text-white transition-colors duration-200">Sobre el
                    Proyecto</a>
            </div>

            <!-- Redes Sociales -->
            <div class="flex space-x-6">
                <a href="#" class="text-white hover:text-blue-400 transition-colors duration-300">
                    <i class="fab fa-linkedin text-xl"></i>
                </a>
                <a href="#" class="text-white hover:text-purple-400 transition-colors duration-300">
                    <i class="fab fa-github text-xl"></i>
                </a>
                <a href="#" class="text-white hover:text-blue-300 transition-colors duration-300">
                    <i class="fab fa-twitter text-xl"></i>
                </a>
                <a href="#" class="text-white hover:text-pink-400 transition-colors duration-300">
                    <i class="fab fa-instagram text-xl"></i>
                </a>
            </div>
        </div>

        <!-- Línea divisoria -->
        <div class="border-t border-zinc-700 my-4"></div>

        <!-- Copyright -->
        <div class="flex flex-col sm:flex-row justify-between items-center text-zinc-400 text-sm">
            <p>&copy; {{ date('Y') }} YanlDev. Todos los derechos reservados.</p>

            <div class="flex items-center mt-2 sm:mt-0">
                <a href="#"
                    class="text-zinc-300 hover:text-white transition-colors duration-200 flex items-center">
                    <i class="fab fa-github mr-2"></i>
                    Ver Código en GitHub
                </a>
                <span class="mx-3">|</span>
                <a href="#" class="text-zinc-300 hover:text-white transition-colors duration-200">
                    Portafolio
                </a>
            </div>
        </div>
    </div>
</footer>
