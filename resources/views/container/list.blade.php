@extends('components.layouts.app.app')

@section('content')
    <div class="container">
        <h1>Lista De Articulos</h1>
    </div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="table-responsive">
                <table class="table table-primary">
                    <thead>
                        <tr>
                            <th scope="col">Nombre del instructor</th>
                            <th scope="col">Categoria</th>
                            <th scope="col">Fecha</th>
                            @can('events.edit')
                                <th scope="col">Acciones</th>
                            @endcan
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($datos as $evt)
                        <tr>
                            <td>{{ $evt->instructor_name }}</td>
                            <td>{{ $evt->type_class }}</td>
                            <td>{{ $evt->date_hour }}</td>
                            @can('events.edit')
                                <td>
                                    <!-- Botón Editar -->
                                    <a href="{{ route('events.edit', $evt->id) }}" class="btn btn-sm btn-warning me-2" title="Editar">
                                        <i class="fa fa-edit"></i>
                                    </a>

                                    <!-- Botón Eliminar solo si tiene permiso -->
                                    <form action="{{ route('events.destroy', $evt->id) }}" method="POST" style="display:inline-block;"
                                        onsubmit="return confirm('¿Seguro que deseas eliminar este artículo?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" title="Eliminar">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            @endcan
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- FontAwesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
@endsection
