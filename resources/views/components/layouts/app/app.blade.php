<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel - GymReserva</title>
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@400;600;700&family=DM+Sans:wght@300;400;500;600&display=swap" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        /* Premium Design System */
        .font-space { font-family: 'Space Grotesk', sans-serif; }
        .font-dm { font-family: 'DM Sans', sans-serif; }
        
        /* Glass Effects */
        .glass-effect {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(209, 213, 219, 0.3);
        }
        
        .glass-sidebar {
            background: linear-gradient(135deg, rgba(241, 245, 249, 0.98) 0%, rgba(248, 250, 252, 0.98) 100%);
            backdrop-filter: blur(20px);
            border-right: 1px solid rgba(209, 213, 219, 0.4);
        }
        
        /* Navigation Styles */
        .nav-item {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            overflow: hidden;
        }
        
        .nav-item::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(139, 92, 246, 0.1), transparent);
            transition: left 0.5s;
        }
        
        .nav-item:hover::before {
            left: 100%;
        }
        
        .nav-item:hover {
            background: rgba(139, 92, 246, 0.08);
            transform: translateX(8px);
            box-shadow: 0 4px 15px rgba(139, 92, 246, 0.1);
        }
        
        .nav-item.active {
            background: rgba(139, 92, 246, 0.12);
            border-left: 4px solid #8b5cf6;
        }
        
        /* Content Area */
        .main-content {
            background: linear-gradient(135deg, #ffffff 0%, #f8fafc 100%);
            min-height: 100vh;
        }
        
        /* Floating Elements */
        .floating-element {
            animation: float 6s ease-in-out infinite;
        }
        
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
        }
        
        /* Responsive */
        @media (max-width: 768px) {
            .sidebar-mobile {
                transform: translateX(-100%);
                transition: transform 0.3s ease-in-out;
            }
            
            .sidebar-mobile.open {
                transform: translateX(0);
            }
        }
    </style>
</head>
<body class="font-dm bg-gradient-to-br from-gray-50 to-slate-100">
    
    <!-- Mobile Menu Button -->
    <button id="mobile-menu-btn" class="md:hidden fixed top-4 left-4 z-50 p-3 rounded-lg glass-effect text-gray-700 hover:text-purple-600 transition-colors">
        <i class="fas fa-bars text-xl"></i>
    </button>
    
    <div class="flex min-h-screen">
        <!-- Sidebar -->
        <aside id="sidebar" class="sidebar-mobile md:translate-x-0 fixed md:relative z-40 w-64 md:w-72 glass-sidebar shadow-2xl">
            @include('components.layouts.app.sidebar')
        </aside>
        
        <!-- Main Content -->
        <main class="flex-1 main-content relative overflow-hidden">
            <!-- Floating Background Elements -->
            <div class="absolute inset-0 overflow-hidden pointer-events-none">
                <div class="floating-element absolute top-20 right-20 w-32 h-32 bg-purple-100 rounded-full opacity-20"></div>
                <div class="floating-element absolute bottom-32 left-16 w-24 h-24 bg-gray-200 rounded-full opacity-15" style="animation-delay: -2s;"></div>
                <div class="floating-element absolute top-1/2 right-1/3 w-16 h-16 bg-purple-200 rounded-full opacity-10" style="animation-delay: -4s;"></div>
            </div>
            
            <!-- Content Container -->
            <div class="relative z-10 p-6 md:p-8">
                @yield('content')
            </div>
        </main>
    </div>
    
    <!-- Mobile Overlay -->
    <div id="mobile-overlay" class="md:hidden fixed inset-0 bg-black bg-opacity-50 z-30 opacity-0 pointer-events-none transition-opacity"></div>
    
    <script>
        // Mobile Menu Toggle
        const mobileMenuBtn = document.getElementById('mobile-menu-btn');
        const sidebar = document.getElementById('sidebar');
        const mobileOverlay = document.getElementById('mobile-overlay');
        
        mobileMenuBtn.addEventListener('click', () => {
            sidebar.classList.toggle('open');
            mobileOverlay.classList.toggle('opacity-0');
            mobileOverlay.classList.toggle('pointer-events-none');
        });
        
        mobileOverlay.addEventListener('click', () => {
            sidebar.classList.remove('open');
            mobileOverlay.classList.add('opacity-0');
            mobileOverlay.classList.add('pointer-events-none');
        });
        
        // Active Navigation
        const currentPath = window.location.pathname;
        const navLinks = document.querySelectorAll('.nav-item');
        
        navLinks.forEach(link => {
            if (link.getAttribute('href') === currentPath) {
                link.classList.add('active');
            }
        });
    </script>
</body>
</html>
