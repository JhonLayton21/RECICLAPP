<?php

use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;
use App\Models\SolicitudRecoleccion;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');

    Route::get('/solicitud-recoleccion', function () {
        return view('solicitud-recoleccion');
    })->name('solicitud.recoleccion');  
    
    Route::get('/informes', function () {
        return view('informes');
    })->name('informes'); 

    Route::get('/ver-solicitudes', function () {
        return SolicitudRecoleccion::all();
    });
});

require __DIR__.'/auth.php';
