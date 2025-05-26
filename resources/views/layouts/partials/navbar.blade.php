<!-- 🔴 NAVBAR SUPERIOR SIN BÚSQUEDA -->
<header class="fixed top-0 z-50 w-full bg-white border-b border-gray-200 shadow-sm">
    <div class="flex items-center justify-between px-6 py-4">

        <!-- Logo y Botón Mobile -->
        <div class="flex items-center space-x-4">
            <!-- Botón menú mobile - SOLO SE VE EN MOBILE -->
            <button
                class="lg:hidden text-gray-500 hover:text-gray-700 focus:outline-none focus:text-gray-700 transition-colors duration-200"
                @click="sidebarOpen = !sidebarOpen">
                <i class="fas fa-bars text-xl"></i>
            </button>

            <!-- Logo -->
            <div class="flex items-center">
                <span class="text-lg font-bold text-gray-900">Mesa de Partes</span>
            </div>
        </div>

        <!-- Notificaciones y Usuario -->
        <div class="flex items-center space-x-4">
            <!-- Notificaciones -->
            <div class="relative">
                <button
                    class="relative p-2 text-gray-400 hover:text-gray-600 focus:outline-none focus:text-gray-600 transition-colors duration-200">
                    <i class="fas fa-bell text-lg"></i>
                    <span class="absolute top-1 right-1 w-2 h-2 bg-red-500 rounded-full"></span>
                </button>
            </div>

            <!-- Perfil de Usuario -->
            <div class="relative" x-data="{ profileOpen: false }">
                <button @click="profileOpen = !profileOpen"
                    class="flex items-center space-x-3 p-1.5 rounded-lg hover:bg-gray-50 transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-zinc-500">
                    <img class="w-8 h-8 rounded-full object-cover border-2 border-gray-200"
                        src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                        alt="Tom Cook">

                    <div class="hidden md:block text-left">
                        <p class="text-sm font-medium text-gray-900">Tom Cook</p>
                        <p class="text-xs text-gray-500">Usuario</p>
                    </div>

                    <i class="fas fa-chevron-down text-gray-400 text-sm transition-transform duration-200"
                        :class="{ 'rotate-180': profileOpen }"></i>
                </button>

                <!-- Dropdown del perfil -->
                <div x-show="profileOpen" x-transition:enter="transition ease-out duration-100"
                    x-transition:enter-start="transform opacity-0 scale-95"
                    x-transition:enter-end="transform opacity-100 scale-100"
                    x-transition:leave="transition ease-in duration-75"
                    x-transition:leave-start="transform opacity-100 scale-100"
                    x-transition:leave-end="transform opacity-0 scale-95" @click.away="profileOpen = false"
                    class="absolute right-0 mt-2 w-56 bg-white rounded-lg shadow-lg border border-gray-200 py-1 z-50"
                    style="display: none;">

                    <div class="px-4 py-3 border-b border-gray-100">
                        <p class="text-sm font-medium text-gray-900">Tom Cook</p>
                        <p class="text-sm text-gray-500 truncate">tom@mesadepartes.com</p>
                    </div>

                    <div class="py-1">
                        <a href="#"
                            class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 transition-colors duration-200">
                            <i class="fas fa-user mr-3 text-gray-400 w-4"></i>
                            Mi Perfil
                        </a>
                        <a href="#"
                            class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 transition-colors duration-200">
                            <i class="fas fa-cog mr-3 text-gray-400 w-4"></i>
                            Configuración
                        </a>
                    </div>

                    <div class="border-t border-gray-100 my-1"></div>

                    <div class="py-1">
                        <button
                            class="flex items-center w-full px-4 py-2 text-sm text-red-700 hover:bg-red-50 transition-colors duration-200">
                            <i class="fas fa-sign-out-alt mr-3 text-red-400 w-4"></i>
                            Cerrar Sesión
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
