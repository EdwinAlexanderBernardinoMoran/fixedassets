<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AsignacionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'type' => 'Asginaciones',
            'id' => $this->resource->id_asignaciones,
            'attributes' => [
                'persona_id' => $this->resource->personas_id,
                'activos_fijos_id' => $this->resource->activos_fijos_id,
            ],
            'links' => [
                'self' => route('asignacion.show', $this->resource->id_asignaciones)
            ]
        ];
    }
}
