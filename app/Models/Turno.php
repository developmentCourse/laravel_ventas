<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Turno extends Model
{
    protected $fillable = [
        'hora_entrada',
        'hora_salida',
        'dias_descanso',
    ];
}
