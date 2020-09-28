<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
// Route::resource('posts', 'PostController');

Route::group(['prefix'=>'posts','as'=>'posts.'], function(){
    Route::get('', ['as' => 'index', 'uses' => 'PostController@index'])->middleware('permission:edit post');
    Route::post('', ['as' => 'store', 'uses' => 'PostController@store'])->middleware('permission:edit post');
    Route::get('/create', ['as' => 'create', 'uses' => 'PostController@create'])->middleware('permission:write post');
    Route::get('/{post}', ['as' => 'show', 'uses' => 'PostController@show'])->middleware('permission:publish post');
    Route::put('/{post}', ['as' => 'update', 'uses' => 'PostController@update'])->middleware('permission:edit post');
    Route::delete('/{post}', ['as' => 'destroy', 'uses' => 'PostController@destroy'])->middleware('role:admin');
    Route::get('/{post}/edit', ['as' => 'edit', 'uses' => 'PostController@edit'])->middleware('permission:edit post');
});