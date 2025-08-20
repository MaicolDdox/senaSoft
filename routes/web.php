<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\SemilleroController;
use App\Http\Controllers\AprendizController;
use App\Http\Controllers\DirectorController;
use App\Livewire\Auth\Login;
use App\Livewire\Auth\Register;


Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/login', Login::class)->name('login');
Route::get('/register', Register::class)->name('register');

Route::get('/dashboard', function () {
    return view('layouts.dashboard');
})->name('dashboard');

// -------------------------
// Rutas protegidas
// -------------------------
Route::middleware(['auth'])->group(function () {

    // -------------------------
    // Rutas de Semilleros
    // -------------------------
    Route::resource('semilleros', SemilleroController::class);

    // -------------------------
    // Rutas de Proyectos
    // -------------------------
    Route::resource('projects', ProjectController::class);

    // -------------------------
    // Rutas de Fases de Proyecto
    // -------------------------
    Route::get('projects/{project}/fases/create', [ProjectController::class, 'createFase'])
        ->name('projects.fases.create');
    Route::post('projects/{project}/fases', [ProjectController::class, 'storeFase'])
        ->name('projects.fases.store');
    Route::get('projects/{project}/fases/{fase}/edit', [ProjectController::class, 'editFase'])
        ->name('projects.fases.edit');
    Route::put('projects/{project}/fases/{fase}', [ProjectController::class, 'updateFase'])
        ->name('projects.fases.update');
    Route::delete('projects/{project}/fases/{fase}', [ProjectController::class, 'destroyFase'])
        ->name('projects.fases.destroy');

    // -------------------------
    // Rutas de Eventos
    // -------------------------
    Route::resource('events', EventController::class);


    // -------------------------
    // Rutas de Aprendices
    // -------------------------
    Route::resource('aprendices', AprendizController::class);

    // -------------------------
    // Rutas de Directores
    // -------------------------
    Route::resource('directores', DirectorController::class);
});

require __DIR__ . '/auth.php';
