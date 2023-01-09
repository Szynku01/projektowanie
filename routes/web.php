<?php

use App\Http\Controllers\CommoditieController;
use App\Http\Controllers\PriceListItemController;
use App\Http\Controllers\SalesInvoiceItemController;
use App\Models\Commoditie;
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

Route::get('/', function () {
    return view('commodity_info');
});



Route::get('/popularneTowary', [SalesInvoiceItemController::class, 'popularneTowary'])->name('popularneTowary');

Route::get('/dochodoweTowary', [SalesInvoiceItemController::class, 'dochodoweTowary'])->name('dochodoweTowary');

Route::get('/towarInfo', [SalesInvoiceItemController::class, 'towarInfo'])->name('towarInfo');

Route::get('/stworzCennik', [PriceListItemController::class, 'create'])->name('stworzCennik');






