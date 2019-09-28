<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
use Validator;

class BooksController extends Controller
{
    public function index (Request $request)
    {
        $books = Book::orderBy('created_at','asc')->get();
        return view('books',[
            'books' => $books    
        ]);
    }

    public function store (Request $request)
    {
        // バリデーション
        $validator = Validator::make($request->all(),[
            'item_name'   => 'required|min:3|max:255',
            'item_number' => 'required|min:1|max:3',
            'item_amount' => 'required|max:6',
            'published'   => 'required',
        ]);
        
        // バリデーションエラー
        if ($validator -> fails()) {
            return redirect('/')
                ->withInput()
                ->withErrors($validator);
        }
        
        // Eloquentモデル
        $books = new Book;
        $books -> item_name   = $request -> item_name;
        $books -> item_number = $request -> item_number;
        $books -> item_amount = $request -> item_amount;
        $books -> published   = $request -> published;
        $books -> save();
        // ルートにリダイレクト
        return redirect('/');
    }

    public function edit (Book $books)
    {
       return view('booksedit',['book' => $books]); 
    }

    public function update (Request $request)
    {
        // バリデーション
        $validator = Validator::make($request->all(),[
            'id'          => 'required',
            'item_name'   => 'required|min:3|max:255',
            'item_number' => 'required|min:1|max:3',
            'item_amount' => 'required|max:6',
            'published'   => 'required',
        ]);
        
        // バリデーションエラー
        if ($validator -> fails()) {
            return redirect('/')
                ->withInput()
                ->withErrors($validator);
        }
        
        // Eloquentモデル
        $books = Book::find($request -> id);
        $books -> item_name   = $request -> item_name;
        $books -> item_number = $request -> item_number;
        $books -> item_amount = $request -> item_amount;
        $books -> published   = $request -> published;
        $books -> save();
        // ルートにリダイレクト
        return redirect('/');
    }
    
    public function destroy (Book $book) 
    {
        $book -> delete();
        return redirect('/');
    }

}
