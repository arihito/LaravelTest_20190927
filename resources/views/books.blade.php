<!-- resouces/views/books.blade.php -->

@extends('layouts.app')

@section('content')

    <!-- Bootstrapの定形コード -->
    <div class="panel-body">
        
        <!-- バリデーションエラーの表示に使用 -->
        @include('common.errors')
        
        <!-- 本登録フォーム -->
        <form action="" method="POST" class="form-horizontal">
            
            <!-- CSRFセキュリティ対策 -->
            {{ csrf_field() }}
            
            <!-- 本のタイトル -->
            <div class="form-group">
                <label for="book" class="col-sm-3 control-label">Book</label>
                <div class="col-sm-6"><input type="text" name="item_name" id="book-name" class="form-control"></div>
            </div>
            
            <!-- 本の登録ボタン -->
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" class="btn btn-default">
                        <i class="fa fa-plus"></i> Save
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection