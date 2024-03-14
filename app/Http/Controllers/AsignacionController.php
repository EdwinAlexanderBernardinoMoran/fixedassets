<?php

namespace App\Http\Controllers;

use App\Http\Resources\AsignacionCollection;
use App\Http\Resources\AsignacionResource;
use App\Http\Resources\ShowResources\ShowAsignacionResource;
use App\Models\Asignacion;
use App\Models\HistorialAsignacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

class AsignacionController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function consultInformation(Request $request, Asignacion $asignacion){
        $query = $asignacion->newQuery();

        if ($request->personas) {
            $query->whereHas('persona', function($q) use ($request){
                $q->where('nombres', 'LIKE', "%{$request->personas}%");
            });
        }

        if ($request->areatrabajo) {
            $query->whereHas('persona.areatrabajo', function ($q) use ($request) {
                $q->where('nombre', 'LIKE', "%{$request->areatrabajo}%");
            });
        }

        if ($request->activos) {
            $query->whereHas('activofijo.tipoactivo', function ($q) use ($request) {
                $q->where('nombre', 'LIKE', "%{$request->activos}%");
            });
        }

        return AsignacionResource::collection($query->get());
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
            Asignacion::create([
                'personas_id' => $request->personas_id,
                'activos_fijos_id' => $request->activos_fijos_id,
            ]);

            HistorialAsignacion::create([
                'fecha_asignacion' => $request->fecha_asignacion,
                'personas_id' => $request->personas_id,
                'activos_fijos_id' => $request->activos_fijos_id,
            ]);
        } catch (\Throwable $e) {
            return response()->json(['error' => $e->getMessage()], Response::HTTP_INTERNAL_SERVER_ERROR);
        }

        return response()->json(["Success" => "Asignacion Creada Correctamente"], Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     */
    public function show(Asignacion $asignacione)
    {
        return new ShowAsignacionResource($asignacione);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Asignacion $asignacione)
    {
        $request->validate([
            'personas_id' => 'required',
            'activos_fijos_id' => 'required',
        ]);

        try {
            $asignacione->update([
                'personas_id' => $request->personas_id,
                'activos_fijos_id' => $request->activos_fijos_id,
            ]);

            return response()->json(["Success" => "Asignacion Actualizada Correctamente"], Response::HTTP_OK);

        } catch (\Throwable $e) {
            return response()->json(['error' => $e->getMessage()], Response::HTTP_INTERNAL_SERVER_ERROR);
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Asignacion $asignacione)
    {
        $asignacione->delete();

        return response()->json([
            'message' => 'Asignacion Eliminada'
        ], Response::HTTP_NO_CONTENT);
    }
}
