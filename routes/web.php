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
Route::get('/membros', [Controllers\PagesController::class, 'membros'])->name('membros');
Route::get('/novaVida', [Controllers\PagesController::class, 'novaVida'])->name('novaVida');
Route::get('/backup', [Controllers\PagesController::class, 'backup'])->name('backup');
