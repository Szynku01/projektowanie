<?php

namespace App\Http\Controllers;

use App\Models\Price_list;
use Illuminate\Http\Request;
use App\Models\Price_list_item;
use Illuminate\Support\Facades\DB;

class PriceListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $price_lists = Price_list::all();

        return view('price_list_all', ['price_lists' => $price_lists]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('price_list_form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Walidacja
        if (!preg_match("/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/",$request->date_from)
            || !preg_match("/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/",$request->date_to))
        {
            return redirect('/cenniki');
        }

        // Pobieranie danych z formularza z $request
        $date_from = $request->date_from;
        $date_to = $request->date_to;

        // Tworzenie pustej zmiennej cennika
        $price_list = new Price_list();

        // Przypisywanie do zmiennej $price_list danych z request
        $price_list->date_from = $date_from;
        $price_list->date_to = $date_to;

        // Zapisywanie
        $price_list->save();

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
        $price_lists = Price_list::all();

        foreach($price_lists as $price_list)
        {
            $price_list_found = $price_list;
            if ($price_list->price_list_number == $id)
            {
                break;
            }
        }

        $price_list_items = Price_list_item::where('price_list_id', $price_list_found->price_list_number)->get();

        return view('price_list', [
            'price_list' => $price_list_found,
            'price_list_items' => $price_list_items,
            'date_from' => $price_list_found->date_from,
            'date_to' => $price_list_found->date_to
        ]);
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
