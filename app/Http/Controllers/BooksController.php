<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Book;
use Validator;

class BooksController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth:api');
    // }

    public function index ()
    {
        $books = Book::where('user_id', 
            Auth::user()->id)
            ->orderBy('created_at','asc')
            ->paginate(3);
        $auths = AUTH::user();
        return view('books',[
            'books' => $books,
            'auths' => $auths
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
        $books -> user_id     = Auth::user() -> id;
        $books -> item_name   = $request -> item_name;
        $books -> item_number = $request -> item_number;
        $books -> item_amount = $request -> item_amount;
        $books -> published   = $request -> published;
        $books -> save();
        // ルートにリダイレクト
        return redirect('/');
    }

    public function edit ($book_id)
    {
        $books = Book::where('user_id', Auth::user()->id)->find($book_id);
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
        $books = Book::where('user_id', Auth::user()->id)->find($request -> id);
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
