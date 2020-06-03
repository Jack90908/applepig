<!DOCTYPE html>
@extends('layout.menu')

@section('title', '進貨')
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <style>
            td { 
                border:0px solid #000;
                padding:5px;
            } 
            .buyList td {
                border:1px solid #000;
                padding:5px;
            }
        </style>
    </head>
    <body>
        @section('sidebar')
        @section('content')
            <h1 class="content">進貨</h1>
            <form action="/transaction/buy" role="form" method="POST" class="form-horizontal">
                @csrf
                <input type="hidden" class="form-control" id="act" name="act" value="insert">
                <table>
                    <tr>
                        <th>廠商</th>
                        <td>
                            <select class="form-control" name="client_id">
                                @foreach ($client as $cV)
                                    <option value="{{$cV->id}}">{{$cV->company_name}}</option>
                                @endforeach
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <th>交易時間</th>
                        <td>
                            <select class="form-control" onchange="changePrice()" id="transaction_time" name="transaction_time">
                                @foreach ($currentPrice as $cK => $cV)
                                    <option>{{$cK}}</option>
                                @endforeach
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <th>種類</th>
                        <td>
                            <select class="form-control" name="kind">
                                @foreach ($kind as $kV)
                                    <option value="{{$kV->id}}">{{$kV->iron_name}}</option>
                                @endforeach
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <th>當前時價</th>
                        <td>
                            <input type="text" readonly class="form-control" id="current_price" name="current_price" value="{{current($currentPrice)}}">
                        </td>
                    </tr>
                    <tr>
                        <th>買進單價</th>
                        <td>
                            <input type="text" class="form-control" name="unit_price" placeholder="請輸入買進價格">
                        </td>
                        <td>
                            <p>台幣(NT)</p>
                        </td>
                    </tr>
                    <tr>
                        <th>總量</th>
                        <td>
                            <input type="text" class="form-control" name="origin_total" placeholder="請輸入買進總量">
                        </td>
                        <td>
                            <p>公斤(KG)</p>
                        </td>
                    </tr>
                    <tr>
                        <th></th>
                        <td class="input">
                            <button type="submit" class="submit btn btn-default">
                                <i class="fa fa-plus"></i>新增
                            </button>
                        </td>
                    </tr>
                </table>    
            </form>
            <h1 class="content">近期紀錄</h1>
            <div class="buyList">
                @if (!$buyList)
                    <p>目前無進貨資料</p>
                @else
                <table>
                    <tr>
                        <td>進貨編號</td>
                        <td>廠商名稱</td>
                        <td>種類</td>
                        <td>當時時價</td>
                        <td>買進單價</td>
                        <td>單價轉換</td>
                        <td>總數量</td>
                        <td>未處理數量</td>
                        <td>交易時間</td>
                        <td>建立時間</td>
                    </tr>
                    @foreach ($buyList as $bV)
                    <tr>
                        <td>{{$bV['id']}}</td>
                        <td>{{$bV['company_name']}}</td>
                        <td>{{$bV['iron_name']}}</td>
                        <td>{{$bV['current_price']}}</td>
                        <td>{{$bV['unit_price']}}</td>
                        <td>{{$bV['diffPrice']}}</td>
                        <td>{{$bV['origin_total']}}</td>
                        <td>{{$bV['suplus_total']}}</td>
                        <td>{{$bV['transaction_time']}}</td>
                        <td>{{$bV['created_at']}}</td>
                    </tr>
                    @endforeach
                </table>
                @endif
            </div>   
        @endsection
    </body>
</html>
<script language="javascript">
    function changePrice(){
        var obj = document.getElementById('current_price');
        var vs = $('#transaction_time  option:selected').val();
        
        var priceArr = {!! json_encode($currentPrice) !!};
        obj.value = priceArr[vs];
    }
</script>
