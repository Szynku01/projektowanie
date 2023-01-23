<?php

namespace App\Http\Controllers;

use App\Models\Commoditie;
use App\Models\Measurement_unit;
use App\Models\Price_list;
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
        $measurement_units = Measurement_unit::all();
        $price_list = Price_list::all();
        
        $editMode = false;
        return view('price_list_item_form', ['editMode' => $editMode,
            'commodities' => $commodities,
            'measurement_units' => $measurement_units,
            'price_list' => $price_list,
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
        $request->validate([
            'price' => 'required',
            'commodity_code' => 'required',
            'price_list_id' => 'required',
        ]);

        // Pobieranie danych z formularza z $request
        $price = $request->price;
        $commodity_code = $request->commodity_code;
        $price_list_id = $request->price_list_id;
    

        // Tworzenie pustej zmiennej cennika
        $price_list_item = new Price_list_item();

        // Przypisywanie do zmiennej $price_list danych z request
        $price_list_item->price = $price;
        $price_list_item->commodity_code = $commodity_code;
        $price_list_item->price_list_id = $price_list_id;

        // Zapisywanie
        $price_list_item->save();

        // Powrót do poprzedniej strony
        return redirect('/cenniki');
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
        $price_list_id = $price_list_item->price_list_id;

        $editMode = true;
        return view('price_list_item_form', ['editMode' => $editMode,
                                            'commodity_name' => $commodity_name,
                                            'commodity_code' => $commodity_code,
                                            'unit_shortcut' => $unit_shortcut,
                                            'price' => $price_list_item->price,
                                            'id' => $id,
                                            'price_list_id' => $price_list_id]);
    }

    // Aktualizacja ceny pozycji cennika
    public function update(Request $request, $id)
    {
        $request->validate([
            'price' => 'required',
        ]);

        // Pobieranie danych z formularza
        $price = $request->price;   
        $price_list_id = $request->price_list_id;
         
        // Znalezienie pozycji cennika po id i zaktualizowanie jego ceny
        Price_list_item::where('item_number', $id)
            ->update([
                'price' => $price,
            ]);

        // Powrót do pozycji cennika
        return redirect("/cennik/$price_list_id");
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
