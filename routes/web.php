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

Route::get('/welcome', 'TestController@welcome');

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/admin/products', 'ProductController@index')->name('admin.products.index'); // listar
Route::get('/admin/products/create', 'ProductController@create')->name('admin.products.create'); //crear
Route::post('/admin/products', 'ProductController@store')->name('admin.products.store'); //guardar
Route::get('/admin/products/{id}/edit', 'ProductController@edit')->name('admin.products.edit'); // formulario de edición
Route::post('/admin/products/{id}/edit', 'ProductController@update')->name('admin.products.update'); //actualizar
Route::delete('/admin/products/{id}', 'ProductController@destroy')->name('admin.products.destroy');
