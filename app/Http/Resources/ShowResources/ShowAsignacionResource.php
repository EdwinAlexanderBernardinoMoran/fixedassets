<?php

namespace App\Http\Resources\ShowResources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ShowAsignacionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'type' => 'Asignaciones',
            'id' => $this->resource->id_asignaciones,
            'attributes' => [
                'personas_id' => $this->resource->personas_id,
                'activos_fijos_id' => $this->resource->activos_fijos_id,
            ],
            'link' => [
                'self' => route('asignaciones.show', $this->resource->id_asignaciones)
            ]
        ];
    }
}
