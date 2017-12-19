<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::group(['prefix' => '',  'middleware' => 'auth'], function()
{


Auth::routes();
Route::get('/logout', 'Auth\LoginController@logout');
Route::get('/', 'HomeController@index');
Route::resource('brand', 'BrandController');
Route::resource('category', 'CategoryController');
Route::resource('subcategory', 'SubcategoryController');

Route::get('/pdf', 'BrandController@pdf');
Route::get('/excel', 'BrandController@excel');

Route::get('generate-docx', 'BrandController@generateDocx');
});

// Route::resource('brand', 'BrandController', [
//     'anyData'  => 'brand.data',
//     'index' => 'brand',
// ]);

// Route::get('users/data', ['as' => 'users.data', 'uses' => 'UserController@data']);
// Route::resource('users', 'UserController');
