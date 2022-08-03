<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cuenta extends Model
{
    use HasFactory;

    protected $table = 'cuentas';

    protected $fillable = [
        'id_usuario',
        'cuenta',
    ];

    public $timestamps = false;

    public function getNumeroAttribute()
    {
        return $this->cuenta;
    }

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'id_usuario');
    }

    public function residente()
    {
        return $this->hasOne(Padron::class, 'CUENTA', 'cuenta');
    }

    public function facturaPagar()
    {
        return $this->belongsTo(FacturaPagar::class, 'cuenta', 'CUENTA');
    }
}
