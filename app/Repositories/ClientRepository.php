<?php
namespace App\Repositories;

use App\Models\Client;

class ClientRepository
{

    /*
    *    將需要使用的Model通過建構函式例項化
    */
    public function __construct ()
    {
        $this->clientModel = new Client();
    }

    public function clientFetch ($identity)
    {
        $res = Client::where('identity', $identity)->get();
        if (!$res) $res = false;
        return $res;
    }
    public function client ($request)
    {
        switch ($request->act) {
            case 'insert' :
                $this->clientInsert($request);
            break;
            
            case 'update' :
                // $this->clientUpdate($request);
            break;
            default :
            break;
        }
    }
    public function clientInsert ($request)
    {
        $create = [
            'address' => $request->address,
            'company_name' => $request->company_name,
            'companyId' => $request->companyId,
            'id' => $request->id,
            'identity' => $request->identity,
            'person_name' => $request->person_name,
            'phone' => $request->phone,
            'remarks' => $request->remarks,
        ];
        Client::create($create);
    }
}