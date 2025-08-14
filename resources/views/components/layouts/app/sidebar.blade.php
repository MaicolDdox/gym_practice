<nav class="nav flex-column p-3">
    <h4 class="text-white">Menú</h4>
    <a href="{{ route('dashboard') }}" class="nav-link text-white">Inicio</a>
    @can('events.create')
        <a href="{{ route('events.create') }} " class="nav-link text-white">Crear Evento</a>
    @endcan
    <a href="{{ route('events.index') }}" class="nav-link text-white">lista de Eventos</a>
</nav>
