<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function relatorios(){
        return view('relatorios');
    }

    public function membros(){
        return view('membros');
    }

    public function novaVida(){
        return view('novaVida');
    }

    public function backup(){
        return view('backups');
    }


}
