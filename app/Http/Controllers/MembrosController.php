<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Entrada;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class MembrosController extends Controller
{
    //read
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

    //update
    public function editar(Request $request){
        $users = MembrosController::consulta();
        $atribuir = new CargosController; //chama função atribuir la em baixo

        foreach($users as $user){
            $form_id = $request->input('user_'.$user->id.'_id');
            $form_cargo = $request->input('user_'.$user->id.'_cargo');
            $form_entrada = $request->input('user_'.$user->id.'_entrada');

            if($user->id == $form_id){
                $atribuir->atribuir($user, $form_cargo);
                MembrosController::entradas_edit($user, $form_entrada);
            }
        }


        return redirect()->back()->with('message', 'editado');
    }

    public function membros_view(){
        $users = MembrosController::consulta()->sortBy('cargo_id'); //ordem por cargo

        $cargosController = new CargosController;
        $cargos = $cargosController->consulta();

        $entradas = MembrosController::consulta_entrada();

        return view('membros.membros-view', [
            'users' => $users,
            'cargos' => $cargos,
            'entradas' => $entradas
        ]);
    }


    public function membros_create_form(){
        $users = MembrosController::consulta()->sortBy('cargo_id'); //ordem por cargo

        $cargosController = new CargosController;
        $cargos = $cargosController->consulta();

        $entradas = MembrosController::consulta_entrada();

        return view('membros.membros-create', [
            'users' => $users,
            'cargos' => $cargos,
            'entradas' => $entradas
        ]);
    }

    //create
    public function membros_create(Request $request){
        $user = [
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => $request['senha'],
            'telefone' => $request['telefone'],
            'cargo_id' => $request['cargo_id'],
            'entrada_id' => $request['entrada_id'],
       ];

       $user['password'] = bcrypt($user['password']); //criptografia
       User::insert($user);
       return MembrosController::membros_view();
    }


    //entradas

    //read entradas
    public function consulta_entrada(){
        $entradas = Entrada::all();
        return $entradas;
    }

    public function entradas_edit($user, $entrada_name){
        $entradas = MembrosController::consulta_entrada();
        foreach($entradas as $entrada){
            if($entrada->nome == $entrada_name){
                $user->entrada_id = $entrada->id;
                $user->save();
            }
        }
    }
}


