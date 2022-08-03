<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Padron extends Model
{
    use HasFactory;

    protected $table = 'padron';

    protected $guarded = [];

    public $timestamps = false;
    
    public function getNombreCompletoAttribute()
    {
        return $this->NOMBRE;
    }

    public function cuenta()
    {
        return $this->belongsTo(Cuenta::class, 'CUENTA', 'cuenta');
    }

    public function ruta()
    {
        return $this->belongsTo(Ruta::class, 'RUTA', 'CVE_RUTA');
    }

    public function facturaPagar()
    {
        return $this->belongsTo(FacturaPagar::class, 'CUENTA', 'CUENTA');
    }
}
