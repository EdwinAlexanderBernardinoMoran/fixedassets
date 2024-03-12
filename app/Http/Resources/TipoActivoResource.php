<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TipoActivoResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'type' => 'tiposActivos',
            'id' => $this->resource->id_tipo_activo,
            'attributes' => [
                'nombre' => $this->resource->nombre,
            ],
            'links' => [
                'self' => route('tipoactivo.show', $this->resource->id_tipo_activo)
            ]
        ];
    }
}
