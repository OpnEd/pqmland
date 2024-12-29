<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PaymentController extends Controller
{
    public function confirmation(Request $request)
    {
        // Insertar los datos en la sesión
        Session::put('payu_data', $request->all());

        // Para debuguear, puedes retornar los datos de la sesión
        return response()->json(Session::get('payu_data'));
    }
}
