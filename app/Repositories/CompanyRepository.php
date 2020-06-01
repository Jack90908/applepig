<?php
namespace App\Repositories;

use App\Models\Company;
use App\Models\CurrentPrice;
class CompanyRepository
{

    /*
    *    將需要使用的Model通過建構函式例項化
    */
    public function __construct ()
    {

    }

    /**
     * 找尋公司資訊
     */
    static function companyFetch ()
    {
        return Company::all();
    }

    /**
     * 找最新的時價時間
     */
    static function amountDateFetch ()
    {
        $res = CurrentPrice::max('date');
        if (!$res) $res = date('Ymd');
        return $res;
    }
    /**
     * 歷史時價
     */
    static function amountFetch ()
    {
        $res = CurrentPrice::orderBy('date', 'DESC')->take(14)->get();
        return $res;
    }
    public function price ($request)
    {
        $this->current = new CurrentPrice();
        switch ($request->act) {
            case 'insert' :
                $this->priceInsert($request);
            break;
            
            case 'update' :
                // $this->priceUpdate($request);
            break;
            default :
            break;
        }
    }

    private function priceInsert($request)
    {
        $beginDate = $request->beginDate;
        $endDate = $request->endDate;
        #區間共有幾筆
        $range = $endDate - $beginDate;
        for($i = 0; $i < $range; $i++) {
            $date = $beginDate + $i;
            CurrentPrice::create(['date' => $date, 'amount' => $request->amount]);
        }
    }
}