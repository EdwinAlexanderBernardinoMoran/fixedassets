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
                'fecha_asignacion' => $this->resource->fecha_asignacion,
                'personas_id' => $this->resource->personas_id,
                'activos_fijos_id' => $this->resource->activos_fijos_id,
            ],
            'links' => [
                'self' => route('historialasignacion.show', $this->resource->id_historial_asignaciones)
            ]
        ];
    }
}
