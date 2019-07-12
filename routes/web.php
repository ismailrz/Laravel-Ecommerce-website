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
Route::get('/search','FrontEnd\PagesController@search')->name('search');


// FrontEnd  Routes
Route::group([ 'prefix' => 'products' ], function()
{
    // Product Routes
  Route::get('/','FrontEnd\ProductsController@index')->name('products');
  Route::get('/{slug}','FrontEnd\ProductsController@show')->name('product.show');
  Route::get('/new/search','FrontEnd\ProductsController@search')->name('product.search');

    //category Route

    Route::get('categories','FrontEnd\CategoriesController@index')->name('categories.index');
    Route::get('categories/{id}','FrontEnd\CategoriesController@show')->name('categories.show');

  });

  // User Verification Routes
  Route::get('/token/{token}','FrontEnd\VerificationController@verify')->name('user.verification');


  //Admin BackEnd Route ALL Admin

Route::group([ 'prefix' => 'admin' ], function()
{
  Route::get('/','BackEnd\PagesController@index')->name('admin.index');

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


  //Category Route
  Route::group([ 'prefix' => 'categories' ], function()
  {
  Route::get('/','BackEnd\CategoriesController@index')->name('admin.categories');
  Route::get('/create','BackEnd\CategoriesController@create')->name('admin.category.create');
  Route::get('/edit/{id}','BackEnd\CategoriesController@edit')->name('admin.category.edit');

  Route::post('/store','BackEnd\CategoriesController@store')->name('admin.category.store');
  Route::post('/update/{id}','BackEnd\CategoriesController@update')->name('admin.category.update');
  Route::post('/delete/{id}','BackEnd\CategoriesController@delete')->name('admin.category.delete');
  });

  //Brands Route
  Route::group([ 'prefix' => 'brands' ], function()
  {
  Route::get('/','BackEnd\BrandsController@index')->name('admin.brands');
  Route::get('/create','BackEnd\BrandsController@create')->name('admin.brand.create');
  Route::get('/edit/{id}','BackEnd\BrandsController@edit')->name('admin.brand.edit');

  Route::post('/store','BackEnd\BrandsController@store')->name('admin.brand.store');
  Route::post('/update/{id}','BackEnd\BrandsController@update')->name('admin.brand.update');
  Route::post('/delete/{id}','BackEnd\BrandsController@delete')->name('admin.brand.delete');
  });

  // Division Route
  Route::group([ 'prefix' => 'divisions' ], function()
  {
  Route::get('/','BackEnd\DivisionsController@index')->name('admin.divisions');
  Route::get('/create','BackEnd\DivisionsController@create')->name('admin.division.create');
  Route::get('/edit/{id}','BackEnd\DivisionsController@edit')->name('admin.division.edit');

  Route::post('/store','BackEnd\DivisionsController@store')->name('admin.division.store');
  Route::post('/update/{id}','BackEnd\DivisionsController@update')->name('admin.division.update');
  Route::post('/delete/{id}','BackEnd\DivisionsController@delete')->name('admin.division.delete');
  });
  // District Route
  Route::group([ 'prefix' => 'districts' ], function()
  {
  Route::get('/','BackEnd\DistrictsController@index')->name('admin.districts');
  Route::get('/create','BackEnd\DistrictsController@create')->name('admin.district.create');
  Route::get('/edit/{id}','BackEnd\DistrictsController@edit')->name('admin.district.edit');

  Route::post('/store','BackEnd\DistrictsController@store')->name('admin.district.store');
  Route::post('/update/{id}','BackEnd\DistrictsController@update')->name('admin.district.update');
  Route::post('/delete/{id}','BackEnd\DistrictsController@delete')->name('admin.district.delete');
  });

});


//
// Route::group( [ 'prefix' => 'admin' ], function()
// {
//     Route::get('dashboard', function() {} );
//     Route::get('settings', function() {} );
// });

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
