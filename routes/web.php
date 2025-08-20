<?php

use App\Livewire\Settings\Appearance;
use App\Livewire\Settings\Password;
use App\Livewire\Settings\Profile;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SemilleroController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\IntegranteController;

Route::get('/', function () {
    return view('welcome');
})->name('home');


Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    //rutas nuevas del proyecto



    Route::get('/dashboard', function () {
        return view('layouts.dashboard');
    })->name('dashboard');

    // Rutas para Semilleros
    Route::resource('semilleros', SemilleroController::class);

    // Rutas para Integrantes
    Route::resource('integrantes', IntegranteController::class); // Nota: Podrías manejar integrantes como sub-recurso de semilleros si prefieres, e.g., Route::resource('semilleros.integrantes', IntegranteController::class);

    // Rutas para Proyectos
    Route::resource('projects', ProjectController::class);
    Route::get('projects/{project}/advance', [ProjectController::class, 'advance'])->name('projects.advance');
    Route::post('projects/{project}/advance', [ProjectController::class, 'updateAdvance']);
    Route::get('projects/report', [ProjectController::class, 'report'])->name('projects.report');

    // Rutas para Eventos
    Route::resource('events', EventController::class);



    //-----------------



    Route::get('settings/profile', Profile::class)->name('settings.profile');
    Route::get('settings/password', Password::class)->name('settings.password');
    Route::get('settings/appearance', Appearance::class)->name('settings.appearance');
});

require __DIR__ . '/auth.php';
