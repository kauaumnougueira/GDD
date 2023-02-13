<?php

namespace App\Http\Controllers;

use App\Http\Controllers\CargosController;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $cargosController = new CargosController;
        $cargos = $cargosController->consulta();

        return view('home', ['cargos'=> $cargos]);
    }
}
