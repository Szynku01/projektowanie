<?php

namespace App\Http\Controllers;

use App\Models\Commoditie;
use App\Models\Price_list_item;
use Illuminate\Http\Request;

class PriceListItemController extends Controller
{
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
        $commodities = Commoditie::all();
        
        $editMode = false;
        return view('price_list_item_form', ['editMode' => $editMode,
            'commodities' => $commodities,
        ]);    
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
        $price_list_item = Price_list_item::where('item_number', $id)->get()->first();
        $commodity_code = $price_list_item->commodity_code;
        $commodity_name = Commoditie::where('commodity_code', $commodity_code)->get()->first()->commodity_name;
        $unit_shortcut = Commoditie::where('commodity_code', $commodity_code)->get()->first()->unit_shortcut;

        $editMode = true;
        return view('price_list_item_form', ['editMode' => $editMode,
                                            'commodity_name' => $commodity_name,
                                            'commodity_code' => $commodity_code,
                                            'unit_shortcut' => $unit_shortcut,
                                            'price' => $price_list_item->price]);
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
