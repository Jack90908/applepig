<?php
namespace App\Repositories;
use App\Models\IronKind;
use App\Models\CurrentPrice;
use App\Models\Purchase;

class TransactionRepository
{

    /*
    *    將需要使用的Model通過建構函式例項化
    */
    public function __construct ()
    {

    }

    public function ironKindFetch ()
    {
        return IronKind::all();
    }

    public function buyData ($request)
    {
        switch ($request->act) {
            case 'insert' :
                $this->buyInsert($request);
            break;
            
            case 'update' :
                // $this->buyUpdate($request);
            break;
            default :
            break;
        }
    }

    public function buyFetch ()
    {
        $res = Purchase::leftJoin('iron_kind', 'purchase.kind', '=', 'iron_kind.id')
                        ->leftJoin('client', 'purchase.client_id', '=', 'client.id')
                        ->orderBy('purchase.transaction_time', 'DESC')
                        ->select('purchase.*', 'iron_kind.iron_name', 'client.company_name')
                        ->take(14)->get()->toArray();
        if (!empty($res)) {
            foreach($res as $rK => $rV) {
                $diffPrice = $rV['unit_price'] - $rV['current_price'];
                if ($diffPrice >= 0) $diffPrice = '+' . $diffPrice;
                $res[$rK]['diffPrice'] = $rV['current_price'] . "($diffPrice)";
                $res[$rK]['created_at'] = date('Y-m-d H:i:s', strtotime($rV['created_at']));
            }
        } else {
            $res = false;
        }
        return $res;
    }

    private function buyInsert ($request)
    {
        $surplus = $request->origin_total;
        $transactionTime = date('Y-m-d', strtotime($request->transaction_time));
        $data = [
            'kind' => $request->kind,
            'current_price' => $request->current_price,
            'unit_price' => $request->unit_price,
            'origin_total' => $request->origin_total,
            'suplus_total' => $surplus,
            'client_id' => $request->client_id,
            'transaction_time' => $transactionTime
        ];
        Purchase::create($data);
    }
}