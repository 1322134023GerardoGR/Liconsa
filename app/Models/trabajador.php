<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class trabajador extends Model
{
    use HasFactory;

    protected $table = 'trabajadores'; // Asegúrate de que el nombre de la tabla coincida con tu base de datos

    protected $fillable = [
        'nombre',
        'apellido_p',
        'apellido_m',
        'curp',
        'rol',
        'rfc',
    ];
}
