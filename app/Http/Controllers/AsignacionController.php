<?php

namespace App\Http\Controllers;

use App\Http\Resources\AsignacionCollection;
use App\Http\Resources\AsignacionResource;
use App\Models\Asignacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AsignacionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $asignacion = Asignacion::all();
        return AsignacionCollection::make($asignacion);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'personas_id' => 'required',
            'activos_fijos_id' => 'required',
            'fecha_asignacion' => 'required|date',
        ]);

        try {
            DB::table('asignaciones')->insert([
                'personas_id' => $request->personas_id,
                'activos_fijos_id' => $request->activos_fijos_id,
            ]);

            DB::table('historial_asignaciones')->insert([
                'fecha_asignacion' => $request->fecha_asignacion,
                'personas_id' => $request->personas_id,
                'activos_fijos_id' => $request->activos_fijos_id,
            ]);
        } catch (\Throwable $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }

        return response()->json(["Success" => "Asignacion Creada Correctamente"], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($asignacion)
    {
        $asignacion = DB::table('asignaciones')->where('id_asignaciones', $asignacion)->first();
        return new AsignacionResource($asignacion);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $asignacion)
    {
        $request->validate([
            'personas_id' => 'required',
            'activos_fijos_id' => 'required',
        ]);

        DB::table('asignaciones')->
            where('id_asignaciones', $asignacion)
            ->update([
            'personas_id' => $request->personas_id,
            'activos_fijos_id' => $request->activos_fijos_id,
        ]);

        return response()->json([
            'message' => 'Asignacion Actualizada'
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($asignacion)
    {
        DB::table('asignaciones')->
        where('id_asignaciones', $asignacion)->
        delete();
    
        return response()->json([
            'message' => 'Asignacion Eliminada'
        ], 204);
    }
}
