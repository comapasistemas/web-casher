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
    
    public function cuenta()
    {
        return $this->belongsTo(Cuenta::class, 'CUENTA', 'cuenta');
    }
}
