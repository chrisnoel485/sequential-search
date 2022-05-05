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
//Route::group(['middleware' => 'auth'], function() {
    
    //Route yang berada dalam group ini hanya dapat diakses oleh user
    //yang memiliki role admin
//    Route::group(['middleware' => ['role:admin']], function () {
        Route::resource('/role', 'RoleController')->except([
            'create', 'show', 'edit', 'update'
        ]);
        Route::resource('/users', 'UserController')->except([
            'show'
        ]);
        Route::get('/users/roles/{id}', 'UserController@roles')->name('users.roles');
        Route::put('/users/roles/{id}', 'UserController@setRole')->name('users.set_role');
        Route::post('/users/permission', 'UserController@addPermission')->name('users.add_permission');
        Route::get('/users/role-permission', 'UserController@rolePermission')->name('users.roles_permission');
        Route::put('/users/permission/{role}', 'UserController@setRolePermission')->name('users.setRolePermission');
//    });
    
    
    //route yang berada dalam group ini, hanya bisa diakses oleh user
    //yang memiliki permission yang telah disebutkan dibawah
//    Route::group(['middleware' => ['permission:show products|create products|delete products']], function() {
        Route::resource('/merek', 'MerekController');
        Route::resource('/jenis', 'JenisController');
        Route::resource('/kategori', 'KategoriController');
        Route::resource('/tim', 'TimController');
        Route::resource('/letak', 'LetakController');
        Route::resource('/aset', 'AsetController');
        Route::resource('/posisi', 'PosisiController');
        Route::get('aset/{aset}/edita', 'AsetController@edita')->name('aset.edita');
        Route::get('aset/{aset}', 'AsetController@updatea')->name('aset.updatea');
//    });
    
    //home kita taruh diluar group karena semua jenis user yg login bisa mengaksesnya
    Route::get('/home', 'HomeController@index')->name('home');
//});

//Route::group(['middleware' => 'auth'], function() {
//    Route::resource('/merek', 'MerekController');
//    Route::resource('/jenis', 'JenisController');
//    Route::resource('/kategori', 'KategoriController');
//    Route::resource('/tim', 'TimController');
//    Route::resource('/letak', 'LetakController');
//    Route::resource('/aset', 'AsetController');
//    Route::resource('/posisi', 'PosisiController');
//    Route::get('aset/{aset}/edita', 'AsetController@edita')->name('aset.edita');
//    Route::get('aset/{aset}', 'AsetController@updatea')->name('aset.updatea');
//    //Route::get('aset/{aset}', 'AsetController@show')->name('aset.show');
//
//});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
