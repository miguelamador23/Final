<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BitacoraController;
use App\Http\Controllers\EnlacesController;
use App\Http\Controllers\PaginasController;
use App\Http\Controllers\PersonasController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\UsuariosController;

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

// Rutas para BitacoraController
Route::get('/bitacoras', [BitacoraController::class, 'index']);
Route::post('/bitacoras', [BitacoraController::class, 'store']);
Route::get('/bitacoras/{bitacora}', [BitacoraController::class, 'show']);
Route::put('/bitacoras/{bitacora}', [BitacoraController::class, 'update']);
Route::delete('/bitacoras/{bitacora}', [BitacoraController::class, 'destroy']);

// Rutas para EnlacesController
Route::get('/enlaces', [EnlacesController::class, 'index']);
Route::post('/enlaces', [EnlacesController::class, 'store']);
Route::get('/enlaces/{enlace}', [EnlacesController::class, 'show']);
Route::put('/enlaces/{enlace}', [EnlacesController::class, 'update']);
Route::delete('/enlaces/{enlace}', [EnlacesController::class, 'destroy']);

// Rutas para PaginasController
Route::get('/paginas', [PaginasController::class, 'index']);
Route::post('/paginas', [PaginasController::class, 'store']);
Route::get('/paginas/{pagina}', [PaginasController::class, 'show']);
Route::put('/paginas/{pagina}', [PaginasController::class, 'update']);
Route::delete('/paginas/{pagina}', [PaginasController::class, 'destroy']);

// Rutas para PersonasController
Route::get('/personas', [PersonasController::class, 'index']);
Route::post('/personas', [PersonasController::class, 'store']);
Route::get('/personas/{persona}', [PersonasController::class, 'show']);
Route::put('/personas/{persona}', [PersonasController::class, 'update']);
Route::delete('/personas/{persona}', [PersonasController::class, 'destroy']);

// Rutas para RolesController
Route::get('/roles', [RolesController::class, 'index']);
Route::post('/roles', [RolesController::class, 'store']);
Route::get('/roles/{rol}', [RolesController::class, 'show']);
Route::put('/roles/{rol}', [RolesController::class, 'update']);
Route::delete('/roles/{rol}', [RolesController::class, 'destroy']);

// Rutas para UsuariosController
Route::get('/usuarios', [UsuariosController::class, 'index']);
Route::post('/usuarios', [UsuariosController::class, 'store']);
Route::get('/usuarios/{usuario}', [UsuariosController::class, 'show']);
Route::put('/usuarios/{usuario}', [UsuariosController::class, 'update']);
Route::delete('/usuarios/{usuario}', [UsuariosController::class, 'destroy']);
