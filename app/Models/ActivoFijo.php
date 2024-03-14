<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActivoFijo extends Model
{
    use HasFactory;

    protected $table = 'activos_fijos';

    protected $primaryKey = 'id_activo_fijo';
    public $incrementing = true;

    public $timestamps = false;

}
