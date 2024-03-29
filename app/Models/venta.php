<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    use HasFactory;

    protected $table = 'ventas'; // Nombre de la tabla en la base de datos

    protected $fillable = [
        'code',
        'litros_v',
        'num_lecheria',
        'curp',
        'rol',
        'rfc',
        'beneficiario_id',
    ];

    // Definir la relación de venta pertenece a un beneficiario
    public function beneficiario()
    {
        return $this->belongsTo(Beneficiario::class, 'beneficiario_id');
    }
}
