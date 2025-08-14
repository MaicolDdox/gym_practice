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
                <div class="flex flex-col gap-6">
                    <x-auth-header :title="__('Crear una cuenta')" :description="__('Ingresa tus datos para crear tu cuenta')" />

                    <!-- Session Status -->
                    <x-auth-session-status class="text-center" :status="session('status')" />

                    <form method="POST" wire:submit="register" class="flex flex-col gap-6">
                        @csrf
                        <!-- Name -->
                        <div class="stagger-animation" style="transform: translateY(20px);">
                            <flux:input wire:model="name" :label="__('Nombre completo')" type="text" required
                                autofocus autocomplete="name" :placeholder="__('Tu nombre completo')"
                                style="color: black;"
                                class="input-glow bg-white/90 border-gym-orange/20 rounded-xl px-4 py-3 text-gym-dark placeholder-gym-dark/50 focus:border-gym-orange focus:ring-gym-orange transition-all duration-300" />
                        </div>

                        <!-- Email Address -->
                        <div class="stagger-animation" style="transform: translateY(20px);">
                            <flux:input wire:model="email" :label="__('Correo electrónico')" type="email" required
                                autocomplete="email" placeholder="correo@ejemplo.com"
                                style="color: black;"
                                class="input-glow bg-white/90 border-gym-orange/20 rounded-xl px-4 py-3 text-gym-dark placeholder-gym-dark/50 focus:border-gym-orange focus:ring-gym-orange transition-all duration-300" />
                        </div>

                        <!-- Password -->
                        <div class="stagger-animation" style="transform: translateY(20px);">
                            <flux:input wire:model="password" :label="__('Contraseña')" type="password" required
                                autocomplete="new-password" :placeholder="__('Tu contraseña')" viewable
                                style="color: black;"
                                class="input-glow bg-white/90 border-gym-orange/20 rounded-xl px-4 py-3 text-gym-dark placeholder-gym-dark/50 focus:border-gym-orange focus:ring-gym-orange transition-all duration-300" />
                        </div>

                        <!-- Confirm Password -->
                        <div class="stagger-animation" style="transform: translateY(20px);">
                            <flux:input wire:model="password_confirmation" :label="__('Confirmar contraseña')"
                                type="password" required autocomplete="new-password"
                                :placeholder="__('Confirma tu contraseña')" viewable
                                style="color: black;"
                                class="input-glow bg-white/90 border-gym-orange/20 rounded-xl px-4 py-3 text-gym-dark placeholder-gym-dark/50 focus:border-gym-orange focus:ring-gym-orange transition-all duration-300" />
                        </div>

                        <!-- Submit Button -->
                        <div class="flex items-center justify-end stagger-animation"
                            style="transform: translateY(20px);">
                            <flux:button type="submit" variant="primary"
                                class="w-full btn-glow bg-gradient-to-r from-gym-orange to-gym-orange-light hover:from-gym-orange-dark hover:to-gym-orange text-white font-semibold py-3 px-6 rounded-xl transition-all duration-300 transform hover:scale-105">
                                {{ __('Crear cuenta') }}
                            </flux:button>
                        </div>
                    </form>

                    <!-- Login Link -->
                    <div class="space-x-1 rtl:space-x-reverse text-center text-sm text-gym-dark/70 stagger-animation"
                        style="transform: translateY(20px);">
                        <span>{{ __('¿Ya tienes una cuenta?') }}</span>
                        <flux:link :href="route('register')" wire:navigate
                            class="text-gym-orange hover:text-gym-orange-dark font-semibold transition-colors duration-300 hover:underline">
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
