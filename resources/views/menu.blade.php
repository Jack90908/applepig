<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

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
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
            .leftmenu a {
                display: block;
                height: 20px;
                padding: 10px;
                text-decoration: none;
                color: #1D1D1D;
                border-bottom: 1px #c7c7c7 solid;
            }
        </style>
    </head>
    <body>
        @section('sidebar')
            <div class="leftmenu">
                <a href="{{ url('/supply') }}">供應商基本資訊</a>
                <a href="{{ url('/supply') }}">新增/修改</a>
                <a href="{{ url('/supply') }}">供應商</a>
                <a href="{{ url('/supply') }}">供應商</a>
                <a href="{{ url('/supply') }}">供應商</a>
                <a href="{{ url('/supply') }}">供應商</a>
                <hr>
                <a href="{{ url('/supply') }}">供應商基本資訊</a>
                <a href="{{ url('/supply') }}">新增/修改</a>
                <a href="{{ url('/supply') }}">供應商</a>
                <a href="{{ url('/supply') }}">供應商</a>
                <a href="{{ url('/supply') }}">供應商</a>
                <a href="{{ url('/supply') }}">供應商</a>
            </div>
        @show
    </body>
</html>
