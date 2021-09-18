<?php

use App\Http\Controllers\pdfController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::middleware(['auth:sanctum', 'verified'])->get('/atletas', function () {
    return view('livewire/atleta/atletas');
})->name('atletas');

Route::middleware(['auth:sanctum', 'verified'])->get('/grupos', function () {
    return view('livewire/grupo/grupos');
})->name('grupos');

Route::middleware(['auth:sanctum', 'verified'])->get('/entrenadores', function () {
    if(Auth()->user()->role_id == 1){
        return view('livewire/entrenador/entrenadores');
    }else{
        return back();
    }
})->name('entrenadores');

Route::middleware(['auth:sanctum', 'verified'])->get('/pruebasfisicas', function () {
    return view('livewire/prueba/pruebas');
})->name('pruebas');


Route::middleware(['auth:sanctum', 'verified'])
    ->get('/aplicarprueba/{atleta}', \App\Http\Livewire\AplicarPrueba::class)
    ->name('aplicarPrueba');

Route::middleware(['auth:sanctum', 'verified'])->get('/Entrenamiento', function () {
        return view('livewire/entrenamiento/entrenamientos');
    })->name('entrenamientos');


route::get('/reportePruebaGrupo/{id}', [pdfController::class, 'reportePruebaGrupoPDF'])->name('reportePruebaGrupoPDF');
route::get('/reportePruebaAtleta/{id}', [pdfController::class, 'reportePruebaAtletaPDF'])->name('reportePruebaAtletaPDF');
