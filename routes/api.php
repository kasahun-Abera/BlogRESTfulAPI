<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
/**********************************   Category Route Starts Here   *******************************************/
Route::get('/categories', 'CategoryController@index');
Route::get('/categories/{category}', 'CategoryController@show');
Route::post('/categories', 'CategoryController@store');
Route::put('/categories/{category}', 'CategoryController@update');
Route::delete('/categories/{category}', 'CategoryController@destroy');
/**********************************   Category Route Ends Here   *******************************************/

/**********************************   Article Route Starts Here   *******************************************/
Route::get('/articles', 'ArticleController@index');
Route::get('/articles/{article}', 'ArticleController@show');
Route::post('/articles/add', 'ArticleController@store');
Route::put('/articles/{article}', 'ArticleController@update');
Route::delete('/articles/{article}', 'ArticleController@destroy');
/**********************************   Article Route Ends Here   *******************************************/

/**********************************   Tag Route Starts Here   *******************************************/
Route::get('/tags', 'TagController@index');
Route::get('/tags/{tag}', 'TagController@show');
Route::post('/tags', 'TagController@store');
Route::put('/tags/{tag}', 'TagController@update');
Route::delete('/tags/{tag}', 'TagController@destroy');
/**********************************   Tag Route Ends Here   *******************************************/