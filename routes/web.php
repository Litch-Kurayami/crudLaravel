<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PeliculaController;

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

/* Route::get('/pelicula', function () {
    return view('pelicula.index');
});
Route::get('/pelicula/create',[PeliculaController::class, 'create']); */

Route::resource('pelicula', PeliculaController::class)->middleware('auth');
Auth::routes(['register' => false, 'reset' => false]);

Route::get('/home', [PeliculaController::class, 'index'])->name('home');

Route::group(['middleware' => 'auth'], function (){
    Route::get('/', [PeliculaController::class, 'index'])->name('home');
});