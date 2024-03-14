<?php

namespace App\Http\Controllers;

use App\Http\Resources\HistorialAsignacionCollection;
use App\Http\Resources\HistorialAsignacionResource;
use App\Models\HistorialAsignacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HistorialAsignacionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $asignacion = HistorialAsignacion::orderBy('id_historial_asignaciones', 'DESC')->paginate(10);
        return HistorialAsignacionCollection::make($asignacion);
    }

    /**
     * Display the specified resource.
     */
    public function show(HistorialAsignacion $historial)
    {
        return new HistorialAsignacionResource($historial);
    }
}
