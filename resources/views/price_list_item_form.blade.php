@section('css')
<link rel="stylesheet" href="{{ asset('cssfile/price_list_item_form.css') }}">
@endsection

@extends('app')
@section('content')
    @if ($editMode == 1)
    <div class="wrapper">
    <h1 class="header">Edycja pozycji cennika</h1>
        <form action="/cennik/{{$id}}" method="POST">
            @csrf
            <label class="label">Nazwa towaru</label> <input type="text" name="Nazwa towaru" placeholder="Nazwa towaru" value="{{ $commodity_name }}"/>
            <label class="label">Kod towaru</label> <input type="text" name="Kod towaru" placeholder="Kod towaru" value="{{ $commodity_code }}"/>
            <label class="label">Jednostka miary</label> <input type="text" name="Jednostka miary" placeholder="Jednostka miary" value="{{ $unit_shortcut }}"/>
            <label class="label">Cena jednostkowa</label> <input type="text" name="Cena jednostkowa" placeholder="Cena jednostkowa" value="{{ $price }}"/>

            <input class="btn-form" type="submit" value="Zapisz">
            <input class="btn-form" type="reset" value="Wróć">

        </form>
    </div>
    @else
    <div class="wrapper">
    <h1 class="header">Dodawanie pozycji cennika</h1>
        <form action="{{ url('savePriceListItem') }}" method="POST">
            @csrf
            <div>
            <label class="label">Nazwa towaru</label> <select name="commodity_name">
                <option value="Nazwa towaru<"></option>
                @foreach ($commodities as $commodity_name)
                    <option value="Nazwa towaru">{{ $commodity_name->commodity_name }}</option>
                @endforeach
            </select>
            </div>
            <div>
            <label class="label">Kod towaru</label> <select name="commodity_code">
                <option value="Kod towaru"></option>
                @foreach ($commodities as $commodity_code)
                    <option value="Kod towaru">{{ $commodity_code->commodity_code }}</option>
                @endforeach
            </select>
             </div>
            <div>
            <label class="label">Jednostka miary</label> <select name="unit_shortcut">
                <option value="Jednostka miary"></option>
                @foreach ($measurement_units as $measurement_unit)
                    <option value="Jednostka miary">{{ $measurement_unit->unit_shortcut }}</option>
                @endforeach
            </select>
            </div>
            <div>
                <label class="label">Cena jednostkowa</label> <input type="text" name="price" placeholder="Cena jednostkowa"/>
            </div>
            <div>
            <label class="label">Cennik</label> <select name="price_list_id">
                <option value="Wybierz cennik"></option>
                @foreach ($price_list as $price_list_number)
                    <option value="Cennik">{{ $price_list_number->price_list_number }}</option>
                @endforeach
            </select>
            </div>
            <input class="btn-form" type="submit" value="Dodaj">
            <input class="btn-form" type="reset" value="Wróć" href="{{ url('/cenniki') }}">

        </form>
    </div>
    @endif
@endsection

