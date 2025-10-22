<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\LivroApiController;
use App\Http\Controllers\Api\AutorApiController;
use App\Http\Controllers\Api\AssuntoApiController;

Route::apiResource('livros', LivroApiController::class);
Route::apiResource('autores', AutorApiController::class);
Route::apiResource('assuntos', AssuntoApiController::class);
