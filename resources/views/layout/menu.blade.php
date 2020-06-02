<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title')</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link href="/css/app.css" rel="stylesheet">
        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }
            body {
                display:flex;
			    justify-content: space-around;
            }
            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 16px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
            .leftmenu {
                width:20%;
                height:100vh;
                border-width: 1px;
                border-style: solid;
                border-color: #1D1D1D;
            }
            .leftmenu a {
                display: block;
                height: 15px;
                padding: 10px;
                text-decoration: none;
                color: #1D1D1D;
                border-bottom: 1px #c7c7c7 solid;
            }
            .leftmenu a:hover {
                background: #dde8e1;
            }
            .container {
                width:85%;
                height:100vh;
            }
            .applepig {
                background-color: #bef946;
                height: 15px;
                padding: 10px;
                font-size: 17px;
                text-align: center;
                margin-block-end: auto;
            }
            .input {
                width: 90px;
                border:0px solid #000;
            }
        </style>
    </head>
    <body>
    <script src="/js/app.js"></script>
        @section('sidebar')
            <div class="leftmenu">
                <p class="applepig">--蘋果豬內部系統--</p>
                <a href="{{ url('/') }}">雅庫/時價設定</a>
                <p class="applepig">廠商</p>
                <a href="{{ url('/client/supply') }}">供應商基本資訊</a>
                <a href="{{ url('/client/demand') }}">需求商基本資訊</a>
                <p class="applepig">交易</p>
                <a href="{{ url('/supply') }}">進貨</a>
                <a href="{{ url('/supply') }}">出貨</a>
                <a href="{{ url('/supply') }}">倉庫</a>
                <p class="applepig">紀錄</p>
                <a href="{{ url('/supply') }}">報表</a>
            </div>
        @show
        <div class="container">
            @yield('content')
        </div>
    </body>
</html>
