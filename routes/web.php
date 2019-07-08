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

Route::get('/','FrontEnd\PagesController@index')->name('index');
Route::get('/contact','FrontEnd\PagesController@contact')->name('contact');
Route::get('/product','FrontEnd\PagesController@product')->name('product');

  //Admin Route ALL Admin

Route::group([ 'prefix' => 'admin' ], function()
{
  Route::get('/','FrontEnd\PagesController@index')->name('admin.index');

  //product Route

  Route::group([ 'prefix' => 'product' ], function()
  {
  Route::get('/','BackEnd\ProductsController@index')->name('admin.product');
  Route::get('/create','BackEnd\ProductsController@create')->name('admin.product.create');
  Route::get('/edit/{id}','BackEnd\ProductsController@edit')->name('admin.product.edit');

  Route::post('/store','BackEnd\ProductsController@store')->name('admin.product.store');
  Route::post('/update/{id}','BackEnd\ProductsController@update')->name('admin.product.update');
  Route::post('/delete/{id}','BackEnd\ProductsController@delete')->name('admin.product.delete');
  });
});


//
// Route::group( [ 'prefix' => 'admin' ], function()
// {
//     Route::get('dashboard', function() {} );
//     Route::get('settings', function() {} );
// });
