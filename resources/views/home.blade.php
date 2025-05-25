<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <script src="https://kit.fontawesome.com/e1238f483a.js" crossorigin="anonymous"></script>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @livewireStyles
</head>

<body class="font-sans antialiased" x-data="{ navbarOpen: false }" :class="{ 'overflow-hidden': navbarOpen }">

    @include('layouts.partials.public.navbar')

    <!-- 🎯 HERO SECTION -->
    <section
        class="relative min-h-screen flex items-center justify-center bg-gradient-to-br from-zinc-50 via-white to-gray-50 overflow-hidden">

        <!-- Elementos decorativos de fondo -->
        <div class="absolute inset-0 overflow-hidden">
            <!-- Círculos decorativos -->
            <div class="absolute top-20 left-10 w-32 h-32 bg-zinc-200/30 rounded-full blur-xl animate-pulse"></div>
            <div
                class="absolute bottom-32 right-16 w-24 h-24 bg-zinc-300/20 rounded-full blur-lg animate-pulse delay-300">
            </div>
            <div
                class="absolute top-1/2 left-1/4 w-16 h-16 bg-zinc-400/25 rounded-full blur-md animate-pulse delay-700">
            </div>

            <!-- Patrones geométricos sutiles -->
            <div
                class="absolute top-0 right-0 w-96 h-96 bg-gradient-to-bl from-zinc-100/30 to-transparent rounded-full blur-3xl">
            </div>
            <div
                class="absolute bottom-0 left-0 w-80 h-80 bg-gradient-to-tr from-gray-100/40 to-transparent rounded-full blur-2xl">
            </div>
        </div>

        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20">
            <div class="grid lg:grid-cols-2 gap-12 items-center">

                <!-- Contenido Principal -->
                <div class="text-center lg:text-left space-y-8">
                    <!-- Badge -->
                    <div
                        class="inline-flex items-center px-4 py-2 bg-zinc-100 text-zinc-800 rounded-full text-sm font-medium animate-fade-in">
                        <i class="fas fa-shield-alt mr-2"></i>
                        Sistema Seguro y Confiable
                    </div>

                    <!-- Título Principal -->
                    <h1 class="text-4xl md:text-5xl xl:text-6xl font-bold text-gray-900 leading-tight">
                        <span class="block">Mesa de Partes</span>
                        <span class="block text-zinc-800">Virtual</span>
                        <span class="block text-2xl md:text-3xl xl:text-4xl text-gray-700 font-normal mt-2">
                            Gestión Documental Digital
                        </span>
                    </h1>

                    <!-- Descripción -->
                    <p class="text-lg md:text-xl text-gray-600 max-w-2xl leading-relaxed">
                        Moderniza tus trámites documentales con nuestra plataforma digital.
                        <span class="font-semibold text-gray-800">Rápido, seguro y disponible 24/7</span>.
                        Envía, rastrea y gestiona tus documentos desde cualquier lugar.
                    </p>

                    <!-- Estadísticas Rápidas -->
                    <div class="flex flex-wrap gap-6 justify-center lg:justify-start">
                        <div class="text-center">
                            <div class="text-2xl font-bold text-zinc-800">24/7</div>
                            <div class="text-sm text-gray-600">Disponibilidad</div>
                        </div>
                        <div class="text-center">
                            <div class="text-2xl font-bold text-zinc-800">100%</div>
                            <div class="text-sm text-gray-600">Digital</div>
                        </div>
                        <div class="text-center">
                            <div class="text-2xl font-bold text-zinc-800">Seguro</div>
                            <div class="text-sm text-gray-600">Certificado</div>
                        </div>
                    </div>

                    <!-- Botones de Acción -->
                    <div class="flex flex-col sm:flex-row gap-4 justify-center lg:justify-start">
                        @auth
                            <a href="{{ route('dashboard') }}"
                                class="inline-flex items-center justify-center px-8 py-4 bg-zinc-800 text-white font-semibold rounded-xl hover:bg-zinc-900 transform hover:scale-105 transition-all duration-200 shadow-lg hover:shadow-xl focus:outline-none focus:ring-4 focus:ring-zinc-500 focus:ring-opacity-50">
                                <i class="fas fa-tachometer-alt mr-3"></i>
                                Ir al Dashboard
                            </a>
                        @else
                            <a href="{{ route('register') }}"
                                class="inline-flex items-center justify-center px-8 py-4 bg-zinc-800 text-white font-semibold rounded-xl hover:bg-zinc-900 transform hover:scale-105 transition-all duration-200 shadow-lg hover:shadow-xl focus:outline-none focus:ring-4 focus:ring-zinc-500 focus:ring-opacity-50">
                                <i class="fas fa-user-plus mr-3"></i>
                                Comenzar Ahora
                            </a>
                        @endauth

                        <a href="#servicios"
                            class="inline-flex items-center justify-center px-8 py-4 bg-white text-gray-700 font-semibold rounded-xl border-2 border-gray-200 hover:border-zinc-300 hover:text-zinc-800 transition-all duration-200 shadow-md hover:shadow-lg focus:outline-none focus:ring-4 focus:ring-gray-300 focus:ring-opacity-50">
                            <i class="fas fa-info-circle mr-3"></i>
                            Conocer Más
                        </a>
                    </div>

                    {{-- <!-- Indicadores de Confianza -->
                    <div class="flex items-center gap-4 justify-center lg:justify-start pt-4 border-t border-gray-200">
                        <div class="flex items-center text-sm text-gray-600">
                            <i class="fas fa-check-circle text-green-500 mr-2"></i>
                            Sin instalación
                        </div>
                        <div class="flex items-center text-sm text-gray-600">
                            <i class="fas fa-check-circle text-green-500 mr-2"></i>
                            Gratis para usuarios
                        </div>
                        <div class="flex items-center text-sm text-gray-600">
                            <i class="fas fa-check-circle text-green-500 mr-2"></i>
                            Soporte incluido
                        </div>
                    </div> --}}
                </div>

                <!-- Imagen/Ilustración -->
                <div class="relative lg:ml-8">
                    <div
                        class="relative bg-white/80 backdrop-blur-sm rounded-3xl p-8 shadow-2xl border border-gray-200/50">
                        <!-- Simulación de interfaz -->
                        <div class="space-y-6">
                            <!-- Header simulado -->
                            <div class="flex items-center space-x-3 pb-4 border-b border-gray-200">
                                <div class="w-3 h-3 bg-red-400 rounded-full"></div>
                                <div class="w-3 h-3 bg-yellow-400 rounded-full"></div>
                                <div class="w-3 h-3 bg-green-400 rounded-full"></div>
                            </div>

                            <!-- Contenido simulado -->
                            <div class="space-y-4">
                                <div class="flex items-center space-x-3">
                                    <div class="w-12 h-12 bg-zinc-100 rounded-lg flex items-center justify-center">
                                        <i class="fas fa-file-alt text-zinc-600"></i>
                                    </div>
                                    <div class="flex-1">
                                        <div class="h-3 bg-gray-200 rounded-full w-3/4 mb-2"></div>
                                        <div class="h-2 bg-gray-100 rounded-full w-1/2"></div>
                                    </div>
                                    <div class="px-3 py-1 bg-green-100 text-green-800 rounded-full text-xs font-medium">
                                        Completado
                                    </div>
                                </div>

                                <div class="flex items-center space-x-3">
                                    <div class="w-12 h-12 bg-yellow-100 rounded-lg flex items-center justify-center">
                                        <i class="fas fa-clock text-yellow-600"></i>
                                    </div>
                                    <div class="flex-1">
                                        <div class="h-3 bg-gray-200 rounded-full w-2/3 mb-2"></div>
                                        <div class="h-2 bg-gray-100 rounded-full w-1/3"></div>
                                    </div>
                                    <div
                                        class="px-3 py-1 bg-yellow-100 text-yellow-800 rounded-full text-xs font-medium">
                                        En Proceso
                                    </div>
                                </div>

                                <div class="flex items-center space-x-3">
                                    <div class="w-12 h-12 bg-zinc-100 rounded-lg flex items-center justify-center">
                                        <i class="fas fa-envelope text-zinc-600"></i>
                                    </div>
                                    <div class="flex-1">
                                        <div class="h-3 bg-gray-200 rounded-full w-4/5 mb-2"></div>
                                        <div class="h-2 bg-gray-100 rounded-full w-2/3"></div>
                                    </div>
                                    <div class="px-3 py-1 bg-zinc-100 text-zinc-800 rounded-full text-xs font-medium">
                                        Recibido
                                    </div>
                                </div>
                            </div>

                            <!-- Gráfico simulado -->
                            <div class="pt-4 border-t border-gray-200">
                                <div class="flex items-end space-x-2 h-24">
                                    <div class="bg-zinc-200 rounded-t w-8 h-12"></div>
                                    <div class="bg-zinc-300 rounded-t w-8 h-16"></div>
                                    <div class="bg-zinc-400 rounded-t w-8 h-20"></div>
                                    <div class="bg-zinc-500 rounded-t w-8 h-24"></div>
                                    <div class="bg-zinc-600 rounded-t w-8 h-18"></div>
                                </div>
                            </div>
                        </div>

                        <!-- Elementos flotantes -->
                        <div
                            class="absolute -top-4 -right-4 w-16 h-16 bg-zinc-800 rounded-full flex items-center justify-center text-white shadow-lg animate-bounce">
                            <i class="fas fa-check text-xl"></i>
                        </div>
                        <div
                            class="absolute -bottom-4 -left-4 w-12 h-12 bg-green-400 rounded-full flex items-center justify-center text-white shadow-lg animate-pulse">
                            <i class="fas fa-clock text-sm"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Flecha hacia abajo -->
        <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2 animate-bounce">
            <a href="#servicios" class="text-gray-400 hover:text-zinc-800 transition-colors duration-200">
                <i class="fas fa-chevron-down text-2xl"></i>
            </a>
        </div>
    </section>

    <!-- 🛠️ SECCIÓN DE SERVICIOS -->
    <section id="servicios" class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <!-- Header de la Sección -->
            <div class="text-center mb-16">
                <div
                    class="inline-flex items-center px-4 py-2 bg-zinc-50 text-zinc-700 rounded-full text-sm font-medium mb-4">
                    <i class="fas fa-cogs mr-2"></i>
                    Nuestros Servicios
                </div>

                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
                    Todo lo que Necesitas en un Solo Lugar
                </h2>

                <p class="text-lg text-gray-600 max-w-3xl mx-auto">
                    Simplificamos tus trámites documentales con tecnología de vanguardia.
                    Desde la presentación hasta el seguimiento, todo está diseñado para tu comodidad.
                </p>
            </div>

            <!-- Grid de Servicios -->
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">

                <!-- Servicio 1: Presentación de Documentos -->
                <div
                    class="group relative bg-white rounded-2xl p-8 border border-gray-200 hover:border-zinc-300 hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2">
                    <div
                        class="absolute inset-0 bg-gradient-to-br from-zinc-50 to-transparent rounded-2xl opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                    </div>

                    <div class="relative">
                        <div
                            class="w-16 h-16 bg-zinc-100 rounded-xl flex items-center justify-center mb-6 group-hover:bg-zinc-200 transition-colors duration-300">
                            <i class="fas fa-file-upload text-2xl text-zinc-600"></i>
                        </div>

                        <h3 class="text-xl font-bold text-gray-900 mb-4">Presentación Digital</h3>

                        <p class="text-gray-600 mb-6 leading-relaxed">
                            Envía tus documentos de forma segura las 24 horas. Compatible con PDF, Word y formatos
                            estándar.
                        </p>

                        <ul class="space-y-2 text-sm text-gray-600">
                            <li class="flex items-center">
                                <i class="fas fa-check text-green-500 mr-3"></i>
                                Carga múltiple de archivos
                            </li>
                            <li class="flex items-center">
                                <i class="fas fa-check text-green-500 mr-3"></i>
                                Validación automática
                            </li>
                            <li class="flex items-center">
                                <i class="fas fa-check text-green-500 mr-3"></i>
                                Código de seguimiento
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- Servicio 2: Seguimiento en Tiempo Real -->
                <div
                    class="group relative bg-white rounded-2xl p-8 border border-gray-200 hover:border-zinc-300 hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2">
                    <div
                        class="absolute inset-0 bg-gradient-to-br from-green-50 to-transparent rounded-2xl opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                    </div>

                    <div class="relative">
                        <div
                            class="w-16 h-16 bg-green-100 rounded-xl flex items-center justify-center mb-6 group-hover:bg-green-200 transition-colors duration-300">
                            <i class="fas fa-route text-2xl text-green-600"></i>
                        </div>

                        <h3 class="text-xl font-bold text-gray-900 mb-4">Seguimiento en Vivo</h3>

                        <p class="text-gray-600 mb-6 leading-relaxed">
                            Conoce el estado de tus trámites en tiempo real. Recibe notificaciones automáticas de cada
                            cambio.
                        </p>

                        <ul class="space-y-2 text-sm text-gray-600">
                            <li class="flex items-center">
                                <i class="fas fa-check text-green-500 mr-3"></i>
                                Estados actualizados
                            </li>
                            <li class="flex items-center">
                                <i class="fas fa-check text-green-500 mr-3"></i>
                                Notificaciones push
                            </li>
                            <li class="flex items-center">
                                <i class="fas fa-check text-green-500 mr-3"></i>
                                Historial completo
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- Servicio 3: Gestión Administrativa -->
                <div
                    class="group relative bg-white rounded-2xl p-8 border border-gray-200 hover:border-zinc-300 hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2">
                    <div
                        class="absolute inset-0 bg-gradient-to-br from-purple-50 to-transparent rounded-2xl opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                    </div>

                    <div class="relative">
                        <div
                            class="w-16 h-16 bg-purple-100 rounded-xl flex items-center justify-center mb-6 group-hover:bg-purple-200 transition-colors duration-300">
                            <i class="fas fa-users-cog text-2xl text-purple-600"></i>
                        </div>

                        <h3 class="text-xl font-bold text-gray-900 mb-4">Gestión Administrativa</h3>

                        <p class="text-gray-600 mb-6 leading-relaxed">
                            Herramientas avanzadas para administradores. Control total del flujo documental
                            institucional.
                        </p>

                        <ul class="space-y-2 text-sm text-gray-600">
                            <li class="flex items-center">
                                <i class="fas fa-check text-green-500 mr-3"></i>
                                Panel de control
                            </li>
                            <li class="flex items-center">
                                <i class="fas fa-check text-green-500 mr-3"></i>
                                Reportes estadísticos
                            </li>
                            <li class="flex items-center">
                                <i class="fas fa-check text-green-500 mr-3"></i>
                                Gestión de usuarios
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- Servicio 4: Tipos de Documentos -->
                <div
                    class="group relative bg-white rounded-2xl p-8 border border-gray-200 hover:border-zinc-300 hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2">
                    <div
                        class="absolute inset-0 bg-gradient-to-br from-orange-50 to-transparent rounded-2xl opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                    </div>

                    <div class="relative">
                        <div
                            class="w-16 h-16 bg-orange-100 rounded-xl flex items-center justify-center mb-6 group-hover:bg-orange-200 transition-colors duration-300">
                            <i class="fas fa-folder-open text-2xl text-orange-600"></i>
                        </div>

                        <h3 class="text-xl font-bold text-gray-900 mb-4">Múltiples Tipos</h3>

                        <p class="text-gray-600 mb-6 leading-relaxed">
                            Procesamos diversos tipos de documentos según tus necesidades institucionales.
                        </p>

                        <ul class="space-y-2 text-sm text-gray-600">
                            <li class="flex items-center">
                                <i class="fas fa-check text-green-500 mr-3"></i>
                                Solicitudes de información
                            </li>
                            <li class="flex items-center">
                                <i class="fas fa-check text-green-500 mr-3"></i>
                                Reclamos y sugerencias
                            </li>
                            <li class="flex items-center">
                                <i class="fas fa-check text-green-500 mr-3"></i>
                                Certificados y peticiones
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- Servicio 5: Seguridad Certificada -->
                <div
                    class="group relative bg-white rounded-2xl p-8 border border-gray-200 hover:border-zinc-300 hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2">
                    <div
                        class="absolute inset-0 bg-gradient-to-br from-red-50 to-transparent rounded-2xl opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                    </div>

                    <div class="relative">
                        <div
                            class="w-16 h-16 bg-red-100 rounded-xl flex items-center justify-center mb-6 group-hover:bg-red-200 transition-colors duration-300">
                            <i class="fas fa-shield-alt text-2xl text-red-600"></i>
                        </div>

                        <h3 class="text-xl font-bold text-gray-900 mb-4">Máxima Seguridad</h3>

                        <p class="text-gray-600 mb-6 leading-relaxed">
                            Protección de datos de nivel empresarial. Tu información está segura con nosotros.
                        </p>

                        <ul class="space-y-2 text-sm text-gray-600">
                            <li class="flex items-center">
                                <i class="fas fa-check text-green-500 mr-3"></i>
                                Encriptación SSL/TLS
                            </li>
                            <li class="flex items-center">
                                <i class="fas fa-check text-green-500 mr-3"></i>
                                Backups automáticos
                            </li>
                            <li class="flex items-center">
                                <i class="fas fa-check text-green-500 mr-3"></i>
                                Cumplimiento GDPR
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- Servicio 6: Soporte 24/7 -->
                <div
                    class="group relative bg-white rounded-2xl p-8 border border-gray-200 hover:border-zinc-300 hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2">
                    <div
                        class="absolute inset-0 bg-gradient-to-br from-indigo-50 to-transparent rounded-2xl opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                    </div>

                    <div class="relative">
                        <div
                            class="w-16 h-16 bg-indigo-100 rounded-xl flex items-center justify-center mb-6 group-hover:bg-indigo-200 transition-colors duration-300">
                            <i class="fas fa-headset text-2xl text-indigo-600"></i>
                        </div>

                        <h3 class="text-xl font-bold text-gray-900 mb-4">Soporte Continuo</h3>

                        <p class="text-gray-600 mb-6 leading-relaxed">
                            Asistencia técnica disponible cuando la necesites. Resolvemos tus dudas al instante.
                        </p>

                        <ul class="space-y-2 text-sm text-gray-600">
                            <li class="flex items-center">
                                <i class="fas fa-check text-green-500 mr-3"></i>
                                Chat en vivo
                            </li>
                            <li class="flex items-center">
                                <i class="fas fa-check text-green-500 mr-3"></i>
                                Base de conocimiento
                            </li>
                            <li class="flex items-center">
                                <i class="fas fa-check text-green-500 mr-3"></i>
                                Tickets de soporte
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Call to Action Final -->
            <div class="text-center mt-16">
                <div
                    class="bg-gradient-to-r from-zinc-800 to-zinc-900 rounded-3xl p-12 text-white relative overflow-hidden">
                    <!-- Elementos decorativos -->
                    <div class="absolute top-0 right-0 w-40 h-40 bg-white/10 rounded-full blur-2xl"></div>
                    <div class="absolute bottom-0 left-0 w-32 h-32 bg-white/5 rounded-full blur-xl"></div>

                    <div class="relative">
                        <h3 class="text-2xl md:text-3xl font-bold mb-4">
                            ¿Listo para Modernizar tus Trámites?
                        </h3>

                        <p class="text-zinc-100 text-lg mb-8 max-w-2xl mx-auto">
                            Únete a miles de usuarios que ya confían en nuestro sistema.
                            Comienza hoy mismo y experimenta la diferencia.
                        </p>

                        <div class="flex flex-col sm:flex-row gap-4 justify-center">
                            @auth
                                <a href="{{ route('dashboard') }}"
                                    class="inline-flex items-center justify-center px-8 py-4 bg-white text-zinc-800 font-semibold rounded-xl hover:bg-gray-50 transform hover:scale-105 transition-all duration-200 shadow-lg focus:outline-none focus:ring-4 focus:ring-white focus:ring-opacity-50">
                                    <i class="fas fa-rocket mr-3"></i>
                                    Acceder al Sistema
                                </a>
                            @else
                                <a href="{{ route('register') }}"
                                    class="inline-flex items-center justify-center px-8 py-4 bg-white text-zinc-800 font-semibold rounded-xl hover:bg-gray-50 transform hover:scale-105 transition-all duration-200 shadow-lg focus:outline-none focus:ring-4 focus:ring-white focus:ring-opacity-50">
                                    <i class="fas fa-rocket mr-3"></i>
                                    Crear Cuenta Gratis
                                </a>

                                <a href="{{ route('login') }}"
                                    class="inline-flex items-center justify-center px-8 py-4 bg-transparent text-white font-semibold rounded-xl border-2 border-white/30 hover:border-white hover:bg-white/10 transition-all duration-200 focus:outline-none focus:ring-4 focus:ring-white focus:ring-opacity-50">
                                    <i class="fas fa-sign-in-alt mr-3"></i>
                                    Iniciar Sesión
                                </a>
                            @endauth
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @include('layouts.partials.public.footer')

    @livewireScripts
</body>

</html>
