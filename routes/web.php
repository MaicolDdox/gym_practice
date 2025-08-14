<?php

use App\Http\Controllers\EventController;
use App\Livewire\Settings\Appearance;
use App\Livewire\Settings\Password;
use App\Livewire\Settings\Profile;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

// Dashboard por defecto (Laravel Breeze/Jetstream)
Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

// Dashboard que carga tu vista desde EventController
Route::get('/dashboard', [EventController::class, 'home'])
    ->middleware(['auth']) // protegido por login
    ->name('dashboard');

// Solo usuarios autenticados
Route::middleware(['auth'])->group(function () {

    // Lista de eventos
    Route::get('/events', [EventController::class, 'index'])
        ->name('events.index')
        ->middleware('permission:events.index');

    // Formulario crear evento
    Route::get('/events/create', [EventController::class, 'create'])
        ->name('events.create')
        ->middleware('permission:events.create');

    // Guardar evento
    Route::post('/events', [EventController::class, 'store'])
        ->name('events.store')
        ->middleware('permission:events.create');

    // Editar evento
    Route::get('/events/{event}/edit', [EventController::class, 'edit'])
        ->name('events.edit')
        ->middleware('permission:events.edit');

    Route::put('/events/{event}', [EventController::class, 'update'])
        ->name('events.update')
        ->middleware('permission:events.edit');

    // Eliminar evento
    Route::delete('/events/{event}', [EventController::class, 'destroy'])
        ->name('events.destroy')
        ->middleware('permission:events.delete');
});


require __DIR__ . '/auth.php';
