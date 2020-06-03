<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\ClientRepository;

class ClientController extends Controller
{
    #建立Repository
    public function __construct()
    {
        $this->repo = new ClientRepository();
    }
    #供應商
    public function supply ()
    {
        $clientList = $this->repo->clientFetch(__FUNCTION__);
        $identity = __FUNCTION__;
        $identityName = '供給';
        $res = [
            'identity',
            'identityName',
            'clientList',
        ];
        return view('client', compact($res));
    }

    #需求商
    public function demand ()
    {
        $clientList = $this->repo->clientFetch(__FUNCTION__);
        $identity = __FUNCTION__;
        $identityName = '需求';
        $res = [
            'identity',
            'identityName',
            'clientList',
        ];
        return view('client', compact($res));
    }
    #新增修改資料
    public function client (Request $request)
    {
        $this->repo->client($request);
        $url = '/client/' . $request->identity;
        return redirect($url)->with('success','操作成功');;
    }
}
