<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class venta extends Model
{
    use HasFactory;
    protected $table = 'ventas'; // Asegúrate de que el nombre de la tabla coincida con tu base de datos

    protected $fillable = [
        'code',
        'litros_v',
        'num_lecheria',
        'curp',
        'rol',
        'rfc',
    ];
}
