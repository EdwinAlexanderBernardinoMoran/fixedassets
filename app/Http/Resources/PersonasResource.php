<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PersonasResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'type' => 'personas',
            'id_persona' => $this->resource->id_persona,
            'attributes' => [
                'nombres' => $this->resource->nombres,
                'n_carnet' => $this->resource->n_carnet,
                'areas_trabajo_id' => $this->resource->areas_trabajo_id,
            ],
            'links' => [
                'self' => route('persona.show', $this->resource->id_persona)
            ]
        ];
    }
}