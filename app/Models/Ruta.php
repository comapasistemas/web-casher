<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ruta extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function getClaveRutaAttribute()
    {
        return $this->CVE_RUTA;
    }

    public function getClaveVencimientoAttribute()
    {
        return $this->CVE_VENC;
    }
}
