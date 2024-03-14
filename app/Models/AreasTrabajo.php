<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AreasTrabajo extends Model
{
    use HasFactory;

    protected $table = 'areas_trabajo';

    protected $primaryKey = 'id_areas_trabajo';
    public $incrementing = true;

    public $timestamps = false;

    public function personas()
    {
        return $this->hasMany(Personas::class);
    }

}
