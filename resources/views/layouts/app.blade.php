<!-- resources/views/layouts/app.blade.php -->
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Book List</title>
</head>
<body>
    <div class="container">
        <nav class="navbar nabvar-default">
            <!-- ナブバーの内容 -->
        </nav>
    </div>
    
    <!-- @section('content')の範囲を読み込み -->
    @yield('content')
</body>
</html>