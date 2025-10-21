<?php

use App\Http\Controllers\AutorController;
use App\Http\Controllers\AssuntoController;
use App\Http\Controllers\LivroController;
use App\Http\Controllers\RelatorioController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', fn() => view('home'))->name('home');

Route::resource('autores', AutorController::class)->parameters([
    'autores' => 'autor'
]);

Route::resource('assuntos', AssuntoController::class)->except(['show']);
Route::resource('livros', LivroController::class)->except(['show']);

Route::get('/relatorios/por-autor', [RelatorioController::class, 'porAutor'])->name('relatorios.por_autor');
Route::get('/relatorios/por-autor/pdf', [RelatorioController::class, 'exportarPdf'])->name('relatorios.por_autor.pdf');
