<?php

use App\Http\Controllers\EmpleadoPuestoController;
use App\Http\Controllers\PuestoController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PersonaController;
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

Route::get('/', function () {
    return view('auth.login');
});


//Route::get('/persona', function () {
//    return view('empleados.index');
//});
//
//
//Route::get('/persona/create',[PersonaController::class, 'create']);

Route::resource('empleados',PersonaController::class)->middleware('auth');
Route::resource('puestos',PuestoController::class)->middleware('auth');
Route::resource('empleados_puestos',EmpleadoPuestoController::class)->middleware('auth');

Route::get('/home', [App\Http\Controllers\PersonaController::class, 'index'])->name('home');

Auth::routes(['reset' => false]);



Route::group(['middleware' =>'auth'], function(){
    Route::get('/', [App\Http\Controllers\PersonaController::class, 'index'])->name('home');
});
