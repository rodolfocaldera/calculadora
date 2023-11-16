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
    $formula = $request->texto;
    $x1 = floatval(str_replace("x","",$formula["x1value"]));
    $x2 = floatval(str_replace("x","",$formula["x2value"])) * ($formula["sign1value"] == "+" ? 1 : -1);
    $y1 = floatval(str_replace("y","",$formula["y1value"]));
    $y2 = floatval(str_replace("y","",$formula["y2value"]))  * ($formula["sign2value"] == "+" ? 1 : -1);
    $x_res = $x1 + $x2;
    $y_res = $y1 + $y2;
    $x=0;
    $y=0;
    if($x_res != 0){
        $x = floatval($formula["valor1Value"])/$x_res;
    }

    if($y_res != 0){
        $y = floatval($formula["valor2Value"])/$y_res;
    }

    $registro  = new Registro();
    $registro->texto = json_encode($formula);
    $registro->resultado = json_encode(["x" => $x,"y"=>$y]);
    $registro->save();
    
    return response()->json(["x" => $x,"y"=>$y]);
});