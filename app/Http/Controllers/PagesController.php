<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\MembrosController;
use App\Http\Controllers\CargosController;

class PagesController extends Controller
{
    public function relatorios(){
        return view('relatorios');
    }

    public function membros(){
        $membrosController = new MembrosController;
        $users = $membrosController->consulta()->sortBy('cargo_id'); //ordem por cargo

        $cargosController = new CargosController;
        $cargos = $cargosController->consulta();

        return view('membros', ['users' => $users], ['cargos' => $cargos]);
    }

    public function novaVida(){
        return view('novaVida');
    }

    public function backup(){
        return view('backups');
    }


}
