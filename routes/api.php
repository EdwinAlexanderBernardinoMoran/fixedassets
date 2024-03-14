<?php

use App\Http\Controllers\ActivoFijoController;
use App\Http\Controllers\AreasTrabajoController;
use App\Http\Controllers\AsignacionController;
use App\Http\Controllers\HistorialAsignacionController;
use App\Http\Controllers\PersonasController;
use App\Http\Controllers\TipoActivoController;
use Illuminate\Support\Facades\Route;


Route::apiResource('tiposactivos', TipoActivoController::class); // Tipo Activos
Route::apiResource('personas', PersonasController::class); // Personas
Route::apiResource('areatrabajos', AreasTrabajoController::class); // Area trabajo
Route::apiResource('asignaciones', AsignacionController::class); // Asignaciones
Route::post('asignaciones/consultinformation', [AsignacionController::class, 'consultInformation'])->name('asignaciones.consultinformation');
Route::apiResource('activosfijos', ActivoFijoController::class);
Route::post('activosfijos/codigo', [ActivoFijoController::class, 'byCodigo'])->name('activofijos.byCodigo');

// Historial Asignaciones

Route::get('historialasignacion', [HistorialAsignacionController::class, 'index'])->name('historialasignaciones.index');
Route::get('historialasignacion/{historial}', [HistorialAsignacionController::class, 'show'])->name('historialasignaciones.show');











