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

# [HelloMiddleware::class]で何故かできない
Route::middleware([\App\Http\Middleware\HelloMiddleware::class])->group(function () {
    Route::get('/hello', 'HelloController@index');
    // Route::get('/hello/other', 'HelloController@other');
    Route::post('/hello/other', 'HelloController@other');
});

// Route::get('/hello', 'HelloController@index')->name('hello');
// Route::get('/hello/{id}', 'HelloController@show')->where('id', '[0-9]+');
// Route::get('/hello/other', 'HelloController@other');


Route::namespace('Sample')->group(function () {
    Route::get('/sample', 'SampleController@index');
    Route::get('/sample/other', 'SampleController@other');
});
