@section('css')
<link rel="stylesheet" href="{{ asset('cssfile/price_list_item_form.css') }}">
@endsection

@extends('app')
@section('content')
    @if ($editMode == 1)
    <div class="wrapper">
    <h1 class="header">Edycja pozycji cennika</h1>
        <form action="{{ url('zaktualizujPozycjeCennika', ['id' => $id]) }}" method="POST">
            @csrf
            <label class="label">Identyfikator cennika</label> <input type="text" name="price_list_id" placeholder="Identyfikator cennika" value="{{ $price_list_id }}" readonly/>
            <label class="label">Nazwa towaru</label> <input type="text" name="commodity_name" placeholder="Nazwa towaru" value="{{ $commodity_name }}" readonly/>
            <label class="label">Kod towaru</label> <input type="text" name="commodity_code" placeholder="Kod towaru" value="{{ $commodity_code }}" readonly/>
            <label class="label">Jednostka miary</label> <input type="text" name="unit_shortcut" placeholder="Jednostka miary" value="{{ $unit_shortcut }}" readonly/>
            <label class="label">Cena jednostkowa</label> <input type="text" name="price" placeholder="Cena jednostkowa" value="{{ $price }}"/>

            <input class="btn-form" type="submit" value="Zapisz">
            {{-- TODO zrobic styl do przycisku wróć --}}
            <a href="{{ url('/cennik', ['id' => $price_list_id]) }}" class="btn-form">Wróć</a>

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
                    <option value="{{ $commodity_name->commodity_name }}">{{ $commodity_name->commodity_name }}</option>
                @endforeach
            </select>
            </div>
            <div>
            <label class="label">Kod towaru</label> <select name="commodity_code">
                <option value="Kod towaru"></option>
                @foreach ($commodities as $commodity_code)
                    <option value="{{ $commodity_code->commodity_code }}">{{ $commodity_code->commodity_code }}</option>
                @endforeach
            </select>
             </div>
            <div>
            <label class="label">Jednostka miary</label> <select name="unit_shortcut">
                <option value="Jednostka miary"></option>
                @foreach ($measurement_units as $measurement_unit)
                    <option value="{{ $measurement_unit->unit_shortcut }}">{{ $measurement_unit->unit_shortcut }}</option>
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
                    <option value="{{ $price_list_number->price_list_number }}">{{ $price_list_number->price_list_number }}</option>
                @endforeach
            </select>
            </div>
            <input class="btn-form" type="submit" value="Dodaj">
            <input class="btn-form" type="reset" value="Wróć" href="{{ url('/cenniki') }}">

        </form>
    </div>
    @endif
@endsection

