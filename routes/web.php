<?php

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

// Rota para traduzir linguagem
Route::get('lang', function () {
    $lang = session('lang','pt-br');
    if($lang == 'pt-br'){
        $lang = "en";
    } else {
        $lang = "pt-br";
    }
    session(['lang'=>$lang]);
    return redirect()->back();
})->name('lang');

// Rota pagina de boas vindas
Route::get('/modelo', function () {
    return view('modelo.welcome');
});

Auth::routes();

Route::namespace('Site')->group(function (){
    Route::get('/', 'PrincipalController@index')->name('principal');
});

// namespace : é a pasta onde está as controllers
Route::middleware('auth')->namespace('Admin')->group(function (){
    Route::get('/home', 'HomeController@index')->name('home');
});

// Rotas para o administrativo 
// Usando o middleware('can:') para barrar acesso não autorizado
Route::prefix('admin')->middleware('auth')->namespace('Admin')->group(function (){
    // Controle users
    Route::resource('/users', 'UserController');
    /*
    Route::get('/users','UserController@index')->name('users.index')->middleware('can:list-user');
    Route::get('/users/{user}','UserController@show')->name('users.show')->middleware('can:show-user');
    Route::get('/users/{user}/edit','UserController@edit')->name('users.edit')->middleware('can:edit-user'); 
    Route::get('/users/create','UserController@create')->name('users.create')->middleware('can:create-user');
    Route::post('/users','UserController@store')->name('users.store')->middleware('can:create-user');
    Route::put('/users/{user}','UserController@update')->name('users.update')->middleware('can:edit-user');
    Route::delete('/users/{user}','UserController@destroy')->name('users.destroy')->middleware('can:delete-user');
    */
});

Route::prefix('admin')->middleware(['auth','can:acl'])->namespace('Admin')->group(function () {
    Route::resource('/permissions', 'PermissionController');
    Route::resource('/roles', 'RoleController');
});
