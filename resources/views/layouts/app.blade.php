<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>KanbanApp</title>
    <!-- awesome fonts -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @stack('css')
</head>
<body>
    <div id="app">
        <!-- ログインしている場合のみヘッダを表示する --->
        @auth
            <header class="header">
                <nav class="nav">
                    <ul class="header_menu">
                    <li class="nav-link">{{Auth::user()->name }}さん</li>
                    <li class="header_menu_title">
                        <a class="nav-link listNew" href="/">KanbanApp</a>
                    </li>
                    <li>
                        <ul class="header_menu_inner">
                        <li>
                            <a class="nav-link listNew" href="{{route('listing.create')}}">リストを作成</a>　　
                        </li>
                        <li>
                            <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                ログアウト
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                        </ul>
                    </li>
                    </ul>
                </nav>
            </header>
        @endauth
        @yield('content')
    </div>
</body>
</html>
