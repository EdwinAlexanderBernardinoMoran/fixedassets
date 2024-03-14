<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoActivo extends Model
{
    use HasFactory;

    protected $table = 'tipo_activo';

    protected $primaryKey = 'id_tipo_activo';
    public $incrementing = true;

    public $timestamps = false;

    public function activosfijos()
    {
        return $this->hasMany(ActivoFijo::class);
    }
}
