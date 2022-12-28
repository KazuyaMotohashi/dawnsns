<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
    <!--IEブラウザ対策-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="ページの内容を表す文章" />
    <title></title>
    <link rel="stylesheet" href="{{asset('css/reset.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <!--スマホ,タブレット対応-->
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <!--サイトのアイコン指定-->
    <link rel="icon" href="画像URL" sizes="16x16" type="image/png" />
    <link rel="icon" href="画像URL" sizes="32x32" type="image/png" />
    <link rel="icon" href="画像URL" sizes="48x48" type="image/png" />
    <link rel="icon" href="画像URL" sizes="62x62" type="image/png" />
    <!--iphoneのアプリアイコン指定-->
    <link rel="apple-touch-icon-precomposed" href="画像のURL" />
    <!--OGPタグ/twitterカード-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
     <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="js/script.js"></script>
</head>
<body>
    <header>
        <div id = "header">
        <h3><a href="/top"><img class="main-logo" src="{{asset('storage/images/main_logo.png')}}"></a></h3>
        <nav class="g-nav">
            <div id="pulldown-menu new-wrapper">
                <!-- メニューを出す要素 -->
                <div class="menu-trigger" id="list">
                    <a>{{$users->username}}さん<span class="material-symbols-outlined ku">expand_more</span><img class="header-icon" src="{{ asset('storage/images/'.$users->images)}}"></a>
                </div>
                <!-- メニューの中身 -->
                <div class="menu">
                    <ul>
                        <li class="nav-item"><a href="/top">ホーム</a></li>
                        <li class="nav-item"><a href="/profile">プロフィール</a></li>
                        <li class="nav-item"><a href="/logout">ログアウト</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        </div>
    </header>
    <div id="row">
        <div id="container">
            @yield('content')
        </div >
        <div id="side-bar">
            <div id="confirm">
                <p>{{ $users -> username }}さんの</p>
                <div class="side-item">
                <p>フォロー数</p>
                <p>{{ $follow }}名</p>
                </div>
                <p class="btn"><a href="/follow-list">フォローリスト</a></p>
                <div class="side-item">
                <p>フォロワー数</p>
                <p>{{ $follower }}名</p>
                </div>
                <p class="btn"><a href="/follower-list">フォロワーリスト</a></p>
            </div>
            <p class="btn search-btn"><a href="/search">ユーザー検索</a></p>
        </div>
    </div>
    <footer>
    </footer>
</body>
</html>
