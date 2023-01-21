@section('css')
<link rel="stylesheet" href="{{ asset('cssfile/price_list_form.css') }}">
@endsection

@extends('app')
@section('content')
    @if ($editMode == 1)
    <div class="wrapper">
    <h1 class="header">Edycja pozycji cennika</h1>
        <form action="/price_list_item" method="POST">
            @csrf
            <label class="label">Nazwa towaru</label> <input type="text" name="Nazwa towaru" placeholder="Nazwa towaru" value=$commodity_name/>
            <label class="label">Kod towaru</label> <input type="text" name="Kod towaru" placeholder="Kod towaru" value=$commodity_code/>
            <label class="label">Jednostka miary</label> <input type="text" name="Jednostka miary" placeholder="Jednostka miary" value=$unit_shortcut/>
            <label class="label">Cena jednostkowa</label> <input type="text" name="Cena jednostkowa" placeholder="Cena jednostkowa" value=$price/>

            <input class="btn-form" type="submit" value="Dodaj">
            <input class="btn-form" type="reset" value="Wróć">

        </form>
    </div>
    @else
    <div class="wrapper">
    <h1 class="header">Dodawanie pozycji cennika</h1>
        <form action="/price_list_item" method="POST">
            @csrf
            <label class="label">Nazwa towaru</label> <input type="text" name="Nazwa towaru" placeholder="Nazwa towaru"/>
            <label class="label">Kod towaru</label> <input type="text" name="Kod towaru" placeholder="Kod towaru"/>
            <label class="label">Jednostka miary</label> <input type="text" name="Jednostka miary" placeholder="Jednostka miary"/>
            <label class="label">Nowa cena jednostkowa</label> <input type="text" name="Cena jednostkowa" placeholder="Nowa cena jednostkowa"/>

            <input class="btn-form" type="submit" value="Dodaj">
            <input class="btn-form" type="reset" value="Wróć">

        </form>
    </div>
    @endif
@endsection