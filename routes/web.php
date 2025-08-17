<?php

use App\Http\Controllers\EventController;
use App\Http\Controllers\InstructorController;
use App\Livewire\Settings\Appearance;
use App\Livewire\Settings\Password;
use App\Livewire\Settings\Profile;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');


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

    // Participar en evento (cliente)
    Route::post('/events/{event}/participate', [EventController::class, 'participate'])
        ->name('events.participate')
        ->middleware('permission:events.participate');

    // Cancelar participación (cliente)
    Route::post('/events/{event}/cancel', [EventController::class, 'cancel'])
        ->name('events.cancel')
        ->middleware('permission:events.cancel');

    Route::get('/instructors', [InstructorController::class, 'index'])
        ->name('instructors.index')
        ->middleware('permission:instructors.index');

    Route::get('/instructors/create', [InstructorController::class, 'create'])
        ->name('instructors.create')
        ->middleware('permission:instructors.create');

    Route::post('/instructors', [InstructorController::class, 'store'])
        ->name('instructors.store')
        ->middleware('permission:instructors.create');

    Route::get('/instructors/{instructor}/edit', [InstructorController::class, 'edit'])
        ->name('instructors.edit')
        ->middleware('permission:instructors.edit');

    Route::put('/instructors/{instructor}', [InstructorController::class, 'update'])
        ->name('instructors.update')
        ->middleware('permission:instructors.edit');

    Route::delete('/instructors/{instructor}', [InstructorController::class, 'destroy'])
        ->name('instructors.destroy')
        ->middleware('permission:instructors.delete');
});


require __DIR__ . '/auth.php';
