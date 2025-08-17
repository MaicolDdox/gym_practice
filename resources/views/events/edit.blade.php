@extends('components.layouts.app.app')

@section('content')
    @can('events.edit')
        <div class="modal fade" id="crearArticuloModal" tabindex="-1" aria-labelledby="crearArticuloModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content bg-transparent border-0">
                    <div class="glass-effect rounded-2xl overflow-hidden shadow-2xl backdrop-blur-xl border border-gray-200/50">

                        <!-- Encabezado del modal -->
                        <div
                            class="bg-gradient-to-r from-gray-100/80 to-purple-100/60 backdrop-blur-sm px-6 py-4 border-b border-gray-200/30">
                            <div class="flex items-center justify-between">
                                <h5 class="text-xl font-bold text-gray-800 font-[Space_Grotesk]">Editar evento</h5>
                                <button type="button" class="text-gray-600 hover:text-gray-800 transition-colors duration-200"
                                    data-bs-dismiss="modal" aria-label="Cerrar">
                                    <i class="fas fa-times text-xl"></i>
                                </button>
                            </div>
                        </div>

                        <!-- Cuerpo del modal -->
                        <div class="p-6">
                            <form action="{{ route('events.update', $event->id) }}" method="POST" enctype="multipart/form-data"
                                class="space-y-6">
                                @csrf
                                @method('PUT')

                                <!-- Nombre del instructor -->
                                <div>
                                    <label for="user_id" class="block text-sm font-semibold text-gray-700 mb-2">
                                        Instructor
                                    </label>
                                    <select name="user_id" id="user_id"
                                        class="w-full px-4 py-3 bg-white/80 border border-gray-300 rounded-lg text-gray-800 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all duration-300 backdrop-blur-sm">
                                        <option value="" disabled>Selecciona un instructor</option>
                                        @foreach ($instructors as $instructor)
                                            <option value="{{ $instructor->id }}"
                                                {{ old('user_id', $event->user_id) == $instructor->id ? 'selected' : '' }}>
                                                {{ $instructor->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <!-- Título del evento -->
                                <div>
                                    <label for="title" class="block text-sm font-semibold text-gray-700 mb-2">
                                        Título del Evento
                                    </label>
                                    <input type="text" name="title" id="title"
                                        class="w-full px-4 py-3 bg-white/80 border border-gray-300 rounded-lg text-gray-800 
                                        focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent 
                                        transition-all duration-300 backdrop-blur-sm"
                                        value="{{ old('title', $event->title) }}">
                                </div>

                                <!-- Tipo de clase -->
                                <div>
                                    <label for="type_class" class="block text-sm font-semibold text-gray-700 mb-2">
                                        Tipo de Clase
                                    </label>
                                    <select name="type_class" id="type_class"
                                        class="w-full px-4 py-3 bg-white/80 border border-gray-300 rounded-lg text-gray-800 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all duration-300 backdrop-blur-sm">
                                        <option value="" disabled>Selecciona una clase</option>
                                        <option value="yoga"
                                            {{ old('type_class', $event->type_class) == 'yoga' ? 'selected' : '' }}>Yoga
                                        </option>
                                        <option value="spa"
                                            {{ old('type_class', $event->type_class) == 'spa' ? 'selected' : '' }}>Spa</option>
                                        <option value="aerobicos"
                                            {{ old('type_class', $event->type_class) == 'aerobicos' ? 'selected' : '' }}>
                                            Aeróbicos</option>
                                    </select>
                                </div>


                                <!-- Fecha -->
                                <div>
                                    <label for="date_hour" class="block text-sm font-semibold text-gray-700 mb-2">Fecha y
                                        Hora</label>
                                    <input type="datetime-local" name="date_hour" id="date_hour"
                                        class="w-full px-4 py-3 bg-white/80 border border-gray-300 rounded-lg text-gray-800 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all duration-300 backdrop-blur-sm"
                                        value="{{ old('date_hour', \Carbon\Carbon::parse($event->date_hour)->format('Y-m-d\TH:i')) }}">
                                </div>

                                <!-- Botón Guardar -->
                                <div class="text-center pt-4">
                                    <button type="submit"
                                        class="bg-gradient-to-r from-purple-600 to-purple-700 hover:from-purple-700 hover:to-purple-800 text-white px-8 py-3 rounded-lg font-semibold transition-all duration-300 transform hover:scale-105 shadow-lg hover:shadow-purple-500/25 border border-purple-500/30">
                                        <i class="fas fa-save mr-2"></i> Actualizar Evento
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
