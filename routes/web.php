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
use Illuminate\Http\Request;
use App\Book;


Route::get('/', 'BooksController@index');

Route::post('/books', 'BooksController@store');

Route::post('/booksedit/{books}', 'BooksController@edit');

Route::post('/books/update', 'BooksController@update');

Route::delete('/book/{book}', 'BooksController@destroy');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
