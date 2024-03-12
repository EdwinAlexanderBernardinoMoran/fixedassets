<?php

namespace App\Http\Controllers;

use App\Http\Resources\HistorialAsignacionCollection;
use App\Http\Resources\HistorialAsignacionResource;
use App\Models\HistorialAsignacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HistorialAsignacionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $asignacion = HistorialAsignacion::all();
        return HistorialAsignacionCollection::make($asignacion);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($historial)
    {
        $persona = DB::table('historial_asignaciones')->where('id_historial_asignaciones', $historial)->first();
        return new HistorialAsignacionResource($persona);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, HistorialAsignacion $historialAsignacion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(HistorialAsignacion $historialAsignacion)
    {
        //
    }
}
