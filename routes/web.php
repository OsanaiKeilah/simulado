<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SimuladoController;
use App\Http\Controllers\AiController;
use App\Http\Controllers\OpenAIController;
/*
|---------------------------------------------------------------------------
| Web Routes
|---------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/simulado', [SimuladoController::class, 'mostrarSimulado'])->name('simulado');

Route::post('/verificar-resposta', [SimuladoController::class, 'verificarResposta'])->name('verificar.resposta');
Route::post('/simulado/resposta', [SimuladoController::class, 'verificarResposta'])->name('verificar.resposta');
Route::get('/simulado/resposta', [SimuladoController::class, 'mostrarResposta'])->name('mostrar.resposta');
Route::get('/openai', [OpenAIController::class, 'index'])->name('openai.index');


