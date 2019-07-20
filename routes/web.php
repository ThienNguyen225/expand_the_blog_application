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
Route::prefix('categories')->group(function () {
    Route::get('/', 'CategoryController@index')->name('categories.index');
    Route::get('create', 'CategoryController@create')->name('categories.create');
    Route::post('create', 'CategoryController@store')->name('categories.store');
    Route::get('{id}/edit', 'CategoryController@edit')->name('categories.edit');
    Route::post('{id}/update', 'CategoryController@update')->name('categories.update');
    Route::get('{id}/delete', 'CategoryController@delete')->name('categories.delete');
    Route::get('search', 'CategoryController@search')->name('categories.search');
});
Route::prefix('blogs')->group(function () {
    Route::get('/', 'BlogController@index')->name('blogs.index');
    Route::get('create', 'BlogController@create')->name('blogs.create');
    Route::post('store', 'BlogController@store')->name('blogs.store');
    Route::get('{id}/edit', 'BlogController@edit')->name('blogs.edit');
    Route::post('{id}/update', 'BlogController@update')->name('blogs.update');
    Route::get('{id}/delete', 'BlogController@delete')->name('blogs.delete');
    Route::get('search', 'BlogController@search')->name('blogs.search');
});