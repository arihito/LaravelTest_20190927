<!-- resouces/views/booksedit.blade.php -->

@extends('layouts.app')

@section('content')

    <div class="row">
        
        <div class="col-md-12">
            
            <!-- バリデーションエラーの表示に使用 -->
            @include('common.errors')
            
            <!-- 本登録フォーム -->
            <form action="{{ url('books/update') }}" method="POST" class="row">
                
                <!-- CSRFセキュリティ対策 -->
                {{ csrf_field() }}
                
                <!-- ページ遷移用の引き継ぎidを送信 -->
                <input type="hidden" name="id" value="{{ $book -> id }}">
                
                <!-- 本のタイトル -->
                <div class="form-group col-6">
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text">本の名前</div>
                        </div>
                        <input type="text" name="item_name" value="{{ $book->item_name }}" class="form-control">
                    </div>
                </div>
                <!-- 本の冊数 -->
                <div class="form-group col-6">
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text">冊数</div>
                        </div>
                        <input type="number" name="item_number" value="{{ $book->item_number }}" class="form-control">
                    </div>
                </div>
                <!-- 本の金額 -->
                <div class="form-group col-6">
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text">金額</div>
                        </div>
                        <input type="number" name="item_amount" value="{{ $book->item_amount }}" class="form-control">
                    </div>
                </div>
                <!-- 本の公開日時 -->
                <div class="form-group col-6">
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text">本の公開日時</div>
                        </div>
                        <input type="date" name="published" value="{{ date('Y-m-d',strtotime($book->published)) }}" class="form-control">
                    </div>
                </div>
            
                <!-- 戻ると登録ボタン -->
                <div class="form-group col-9">
                    <button type="submit" class="btn btn-primary btn-lg btn-block">
                        <i class="fa fa-plus"></i> 送信
                    </button>
                </div>
                <div class="form-group col-3">
                    <a href="{{ url('/') }}" class="btn btn-secondary btn-lg btn-block">
                        <i class="fa fa-chevron-left"></i> 戻る
                    </a>
                </div>
            </form>
        </div>
    </div>
@endsection