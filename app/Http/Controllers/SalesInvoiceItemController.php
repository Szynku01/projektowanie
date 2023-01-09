<?php

namespace App\Http\Controllers;

use App\Models\Commoditie;
use Illuminate\Http\Request;
use App\Models\Sales_invoice_item;
use Illuminate\Support\Facades\DB;

class SalesInvoiceItemController extends Controller
{
    public function towarInfo() {
        return view('commodity_info');
    }
    
    public function dochodoweTowary() {
        return view('most_profitable_commodities');
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

        return view('most_popular_commodities', ['mosts' => $mosts, 'leasts' => $leasts]);
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
