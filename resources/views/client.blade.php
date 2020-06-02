<!DOCTYPE html>
@extends('layout.menu')

@section('title', '供應商基本資訊')
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <style>
            td { 
                border:1px solid #000;
                padding:5px;
            } 
            .companyName {
                width: 600px;
            }
        </style>
    </head>
    <body>
        @section('sidebar')
        @section('content')
            <!-- 新增 -->
            <div class="clientInsert">
                <h1 class="content">新增{{$identityName}}廠商</h1>
                <form action="/client" role="form" method="POST" class="form-horizontal">
                    @csrf
                    <input type="hidden" class="form-control" id="identity" name="identity" value="{{$identity}}">
                    <input type="hidden" class="form-control" id="act" name="act" value="insert">
                    <table>
                        <tr><td class="input">
                            <input type="text" class="companyName form-control" name="company_name" placeholder="*請輸入公司名稱">
                        </td></tr>
                        <tr><td class="input">
                            <input type="text" class="companyName form-control" name="address" placeholder="地址">
                        </td></tr>
                        <tr><td class="input">
                            <input type="text" class="form-control" name="companyId" placeholder="統一編號">
                        </td></tr>
                        <tr><td class="input">
                            <input type="text" class="form-control" name="phone" placeholder="電話">
                        </td></tr>
                        <tr><td class="input">
                            <input type="text" class="form-control" name="person_name" placeholder="聯絡人">
                        </td></tr>
                        <tr><td class="input">
                            <input type="text" class="companyName form-control" name="remarks" placeholder="備註">
                        </td></tr>
                        <tr><td class="input">
                            <button type="submit" class="submit btn btn-default">
                                <i class="fa fa-plus"></i>新增
                            </button>
                        </td></tr>
                    </table>
                </form>
            </div>
            <!-- 新增 -->
            <div class="clientDate">
                <h1 class="content">{{$identityName}}廠商</h1>
                @if (!$clientList)
                    <p>目前無廠商資料</p>
                @else
                <table>
                    <tr>
                        <td>公司名稱</td>
                        <td>地址</td>
                        <td>電話</td>
                        <td>聯絡人</td>
                        <td>統一編號</td>
                        <td>備註</td>
                    </tr>
                    @foreach ($clientList as $cV)
                    <tr>
                        <td>{{$cV->company_name}}</td>
                        <td>{{$cV->address}}</td>
                        <td>{{$cV->phone}}</td>
                        <td>{{$cV->person_name}}</td>
                        <td>{{$cV->companyId}}</td>
                        <td>{{$cV->remarks}}</td>
                    </tr>
                    @endforeach
                </table>
                @endif
            </div>       
        @endsection
    </body>
</html>
