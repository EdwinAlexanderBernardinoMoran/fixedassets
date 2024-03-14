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
                'persona' => $this->persona->nombres,
                'carnet' => $this->persona->n_carnet,
                'areadetrabajo' => $this->persona->areatrabajo->nombre,
                'codigo_de_activo_fijo' => $this->activofijo->codigo,
                'tipo_de_activo_fijo' => $this->activofijo->tipoactivo->nombre,
                'descripcion' => $this->activofijo->descripcion,
            ],
            'links' => [
                'self' => route('asignaciones.show', $this->resource->id_asignaciones)
            ]
        ];
    }
}
