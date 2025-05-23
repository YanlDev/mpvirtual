<!-- Navbar Público - Solo para usuarios NO autenticados -->
<nav class="bg-white/90 backdrop-blur-md border-b border-gray-100 sticky top-0 z-50 shadow-sm">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16">

            <!-- Título -->
            <div class="flex items-center">
                <p class="text-xl font-bold text-gray-900">Mesa de Partes Virtual</p>
            </div>

            <!-- Botones de Autenticación - Desktop -->
            <div class="hidden md:flex items-center space-x-3">
                <a href="{{ route('login') }}"
                    class="px-4 py-2 text-gray-700 hover:text-gray-900 font-medium transition-all duration-200 rounded-lg hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                    Iniciar Sesión
                </a>

                <a href="{{ route('register') }}"
                    class="px-4 py-2 text-gray-700 hover:text-gray-900 font-medium transition-all duration-200 rounded-lg hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                    Registrarse
                </a>
            </div>

            <!-- Botón Menú Mobile -->
            <div class="md:hidden">
                <button @click="navbarOpen = !navbarOpen"
                    class="p-2 rounded-lg text-gray-600 hover:text-gray-900 hover:bg-gray-100 transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                    <!-- Icono hamburguesa -->
                    <svg x-show="!navbarOpen" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                    <!-- Icono X -->
                    <svg x-show="navbarOpen" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                        </path>
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Menú Mobile -->
    <div x-show="navbarOpen" x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="opacity-0 transform -translate-y-2"
        x-transition:enter-end="opacity-100 transform translate-y-0"
        x-transition:leave="transition ease-in duration-150"
        x-transition:leave-start="opacity-100 transform translate-y-0"
        x-transition:leave-end="opacity-0 transform -translate-y-2" @click.away="navbarOpen = false"
        class="md:hidden bg-white border-t border-gray-100 shadow-lg">

        <div class="px-4 py-6 space-y-4">
            <!-- Botones de autenticación para mobile -->
            <a href="{{ route('login') }}" @click="navbarOpen = false"
                class="block w-full py-3 px-4 text-center text-gray-700 hover:text-blue-600 font-medium border border-gray-200 rounded-lg transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                Iniciar Sesión
            </a>

            <a href="{{ route('register') }}" @click="navbarOpen = false"
                class="block w-full py-3 px-4 text-center text-gray-700 hover:text-blue-600 font-medium border border-gray-200 rounded-lg transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                Registrarse
            </a>
        </div>
</nav>


