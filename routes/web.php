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

// Route::get('/', function () {
//     return view('welcome');
// });


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/','ArticleController@index');
Route::get('/articles','ArticleController@index');
Route::get('/articles/detail/{id}','ArticleController@detail');
Route::get('/articles/add','ArticleController@add');
Route::post('/articles/add','ArticleController@create');
Route::get('/articles/delete/{id}','ArticleController@delete');
Route::post('/comments/add','CommentController@create');
Route::get('/comments/delete/{id}','CommentController@delete');
Route::get('/articles/edit/{id}','ArticleController@edit');
Route::put('/articles/edit/{id}','ArticleController@update')->name('edit');