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
        <form action="/cennik/{{$id}}" method="POST">
            @csrf
            <label class="label">Nazwa towaru</label> <select name="Nazwa towaru">
                @foreach ($commodities as $commodity_name)
                    <option value="Nazwa towaru">{{ $commodity_name->commodity_name }}</option>
                @endforeach
            </select>
            <label class="label">Kod towaru</label> <select name="Kod towaru">
                @foreach ($commodities as $commodity_code)
                    <option value="Kod towaru">{{ $commodity_code->commodity_code }}</option>
                @endforeach
            </select>
            <label class="label">Jednostka miary</label> <select name="Jednostka miary">
                @foreach ($commodities as $commodity_code)
                    <option value="Jednostka miary">{{ $commodity_code->unit_shortcut }}</option>
                @endforeach
            </select>
            <label class="label">Cena jednostkowa</label> <input type="text" name="Cena jednostkowa" placeholder="Cena jednostkowa"/>

            <input class="btn-form" type="submit" value="Dodaj">
            <input class="btn-form" type="reset" value="Wróć">

        </form>
    </div>
    @endif
@endsection

