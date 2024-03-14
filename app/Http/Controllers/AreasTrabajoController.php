<?php

namespace App\Http\Controllers;

use App\Http\Resources\AreasTrabajoCollection;
use App\Http\Resources\AreasTrabajoResource;
use App\Models\AreasTrabajo;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AreasTrabajoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $areasTrabajo = AreasTrabajo::orderBy('id_areas_trabajo', 'DESC')->paginate(10);
        return AreasTrabajoCollection::make($areasTrabajo);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $areatrabajo = $request->validate([
            'nombre' => 'required',
        ]);

        AreasTrabajo::create($areatrabajo);

        return response()->json(["success" => "Area de trabajo creada"], Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     */
    public function show(AreasTrabajo $areatrabajo)
    {
        return new AreasTrabajoResource($areatrabajo);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AreasTrabajo $areatrabajo)
    {
        $validation = $request->validate([
            'nombre' => 'required',
        ]);

        $areatrabajo->update($validation);

        return response()->json([
            'message' => 'Area De Trabajo Actualizado'
        ], Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AreasTrabajo $areatrabajo)
    {
        $areatrabajo->delete();

        return response()->json([
            'message' => 'Areas De Trabajo Eliminado'
        ], Response::HTTP_NO_CONTENT);
    }
}
