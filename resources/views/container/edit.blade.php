@extends('components.layouts.app.app')

@section('content')
    <div class="container mt-5">
        <h1 class="text-center mb-4">Formulario Para Editar Artículo</h1>

        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow">
                    <div class="card-body bg-light">
                        <form action="{{ route('events.update', $event->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <!-- Nombre del instructor -->
                            <div class="mb-3">
                                <label for="instructor_name" class="form-label">Nombre del instructor</label>
                                <input type="text" 
                                    class="form-control" 
                                    name="instructor_name" 
                                    id="instructor_name"
                                    value="{{ old('instructor_name', $event->instructor_name) }}"
                                    placeholder="Ingrese el nombre">
                            </div>

                            <!-- Categoría -->
                            <div class="mb-3">
                                <label for="type_class" class="form-label">Tipo de clase</label>
                                <select class="form-select" name="type_class" id="type_class">
                                    <option disabled>Selecciona una clase</option>
                                    <option value="electronica" {{ old('type_class', $event->type_class) == 'electronica' ? 'selected' : '' }}>Electrónica</option>
                                    <option value="ropa" {{ old('type_class', $event->type_class) == 'ropa' ? 'selected' : '' }}>Yoga</option>
                                    <option value="hogar" {{ old('type_class', $event->type_class) == 'hogar' ? 'selected' : '' }}>Spa</option>
                                    <option value="comida" {{ old('type_class', $event->type_class) == 'comida' ? 'selected' : '' }}>Aeróbicos</option>
                                </select>
                            </div>

                            <!-- fecha -->
                            <div class="mb-3">
                                <label for="date_hour" class="form-label">Fecha</label>
                                <input type="datetime-local" 
                                    class="form-control" 
                                    name="date_hour" 
                                    id="date_hour"
                                    value="{{ old('date_hour', \Carbon\Carbon::parse($event->date_hour)->format('Y-m-d\TH:i')) }}">
                            </div>

                            <!-- Botón Enviar -->
                            <div class="text-center">
                                @can('events.edit')                                                                    
                                <button type="submit" class="btn btn-primary px-5">Actualizar Artículo</button>
                                @endcan
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
