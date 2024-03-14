<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asignacion extends Model
{
    use HasFactory;

    protected $table = 'asignaciones';

    protected $primaryKey = 'id_asignaciones';
    public $incrementing = true;

    public $timestamps = false;

    public function persona(){
        return $this->belongsTo(Personas::class, 'personas_id');
    }

    public function activofijo(){
        return $this->belongsTo(ActivoFijo::class, 'activos_fijos_id');
    }

}
