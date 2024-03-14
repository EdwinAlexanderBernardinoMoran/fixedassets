<?php

namespace App\Http\Controllers;

use App\Http\Resources\TipoActivoCollection;
use App\Http\Resources\TipoActivoResource;
use App\Models\TipoActivo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

class TipoActivoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tipoActivos = TipoActivo::orderBy('id_tipo_activo', 'DESC')->paginate(10);
        return TipoActivoCollection::make($tipoActivos);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validation = $request->validate([
            'nombre' => 'required',
        ]);

        TipoActivo::create($validation);

        return response()->json(["Success" => "Tipo De Activo Creado"], Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     */
    public function show(TipoActivo $tipoActivo)
    {
        return new TipoActivoResource($tipoActivo);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TipoActivo $tipoActivo)
    {

        $validation = $request->validate([
            'nombre' => 'required',
        ]);

        $tipoActivo->update($validation);

        return response()->json([
            'message' => 'Tipo Activo Actualizado'
        ], Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TipoActivo $tipoActivo)
    {
        $tipoActivo->delete();

        return response()->json([
            'message' => 'Tipo Activo Eliminado'
        ], Response::HTTP_NO_CONTENT);
    }
}
