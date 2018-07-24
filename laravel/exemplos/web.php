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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();


Route::get('/home', 'HomeController@index')->name('home');


/*
 * Rotas do usuario
 */

Route::group(['middleware' => 'is.user'], function (){
    Route::prefix('user')->group(function (){
        Route::get('panel', 'Panel\Users\UserController@index')->name('user.index');
        Route::get('panel/meusDados', 'Panel\Users\UserController@meusDados')->name('user.dados');
        Route::get('panel/enviarCurriculo', 'Panel\Users\UserController@EnviarCurriculo')->name('user.cv');
        Route::post('panel/meusDados/{id}', 'Panel\Users\UserController@updateUserDados')->name('user.dados.save');
        Route::post('panel/enviarCv/', 'Panel\Users\UserController@enviarCv')->name('user.cv.enviar');
    });
});

/*
 * Rotas do administrador
 */

Route::group(['middleware' => 'is.adm'], function (){
    Route::prefix('adm')->group(function (){
        Route::get('panel', 'Panel\Adm\AdmController@index')->name('adm.index');
        Route::get('panel/users', 'Panel\Adm\AdmController@showUsers')->name('adm.users');
        Route::get('panel/users/{id}', 'Panel\Adm\AdmController@showOnlyUser')->name('adm.users.show');
        Route::get('panel/cv/{cv}', 'Panel\Adm\AdmController@showCv')->name('adm.show.cv');
    });
});