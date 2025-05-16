<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TbjogosController;

Route::get('/', function(){return response()->json(['sucesso'=>true]);});
Route::get('/tbjogos', [TbjogosController::class, 'index']);
Route::get('/tbjogos/{codigo}', [TbjogosController::class, 'show']);

Route::post('/tbjogos', [TbjogosController::class, 'store']);

Route::put('/tbjogos/{codigo}', [TbjogosController::class, 'update']);

Route::delete('/tbjogos/{id}', [TbjogosController::class, 'destroy']);