<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\MembrosController;
use App\Http\Controllers\CargosController;

class PagesController extends Controller
{
    public function relatorios(){
        $cargosController = new CargosController;
        $cargos = $cargosController->consulta();
        return view('relatorios', ['cargos'=> $cargos]);
    }

    public function novaVida(){
        $cargosController = new CargosController;
        $cargos = $cargosController->consulta();
        return view('novaVida', ['cargos'=> $cargos]);
    }

    public function backup(){
        $cargosController = new CargosController;
        $cargos = $cargosController->consulta();
        return view('backups', ['cargos'=> $cargos]);
    }


}
