<?php

namespace App\Http\Controllers;

use App\Http\Resources\PersonasCollection;
use App\Http\Resources\PersonasResource;
use App\Http\Resources\ShowResources\ShowPersonasResource;
use App\Models\Personas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

class PersonasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $personas = Personas::with('areatrabajo')->orderBy('id_persona', 'DESC')->paginate(10);
        return PersonasCollection::make($personas);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validation = $request->validate([
            'nombres' => 'required',
            'n_carnet' => 'required',
            'areas_trabajo_id' => 'required'
        ]);

        Personas::create($validation);

        return response()->json(["Success" => "Persona Creada"], Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     */
    public function show(Personas $persona)
    {
        return new ShowPersonasResource($persona);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Personas $persona)
    {
        $validation = $request->validate([
            'nombres' => 'required',
            'n_carnet' => 'required',
            'areas_trabajo_id' => 'required'
        ]);

        $persona->update($validation);

        return response()->json([
            'message' => 'Persona Actualizada'
        ], Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Personas $persona)
    {
        $persona->delete();

        return response()->json([
            'message' => 'Persona Eliminada'
        ], Response::HTTP_NO_CONTENT);
    }
}
