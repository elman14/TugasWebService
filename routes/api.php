<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//Route::group(['prefix'=> 'v1'], function (){
Route::delete('category/{category}', 'CategoryController@dstroy');
Route::post('category', 'CategoryController@store');
Route::get('category', 'CategoryController@index');

Route::get('category/{category}', 'CategoryController@show');


Route::get('barang', 'API\ProductController@index');

Route::get('barang/{id}', 'API\ProductController@show');

// hapus data
Route::delete('barang/{id}', 'API\ProductController@destroy');

// tambah data
Route::post('barang', 'API\ProductController@store');

//});
