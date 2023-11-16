<?php

use Illuminate\Support\Facades\Route;
use App\Models\Registro;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::post("/memory",function(Request $request){
    $registro  = new Registro();
    $registro->texto = json_encode($request->texto);
;    $registro->save();
});

Route::post("/calculate",function(Request $request){

    $registro  = new Registro();
    $registro->texto = json_encode($request->texto);
    $registro->resultado = json_encode($request->resultado);
    $registro->save();
});