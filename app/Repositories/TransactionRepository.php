<?php
namespace App\Repositories;
use App\Models\IronKind;
use App\Models\Purchase;
use App\Models\Depot;
use App\Models\DepotsRecord;

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

    public function buyFetch ()
    {
        $res = Purchase::leftJoin('iron_kind', 'purchase.kind', '=', 'iron_kind.id')
                        ->leftJoin('client', 'purchase.client_id', '=', 'client.id')
                        ->orderBy('purchase.transaction_time', 'DESC')
                        ->select('purchase.*', 'iron_kind.iron_name', 'client.company_name')
                        ->take(14)->get()->toArray();
        if (empty($res)) return false;

        foreach($res as $rK => $rV) {
            $diffPrice = $rV['unit_price'] - $rV['current_price'];
            if ($diffPrice >= 0) $diffPrice = '+' . $diffPrice;
            $res[$rK]['diffPrice'] = $rV['current_price'] . "($diffPrice)";
            $res[$rK]['created_at'] = date('Y-m-d H:i:s', strtotime($rV['created_at']));
        }
        return $res;
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

    public function depotFetch ()
    {
        $res = Depot::leftJoin('iron_kind', 'depots.kind', '=', 'iron_kind.id')->get();
        return $res;
    }

    public function depotData ($request)
    {
        switch ($request->act) {
            case 'join' :
                $this->depotInsert($request);
            break;
            
            case 'update' :
                // $this->buyUpdate($request);
            break;
            default :
            break;
        }
    }

    private function depotInsert ($request)
    {
        $joinTotal = (isset($request->total)) ? $request->suplus_total : $request->move_total;
        $joinTotal = (int)$joinTotal;
        $depotData = Depot::where('kind', $request->kind)->first();
        $depotPrice = (($depotData->depot_total * $depotData->depot_price) + ($joinTotal * $request->unit_price)) / ($depotData->depot_total + $joinTotal);
        Purchase::where('id', $request->transaction_id)
                ->decrement('suplus_total', $joinTotal);

        $record = [
            'transaction_id' => $request->transaction_id,
            'move_total' => $joinTotal,
            'kind' => $request->kind,
            'action' => 'join',
        ];
        DepotsRecord::create($record);
        Depot::where('kind', $request->kind)
                ->increment('depot_total', $joinTotal, ['depot_price' => $depotPrice]);
    }

    public function suplusFetch ()
    {
        $res = Purchase::leftJoin('iron_kind', 'purchase.kind', '=', 'iron_kind.id')
            ->leftJoin('client', 'purchase.client_id', '=', 'client.id')
            ->where('suplus_total', '>', 0)
            ->orderBy('purchase.transaction_time', 'DESC')
            ->orderBy('purchase.id', 'ASC')
            ->select('purchase.*', 'iron_kind.iron_name', 'client.company_name')
            ->get()->toArray();
        return $res;
    }
}