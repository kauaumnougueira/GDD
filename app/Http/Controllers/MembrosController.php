<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class MembrosController extends Controller
{
    public function consulta(){
        $users = User::all();
        return $users;
    }

    //atribui role por cargo
    public function roles($role, $userId){
        $users = MembrosController::consulta();
        foreach($users as $user){
            if($user->id == $userId){
                $user->cargo = $role;
            }
        }
    }

    public function editar(Request $request){
        $users = MembrosController::consulta();
        $atribuir = new CargosController;

        foreach($users as $user){
            $form_id = $request->input('user_'.$user->id.'_id');
            $form_cargo = $request->input('user_'.$user->id.'_cargo');
            if($user->id == $form_id){
                $atribuir->atribuir($user, $form_cargo);
            }
        }
        return redirect()->back()->with('message', 'editado');
    }
}
