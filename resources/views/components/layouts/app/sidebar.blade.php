<div class="h-full flex flex-col">
    <!-- Logo/Header -->
    <div class="p-6 border-b border-gray-200">
        <div class="flex items-center space-x-3">
            <div class="w-10 h-10 bg-purple-100 rounded-lg flex items-center justify-center">
                <i class="fas fa-dumbbell text-purple-600 text-lg"></i>
            </div>
            <div>
                <!-- Updated fonts and colors to professional palette -->
                <h2 class="font-space font-bold text-xl text-gray-800">GymReserva</h2>
                <p class="text-gray-600 text-sm font-light">Panel de Control</p>
            </div>
        </div>
    </div>

    <!-- Navigation Menu -->
    <nav class="flex-1 p-4 space-y-2">
        <div class="mb-6">
            <!-- Updated header styling with professional colors -->
            <h4 class="font-space font-semibold text-gray-700 text-lg mb-4 px-3">
                <i class="fas fa-th-large mr-2 text-gray-500"></i>
                Menú Principal
            </h4>

            <!-- Dashboard/Inicio -->
            <!-- Updated navigation items with professional hover states -->
            <a href="{{ route('dashboard') }}"
                class="nav-item flex items-center px-4 py-3 rounded-xl text-gray-700 hover:text-gray-900 transition-all duration-300 group">
                <div
                    class="w-10 h-10 bg-gray-100 rounded-lg flex items-center justify-center mr-3 group-hover:bg-purple-100 transition-colors">
                    <i class="fas fa-home text-sm group-hover:text-purple-600"></i>
                </div>
                <span class="font-medium">Inicio</span>
                <i
                    class="fas fa-chevron-right ml-auto opacity-0 group-hover:opacity-100 transition-opacity text-purple-600"></i>
            </a>

            <!-- Eventos Dropdown -->
            <div class="dropdown-section">
                <button onclick="toggleDropdown('eventos')"
                    class="dropdown-toggle w-full flex items-center px-4 py-3 rounded-xl text-gray-700 hover:text-gray-900 transition-all duration-300 group">
                    <div
                        class="w-10 h-10 bg-gray-100 rounded-lg flex items-center justify-center mr-3 group-hover:bg-purple-100 transition-colors">
                        <i class="fas fa-calendar-alt text-sm group-hover:text-purple-600"></i>
                    </div>
                    <span class="font-medium">Eventos</span>
                    <i class="fas fa-chevron-down ml-auto transition-transform duration-300 text-purple-600"
                        id="eventos-arrow"></i>
                </button>

                <div class="dropdown-content hidden pl-6 mt-2 space-y-1" id="eventos-content">
                    <!-- Lista de Eventos -->
                    <a href="{{ route('events.index') }}"
                        class="nav-item flex items-center px-4 py-2 rounded-lg text-gray-600 hover:text-gray-800 hover:bg-gray-50 transition-all duration-200 group">
                        <div
                            class="w-8 h-8 bg-gray-50 rounded-lg flex items-center justify-center mr-3 group-hover:bg-purple-50 transition-colors">
                            <i class="fas fa-list text-xs group-hover:text-purple-600"></i>
                        </div>
                        <span class="text-sm font-medium">Lista de Eventos</span>
                    </a>

                    @can('events.create')
                        <!-- Crear Evento -->
                        <a href="{{ route('events.create') }}"
                            class="nav-item flex items-center px-4 py-2 rounded-lg text-gray-600 hover:text-gray-800 hover:bg-gray-50 transition-all duration-200 group">
                            <div
                                class="w-8 h-8 bg-gray-50 rounded-lg flex items-center justify-center mr-3 group-hover:bg-purple-50 transition-colors">
                                <i class="fas fa-plus text-xs group-hover:text-purple-600"></i>
                            </div>
                            <span class="text-sm font-medium">Crear Evento</span>
                        </a>
                    @endcan
                </div>
            </div>

            <!-- Instructores Dropdown -->
            <div class="dropdown-section mt-2">
                <button onclick="toggleDropdown('instructores')"
                    class="dropdown-toggle w-full flex items-center px-4 py-3 rounded-xl text-gray-700 hover:text-gray-900 transition-all duration-300 group">
                    <div
                        class="w-10 h-10 bg-gray-100 rounded-lg flex items-center justify-center mr-3 group-hover:bg-purple-100 transition-colors">
                        <i class="fas fa-users text-sm group-hover:text-purple-600"></i>
                    </div>
                    <span class="font-medium">Instructores</span>
                    <i class="fas fa-chevron-down ml-auto transition-transform duration-300 text-purple-600"
                        id="instructores-arrow"></i>
                </button>

                <div class="dropdown-content hidden pl-6 mt-2 space-y-1" id="instructores-content">
                    <!-- Lista de Instructores -->
                    <a href="{{ route('instructors.index') }}"
                        class="nav-item flex items-center px-4 py-2 rounded-lg text-gray-600 hover:text-gray-800 hover:bg-gray-50 transition-all duration-200 group">
                        <div
                            class="w-8 h-8 bg-gray-50 rounded-lg flex items-center justify-center mr-3 group-hover:bg-purple-50 transition-colors">
                            <i class="fas fa-list text-xs group-hover:text-purple-600"></i>
                        </div>
                        <span class="text-sm font-medium">Lista de Instructores</span>
                    </a>

                    <!-- Crear Instructor -->
                    <a href="{{ route('instructors.create') }}"
                        class="nav-item flex items-center px-4 py-2 rounded-lg text-gray-600 hover:text-gray-800 hover:bg-gray-50 transition-all duration-200 group">
                        <div
                            class="w-8 h-8 bg-gray-50 rounded-lg flex items-center justify-center mr-3 group-hover:bg-purple-50 transition-colors">
                            <i class="fas fa-user-plus text-xs group-hover:text-purple-600"></i>
                        </div>
                        <span class="text-sm font-medium">Crear Instructor</span>
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <!-- User Profile Section -->
    <div class="p-4 border-t border-gray-200">
        <!-- Updated user profile section with professional styling -->
        <div
            class="flex items-center space-x-3 p-3 rounded-xl bg-gray-50 hover:bg-gray-100 transition-colors cursor-pointer">
            <div class="w-10 h-10 bg-purple-100 rounded-full flex items-center justify-center">
                <i class="fas fa-user text-purple-600 text-sm"></i>
            </div>
            <div class="flex-1">
                <p class="text-gray-800 font-medium text-sm">Usuario</p>
                <p class="text-gray-600 text-xs">{{ auth()->user()->name }}</p>
            </div>
            <i class="fas fa-cog text-gray-500 hover:text-purple-600 transition-colors"></i>
        </div>
    </div>
</div>

<!-- JavaScript for dropdown functionality -->
<script>
function toggleDropdown(section) {
    const content = document.getElementById(section + '-content');
    const arrow = document.getElementById(section + '-arrow');
    
    if (content.classList.contains('hidden')) {
        // Show dropdown
        content.classList.remove('hidden');
        arrow.style.transform = 'rotate(180deg)';
    } else {
        // Hide dropdown
        content.classList.add('hidden');
        arrow.style.transform = 'rotate(0deg)';
    }
}
</script>
