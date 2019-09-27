<!-- resouces/views/books.blade.php -->

@extends('layouts.app')

@section('content')

    <!-- Bootstrapの定形コード -->
    <div class="card-body">
        
        <!-- バリデーションエラーの表示に使用 -->
        @include('common.errors')
        
        <!-- 本登録フォーム -->
        <form action="{{ url('books') }}" method="POST" class="form-horizontal row">
            
            <!-- CSRFセキュリティ対策 -->
            {{ csrf_field() }}
            
            <!-- 本のタイトル -->
            <div class="form-group col-6">
                <div class="input-group mb-2">
                    <div class="input-group-prepend">
                        <div class="input-group-text">本の名前</div>
                    </div>
                    <input type="text" name="item_name" class="form-control">
                </div>
            </div>
            <!-- 本のタイトル -->
            <div class="form-group col-6">
                <div class="input-group mb-2">
                    <div class="input-group-prepend">
                        <div class="input-group-text">冊数</div>
                    </div>
                    <input type="number" name="item_number" class="form-control">
                </div>
            </div>
            <!-- 本の金額 -->
            <div class="form-group col-6">
                <div class="input-group mb-2">
                    <div class="input-group-prepend">
                        <div class="input-group-text">金額</div>
                    </div>
                    <input type="number" name="item_amount" class="form-control">
                </div>
            </div>
            <!-- 本の公開日時 -->
            <div class="form-group col-6">
                <div class="input-group mb-2">
                    <div class="input-group-prepend">
                        <div class="input-group-text">本の公開日時</div>
                    </div>
                    <input type="date" name="published" class="form-control">
                </div>
            </div>
            
            <!-- 本の登録ボタン -->
            <div class="form-group col-12">
                <button type="submit" class="btn btn-secondary btn-lg btn-block">
                    <i class="fa fa-plus"></i> 送信
                </button>
            </div>
        </form>
        
        <!-- 現在の本 -->
        @if (count($books) > 0)
            <div class="card">
                <div class="card-body">
                    <h4 class="display-4 card-title text-center">現在の本</h4>
                </div>
                <div class="card-body">
                    <table class="table table-striped task-table">
                        <thead>
                            <th>本の名前</th>
                            <th>冊数</th>
                            <th>金額</th>
                            <th>本の公開日時</th>
                            <th>削除</th>
                        </thead>
                        <tbody>
                            @foreach ($books as $book)
                                <tr>
                                    <!-- 本タイトル -->
                                    <td class="table-text">
                                        <div>{{ $book->item_name }}</div>
                                    </td>
                                    <!-- 何冊 -->
                                    <td class="table-text">
                                        <div>{{ $book->item_number }}</div>
                                    </td>
                                    <!-- 金額 -->
                                    <td class="table-text">
                                        <div>{{ $book->item_amount }}</div>
                                    </td>
                                    <!-- 本公開日時 -->
                                    <td class="table-text">
                                        <div>{{ $book->published }}</div>
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