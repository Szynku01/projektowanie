<?php

namespace App\Http\Controllers;

use App\Models\Commoditie;
use App\Models\Purchase_invoice_item;
use Illuminate\Http\Request;
use App\Models\Sales_invoice_item;
use Illuminate\Support\Facades\DB;

class SalesInvoiceItemController extends Controller
{
    public function towarInfo($commodity_code) {
        $commodity = DB::table('commodities')->where('commodity_code', '=', $commodity_code)->get();
        $faktura = DB::table('sales_invoice_items')->where('commodity_code', '=', $commodity_code)->get();
        
        return view('commodity_info', ['commodity' => $commodity, 'faktura' => $faktura[0]]);
    }
    
    public function dochodoweTowary() {
        $towary = Commoditie::all();
        $purchase_invoice_items = Purchase_invoice_item::all();
        $sales_invoice_items = Sales_invoice_item::all();

        $counts =
        DB::table('sales_invoice_items')
            ->selectRaw('commodity_code, COUNT(*) as count')
            ->groupBy('commodity_code')
            ->get();

        $profits = [];
        $slownik=[];

        foreach($purchase_invoice_items as $purchase_invoice_item) {
            foreach($sales_invoice_items as $sales_invoice_item) {
                if($purchase_invoice_item->commodity_code == $sales_invoice_item->commodity_code) {
                    foreach($counts as $count) {
                        if($sales_invoice_item->commodity_code == $count->commodity_code) {
                            $profits[$count->commodity_code] = ($sales_invoice_item->unit_price - $purchase_invoice_item->unit_price) 
                                * $sales_invoice_item->quantity*$count->count;
                            
                            $slownik[$profits[$count->commodity_code]] = $count->commodity_code;
                        }
                    }
                }
            }
        }
        arsort($profits);
        krsort($slownik);

        $slownikTow=[];
        foreach($slownik as $slow) {
            foreach($towary as $towar) {
                if($slow == $towar->commodity_code) {
                    $slownikTow[$towar->commodity_code] =  $towar->commodity_name;
                }
            }
        }

        //dd($profits, $slownik, $slownikTow);
        return view('most_profitable_commodities', ['profits' => $profits, 'slownik' => $slownik, 'slownikTow' => $slownikTow]);
    }
    
    public function popularneTowary() { 
        $towary = Commoditie::all();

        $mosts =
        DB::table('sales_invoice_items')
            ->selectRaw('commodity_code, COUNT(*) as count')
            ->groupBy('commodity_code')
            ->orderBy('count', 'desc')
            ->get();

        $leasts =
        DB::table('sales_invoice_items')
            ->selectRaw('commodity_code, COUNT(*) as count')
            ->groupBy('commodity_code')
            ->orderBy('count', 'asc')
            ->get();

        $slownik = [];

        foreach($mosts as $most) {
            foreach($towary as $towar) {
                if ($towar->commodity_code == $most->commodity_code) {
                    $slownik[$most->commodity_code] = $towar->commodity_name;
                }
            }
        }

        // dd($slownik);

        return view('most_popular_commodities', ['mosts' => $mosts, 'leasts' => $leasts, 'slownik' => $slownik]);
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
