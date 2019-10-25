<?php

use Illuminate\Http\Request;
use App\Http\Middleware;

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

# [HelloMiddleware::class]で何故かできない
Route::middleware([\App\Http\Middleware\HelloMiddleware::class])->group(function () {
    // Route::get('/hello', 'HelloController@index')->name('hello');
    Route::get('/hello/{id}', 'HelloController@index');

    Route::get('/hello/{msg}', 'HelloController@other');
});

// Route::get('/hello', 'HelloController@index')->name('hello');
// Route::get('/hello/{id}', 'HelloController@show')->where('id', '[0-9]+');
// Route::get('/hello/other', 'HelloController@other');


Route::namespace('Sample')->group(function () {
    Route::get('/sample', 'SampleController@index');
    Route::get('/sample/other', 'SampleController@other');
});
