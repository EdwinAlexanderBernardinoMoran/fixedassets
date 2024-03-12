<?php

namespace App\Http\Controllers;

use App\Http\Resources\PersonasCollection;
use App\Http\Resources\PersonasResource;
use App\Models\Personas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PersonasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $personas = Personas::all();
        return PersonasCollection::make($personas);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombres' => 'required',
            'n_carnet' => 'required',
            'areas_trabajo_id' => 'required'
        ]);

        DB::table('personas')->insert([
            'nombres' => $request->nombres,
            'n_carnet' => $request->n_carnet,
            'areas_trabajo_id' => $request->areas_trabajo_id,
        ]);

        return response()->json(["Success" => "Success"], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($persona)
    {
        $persona = DB::table('personas')->where('id_persona', $persona)->first();
        return new PersonasResource($persona);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $persona)
    {
        $request->validate([
            'nombres' => 'required',
            'n_carnet' => 'required',
            'areas_trabajo_id' => 'required'
        ]);

        DB::table('personas')->
            where('id_persona', $persona)->
            update([
            'nombres' => $request->nombres,
            'n_carnet' => $request->n_carnet,
            'areas_trabajo_id' => $request->areas_trabajo_id,
        ]);

        return response()->json([
            'message' => 'Persona Actualizada'
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($persona)
    {
        DB::table('personas')->
            where('id_persona', $persona)->
            delete();
        
        return response()->json([
            'message' => 'Persona Eliminada'
        ], 204);
    }
}
