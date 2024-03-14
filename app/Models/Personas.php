<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Personas extends Model
{
    use HasFactory;

    protected $table = 'personas';

    protected $primaryKey = 'id_persona';
    public $incrementing = true;

    public $timestamps = false;

    public function asignaciones()
    {
        return $this->hasMany(Asignacion::class);
    }

    public function areatrabajo(){
        return $this->belongsTo(AreasTrabajo::class, 'areas_trabajo_id');
    }

}
