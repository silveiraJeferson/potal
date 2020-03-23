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
    return view('portal.read');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('/milionarios', 'MilionariosController');

//------------------------------------------------------------------
Route::resource('/jogos', 'milionarios\JogosController');
Route::get('/jogos/salvarjogo','milionarios\JogosController@salvarjogo');
//----------------------------------------------------------------------------

Route::resource('/apostador', 'milionarios\ApostadorController');
Route::resource('/grupo', 'milionarios\GrupoApostaController');
Route::post('/grupo/grupo_remove/{$id}', 'milionarios\GrupoApostaController@remove');



Route::post('/setpessoas', 'milionarios\GrupoApostaController@setpessoas');
Route::resource('/organizacao', 'milionarios\OrganizacaoController');

