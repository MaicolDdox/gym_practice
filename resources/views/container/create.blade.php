@extends('components.layouts.app.app')

@section('content')
    @can('events.create')
        <!-- Modal -->
        <div class="modal fade" id="crearArticuloModal" tabindex="-1" aria-labelledby="crearArticuloModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content bg-transparent border-0">
                    <div class="glass-effect rounded-2xl overflow-hidden shadow-2xl backdrop-blur-xl border border-gray-200/50">

                        <!-- Encabezado del modal -->
                        <div
                            class="bg-gradient-to-r from-gray-100/80 to-purple-100/60 backdrop-blur-sm px-6 py-4 border-b border-gray-200/30">
                            <div class="flex items-center justify-between">
                                <h5 class="text-xl font-bold text-gray-800 font-[Space_Grotesk]">Crear Nuevo Evento</h5>
                                <button type="button" class="text-gray-600 hover:text-gray-800 transition-colors duration-200"
                                    data-bs-dismiss="modal" aria-label="Cerrar">
                                    <i class="fas fa-times text-xl"></i>
                                </button>
                            </div>
                        </div>

                        <!-- Cuerpo del modal -->
                        <div class="p-6">
                            <form action="{{ route('events.store') }}" method="POST" enctype="multipart/form-data"
                                class="space-y-6">
                                @csrf

                                <!-- Nombre del instructor -->
                                <div>
                                    <label for="instructor_name" class="block text-sm font-semibold text-gray-700 mb-2">Nombre
                                        del Instructor</label>
                                    <input type="text" name="instructor_name" id="instructor_name"
                                        placeholder="Ingrese el nombre del instructor"
                                        class="w-full px-4 py-3 bg-white/80 border border-gray-300 rounded-lg text-gray-800 placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all duration-300 backdrop-blur-sm">
                                </div>

                                <!-- Tipo de clase -->
                                <div>
                                    <label for="type_class" class="block text-sm font-semibold text-gray-700 mb-2">Tipo de
                                        Clase</label>
                                    <select name="type_class" id="type_class"
                                        class="w-full px-4 py-3 bg-white/80 border border-gray-300 rounded-lg text-gray-800 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all duration-300 backdrop-blur-sm">
                                        <option value="" disabled selected>Selecciona una clase</option>
                                        <option value="electronica">Electrónica</option>
                                        <option value="ropa">Yoga</option>
                                        <option value="hogar">Spa</option>
                                        <option value="comida">Aeróbicos</option>
                                    </select>
                                </div>

                                <!-- Fecha -->
                                <div>
                                    <label for="date_hour" class="block text-sm font-semibold text-gray-700 mb-2">Fecha y
                                        Hora</label>
                                    <input type="datetime-local" name="date_hour" id="date_hour"
                                        class="w-full px-4 py-3 bg-white/80 border border-gray-300 rounded-lg text-gray-800 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all duration-300 backdrop-blur-sm">
                                </div>

                                <!-- Botón Guardar -->
                                <div class="text-center pt-4">
                                    @can('events.create')
                                        <button type="submit"
                                            class="bg-gradient-to-r from-purple-600 to-purple-700 hover:from-purple-700 hover:to-purple-800 text-white px-8 py-3 rounded-lg font-semibold transition-all duration-300 transform hover:scale-105 shadow-lg hover:shadow-purple-500/25 border border-purple-500/30">
                                            <i class="fas fa-save mr-2"></i> Guardar Evento
                                        </button>
                                    @endcan
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endcan
@endsection
