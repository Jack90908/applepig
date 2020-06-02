<?php

use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/**
 * 顯示頁面區
 */
#首頁
Route::get('/', 'CompanyController@index'); 
#更新時價
Route::post('/current', 'CompanyController@price'); 

#廠商資訊
Route::prefix('/client')->group(function ($router) {
    #供應
    $router->get('/supply', 'ClientController@supply');
    #需求
    $router->get('/demand', 'ClientController@demand');
    #新增/修改
    $router->post('/', 'ClientController@client'); 

});
