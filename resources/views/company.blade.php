<!DOCTYPE html>
@extends('layout.menu')
@section('title', '雅庫/時價設定')
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, 
                                     initial-scale=1.0, 
                                     maximum-scale=1.0, 
                                     user-scalable=no">
        <style>
            .company {
                border:1px solid #000; 
                font-family: 微軟正黑體; 
                font-size:16px; 
                width:400px;
                border:1px solid #000;
                text-align:center;
                border-collapse:collapse;
            }
            td { 
                border:1px solid #000;
                padding:5px;
            } 
        </style>
    </head>
    <body>
        @section('sidebar')
        @section('content')
            <!-- 公司資訊 -->
            <div class="companyData">
                <h1 class="content">公司資訊<h1>
                <table class="company">
                    @foreach($company as $cV)
                        <tr>
                            <td>名稱：{{$cV->name}}</td>
                            <td>地址:{{$cV->address}}</td>
                        </tr>
                    @endforeach
                </table>
            </div>
            <!-- 時價 -->
            <div class="currentPriceData">
                <h1 class="content">時價</h1>
                <form action="/task" method="POST" class="form-horizontal">
                    <!-- 任務名稱 -->
                    <div class="form-group">
                        <label for="task" class="col-sm-3 control-label">Task</label>

                        <div class="col-sm-6">
                            <input type="text" name="name" id="task-name" class="form-control">
                        </div>
                    </div>

                    <!-- 增加任務按鈕-->
                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-6">
                            <button type="submit" class="btn btn-default">
                                <i class="fa fa-plus"></i> 增加任務
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        @endsection
    </body>
</html>
