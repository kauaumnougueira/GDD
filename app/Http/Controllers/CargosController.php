<?php

namespace App\Http\Controllers;

use App\Models\Cargos;
use Illuminate\Http\Request;

class CargosController extends Controller
{
    public function consulta(){
        $cargos = Cargos::all();
        return $cargos;
    }

    public function atribuir($user,  $cargo_name){
        $cargos = CargosController::consulta();
        foreach($cargos as $cargo){
            if($cargo->nome == $cargo_name){
                $user->cargo_id = $cargo->id;
                $user->save();
            }
        }
    }
}
