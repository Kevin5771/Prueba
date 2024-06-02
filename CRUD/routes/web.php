<?php

use Illuminate\Support\Facades\Route;
Use App\Http\Controllers\MarcaController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\TecnicoController;
use App\Http\Controllers\EquipoController;
use App\Http\Controllers\ServicioController;


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('marcas', MarcaController::class);
Route::resource('clientes', ClienteController::class);
Route::resource('tecnicos', TecnicoController::class);
Route::resource('equipos', EquipoController::class);
Route::resource('servicios', ServicioController::class);
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
