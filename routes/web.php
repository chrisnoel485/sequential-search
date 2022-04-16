<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MerekController;

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::group(['middleware' => 'auth'], function() {
    Route::resource('/merek', 'MerekController');
    Route::resource('/jenis', 'JenisController');
    Route::resource('/kategori', 'KategoriController');
    Route::resource('/tim', 'TimController');
    Route::resource('/letak', 'LetakController');
    Route::resource('/aset', 'AsetController');
    Route::resource('/posisi', 'PosisiController');
    Route::get('aset/{aset}/edita','AsetController@edita');
});