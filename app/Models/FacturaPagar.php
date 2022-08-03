<?php

namespace App\Models;

use App\Ahex\Config\Application\Vencimiento;
use App\Ahex\Config\Application\Tiempo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FacturaPagar extends Model
{
    use HasFactory;

    protected $table = 'fact_ant';

    protected $guarded = [];
    
    public $timestamps = false;

    /**
     * PERIODO se forma con un número de 6 dígitos: 
     * 
     * Los primeros 4 dígitos son el año
     * Los últimos 2 dígitos son el número del mes
     * 
     * Ejemplo: 202201 (2022 - año) (01 - número de mes: enero) 
     */
    public function getNumeroPeriodoAttribute()
    {
        return $this->PERIODO;
    }

    public function getMesPeriodoAttribute()
    {
        return substr($this->PERIODO, 4, 2);
    }

    public function getAnioPeriodoAttribute()
    {
        return substr($this->PERIODO, 0, 4);
    }

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

    public function fechaVencimiento(int $clave_vencimiento, bool $mostrar_nombre_mes = true, string $separator = '/')
    {
        $fecha_vencimiento_data = [
            'dia' => Vencimiento::getDiaPorClave($clave_vencimiento),
            'mes' => $mostrar_nombre_mes ? Tiempo::nombreMes($this->mes_periodo) : $this->mes_periodo,
            'año' => $this->anio_periodo,
        ];

        if( Vencimiento::isUltimaClave($clave_vencimiento) && ($this->mes_periodo == 02) )
            $fecha_vencimiento_data['dia'] = '28';

        return implode($separator, $fecha_vencimiento_data);
    }
}
