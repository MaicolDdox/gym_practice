@extends('components.layouts.app.app')

@section('content')
    <div class="container mt-5">
        <h1 class="text-center mb-4">Formulario Para Crear Artículos</h1>

        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow">
                    <div class="card-body bg-light">
                        <form action="{{ route('events.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <!-- Nombre del instructor -->
                            <div class="mb-3">
                                <label for="nombre" class="form-label">Nombre del instructor</label>
                                <input type="text" class="form-control" name="instructor_name" id="instructor_name"
                                    placeholder="Ingrese el nombre">
                            </div>

                            <!-- Categoría -->
                            <div class="mb-3">
                                <label for="type_class" class="form-label">Tipo de clase</label>
                                <select class="form-select" name="type_class" id="type_class">
                                    <option disabled selected>Selecciona una clase</option>
                                    <option value="electronica">Electrónica</option>
                                    <option value="ropa">Yoga</option>
                                    <option value="hogar">Spa</option>
                                    <option value="comida">Aerobicos</option>
                                </select>
                            </div>

                            <!-- fecha -->
                            <div class="mb-3">
                                <label for="datetime-local" class="form-label">Fecha</label>
                                <input type="datetime-local" class="form-control" name="date_hour" id="date_hour"
                                    placeholder="Ingrese la fecha">
                            </div>


                            <!-- Botón Enviar -->
                            <div class="text-center">
                                @can('events.create')                                                                    
                                <button type="submit" class="btn btn-primary px-5">Guardar Artículo</button>
                                @endcan
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
