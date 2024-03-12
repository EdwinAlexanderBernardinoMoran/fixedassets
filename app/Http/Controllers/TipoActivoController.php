<?php

namespace App\Http\Controllers;

use App\Http\Resources\TipoActivoCollection;
use App\Http\Resources\TipoActivoResource;
use App\Models\TipoActivo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TipoActivoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tipoActivos = TipoActivo::all();
        return TipoActivoCollection::make($tipoActivos);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
        ]);

        DB::table('tipo_activo')->insert([
            'nombre' => $request->nombre,
        ]);

        return response()->json(["Success" => "Success"], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($tipoActivo)
    {
        $tipoActivo = DB::table('tipo_activo')->where('id_tipo_activo', $tipoActivo)->first();
        return new TipoActivoResource($tipoActivo);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $tipoActivo)
    {

        $request->validate([
            'nombre' => 'required',
        ]);

        DB::table('tipo_activo')->
            where('id_tipo_activo', $tipoActivo)->
            update([
            'nombre' => $request->nombre,
        ]);

        return response()->json([
            'message' => 'Tipo Activo Actualizado'
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($tipoActivo)
    {
        DB::table('tipo_activo')->
            where('id_tipo_activo', $tipoActivo)->
            delete();
        
        return response()->json([
            'message' => 'Tipo Activo Eliminado'
        ], 204);
    }
}
