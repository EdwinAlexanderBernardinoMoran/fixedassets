<?php

namespace App\Http\Resources\ShowResources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ShowPersonasResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'type' => 'Personas',
            'id' => $this->resource->id_persona,
            'attributes' => [
                'nombres' => $this->resource->nombres,
                'n_carnet' => $this->resource->n_carnet,
                'areas_trabajo_id' => $this->resource->areas_trabajo_id,
            ],
            'link' => [
                'self' => route('personas.show', $this->resource->id_persona)
            ]
        ];
    }
}
