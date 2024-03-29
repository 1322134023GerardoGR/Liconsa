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
        'd_asist1',
        'd_asist2',
        'd_asist3',
        'Sancionado',
    ];
    public function dependientes()
    {
        return $this->hasMany(Dependiente::class, 'beneficiario_id');
    }
    public function ventas()
    {
        return $this->hasMany(Venta::class, 'beneficiario_id')->withDefault();
    }
}
