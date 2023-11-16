<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Registro;

class RegistroController extends Controller
{
    public function memory(Request $request){
        $registro  = new Registro();
        $registro->texto = $request->texto;
        $registro->save();
    }
}
