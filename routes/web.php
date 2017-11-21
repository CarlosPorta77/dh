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

Route::get('/', 'TestController@welcome')->name('welcome');
//Route::get('/welcome', 'TestController@welcome');

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
  Route::get('/products', 'ProductController@index')->name('admin.products.index'); // listar
  Route::get('/products/create', 'ProductController@create')->name('admin.products.create'); //crear
  Route::post('/products', 'ProductController@store')->name('admin.products.store'); //guardar
  Route::get('/products/{id}/edit', 'ProductController@edit')->name('admin.products.edit'); // formulario de edición
  Route::post('/products/{id}/edit', 'ProductController@update')->name('admin.products.update'); //actualizar
  Route::delete('/products/{id}', 'ProductController@destroy')->name('admin.products.destroy');

  Route::get('/products/{id}/images', 'ImageController@index')->name('admin.products.images.index'); //listado
  Route::post('/products/{id}/images', 'ImageController@store')->name('admin.products.images.store'); //guardar
  Route::delete('/products/{id}/images', 'ImageController@destroy')->name('admin.products.images.destroy'); //guardar
  Route::get('/products/{product_id}/images/select/{image_id}', 'ImageController@select')->name('admin.products.images.select'); //guardar
});
