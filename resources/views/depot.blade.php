<!DOCTYPE html>
@extends('layout.menu')

@section('title', '倉庫')
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <style>
            td { 
                border:1px solid #000;
                padding:5px;
            } 
            .depot {
                width: 100%;
            }
            .depotJoin td {
                border:0px solid #000;
                padding:5px;
            }
        </style>
    </head>
    <body>
        @section('sidebar')
        @section('content')
            <div class="depotLits">
                <h1 class="content">商庫資訊</h1>
                <table class="depot">
                    <tr class="trTitle">
                        <td style="width: 10%;">種類</td>
                        <td>庫存(KG)</td>
                        <td>平均單價(NT)</td>
                        <td style="width: 15%;">最後更新時間</td>
                    </tr>
                    @foreach ($depotList as $dV)
                    <tr>
                        <td>{{$dV->iron_name}}</td>
                        <td>{{$dV->depot_total}}</td>
                        <td>{{$dV->depot_price}}</td>
                        <td>{{$dV->updated_at}}</td>
                    </tr>
                    @endforeach
                </table>
            </div>
            <div class="depotJoin">
                <h1 class="content">入庫</h1>
                <form action="/transaction/depot" role="form" method="POST" class="form-horizontal">
                    <input type="hidden" class="form-control" id="act" name="act" value="join">
                    @csrf
                    <table>
                        <tr>
                            <th>進貨編號</th>
                            <td>
                                <select id="changeList" onchange="changeData()" class="form-control" name="transaction_id">
                                    @foreach ($buyData as $bK => $bV)
                                        <option>{{$bV['id']}}</option>
                                    @endforeach
                                </select>
                            </td>
                            <th>公司名稱</th>
                            <td>
                                <input type="text" readonly class="form-control" id="company_name" name="company_name" value="{{$buyData[0]['company_name']}}">
                            </td>
                            <th>種類</th>
                            <td>
                                <input type="text" readonly class="form-control" id="iron_name" name="iron_name" value="{{$buyData[0]['iron_name']}}">
                                <input type="hidden" readonly class="form-control" id="kind" name="kind" value="{{$buyData[0]['kind']}}">
                            </td>
                            <th>買進單價</th>
                            <td>
                                <input type="text" readonly class="form-control" id="unit_price" name="unit_price" value="{{$buyData[0]['unit_price']}}">
                            </td>
                            <th>未處理量</th>
                            <td>
                                <input type="text" readonly class="form-control" id="suplus_total" name="suplus_total" value="{{$buyData[0]['suplus_total']}}">
                            </td>
                        </tr>
                        <tr>
                            <th>入庫數量</th>
                            <td>
                                <input type="checkbox" class="checkbox" name="total" value="all">全部入庫
                            </td>
                            <td></td>
                            <td>
                                <input type="text" class="form-control" onchange="inputTotal(this)" id="move_total" name="move_total" placeholder="請輸入數量">
                            </td>
                        </tr>
                        <tr>
                            <td class="input">
                                <button type="submit" class="submit btn btn-default">
                                    <i class="fa fa-plus"></i>送出
                                </button>
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
            <div class="buyData">
                <h3 class="content">尚有剩餘總量的進貨單</h3>
                <table>
                    <tr class="trTitle">
                        <td>進貨編號</td>
                        <td>公司名稱</td>
                        <td>種類</td>
                        <td>買進單價</td>
                        <td>進貨總量</td>
                        <td>未處理量</td>
                        <td>交易時間</td>
                    </tr>
                    @foreach ($buyData as $bV)
                    <tr>
                        <td>#{{$bV['id']}}</td>
                        <td>{{$bV['company_name']}}</td>
                        <td>{{$bV['iron_name']}}</td>
                        <td>{{$bV['unit_price']}}</td>
                        <td>{{$bV['origin_total']}}</td>
                        <td>{{$bV['suplus_total']}}</td>
                        <td>{{$bV['transaction_time']}}</td>
                    </tr>
                    @endforeach
                </table>
            </div>
        <script type="text/javascript" language="javascript">
            var buyData = {!! json_encode($buyData) !!};

            function inputTotal(moveTotal)
            {
                check = document.getElementById('suplus_total').value;
                if (moveTotal.value > check) {
                    alert('超過剩餘數量，請重新輸入！');
                    moveTotal.value = '';
                }
            }

            function changeData()
            {
                var index = document.getElementById('changeList').selectedIndex;
                document.getElementById('iron_name').value = buyData[index]['iron_name'];
                document.getElementById('kind').value = buyData[index]['kind'];
                document.getElementById('company_name').value = buyData[index]['company_name'];
                document.getElementById('unit_price').value = buyData[index]['unit_price'];
                document.getElementById('suplus_total').value = buyData[index]['suplus_total'];
            }

            $(document).ready(function(){
                $(".checkbox").click(function(){
                    $("#move_total").toggle();
                });
            });
        </script>
        @endsection
    </body>
</html>
