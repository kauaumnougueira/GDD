<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;
use App\Http\Controllers\Controller;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::get('/', [Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', function(){ return redirect()->route('home'); });
Route::get('/relatorios', [Controllers\PagesController::class, 'relatorios'])->name('relatorios');

Route::get('/membros-view', [Controllers\MembrosController::class, 'membros_view'])->name('membros-view');
Route::post('/save-edit', [Controllers\MembrosController::class, 'editar'])->name('save-edit');

Route::get('/membros-edit', [Controllers\MembrosController::class, 'membros_edit'])->name('membros-edit');
Route::post('/membros-create', [Controllers\MembrosController::class, 'membros_create'])->name('membros-create');

Route::get('/novaVida', [Controllers\PagesController::class, 'novaVida'])->name('novaVida');
Route::get('/backup', [Controllers\PagesController::class, 'backup'])->name('backup');

//Route::post('/search', [Controllers\FooterController::class, 'manutencao'])->name('manutencao');

