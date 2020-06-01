<?php

namespace App\Http\Controllers;

use App\Repositories\CompanyRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CompanyController extends Controller
{
    #建立Repository
    public function __construct()
    {
        $this->repo = new CompanyRepository();
    }

    public function index()
    {
        $company = $this->repo::companyFetch();
        $amountDate = $this->repo::amountDateFetch();
        $amountLis = $this->repo::amountFetch();
        $dateView = 7;
        $nowDate = date('Ymd');
        $res = [
            'company',
            'amountDate',
            'dateView',
            'amountLis',
            'nowDate'
        ];
        return view('company', compact($res));
    }

    public function price(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'amount' => [
                'required',
                'numeric',
                'max:999',
                function ($attribute, $value, $fail) {
                    if ($value === 'foo') {
                        $fail($attribute.' is invalid.');
                    }
                },
            ],
        ]);
        if ($validator->fails()) {
            return redirect('/')
                ->withInput()
                ->withErrors($validator);
        }
        $this->repo->price($request);
        return redirect('/');
    }
}
