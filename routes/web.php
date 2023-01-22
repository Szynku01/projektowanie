<?php

use App\Models\Commoditie;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PriceListController;
use App\Http\Controllers\CommoditieController;
use App\Http\Controllers\PriceListItemController;
use App\Http\Controllers\SalesInvoiceItemController;

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
    return view('app');
});



Route::get('/popularneTowary', [SalesInvoiceItemController::class, 'popularneTowary'])->name('popularneTowary');

Route::get('/dochodoweTowary', [SalesInvoiceItemController::class, 'dochodoweTowary'])->name('dochodoweTowary');

Route::get('/towarInfo', [SalesInvoiceItemController::class, 'towarInfo'])->name('towarInfo');

Route::get('/dodajPozycjeCennika', [PriceListItemController::class, 'create'])->name('dodajPozycjeCennika');

Route::get('/cenniki', [PriceListController::class, 'index'])->name('cenniki');

Route::get('/cennik/{id}', [PriceListController::class, 'show'])->name('cennik');

Route::get('/edytujPozycjeCennika/{id}', [PriceListItemController::class, 'edit'])->name('edytujPozycjeCennika');

Route::get('/stworzCennik', [PriceListController::class, 'create'])->name('stworzCennik');

Route::post('savePriceList', [PriceListController::class, 'store']);



