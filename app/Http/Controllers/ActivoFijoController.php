<?php

namespace App\Http\Controllers;

use App\Http\Requests\ActivoFijoRequest;
use App\Http\Resources\ActivoFijoCollection;
use App\Http\Resources\ActivoFijoResource;
use App\Http\Resources\ShowResources\ShowActivoFijoResource;
use App\Models\ActivoFijo;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ActivoFijoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $activosFijos = ActivoFijo::orderBy('id_activo_fijo', 'DESC')->paginate(10);
        return ActivoFijoCollection::make($activosFijos);

    }

    // Busqueda de activo por codigo
    public function byCodigo(Request $request){
        $codigo = $request->codigo;

        $activosFijos = ActivoFijo::where('codigo', 'LIKE', "%{$codigo}%")->get();

        if ($activosFijos->isEmpty()) {
            return response()->json(['message' => 'No se encontraron activos fijos para el código proporcionado'], Response::HTTP_OK);
        }
        return ActivoFijoCollection::make($activosFijos);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ActivoFijoRequest $request)
    {

        ActivoFijo::create($request->validated());

        return response()->json(["Success" => "Activo Fijo Creado Correctamente"], Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     */
    public function show(ActivoFijo $activofijo)
    {
        return new ShowActivoFijoResource($activofijo);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ActivoFijoRequest $request, ActivoFijo $activofijo)
    {
        $activofijo->update($request->validated());

        return response()->json([
            'message' => 'Activo Fijo Actualizado'
        ], Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ActivoFijo $activofijo)
    {
        $activofijo->delete();

        return response()->json([
            'message' => 'Activo Fijo Eliminado'
        ], Response::HTTP_NO_CONTENT);
    }
}
