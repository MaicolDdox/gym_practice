<x-layouts.auth :title="__('Registrarse')">
    <!-- Floating Background Shapes -->
    <div class="floating-shapes">
        <div class="floating-shape"></div>
        <div class="floating-shape"></div>
        <div class="floating-shape"></div>
        <div class="floating-shape"></div>
    </div>

    <!-- Main Container -->
    <div class="min-h-screen flex items-center justify-center px-4 py-8 relative z-10">
        <div class="w-full max-w-md">
            <!-- Logo/Brand Section -->
            <div class="text-center mb-8 stagger-animation" style="transform: translateY(20px);">
                <div
                    class="inline-flex items-center justify-center w-16 h-16 bg-gradient-to-r from-gym-orange to-gym-orange-light rounded-full mb-4 shadow-lg">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                    </svg>
                </div>
                <h1 class="text-4xl font-playfair font-bold text-white mb-2">GymReserva</h1>
                <p class="text-white/80 font-source">Tu gimnasio, tu horario, tu éxito</p>
            </div>

            <!-- Register Form Container -->
            <div class="glass-effect rounded-2xl p-8 shadow-2xl form-container">
                <div class="flex flex-col gap-6" style="color: black">
                    <!-- Changed text colors to dark for better contrast on white background -->
                    <div class="text-center">
                        <h2 class="text-2xl font-space-grotesk font-bold text-primary mb-2">{{ __('Crear Cuenta') }}</h2>
                        <p class="text-neutral-dark font-dm-sans">{{ __('Ingresa tus datos para crear cuenta') }}</p>
                    </div>

                    <!-- Session Status -->
                    <x-auth-session-status class="text-center" :status="session('status')" />

                    <form method="POST" wire:submit="register" class="flex flex-col gap-6">
                        @csrf
                        <!-- Name -->
                        <div class="stagger-animation" style="transform: translateY(20px);">
                            <label class="block text-sm font-medium text-primary">{{ __('Nombre Completo') }}</label>
                            <flux:input wire:model="name" type="text" required
                                autofocus autocomplete="name" :placeholder="__('Tu nombre completo')"
                                style="color: black;"
                                class="input-focus w-full px-4 py-3 bg-white border border-gray-300 rounded-xl text-primary placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-accent focus:border-transparent transition-all duration-300" />
                        </div>

                        <!-- Email Address -->
                        <div class="stagger-animation" style="transform: translateY(20px);">
                            <label class="block text-sm font-medium text-primary">{{ __('Correo electronico') }}</label>
                            <flux:input wire:model="email" type="email" required
                                autocomplete="email" placeholder="correo@ejemplo.com"
                                style="color: black;"
                                class="input-glow bg-white/90 border-gym-orange/20 rounded-xl px-4 py-3 text-gym-dark placeholder-gym-dark/50 focus:border-gym-orange focus:ring-gym-orange transition-all duration-300" />
                        </div>

                        <!-- Password -->
                        <div class="stagger-animation" style="transform: translateY(20px);">
                            <label class="block text-sm font-medium text-primary">{{ __('Contraseña') }}</label>
                            <flux:input wire:model="password" type="password" required
                                autocomplete="new-password" :placeholder="__('Tu contraseña')" viewable
                                style="color: black;"
                                class="input-glow bg-white/90 border-gym-orange/20 rounded-xl px-4 py-3 text-gym-dark placeholder-gym-dark/50 focus:border-gym-orange focus:ring-gym-orange transition-all duration-300" />
                        </div>

                        <!-- Confirm Password -->
                        <div class="stagger-animation" style="transform: translateY(20px);">
                            <label class="block text-sm font-medium text-primary">{{ __('Confirmar contraseña') }}</label>
                            <flux:input wire:model="password_confirmation"
                                type="password" required autocomplete="new-password"
                                :placeholder="__('Confirma tu contraseña')" viewable
                                style="color: black;"
                                class="input-glow bg-white/90 border-gym-orange/20 rounded-xl px-4 py-3 text-gym-dark placeholder-gym-dark/50 focus:border-gym-orange focus:ring-gym-orange transition-all duration-300" />
                        </div>

                    <!-- Register Button -->
                        <div class="flex items-center justify-end">
                            <flux:button variant="primary" type="submit"
                                class="w-full bg-gradient-to-r from-accent to-accent/80 hover:from-accent/90 hover:to-accent text-white font-semibold py-4 px-6 rounded-xl shadow-lg hover:shadow-xl transform hover:scale-105 transition-all duration-300 pulse-glow">
                                <span class="flex items-center justify-center gap-2">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1">
                                        </path>
                                    </svg>
                                    {{ __('Crear cuenta') }}
                                </span>
                            </flux:button>
                        </div>
                    </form>

                    <!-- Login Link -->
                    <div class="space-x-1 rtl:space-x-reverse text-center text-sm text-neutral-dark"
                        style="transform: translateY(20px);">
                        <span>{{ __('¿Ya tienes una cuenta?') }}</span>
                        <flux:link :href="route('login')" wire:navigate
                            class="text-accent hover:text-accent-dark font-semibold transition-colors duration-300 hover:underline">
                            {{ __('Iniciar sesión') }}
                        </flux:link>
                    </div>
                </div>
            </div>

            <!-- Footer -->
            <div class="text-center mt-8 text-gym-dark/60 text-sm stagger-animation"
                style="transform: translateY(20px);">
                <p>&copy; 2024 GymReserva. Todos los derechos reservados.</p>
            </div>
        </div>
    </div>

    @slot('scripts')
        <script>
            // Add smooth interactions
            document.addEventListener('DOMContentLoaded', function() {
                // Add focus effects to inputs
                const inputs = document.querySelectorAll('input');
                inputs.forEach(input => {
                    input.addEventListener('focus', function() {
                        this.parentElement.style.transform = 'scale(1.02)';
                    });

                    input.addEventListener('blur', function() {
                        this.parentElement.style.transform = 'scale(1)';
                    });
                });

                // Add click effect to button
                const button = document.querySelector('button[type="submit"]');
                if (button) {
                    button.addEventListener('click', function(e) {
                        const ripple = document.createElement('span');
                        const rect = this.getBoundingClientRect();
                        const size = Math.max(rect.width, rect.height);
                        const x = e.clientX - rect.left - size / 2;
                        const y = e.clientY - rect.top - size / 2;

                        ripple.style.width = ripple.style.height = size + 'px';
                        ripple.style.left = x + 'px';
                        ripple.style.top = y + 'px';
                        ripple.classList.add('ripple');

                        this.appendChild(ripple);

                        setTimeout(() => {
                            ripple.remove();
                        }, 600);
                    });
                }
            });
        </script>
    @endslot
</x-layouts.auth>
