<?php

namespace App\Models;

use App\Ahex\Config\Application\Vencimiento;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ruta extends Model
{
    use HasFactory;

    protected $table = 'rutas';

    protected $guarded = [];

    public $timestamps = false;

    public function getClaveRutaAttribute()
    {
        return (int) $this->CVE_RUTA;
    }

    public function getClaveVencimientoAttribute()
    {
        return (int) $this->CVE_VENC;
    }

    public function getDiaVencimientoAttribute()
    {
        return Vencimiento::getDiaPorClave($this->clave_vencimiento);
    }
}
