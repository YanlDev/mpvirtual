<!-- 📱 OVERLAY PARA MOBILE (cuando sidebar está abierto) -->
<div x-show="sidebarOpen" x-transition:enter="transition-opacity ease-linear duration-300"
    x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
    x-transition:leave="transition-opacity ease-linear duration-300" x-transition:leave-start="opacity-100"
    x-transition:leave-end="opacity-0" @click="sidebarOpen = false"
    class="fixed inset-0 z-30 bg-black bg-opacity-50 lg:hidden" style="display: none;">
</div>

<!-- 🎯 SIDEBAR RESPONSIVO -->
<aside
    class="fixed top-[73px] left-0 z-40 w-72 h-[calc(100vh-73px)] bg-white shadow-xl lg:shadow-none flex flex-col border-r border-gray-200
              lg:translate-x-0
              transform transition-transform duration-300 ease-in-out"
    :class="{
        'translate-x-0': sidebarOpen,
        '-translate-x-full': !sidebarOpen
    }">

    <!-- NAVEGACIÓN PRINCIPAL -->
    <nav class="flex-1 px-4 py-6 space-y-2 overflow-y-auto">

        <!-- Dashboard -->
        <a href="#" @click="if (window.innerWidth < 1024) sidebarOpen = false"
            class="flex items-center px-4 py-3 text-gray-700 rounded-lg hover:bg-gray-100 bg-zinc-100 text-zinc-800 font-semibold border-r-2 border-zinc-800 transition-colors duration-200 group">
            <i class="fas fa-home text-lg text-zinc-800 mr-3"></i>
            <span>Dashboard</span>
        </a>

        <!-- Mis Documentos -->
        <a href="#" @click="if (window.innerWidth < 1024) sidebarOpen = false"
            class="flex items-center px-4 py-3 text-gray-700 rounded-lg hover:bg-gray-100 transition-colors duration-200 group">
            <i class="fas fa-folder text-lg text-gray-400 group-hover:text-gray-600 mr-3"></i>
            <span>Mis Documentos</span>
        </a>

        <!-- Crear Documento -->
        <a href="#" @click="if (window.innerWidth < 1024) sidebarOpen = false"
            class="flex items-center px-4 py-3 text-gray-700 rounded-lg hover:bg-gray-100 transition-colors duration-200 group">
            <i class="fas fa-plus-circle text-lg text-gray-400 group-hover:text-gray-600 mr-3"></i>
            <span>Crear Documento</span>
        </a>

        <!-- Seguimiento -->
        <a href="#" @click="if (window.innerWidth < 1024) sidebarOpen = false"
            class="flex items-center px-4 py-3 text-gray-700 rounded-lg hover:bg-gray-100 transition-colors duration-200 group">
            <i class="fas fa-search text-lg text-gray-400 group-hover:text-gray-600 mr-3"></i>
            <span>Seguimiento</span>
        </a>

        <!-- Separador -->
        <div class="pt-4 pb-2">
            <p class="px-4 text-xs font-semibold text-gray-400 uppercase tracking-wider">
                Documentos Recientes
            </p>
        </div>

        <!-- Lista de documentos recientes -->
        <div class="space-y-1">
            <!-- Documento reciente 1 -->
            <a href="#" @click="if (window.innerWidth < 1024) sidebarOpen = false"
                class="flex items-center px-4 py-2 text-sm text-gray-600 rounded-lg hover:bg-gray-50 transition-colors duration-200">
                <div class="w-6 h-6 bg-green-100 rounded flex items-center justify-center mr-3">
                    <span class="text-xs font-bold text-green-600">S</span>
                </div>
                <div class="flex-1 min-w-0">
                    <p class="font-medium text-gray-900 truncate">Solicitud de Certificado</p>
                    <p class="text-xs text-gray-500">DOC-2024-001</p>
                </div>
                <span class="w-2 h-2 bg-green-400 rounded-full"></span>
            </a>

            <!-- Documento reciente 2 -->
            <a href="#" @click="if (window.innerWidth < 1024) sidebarOpen = false"
                class="flex items-center px-4 py-2 text-sm text-gray-600 rounded-lg hover:bg-gray-50 transition-colors duration-200">
                <div class="w-6 h-6 bg-yellow-100 rounded flex items-center justify-center mr-3">
                    <span class="text-xs font-bold text-yellow-600">R</span>
                </div>
                <div class="flex-1 min-w-0">
                    <p class="font-medium text-gray-900 truncate">Reclamo de Servicio</p>
                    <p class="text-xs text-gray-500">DOC-2024-002</p>
                </div>
                <span class="w-2 h-2 bg-yellow-400 rounded-full"></span>
            </a>

            <!-- Documento reciente 3 -->
            <a href="#" @click="if (window.innerWidth < 1024) sidebarOpen = false"
                class="flex items-center px-4 py-2 text-sm text-gray-600 rounded-lg hover:bg-gray-50 transition-colors duration-200">
                <div class="w-6 h-6 bg-blue-100 rounded flex items-center justify-center mr-3">
                    <span class="text-xs font-bold text-blue-600">P</span>
                </div>
                <div class="flex-1 min-w-0">
                    <p class="font-medium text-gray-900 truncate">Petición General</p>
                    <p class="text-xs text-gray-500">DOC-2024-003</p>
                </div>
                <span class="w-2 h-2 bg-blue-400 rounded-full"></span>
            </a>
        </div>

    </nav>

    <!-- CONFIGURACIÓN AL FINAL -->
    <div class="px-4 py-4 border-t border-gray-200">
        <a href="#" @click="if (window.innerWidth < 1024) sidebarOpen = false"
            class="flex items-center px-4 py-3 text-gray-700 rounded-lg hover:bg-gray-100 transition-colors duration-200 group">
            <i class="fas fa-cog text-lg text-gray-400 group-hover:text-gray-600 mr-3"></i>
            <span>Configuración</span>
        </a>
    </div>
</aside>
