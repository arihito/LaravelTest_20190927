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
use Validator;
use Illuminate\Http\Request;
use App\Book;


Route::get('/', function () {
    return view('books');
});

Route::post('/books', function(Request $request) {
    
    // バリデーション
    $validator = Validator::make($request->all(),[
        'item_name' => 'required|max:255',
    ]);
    
    // バリデーションエラー
    if ($validator -> fails()) {
        return redirect('/')
            ->withInput()
            ->withErrors($validator);
    }
    
    // Eloquentモデル
    $books = new Book;
    $books -> item_name = $request -> item_name;
    $books -> item_number = '1';
    $books -> item_amount = '1000';
    $books -> published = '2019-09-27 00:00:00';
    $books -> save();
    // ルートにリダイレクト
    return redirect('/');
});

Route::delete('/book/{book}', function (Book $book) {
    
});
