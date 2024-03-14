<?php

namespace App\Http\Resources\ShowResources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ShowActivoFijoResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'type' => 'Activos Fijos',
            'id' => $this->resource->id_activo_fijo,
            'attributes' => [
                'codigo' => $this->resource->codigo,
                'tipo_activo_id' => $this->resource->tipo_activo_id,
                'descripcion' => $this->resource->descripcion,
            ],
            'link' => [
                'self' => route('tiposactivos.show', $this->resource->id_activo_fijo)
            ]
        ];
    }
}
