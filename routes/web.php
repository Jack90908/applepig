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

/**
 * 新增/更新資料
 */
Route::post('/current', 'CompanyController@price'); 


/**
 * 刪除資料
 */