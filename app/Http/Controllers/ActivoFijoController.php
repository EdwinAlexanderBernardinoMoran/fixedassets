<?php

namespace App\Http\Controllers;

use App\Http\Resources\ActivoFijoCollection;
use App\Http\Resources\ActivoFijoResource;
use App\Models\ActivoFijo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ActivoFijoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $activosFijos = ActivoFijo::all();
        return ActivoFijoCollection::make($activosFijos);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'codigo' => 'required',
            'tipo_activo_id' => 'required',
            'descripcion' => 'required'
        ]);

        DB::table('activos_fijos')->insert([
            'codigo' => $request->codigo,
            'tipo_activo_id' => $request->tipo_activo_id,
            'descripcion' => $request->descripcion,
        ]);

        return response()->json(["Success" => "Activo Fijo Creado Correctamente"], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($activofijo)
    {
        $activo = DB::table('activos_fijos')->where('id_activo_fijo', $activofijo)->first();
        return new ActivoFijoResource($activo);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $activofijo)
    {
        $request->validate([
            'codigo' => 'required',
            'tipo_activo_id' => 'required',
            'descripcion' => 'required'
        ]);

        DB::table('activos_fijos')->
        where('id_activo_fijo', $activofijo)->
        update([
            'codigo' => $request->codigo,
            'tipo_activo_id' => $request->tipo_activo_id,
            'descripcion' => $request->descripcion,
        ]);

        return response()->json([
            'message' => 'Activo Fijo Actualizado'
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($activofijo)
    {
        DB::table('activos_fijos')->
            where('id_activo_fijo', $activofijo)->
            delete();
        
        return response()->json([
            'message' => 'Activo Fijo Eliminado'
        ], 204);
    }
}
