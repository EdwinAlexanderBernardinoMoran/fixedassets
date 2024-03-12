<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AreasTrabajoResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'type' => 'Areas De Trabajo',
            'id' => $this->resource->id_areas_trabajo,
            'attributes' => [
                'nombre' => $this->resource->nombre,
            ],
            'links' => [
                'self' => route('areatrabajo.index', $this->resource->id_areas_trabajo)
            ]
        ];
    }
}
