<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $title ?? config('app.name', 'GymReserva') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;600;700;800&family=Source+Sans+Pro:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        'playfair': ['Playfair Display', 'serif'],
                        'source': ['Source Sans Pro', 'sans-serif'],
                    },
                    colors: {
                        'gym-orange': '#ea580c',
                        'gym-orange-light': '#fb923c',
                        'gym-orange-dark': '#c2410c',
                        'gym-cream': '#fef7ed',
                        'gym-dark': '#1c1917',
                    }
                }
            }
        }
    </script>

    <style>
        
        .glass-effect {
            background: rgba(255, 255, 255, 0.25);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.18);
        }

        .glass-effect-dark {
            background: rgba(0, 0, 0, 0.25);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        .gradient-bg {
            background: linear-gradient(135deg, #ea580c 0%, #fb923c 50%, #fed7aa 100%);
        }

        .gradient-text {
            background: linear-gradient(135deg, #ea580c, #fb923c);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .floating-animation {
            animation: floating 6s ease-in-out infinite;
        }

        .floating-animation-delayed {
            animation: floating 6s ease-in-out infinite 2s;
        }

        @keyframes floating {

            0%,
            100% {
                transform: translateY(0px) rotate(0deg);
            }

            33% {
                transform: translateY(-20px) rotate(1deg);
            }

            66% {
                transform: translateY(-10px) rotate(-1deg);
            }
        }

        .pulse-glow {
            animation: pulse-glow 2s ease-in-out infinite alternate;
        }

        @keyframes pulse-glow {
            from {
                box-shadow: 0 0 20px rgba(234, 88, 12, 0.3);
            }

            to {
                box-shadow: 0 0 40px rgba(234, 88, 12, 0.6);
            }
        }

        .slide-in-up {
            animation: slideInUp 0.8s ease-out;
        }

        @keyframes slideInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .hover-lift {
            transition: all 0.3s ease;
        }

        .hover-lift:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
        }

        .input-focus {
            transition: all 0.3s ease;
        }

        .input-focus:focus {
            transform: scale(1.02);
            box-shadow: 0 0 0 3px rgba(234, 88, 12, 0.1);
        }

        .glass-effect {
            background: rgba(255, 255, 255, 0.25);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.18);
        }

        .glass-effect-dark {
            background: rgba(28, 25, 23, 0.8);
            backdrop-filter: blur(15px);
            border: 1px solid rgba(251, 146, 60, 0.2);
        }

        .floating-shapes {
            position: absolute;
            width: 100%;
            height: 100%;
            overflow: hidden;
            z-index: 0;
        }

        .floating-shape {
            position: absolute;
            background: linear-gradient(45deg, rgba(234, 88, 12, 0.1), rgba(251, 146, 60, 0.1));
            border-radius: 50%;
            animation: float 6s ease-in-out infinite;
        }

        .floating-shape:nth-child(1) {
            width: 80px;
            height: 80px;
            top: 20%;
            left: 10%;
            animation-delay: 0s;
        }

        .floating-shape:nth-child(2) {
            width: 120px;
            height: 120px;
            top: 60%;
            right: 10%;
            animation-delay: 2s;
        }

        .floating-shape:nth-child(3) {
            width: 60px;
            height: 60px;
            bottom: 20%;
            left: 20%;
            animation-delay: 4s;
        }

        .floating-shape:nth-child(4) {
            width: 100px;
            height: 100px;
            top: 10%;
            right: 30%;
            animation-delay: 1s;
        }

        @keyframes float {

            0%,
            100% {
                transform: translateY(0px) rotate(0deg);
            }

            50% {
                transform: translateY(-20px) rotate(180deg);
            }
        }

        .gradient-text {
            background: linear-gradient(135deg, #ea580c, #fb923c);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .input-glow:focus {
            box-shadow: 0 0 20px rgba(234, 88, 12, 0.3);
            border-color: #ea580c;
        }

        .btn-glow {
            box-shadow: 0 4px 15px rgba(234, 88, 12, 0.4);
            transition: all 0.3s ease;
        }

        .btn-glow:hover {
            box-shadow: 0 6px 25px rgba(234, 88, 12, 0.6);
            transform: translateY(-2px);
        }

        .form-container {
            animation: slideInUp 0.8s ease-out;
        }

        @keyframes slideInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .stagger-animation {
            animation: fadeInUp 0.6s ease-out forwards;
            opacity: 0;
        }

        .stagger-animation:nth-child(1) {
            animation-delay: 0.1s;
        }

        .stagger-animation:nth-child(2) {
            animation-delay: 0.2s;
        }

        .stagger-animation:nth-child(3) {
            animation-delay: 0.3s;
        }

        .stagger-animation:nth-child(4) {
            animation-delay: 0.4s;
        }

        .stagger-animation:nth-child(5) {
            animation-delay: 0.5s;
        }

        .stagger-animation:nth-child(6) {
            animation-delay: 0.6s;
        }

        @keyframes fadeInUp {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .ripple {
            position: absolute;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.3);
            transform: scale(0);
            animation: ripple-animation 0.6s linear;
            pointer-events: none;
        }
        
        @keyframes ripple-animation {
            to {
                transform: scale(4);
                opacity: 0;
            }
        }
    </style>

    @livewireStyles
</head>

<body class="min-h-screen gradient-bg font-source">
    <div id="app">
        {{-- Aquí se inyecta el contenido del slot --}}
        {{ $slot }}
    </div>

    @livewireScripts
    {{-- Slot opcional para scripts extra --}}
    @isset($scripts)
        {{ $scripts }}
    @endisset
</body>

</html>
