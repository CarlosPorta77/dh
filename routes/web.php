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
Route::get('/soon', 'TestController@soon')->name('soon');

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/cart', 'HomeController@cart')->name('cart');

Route::get('/products/{id}', 'ProductController@show')->name('user.products.show');

Route::post('/cart/', 'CartDetailController@store')->name('user.cart.store');
Route::delete('/cart', 'CartDetailController@destroy')->name('user.cart.destroy');

Route::get('/checkout1', 'CartController@checkout1')->name('user.cart.checkout1');
Route::get('/checkout2', 'CartController@checkout2')->name('user.cart.checkout2');
Route::post('/checkout3', 'CartController@checkout3')->name('user.cart.checkout3');
Route::post('/checkout4', 'CartController@checkout4')->name('user.cart.checkout4');


Route::middleware(['auth', 'admin'])->prefix('admin')->namespace('Admin')->group(function () {
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

  Route::get('/categories', 'CategoryController@index')->name('admin.categories.index'); // listar
  Route::get('/categories/create', 'CategoryController@create')->name('admin.categories.create'); //crear
  Route::post('/categories', 'CategoryController@store')->name('admin.categories.store'); //guardar
  Route::get('/categories/{category}/edit', 'CategoryController@edit')->name('admin.categories.edit'); // formulario de edición
  Route::post('/categories/{category}/edit', 'CategoryController@update')->name('admin.categories.update'); //actualizar
  Route::delete('/categories/{category}', 'CategoryController@destroy')->name('admin.categories.destroy');

});
