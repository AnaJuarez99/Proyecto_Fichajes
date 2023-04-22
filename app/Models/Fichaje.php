<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fichaje extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_usuario',
        'fecha',
        'hora_inicio',
        'hora_fin',
        'localizacion'
    ];
}
