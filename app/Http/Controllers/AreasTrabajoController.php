<?php

namespace App\Http\Controllers;

use App\Http\Resources\AreasTrabajoCollection;
use App\Http\Resources\AreasTrabajoResource;
use App\Models\AreasTrabajo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AreasTrabajoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $areasTrabajo = AreasTrabajo::all();
        return AreasTrabajoCollection::make($areasTrabajo);
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
        ]);

        DB::table('areas_trabajo')->insert([
            'nombre' => $request->nombre,
        ]);

        return response()->json(["Success" => "Success"], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($areaTrabajo)
    {
        $areasTrabajo = DB::table('areas_trabajo')->where('id_areas_trabajo', $areaTrabajo)->first();
        return new AreasTrabajoResource($areasTrabajo);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $areaTrabajo)
    {
        $request->validate([
            'nombre' => 'required',
        ]);

        DB::table('areas_trabajo')->
            where('id_areas_trabajo', $areaTrabajo)->
            update([
            'nombre' => $request->nombre,
        ]);

        return response()->json([
            'message' => 'Area De Trabajo Actualizado'
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($areaTrabajo)
    {
        DB::table('areas_trabajo')->
            where('id_areas_trabajo', $areaTrabajo)->
            delete();
        
        return response()->json([
            'message' => 'Areas De Trabajo Eliminado'
        ], 204);
    }
}
