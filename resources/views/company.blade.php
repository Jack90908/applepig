<!DOCTYPE html>
@extends('layout.menu')
@section('title', '雅庫/時價設定')
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
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
                width: 250px;
                border:1px solid #000;
                padding:5px;
            } 
            .nowDate {
                background-color: beige;
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
                    @foreach ($company as $cV)
                        <tr>
                            <td>名稱：{{$cV->name}}</td>
                            <td>地址:{{$cV->address}}</td>
                        </tr>
                    @endforeach
                </table>
            </div>
            <div id="calendar"></div>
            <!-- 時價 -->
            <div class="currentPriceData">
                <h1 class="content">時價</h1>
                <!-- 新增 -->
                <form action="/current" role="form" method="POST" class="form-horizontal">
                <input type="hidden" class="form-control" id="act" name="act" value="insert">
                @csrf
                    <div class="form-group">
                        <label for="task" class="col-sm-3 control-label">新增時價</label>
                        <table>
                            <tr>
                                <th>起始時間</th>
                                <td class="input">
                                    <input type="text" readonly class="form-control" name="beginDate" value="{{$amountDate + 1}}">
                                </td>
                                <th>結束時間</th>
                                <td class="input">
                                    <select class="form-control" name="endDate">
                                        @for ($i = 1; $i < $dateView; $i++)
                                            <option>{{$amountDate + $i}}</option>
                                        @endfor
                                    </select>
                                </td>
                                <th>價格時間</th>
                                <td class="input"><input type="text" class="form-control" name="amount" placeholder="請輸入價格"></td>
                                <td class="input">
                                    <button type="submit" class="submit btn btn-default">
                                        <i class="fa fa-plus"></i>新增
                                    </button>
                                </td>
                            </tr>
                        </table>
                    </div>
                </form>
                <!-- 修改 -->
                <label for="task" class="col-sm-3 control-label">當前時價</label>
                <table>
                    <tr>
                        <td>修改</td>
                        <td>日期</td>
                        <td>時價</td>
                        <td></td>
                    </tr>
                    @foreach ($amountLis as $aV)

                    <form action="/current" role="form" method="POST" class="form-horizontal">
                        @csrf
                        <input type="hidden" class="form-control" id="act" name="act" value="update">
                        @if ($aV->date == $nowDate)
                        <tr class="nowDate">
                        @else
                        <tr>
                        @endif
                            <td><a href="javascript:void(0)" onclick="change('{{$aV->date}}')">編輯</a></td>
                            <td><input type="text" readonly class="form-control" name="date" value="{{$aV->date}}"></td>
                            <td><input type="text" id="{{$aV->date}}-amount" disabled class="form-control" name="amount" value="{{$aV->amount}}"></td>
                            <td>                                    
                                <button type="submit" id="{{$aV->date}}-submit" disabled class="submit btn btn-default">
                                    <i class="fa fa-plus"></i>修改
                                </button>
                            </td>
                        </tr>
                    </form>
                    @endforeach
                </table>
            </div>
        @endsection
    </body>
</html>
<script>
    function change(value) {
        amount = value + "-amount";
        submit = value + "-submit";
        changeYes = document.getElementById(amount);
        if (changeYes.disabled == true) {
            document.getElementById(amount).disabled = false
            document.getElementById(submit).disabled = false
        } else {
            document.getElementById(amount).disabled = true
            document.getElementById(submit).disabled = true
        }
    }
</script>
