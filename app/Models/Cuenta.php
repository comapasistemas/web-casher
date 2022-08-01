<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cuenta extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_usuario',
        'cuenta',
    ];

    public function usuario()
    {
        return $this->belongsTo(Usuario::class);
    }
}
