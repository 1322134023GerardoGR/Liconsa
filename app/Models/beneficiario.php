<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class beneficiario extends Model
{
    use HasFactory;

    protected $table = 'beneficiarios'; // Asegúrate de que el nombre de la tabla coincida con tu base de datos

    protected $fillable = [
        'nombre',
        'apellido_p',
        'apellido_m',
        'curp',
        'fecha_nac',
        'n_dependientes',
        'direccion',
        'folio_cb',
        'num_lecheria',
        'd_recoleccion',
        'Sancionado',
    ];
}
