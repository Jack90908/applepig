<?php

namespace App\Http\Controllers;

use App\Repositories\CompanyRepository;
use Illuminate\Http\Request;

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
        $res = [
            'company',
            'amountDate',
            'dateView',
            'amountLis'
        ];
        return view('company', compact($res));
    }

    public function price(Request $request)
    {
        $this->repo->price($request);
        return redirect('/');
    }
}
