<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class HistorialAsignacionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'type' => 'Historial De Asignacion',
            'id' => $this->resource->id_historial_asignaciones,
            'attributes' => [
                'personas_id' => $this->persona->nombres,
                'carnet' => $this->persona->n_carnet,
                'area_de_trabajo' => $this->persona->areatrabajo->nombre,
                'codigo_de_activofijo' => $this->activofijo->codigo,
                'tipo_de_activofijo' => $this->activofijo->tipoactivo->nombre,
                'fecha_asignacion' => $this->resource->fecha_asignacion,
            ],
            'links' => [
                'self' => route('historialasignaciones.show', $this->resource->id_historial_asignaciones)
            ]
        ];
    }
}
