<!-- resouces/views/books.blade.php -->

@extends('layouts.app')

@section('content')

    <!-- Bootstrapの定形コード -->
    <div class="panel-body">
        
        <!-- バリデーションエラーの表示に使用 -->
        @include('common.errors')
        
        <!-- 本登録フォーム -->
        <form action="{{ url('books') }}" method="POST" class="form-horizontal">
            
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
        
        <!-- 現在の本 -->
        @if (count($books) > 0)
            <div class="panel panel-default">
                <div class="panel-heading">
                    現在の本
                </div>
                <div class="panel-body">
                    <table class="table table-striped task-table">
                        <thead>
                            <th>本一覧</th>
                            <th>&nbsp;</th>
                        </thead>
                        <tbody>
                            @foreach ($books as $book)
                                <tr>
                                    <!-- 本タイトル -->
                                    <td class="table-text">
                                        <div>{{ $book->item_name }}</div>
                                    </td>
                                    
                                    <!-- 本の削除ボタン -->
                                    <td>
                                        <form action="{{ url('book/' . $book->id) }}" method="POST">
                                            {{ csrf_field() }}
                                            <!-- HTTP Methodを擬似的に変更 -->
                                            {{ method_field('DELETE') }}
                                            
                                            <button type="submit" class="btn btn-danger">
                                                <i class="fa fa-trash"></i> 削除
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @endif
    </div>
@endsection