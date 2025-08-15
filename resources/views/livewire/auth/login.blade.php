<x-layouts.auth :title="__('Iniciar Sesión')">
    <!-- Animated Background Elements -->
    <div class="fixed inset-0 overflow-hidden pointer-events-none">
        <div class="absolute top-20 left-10 w-32 h-32 bg-white/10 rounded-full floating-animation"></div>
        <div class="absolute top-40 right-20 w-24 h-24 bg-primary/20 rounded-full floating-animation-delayed">
        </div>
        <div class="absolute bottom-32 left-1/4 w-40 h-40 bg-white/5 rounded-full floating-animation"></div>
        <div class="absolute bottom-20 right-10 w-28 h-28 bg-primary/10 rounded-full floating-animation-delayed">
        </div>
    </div>

    <div class="min-h-screen flex items-center justify-center px-4 py-12 relative z-10">
        <div class="w-full max-w-md">
            <!-- Logo/Brand Section -->
            <div class="text-center mb-8 slide-in-up">
                <div
                    class="inline-flex items-center justify-center w-20 h-20 bg-white/20 backdrop-blur-sm rounded-full mb-4 pulse-glow">
                    <svg class="w-10 h-10 text-white" fill="currentColor" viewBox="0 0 24 24">
                        <path
                            d="M20.57 14.86L22 13.43 20.57 12 17 15.57 8.43 7 12 3.43 10.57 2 9.14 3.43 7.71 2 5.57 4.14 4.14 2.71 2.71 4.14l1.43 1.43L2 7.71l1.43 1.43L2 10.57 3.43 12 7 8.43 15.57 17 12 20.57 13.43 22l1.43-1.43L16.29 22l2.14-2.14 1.43 1.43 1.43-1.43-1.43-1.43L22 16.29z" />
                    </svg>
                </div>
                <h1 class="text-4xl font-space-grotesk font-bold text-white mb-2">GymReserva</h1>
                <p class="text-white/80 font-dm-sans">Accede a tu cuenta</p>
            </div>

            <!-- Login Form Card -->
            <div class="glass-effect rounded-2xl p-8 shadow-2xl hover-lift slide-in-up">
                <div class="flex flex-col gap-6">
                    <!-- Changed text colors to dark for better contrast on white background -->
                    <div class="text-center">
                        <h2 class="text-2xl font-space-grotesk font-bold text-primary mb-2">{{ __('Iniciar Sesión') }}</h2>
                        <p class="text-neutral-dark font-dm-sans">{{ __('Ingresa tu email y contraseña para acceder') }}</p>
                    </div>

                    <!-- Session Status -->
                    <x-auth-session-status class="text-center" :status="session('status')" />

                    <form method="POST" wire:submit="login" class="flex flex-col gap-6">
                        @csrf

                        <!-- Email Address -->
                        <div class="space-y-2">
                            <label class="block text-sm font-medium text-primary">{{ __('Correo Electrónico') }}</label>
                            <flux:input wire:model="email" type="email" required
                            style="color: black"
                                autofocus autocomplete="email" placeholder="correo@ejemplo.com"
                                class="input-focus w-full px-4 py-3 bg-white border border-gray-300 rounded-xl text-primary placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-accent focus:border-transparent transition-all duration-300" />
                        </div>

                        <!-- Password -->
                        <div class="relative space-y-2">
                            <label class="block text-sm font-medium text-primary">{{ __('Contraseña') }}</label>
                            <flux:input wire:model="password" type="password" required
                            style="color: black"
                                autocomplete="current-password" placeholder="Contraseña" viewable
                                class="input-focus w-full px-4 py-3 bg-white border border-gray-300 rounded-xl text-primary placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-accent focus:border-transparent transition-all duration-300" />
                        </div>

                        <!-- Login Button -->
                        <div class="flex items-center justify-end">
                            <flux:button variant="primary" type="submit"
                                class="w-full bg-gradient-to-r from-accent to-accent/80 hover:from-accent/90 hover:to-accent text-white font-semibold py-4 px-6 rounded-xl shadow-lg hover:shadow-xl transform hover:scale-105 transition-all duration-300 pulse-glow">
                                <span class="flex items-center justify-center gap-2">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1">
                                        </path>
                                    </svg>
                                    {{ __('Iniciar Sesión') }}
                                </span>
                            </flux:button>
                        </div>
                    </form>

                    @if (Route::has('register'))
                        <div class="space-x-1 rtl:space-x-reverse text-center text-sm text-neutral-dark">
                            <span>{{ __('¿No tienes una cuenta?') }}</span>
                            <flux:link :href="route('register')" wire:navigate
                                class="text-accent hover:text-accent-dark font-semibold transition-colors duration-300 hover:underline">
                                {{ __('Regístrate') }}
                            </flux:link>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Footer -->
            <div class="text-center mt-8 text-white/60 text-sm">
                <p>&copy; {{ date('Y') }} GymReserva. Todos los derechos reservados.</p>
            </div>
        </div>
    </div>

    {{-- Scripts específicos para esta vista --}}
    @slot('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const formElements = document.querySelectorAll('form > div');
                formElements.forEach((element, index) => {
                    element.style.animationDelay = `${index * 0.1}s`;
                    element.classList.add('slide-in-up');
                });

                const inputs = document.querySelectorAll('input');
                inputs.forEach(input => {
                    input.addEventListener('focus', function() {
                        this.parentElement.style.transform = 'scale(1.02)';
                    });
                    input.addEventListener('blur', function() {
                        this.parentElement.style.transform = 'scale(1)';
                    });
                });
            });
        </script>
    @endslot
</x-layouts.auth>
