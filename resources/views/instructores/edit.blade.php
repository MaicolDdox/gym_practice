@extends('components.layouts.app.app')

@section('content')
    @can('instructors.edit')

        <!-- Modal -->
        <div class="modal fade" id="editarInstructorModal" tabindex="-1" aria-labelledby="editarInstructorModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content bg-transparent border-0">
                    <div class="glass-effect rounded-2xl overflow-hidden shadow-2xl backdrop-blur-xl border border-gray-200/50">

                        <!-- Encabezado -->
                        <div class="bg-gradient-to-r from-gray-100/80 to-purple-100/60 backdrop-blur-sm px-6 py-4 border-b border-gray-200/30">
                            <div class="flex items-center justify-between">
                                <h5 class="text-xl font-bold text-gray-800 font-[Space_Grotesk]">Editar Instructor</h5>
                                <button type="button" class="text-gray-600 hover:text-gray-800 transition-colors duration-200"
                                    data-bs-dismiss="modal" aria-label="Cerrar">
                                    <i class="fas fa-times text-xl"></i>
                                </button>
                            </div>
                        </div>

                        <!-- Cuerpo -->
                        <div class="p-6">
                            <form action="{{ route('instructors.update', $instructor->id) }}" method="POST" class="space-y-6">
                                @csrf
                                @method('PUT')

                                <!-- Nombre -->
                                <div>
                                    <label for="name" class="block text-sm font-semibold text-gray-700 mb-2">Nombre</label>
                                    <input type="text" name="name" id="name" value="{{ old('name', $instructor->name) }}"
                                        placeholder="Ingrese el nombre del instructor"
                                        class="w-full px-4 py-3 bg-white/80 border border-gray-300 rounded-lg text-gray-800 placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all duration-300 backdrop-blur-sm">
                                    @error('name') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
                                </div>

                                <!-- Correo -->
                                <div>
                                    <label for="email" class="block text-sm font-semibold text-gray-700 mb-2">Correo Electrónico</label>
                                    <input type="email" name="email" id="email" value="{{ old('email', $instructor->email) }}"
                                        placeholder="ejemplo@correo.com"
                                        class="w-full px-4 py-3 bg-white/80 border border-gray-300 rounded-lg text-gray-800 placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all duration-300 backdrop-blur-sm">
                                    @error('email') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
                                </div>

                                <!-- Contraseña (opcional en edición) -->
                                <div>
                                    <label for="password" class="block text-sm font-semibold text-gray-700 mb-2">Contraseña (opcional)</label>
                                    <input type="password" name="password" id="password"
                                        placeholder="Dejar en blanco si no desea cambiarla"
                                        class="w-full px-4 py-3 bg-white/80 border border-gray-300 rounded-lg text-gray-800 placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all duration-300 backdrop-blur-sm">
                                    @error('password') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
                                </div>

                                <!-- Confirmación de contraseña -->
                                <div>
                                    <label for="password_confirmation" class="block text-sm font-semibold text-gray-700 mb-2">Confirmar Contraseña</label>
                                    <input type="password" name="password_confirmation" id="password_confirmation"
                                        class="w-full px-4 py-3 bg-white/80 border border-gray-300 rounded-lg text-gray-800 placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all duration-300 backdrop-blur-sm">
                                </div>

                                <!-- Botón Guardar -->
                                <div class="text-center pt-4">
                                    <button type="submit"
                                        class="bg-gradient-to-r from-purple-600 to-purple-700 hover:from-purple-700 hover:to-purple-800 text-white px-8 py-3 rounded-lg font-semibold transition-all duration-300 transform hover:scale-105 shadow-lg hover:shadow-purple-500/25 border border-purple-500/30">
                                        <i class="fas fa-save mr-2"></i> Actualizar Instructor
                                    </button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    @endcan
@endsection
