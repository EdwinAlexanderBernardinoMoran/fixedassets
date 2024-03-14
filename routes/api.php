<?php

use App\Http\Controllers\ActivoFijoController;
use App\Http\Controllers\AreasTrabajoController;
use App\Http\Controllers\AsignacionController;
use App\Http\Controllers\HistorialAsignacionController;
use App\Http\Controllers\PersonasController;
use App\Http\Controllers\TipoActivoController;
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

// Tipo Activos
Route::get('tiposactivos', [TipoActivoController::class, 'index'])->name('tipoactivo.index');
Route::get('tiposactivos/{activo}', [TipoActivoController::class, 'show'])->name('tipoactivo.show');
Route::post('tiposactivos', [TipoActivoController::class, 'store'])->name('tipoactivo.store');
Route::put('tiposactivos/{tipoActivo}', [TipoActivoController::class, 'update'])->name('tipoactivo.update');
Route::delete('tiposactivos/{tipoActivo}', [TipoActivoController::class, 'destroy'])->name('tipoactivo.destroy');

// Personas
Route::get('personas', [PersonasController::class, 'index'])->name('personas.index');
Route::get('personas/{persona}', [PersonasController::class, 'show'])->name('persona.show');
Route::post('personas', [PersonasController::class, 'store'])->name('personas.store');
Route::put('personas/{persona}', [PersonasController::class, 'update'])->name('persona.update');
Route::delete('personas/{persona}', [PersonasController::class, 'destroy'])->name('persona.destroy');

// Areas De Trabajo
Route::get('areatrabajos', [AreasTrabajoController::class, 'index'])->name('areatrabajo.index');
Route::get('areatrabajos/{areaTrabajo}', [AreasTrabajoController::class, 'show'])->name('areatrabajo.show');
Route::post('areatrabajos', [AreasTrabajoController::class, 'store'])->name('areatrabajo.store');
Route::put('areatrabajos/{areaTrabajo}', [AreasTrabajoController::class, 'update'])->name('areatrabajo.update');
Route::delete('areatrabajos/{areaTrabajo}', [AreasTrabajoController::class, 'destroy'])->name('areatrabajo.destroy');

// Asignaciones
Route::get('asignaciones', [AsignacionController::class, 'index'])->name('asignacion.index');
Route::get('asignaciones/{asignacion}', [AsignacionController::class, 'show'])->name('asignacion.show');
Route::post('asignaciones', [AsignacionController::class, 'store'])->name('asignacion.store');
Route::put('asignaciones/{asignacion}', [AsignacionController::class, 'update'])->name('asignacion.update');
Route::delete('asignaciones/{asignacion}', [AsignacionController::class, 'destroy'])->name('asignacion.destroy');

// Activos Fijos
Route::get('activosfijos', [ActivoFijoController::class, 'index'])->name('activofijo.index');
Route::get('activosfijos/{activofijo}', [ActivoFijoController::class, 'show'])->name('activofijo.show');
Route::post('activosfijos', [ActivoFijoController::class, 'store'])->name('activofijo.store');
Route::put('activosfijos/{activofijo}', [ActivoFijoController::class, 'update'])->name('activofijo.update');
Route::delete('activosfijos/{activofijo}', [ActivoFijoController::class, 'destroy'])->name('activofijo.destroy');
Route::post('activosfijos/codigo', [ActivoFijoController::class, 'byCodigo'])->name('activofijo.byCodigo');

// Activos Fijos
Route::get('historialasignacion', [HistorialAsignacionController::class, 'index'])->name('historialasignacion.index');
Route::get('historialasignacion/{historial}', [HistorialAsignacionController::class, 'show'])->name('historialasignacion.show');
//Route::post('historialasignacion', [HistorialAsignacionController::class, 'store'])->name('activofijo.store');
//Route::put('historialasignacion/{activofijo}', [HistorialAsignacionController::class, 'update'])->name('activofijo.update');
//Route::delete('historialasignacion/{activofijo}', [HistorialAsignacionController::class, 'destroy'])->name('activofijo.destroy');










