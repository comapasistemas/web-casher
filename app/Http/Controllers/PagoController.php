<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagoController extends Controller
{
    public function create($recibo)
    {
        return view('pagos.create', [
            'recibo' => $recibo
        ]);
    }

    public function store($recibo)
    {
        return $recibo;
    }
}
