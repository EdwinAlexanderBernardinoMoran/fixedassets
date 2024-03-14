<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ActivoFijoResource extends JsonResource
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
                'tipo_activo' => $this->tipoactivo->nombre,
                'descripcion' => $this->resource->descripcion,
            ],
            'links' => [
                'self' => route('activofijo.show', $this->resource->id_activo_fijo)
            ]
        ];
    }
}
