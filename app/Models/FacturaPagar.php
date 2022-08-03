<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FacturaPagar extends Model
{
    use HasFactory;

    protected $table = 'fact_ant';

    protected $guarded = [];
    
    public $timestamps = false;

    public function ruta()
    {
        return $this->belongsTo(Ruta::class, 'CVE_RUTA', 'RUTA');
    }

    public function cuenta()
    {
        return $this->belongsTo(Cuenta::class, 'cuenta', 'CUENTA');
    }

    public function pagoConvenios()
    {
        return $this->hasMany(PagoConvenio::class, 'convenio', 'REZAGO_MAN');
    }
}
