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

//o middleware('auth') para mostrar que todo este grupo de rotas vai ser autenticado
//prefixo é para aparecer na rota /admin
//para não precisar colocar o nome da pasta coloca namespace
Route::middleware(['auth'])->prefix('admin')->namespace('admin')->group(function () {
    //com o resource tu tem acesso a todas as rotas da controle que 
    //tu usou o comando php artisan make:controller pasta/nome_controller --resource para criar a controler
    //https://laravel.com/docs/5.5/controllers#resource-controllers
    Route::resource('artigos', 'ArtigosController');
});