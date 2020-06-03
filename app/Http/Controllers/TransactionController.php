<?php

namespace App\Http\Controllers;

use App\Repositories\TransactionRepository;
use App\Repositories\ClientRepository;
use App\Repositories\CompanyRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
class TransactionController extends Controller
{
    #建立Repository
    public function __construct()
    {
        $this->tranRepo = new TransactionRepository();
        $this->clientRepo = new ClientRepository();
        $this->compRepo = new  CompanyRepository();
    }
    public function buy ()
    {
        $kind = $this->tranRepo->ironKindFetch();
        $client = $this->clientRepo->clientFetch('supply');
        $currentPrice = $this->compRepo->amountFetch()->toArray();
        #為了要讓前端判斷時價因而轉陣列
        $currentPrice = Arr::pluck($currentPrice, 'amount', 'date');
        $buyList = $this->tranRepo->buyFetch();
        $res = [
            'kind',
            'client',
            'currentPrice',
            'buyList'
        ];
        return view('buy', compact($res));
    }

    public function buyData (Request $request)
    {
        $this->tranRepo->buyData($request);
        return redirect('/transaction/buy')->with('success','操作成功');
    }
}
