<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dependiente extends Model
{
    use HasFactory;

    protected $table = 'dependientes';

    protected $fillable = [
        'curp',
        'beneficiario_id',
    ];

    public function beneficiario()
    {
        return $this->belongsTo(Beneficiario::class, 'beneficiario_id');
    }
}
