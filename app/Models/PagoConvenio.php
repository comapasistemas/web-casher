<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PagoConvenio extends Model
{
    use HasFactory;

    protected $table = 'pag_con';

    protected $timestamps = false;

    protected $guarded = [];

    public function facturaActual()
    {
        return;
    }
}
