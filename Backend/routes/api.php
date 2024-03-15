<?php

use App\Http\Controllers\BitacoraController;
use App\Http\Controllers\EnlaceController;
use App\Http\Controllers\PaginaController;
use App\Http\Controllers\PersonaController;
use App\Http\Controllers\RolController;
use App\Http\Controllers\UsuarioController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//Rutas para las Bitacoras
Route::get('/bitacoras',[BitacoraController::class, 'index']);
Route::post('/bitacoras',[BitacoraController::class, 'store']);
Route::put('/bitacoras/{id}',[BitacoraController::class, 'update']);
Route::get('/bitacoras/{id}',[BitacoraController::class, 'show']);
Route::delete('/bitacoras/{id}',[BitacoraController::class, 'destroy']);


// Rutas para los Enlaces
Route::get('/enlaces',[EnlaceController::class, 'index']);
Route::post('/enlaces',[EnlaceController::class, 'store']);
Route::put('/enlaces/{id}',[EnlaceController::class, 'update']);
Route::get('/enlaces/{id}',[EnlaceController::class, 'show']);
Route::delete('/enlaces/{id}',[EnlaceController::class, 'destroy']);


// Rutas para las Paginas
Route::get('/paginas',[PaginaController::class, 'index']);
Route::post('/paginas',[PaginaController::class, 'store']);
Route::put('/paginas/{id}',[PaginaController::class, 'update']);
Route::get('/paginas/{id}',[PaginaController::class, 'show']);
Route::delete('/paginas/{id}',[PaginaController::class, 'destroy']);


// Rutas para las Personas
Route::get('/personas',[PersonaController::class, 'index']);
Route::post('/personas',[PersonaController::class, 'store']);
Route::put('/personas/{id}',[PersonaController::class, 'update']);
Route::get('/personas/{id}',[PersonaController::class, 'show']);
Route::delete('/personas/{id}',[PersonaController::class, 'destroy']);


// Rutas para los Roles
Route::get('/roles',[RolController::class, 'index']);
Route::post('/roles',[RolController::class, 'store']);
Route::put('/roles/{id}',[RolController::class, 'update']);
Route::get('/roles/{id}',[RolController::class, 'show']);
Route::delete('/roles/{id}',[RolController::class, 'destroy']);


// Rutas para los Usuarios
Route::get('/usuarios',[UsuarioController::class, 'index']);
Route::post('/usuarios',[UsuarioController::class, 'store']);
Route::put('/usuarios/{id}',[UsuarioController::class, 'update']);
Route::get('/usuarios/{id}',[UsuarioController::class, 'show']);
Route::delete('/usuarios/{id}',[UsuarioController::class, 'destroy']);
