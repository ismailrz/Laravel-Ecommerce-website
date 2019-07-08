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

Route::get('/','PagesController@index')->name('index');
Route::get('/contact','PagesController@contact')->name('contact');
Route::get('/product','PagesController@product')->name('product');

  //Admin Route
Route::group([ 'prefix' => 'admin' ], function()
{
  Route::get('/','AdminPagesController@index')->name('admin.index');

  //product Route

  Route::group([ 'prefix' => 'product' ], function()
  {
  Route::get('/','AdminProductController@index')->name('admin.product');
  Route::get('/create','AdminProductController@create')->name('admin.product.create');
  Route::get('/edit/{id}','AdminProductController@edit')->name('admin.product.edit');


  Route::post('/store','AdminProductController@store')->name('admin.product.store');
  Route::post('/update/{id}','AdminProductController@update')->name('admin.product.update');
  Route::post('/delete/{id}','AdminProductController@delete')->name('admin.product.delete');
  });
});


//
// Route::group( [ 'prefix' => 'admin' ], function()
// {
//     Route::get('dashboard', function() {} );
//     Route::get('settings', function() {} );
// });
