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
