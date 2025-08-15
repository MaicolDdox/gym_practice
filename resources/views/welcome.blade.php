<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>GymReserva - Tu Gimnasio, Tu Horario</title>
    
    <!-- Actualizando CDN y fuentes para diseño profesional -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@400;600;700&family=DM+Sans:wght@300;400;500;600&display=swap" rel="stylesheet">
    
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        'space': ['Space Grotesk', 'sans-serif'],
                        'dm': ['DM Sans', 'sans-serif'],
                    }
                }
            }
        }
    </script>
    
    <style>
        /* Cambiando paleta de naranja/rojo a gris/púrpura profesional */
        .gradient-text {
            background: linear-gradient(135deg, #1f2937 0%, #8b5cf6 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        
        .floating-animation {
            animation: float 6s ease-in-out infinite;
        }
        
        .pulse-glow {
            animation: pulse-glow 2s ease-in-out infinite alternate;
        }
        
        @keyframes float {
            0%, 100% { transform: translateY(0px) rotate(3deg); }
            50% { transform: translateY(-20px) rotate(3deg); }
        }
        
        @keyframes pulse-glow {
            from { box-shadow: 0 0 20px rgba(139, 92, 246, 0.3); }
            to { box-shadow: 0 0 40px rgba(139, 92, 246, 0.6); }
        }
        
        .card-hover {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }
        
        .card-hover:hover {
            transform: translateY(-8px) scale(1.02);
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.15);
        }
        
        .text-reveal {
            opacity: 0;
            transform: translateY(30px);
            animation: reveal 0.8s ease-out forwards;
        }
        
        @keyframes reveal {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        .stagger-1 { animation-delay: 0.1s; }
        .stagger-2 { animation-delay: 0.2s; }
        .stagger-3 { animation-delay: 0.3s; }
        .stagger-4 { animation-delay: 0.4s; }
        
        .hero-bg {
            background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 50%, #cbd5e1 100%);
        }
        
        .service-icon {
            transition: all 0.3s ease;
        }
        
        .service-card:hover .service-icon {
            transform: scale(1.1) rotate(5deg);
        }
        
        .stats-counter {
            font-variant-numeric: tabular-nums;
        }

        .glass-effect {
            backdrop-filter: blur(10px);
            background: rgba(255, 255, 255, 0.1);
        }
    </style>
</head>
<body class="antialiased bg-white font-dm">
    <div class="min-h-screen">
        <!-- Actualizando header con nueva paleta profesional -->
        <header class="fixed top-0 w-full z-50 glass-effect border-b border-white/20">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between items-center py-4">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <h1 class="text-3xl font-bold font-space gradient-text">
                                GymReserva
                            </h1>
                        </div>
                    </div>

                    @if (Route::has('login'))
                        <nav class="flex items-center justify-end gap-4">
                            @auth
                                <a href="{{ url('/dashboard') }}" class="px-6 py-2 bg-white/20 hover:bg-white/30 text-gray-800 rounded-lg font-medium transition-all duration-300 backdrop-blur-sm">
                                    Dashboard
                                </a>
                            @else
                                <a href="{{ route('login') }}" class="px-6 py-2 text-gray-800 hover:bg-white/20 rounded-lg font-medium transition-all duration-300">
                                    Iniciar Sesión
                                </a>
                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="px-6 py-2 bg-gradient-to-r from-gray-800 to-purple-600 hover:from-gray-900 hover:to-purple-700 text-white rounded-lg font-medium transition-all duration-300 transform hover:scale-105">
                                        Registrarse
                                    </a>
                                @endif
                            @endauth
                        </nav>
                    @endif
                </div>
            </div>
        </header>

        <!-- Actualizando hero section con colores profesionales -->
        <section class="relative hero-bg pt-32 pb-24 overflow-hidden">
            <div class="absolute inset-0 overflow-hidden">
                <div class="absolute -top-40 -right-40 w-80 h-80 bg-purple-300/20 rounded-full blur-3xl animate-pulse"></div>
                <div class="absolute -bottom-40 -left-40 w-80 h-80 bg-gray-300/20 rounded-full blur-3xl animate-pulse" style="animation-delay: 2s;"></div>
            </div>
            
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative">
                <div class="grid lg:grid-cols-2 gap-16 items-center">
                    <div class="space-y-8">
                        <div class="space-y-6">
                            <h1 class="text-5xl lg:text-7xl font-bold font-space text-gray-900 leading-tight text-reveal">
                                Reserva tu
                                <span class="gradient-text block">entrenamiento</span>
                                <span class="text-reveal stagger-1">perfecto</span>
                            </h1>
                            <p class="text-xl text-gray-600 leading-relaxed max-w-lg text-reveal stagger-2">
                                Accede a equipos de última generación, clases grupales y entrenadores personales. 
                                Reserva tu horario ideal con solo unos clics.
                            </p>
                        </div>
                        
                        <div class="flex flex-col sm:flex-row gap-4 text-reveal stagger-3">
                            <a href="{{ route('register') }}" class="group bg-gradient-to-r from-gray-800 to-purple-600 hover:from-gray-900 hover:to-purple-700 text-white px-10 py-4 rounded-xl font-semibold text-lg transition-all duration-300 text-center transform hover:scale-105 pulse-glow">
                                <span class="flex items-center justify-center gap-2">
                                    Comenzar Ahora
                                    <svg class="w-5 h-5 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                                    </svg>
                                </span>
                            </a>
                            <a href="#horarios" class="group border-2 border-purple-600 text-purple-600 hover:bg-purple-600 hover:text-white px-10 py-4 rounded-xl font-semibold text-lg transition-all duration-300 text-center transform hover:scale-105">
                                Ver Horarios
                            </a>
                        </div>

                        <div class="grid grid-cols-3 gap-8 pt-12 text-reveal stagger-4">
                            <div class="text-center">
                                <div class="text-4xl font-bold font-space gradient-text stats-counter" data-target="500">0</div>
                                <div class="text-gray-600 font-medium">Miembros Activos</div>
                            </div>
                            <div class="text-center">
                                <div class="text-4xl font-bold font-space gradient-text stats-counter" data-target="50">0</div>
                                <div class="text-gray-600 font-medium">Clases Semanales</div>
                            </div>
                            <div class="text-center">
                                <div class="text-4xl font-bold font-space gradient-text">24/7</div>
                                <div class="text-gray-600 font-medium">Acceso</div>
                            </div>
                        </div>
                    </div>

                    <div class="relative">
                        <div class="floating-animation">
                            <div class="bg-gradient-to-br from-gray-400 via-purple-500 to-purple-600 rounded-3xl p-8 transform rotate-3 shadow-2xl">
                                <img src="{{ asset('storage/baky.png') }}" alt="Interior moderno del gimnasio" class="w-full h-96 object-cover rounded-2xl transform -rotate-3 shadow-lg">
                            </div>
                        </div>
                        <div class="absolute -top-4 -left-4 w-24 h-24 bg-purple-200 rounded-full opacity-60 animate-pulse"></div>
                        <div class="absolute -bottom-4 -right-4 w-32 h-32 bg-gray-200 rounded-full opacity-40 animate-pulse" style="animation-delay: 1s;"></div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Actualizando sección de servicios con nueva paleta -->
        <section class="py-24 bg-white dark:bg-gray-900">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-20">
                    <h2 class="text-5xl font-bold font-space text-gray-900 dark:text-white mb-6">
                        Nuestros <span class="gradient-text">Servicios</span>
                    </h2>
                    <p class="text-xl text-gray-600 dark:text-gray-300 max-w-3xl mx-auto leading-relaxed">
                        Todo lo que necesitas para alcanzar tus objetivos fitness en un solo lugar
                    </p>
                </div>

                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                    <div class="service-card bg-gradient-to-br from-gray-50 to-gray-100 dark:from-gray-800 dark:to-gray-700 rounded-2xl p-8 card-hover">
                        <div class="w-20 h-20 bg-gradient-to-br from-purple-100 to-purple-200 dark:from-purple-900 dark:to-purple-800 rounded-2xl flex items-center justify-center mb-8 service-icon">
                            <svg class="w-10 h-10 text-purple-600 dark:text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 8.172V5L8 4z"></path>
                            </svg>
                        </div>
                        <h3 class="text-2xl font-semibold font-space text-gray-900 dark:text-white mb-4">Equipos Modernos</h3>
                        <p class="text-gray-600 dark:text-gray-300 leading-relaxed">Maquinaria de última generación para cardio, fuerza y entrenamiento funcional.</p>
                    </div>

                    <div class="service-card bg-gradient-to-br from-gray-50 to-gray-100 dark:from-gray-800 dark:to-gray-700 rounded-2xl p-8 card-hover">
                        <div class="w-20 h-20 bg-gradient-to-br from-purple-100 to-purple-200 dark:from-purple-900 dark:to-purple-800 rounded-2xl flex items-center justify-center mb-8 service-icon">
                            <svg class="w-10 h-10 text-purple-600 dark:text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                            </svg>
                        </div>
                        <h3 class="text-2xl font-semibold font-space text-gray-900 dark:text-white mb-4">Clases Grupales</h3>
                        <p class="text-gray-600 dark:text-gray-300 leading-relaxed">Yoga, Pilates, CrossFit, Zumba y más. Reserva tu lugar fácilmente.</p>
                    </div>

                    <div class="service-card bg-gradient-to-br from-gray-50 to-gray-100 dark:from-gray-800 dark:to-gray-700 rounded-2xl p-8 card-hover">
                        <div class="w-20 h-20 bg-gradient-to-br from-purple-100 to-purple-200 dark:from-purple-900 dark:to-purple-800 rounded-2xl flex items-center justify-center mb-8 service-icon">
                            <svg class="w-10 h-10 text-purple-600 dark:text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                        </div>
                        <h3 class="text-2xl font-semibold font-space text-gray-900 dark:text-white mb-4">Entrenadores Personales</h3>
                        <p class="text-gray-600 dark:text-gray-300 leading-relaxed">Profesionales certificados para ayudarte a alcanzar tus metas.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Actualizando sección de horarios con colores profesionales -->
        <section id="horarios" class="py-24 bg-gradient-to-br from-gray-50 to-gray-100 dark:from-gray-800 dark:to-gray-900">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-20">
                    <h2 class="text-5xl font-bold font-space text-gray-900 dark:text-white mb-6">
                        Horarios de <span class="gradient-text">Atención</span>
                    </h2>
                    <p class="text-xl text-gray-600 dark:text-gray-300">
                        Estamos aquí cuando tú lo necesitas
                    </p>
                </div>

                <div class="bg-white dark:bg-gray-900 rounded-3xl shadow-2xl overflow-hidden card-hover">
                    <div class="grid md:grid-cols-2 gap-0">
                        <div class="p-12 space-y-8">
                            <h3 class="text-3xl font-semibold font-space text-gray-900 dark:text-white mb-8">Horarios Regulares</h3>
                            
                            <div class="space-y-6">
                                <div class="flex justify-between items-center py-4 border-b-2 border-gray-200 dark:border-gray-700">
                                    <span class="font-semibold text-lg text-gray-900 dark:text-white">Lunes - Viernes</span>
                                    <span class="text-purple-600 dark:text-purple-400 font-bold text-lg">5:00 AM - 11:00 PM</span>
                                </div>
                                <div class="flex justify-between items-center py-4 border-b-2 border-gray-200 dark:border-gray-700">
                                    <span class="font-semibold text-lg text-gray-900 dark:text-white">Sábados</span>
                                    <span class="text-purple-600 dark:text-purple-400 font-bold text-lg">6:00 AM - 10:00 PM</span>
                                </div>
                                <div class="flex justify-between items-center py-4 border-b-2 border-gray-200 dark:border-gray-700">
                                    <span class="font-semibold text-lg text-gray-900 dark:text-white">Domingos</span>
                                    <span class="text-purple-600 dark:text-purple-400 font-bold text-lg">7:00 AM - 9:00 PM</span>
                                </div>
                            </div>

                            <div class="bg-gradient-to-r from-purple-50 to-gray-50 dark:from-purple-900/20 dark:to-gray-900/20 p-6 rounded-2xl">
                                <p class="text-purple-800 dark:text-purple-200 font-medium">
                                    <strong>Acceso 24/7</strong> disponible para miembros Premium
                                </p>
                            </div>
                        </div>

                        <div class="bg-gradient-to-br from-gray-800 via-purple-600 to-purple-700 p-12 text-white relative overflow-hidden">
                            <div class="absolute top-0 right-0 w-32 h-32 bg-white/10 rounded-full -translate-y-16 translate-x-16"></div>
                            <div class="absolute bottom-0 left-0 w-24 h-24 bg-white/10 rounded-full translate-y-12 -translate-x-12"></div>
                            
                            <div class="relative z-10">
                                <h3 class="text-3xl font-semibold font-space mb-8">Reserva Ahora</h3>
                                <p class="mb-10 text-purple-100 text-lg leading-relaxed">
                                    No esperes más. Reserva tu horario ideal y comienza tu transformación hoy mismo.
                                </p>
                                
                                <div class="space-y-4">
                                    <a href="{{ route('register') }}" class="block w-full bg-white text-purple-600 px-8 py-4 rounded-xl font-bold text-center hover:bg-gray-100 transition-all duration-300 transform hover:scale-105">
                                        Crear Cuenta Gratis
                                    </a>
                                    <a href="{{ route('login') }}" class="block w-full border-2 border-white text-white px-8 py-4 rounded-xl font-bold text-center hover:bg-white hover:text-purple-600 transition-all duration-300 transform hover:scale-105">
                                        Ya tengo cuenta
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Actualizando CTA final con nueva paleta -->
        <section class="py-24 bg-white dark:bg-gray-900 relative overflow-hidden">
            <div class="absolute inset-0">
                <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-96 h-96 bg-gradient-to-r from-purple-200 to-gray-200 dark:from-purple-900/30 dark:to-gray-900/30 rounded-full blur-3xl opacity-30"></div>
            </div>
            
            <div class="max-w-4xl mx-auto text-center px-4 sm:px-6 lg:px-8 relative z-10">
                <h2 class="text-5xl font-bold font-space text-gray-900 dark:text-white mb-8">
                    ¿Listo para comenzar tu <span class="gradient-text">transformación</span>?
                </h2>
                <p class="text-xl text-gray-600 dark:text-gray-300 mb-12 leading-relaxed">
                    Únete a nuestra comunidad y descubre lo que puedes lograr con el apoyo adecuado.
                </p>
                <a href="{{ route('register') }}" class="inline-block bg-gradient-to-r from-gray-800 to-purple-600 hover:from-gray-900 hover:to-purple-700 text-white px-16 py-5 rounded-2xl font-bold text-xl transition-all duration-300 transform hover:scale-105 pulse-glow">
                    Empezar Mi Membresía
                </a>
            </div>
        </section>

        <!-- Actualizando footer con colores profesionales -->
        <footer class="bg-gradient-to-br from-gray-900 to-black text-white py-16">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid md:grid-cols-4 gap-12">
                    <div class="col-span-2">
                        <h3 class="text-3xl font-bold font-space gradient-text mb-6">GymReserva</h3>
                        <p class="text-gray-300 mb-6 text-lg leading-relaxed">
                            Tu gimnasio, tu horario. La forma más fácil de reservar y gestionar tus entrenamientos.
                        </p>
                    </div>
                    
                    <div>
                        <h4 class="font-bold text-lg mb-6">Enlaces Rápidos</h4>
                        <ul class="space-y-3 text-gray-300">
                            <li><a href="#" class="hover:text-purple-400 transition-colors duration-200">Clases</a></li>
                            <li><a href="#" class="hover:text-purple-400 transition-colors duration-200">Entrenadores</a></li>
                            <li><a href="#" class="hover:text-purple-400 transition-colors duration-200">Membresías</a></li>
                            <li><a href="#" class="hover:text-purple-400 transition-colors duration-200">Contacto</a></li>
                        </ul>
                    </div>
                    
                    <div>
                        <h4 class="font-bold text-lg mb-6">Contacto</h4>
                        <ul class="space-y-3 text-gray-300">
                            <li class="flex items-center gap-3">
                                <span class="text-purple-400">📍</span>
                                Av. Principal 123
                            </li>
                            <li class="flex items-center gap-3">
                                <span class="text-purple-400">📞</span>
                                (555) 123-4567
                            </li>
                            <li class="flex items-center gap-3">
                                <span class="text-purple-400">✉️</span>
                                info@gymreserva.com
                            </li>
                        </ul>
                    </div>
                </div>
                
                <div class="border-t border-gray-800 mt-12 pt-8 text-center text-gray-400">
                    <p>&copy; 2024 GymReserva. Todos los derechos reservados.</p>
                </div>
            </div>
        </footer>
    </div>

    <script>
        function animateCounter(element, target) {
            let current = 0;
            const increment = target / 100;
            const timer = setInterval(() => {
                current += increment;
                if (current >= target) {
                    current = target;
                    clearInterval(timer);
                }
                element.textContent = Math.floor(current) + (target === 500 ? '+' : target === 50 ? '+' : '');
            }, 20);
        }

        const observerOptions = {
            threshold: 0.5,
            rootMargin: '0px 0px -100px 0px'
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const counters = entry.target.querySelectorAll('.stats-counter[data-target]');
                    counters.forEach(counter => {
                        const target = parseInt(counter.getAttribute('data-target'));
                        animateCounter(counter, target);
                    });
                    observer.unobserve(entry.target);
                }
            });
        }, observerOptions);

        document.addEventListener('DOMContentLoaded', () => {
            const statsSection = document.querySelector('.stats-counter').closest('.grid');
            if (statsSection) {
                observer.observe(statsSection);
            }

            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function (e) {
                    e.preventDefault();
                    const target = document.querySelector(this.getAttribute('href'));
                    if (target) {
                        target.scrollIntoView({
                            behavior: 'smooth',
                            block: 'start'
                        });
                    }
                });
            });

            window.addEventListener('scroll', () => {
                const scrolled = window.pageYOffset;
                const parallaxElements = document.querySelectorAll('.floating-animation');
                
                parallaxElements.forEach(element => {
                    const speed = 0.5;
                    element.style.transform = `translateY(${scrolled * speed}px) rotate(3deg)`;
                });
            });
        });
    </script>
</body>
</html>
