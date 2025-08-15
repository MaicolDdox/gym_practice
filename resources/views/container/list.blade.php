@extends('components.layouts.app.app')

@section('content')
    <div class="min-h-screen bg-gradient-to-br from-gray-50 via-slate-100 to-gray-100 relative">

        <!-- Elementos decorativos -->
        <div class="absolute inset-0 overflow-hidden pointer-events-none">
            <div class="absolute top-20 left-10 w-72 h-72 bg-purple-500/5 rounded-full blur-3xl animate-pulse"></div>
            <div class="absolute bottom-20 right-10 w-96 h-96 bg-gray-400/5 rounded-full blur-3xl animate-pulse delay-1000">
            </div>
            <div
                class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-64 h-64 bg-purple-300/5 rounded-full blur-2xl animate-pulse delay-500">
            </div>
        </div>

        <div class="relative z-10 container mx-auto px-4 py-8">

            <!-- Encabezado -->
            <div class="text-center mb-12">
                <h1
                    class="text-5xl font-bold bg-gradient-to-r from-gray-800 via-gray-700 to-purple-600 bg-clip-text text-transparent mb-4 font-[Space_Grotesk]">
                    Lista de Eventos
                </h1>
                @can('events.create')
                    <!-- Botón Crear Evento -->
                    <button type="button"
                        class="bg-gradient-to-r from-purple-600 to-purple-700 hover:from-purple-700 hover:to-purple-800 text-white px-4 py-2 rounded-lg font-medium transition-all duration-300 transform hover:scale-105 shadow-lg hover:shadow-purple-500/25 border border-purple-500/30"
                        data-bs-toggle="modal" data-bs-target="#crearArticuloModal">
                        <i class="fas fa-plus mr-2"></i> Crear Evento
                    </button>
                </div>
            @endcan

            <!-- Tabla -->
            <div class="glass-effect rounded-2xl overflow-hidden shadow-2xl backdrop-blur-xl border border-gray-200/50">
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead class="bg-gradient-to-r from-gray-100/80 to-purple-100/60 backdrop-blur-sm">
                            <tr>
                                <th
                                    class="px-6 py-4 text-left text-sm font-semibold text-gray-700 uppercase tracking-wider border-b border-gray-200/30">
                                    Nombre del Instructor</th>
                                <th
                                    class="px-6 py-4 text-left text-sm font-semibold text-gray-700 uppercase tracking-wider border-b border-gray-200/30">
                                    Categoría</th>
                                <th
                                    class="px-6 py-4 text-left text-sm font-semibold text-gray-700 uppercase tracking-wider border-b border-gray-200/30">
                                    Fecha</th>
                                @can('events.edit')
                                    <th
                                        class="px-6 py-4 text-center text-sm font-semibold text-gray-700 uppercase tracking-wider border-b border-gray-200/30">
                                        Acciones</th>
                                @endcan
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200/20">
                            @foreach ($datos as $evt)
                                <tr class="hover:bg-gray-50/50 transition-all duration-300 group">
                                    <td class="px-6 py-4 text-gray-800 font-medium">{{ $evt->instructor_name }}</td>
                                    <td class="px-6 py-4">
                                        <span
                                            class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-purple-100 text-purple-700 border border-purple-200">
                                            {{ $evt->type_class }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 text-gray-600">{{ $evt->date_hour }}</td>
                                    @can('events.edit')
                                        <td class="px-6 py-4">
                                            <div class="flex items-center justify-center space-x-3">

                                                <!-- Botón Editar -->
                                                <a href="{{ route('events.edit', $evt->id) }}"
                                                    class="bg-gradient-to-r from-gray-500 to-gray-600 hover:from-gray-600 hover:to-gray-700 text-white p-2 rounded-lg transition-all duration-300 transform hover:scale-110 shadow-lg hover:shadow-gray-500/25 border border-gray-400/30"
                                                    title="Editar">
                                                    <i class="fas fa-edit"></i>
                                                </a>

                                                <!-- Botón Eliminar -->
                                                <form action="{{ route('events.destroy', $evt->id) }}" method="POST"
                                                    class="inline-block"
                                                    onsubmit="return confirm('¿Seguro que deseas eliminar este evento?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                        class="bg-gradient-to-r from-red-500 to-red-600 hover:from-red-600 hover:to-red-700 text-white p-2 rounded-lg transition-all duration-300 transform hover:scale-110 shadow-lg hover:shadow-red-500/25 border border-red-400/30"
                                                        title="Eliminar">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    @endcan
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="crearArticuloModal" tabindex="-1" aria-labelledby="crearArticuloModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content bg-transparent border-0">
                    <div
                        class="glass-effect rounded-2xl overflow-hidden shadow-2xl backdrop-blur-xl border border-gray-200/50">

                        <!-- Encabezado del modal -->
                        <div
                            class="bg-gradient-to-r from-gray-100/80 to-purple-100/60 backdrop-blur-sm px-6 py-4 border-b border-gray-200/30">
                            <div class="flex items-center justify-between">
                                <h5 class="text-xl font-bold text-gray-800 font-[Space_Grotesk]">Crear Nuevo Evento</h5>
                                <button type="button"
                                    class="text-gray-600 hover:text-gray-800 transition-colors duration-200"
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
                                    <label for="instructor_name"
                                        class="block text-sm font-semibold text-gray-700 mb-2">Nombre del Instructor</label>
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

        <!-- Estilos -->
        <style>
            .glass-effect {
                background: rgba(255, 255, 255, 0.85);
                backdrop-filter: blur(20px);
                -webkit-backdrop-filter: blur(20px);
            }

            .modal-backdrop {
                background-color: rgba(0, 0, 0, 0.6);
            }

            .modal.fade .modal-dialog {
                transition: transform 0.3s ease-out;
            }

            tbody tr:hover {
                transform: translateY(-1px);
                box-shadow: 0 4px 20px rgba(139, 92, 246, 0.1);
            }
        </style>


        <!-- Scripts -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
        <link
            href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@400;600;700&family=DM+Sans:wght@300;400;600&display=swap"
            rel="stylesheet">
    </div>
@endsection
