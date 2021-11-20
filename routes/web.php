<?php

use App\Http\Controllers\EventsController;
use Illuminate\Support\Facades\Route;
use PhpParser\Node\Expr\FuncCall;

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


// GETS
Route::get('/', [EventsController::class , 'index'])->middleware('auth'); // Rota que recebe as informações dos EventsController (a função fica dentro da pasta /app/http/controllers)

// temporario
Route::get('/dashboard', [EventsController::class , 'dashboard'])->middleware('auth');


Route::get('/NovoChamado', [EventsController::class, 'novoChamado'])->middleware('auth');
Route::get('/events/{id}', [EventsController::class, 'detalhes'])->middleware('auth');
Route::get('/dashboard', [EventsController::class, 'dashboard'])->middleware('auth');


// POSTS
Route::post('/chamado', [EventsController::class, 'store'])->middleware('auth');

