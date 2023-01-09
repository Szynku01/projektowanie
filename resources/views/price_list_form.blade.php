@section('css')
<link rel="stylesheet" href="{{ asset('cssfile/price_list_form.css') }}">
@endsection

@extends('app')
@section('content')
    <div class="wrapper">
    <h1 class="header">Dodaj do cennika</h1>
        <form action="/price_list" method="POST">
            @csrf
            <label class="label">Nazwa towaru</label> <input type="text" name="Nazwa towaru" placeholder="Nazwa towaru"/>
            <label class="label">Kod towaru</label> <input type="text" name="Kod towaru" placeholder="Kod towaru"/>
            <label class="label">Jednostka miary</label> <input type="text" name="Jednostka miary" placeholder="Jednostka miary"/>
            <label class="label">Cena jednostkowa zakupu</label> <input type="text" name="Cena jednostkowa zakupu" placeholder="Cena jednostkowa zakupu"/>
            <label class="label">Nowa cena jednostkowa</label> <input type="text" name="Nowa cena jednostkowa" placeholder="Nowa cena jednostkowa"/>

            <input class="btn-form" type="submit" value="Dodaj">
            <input class="btn-form" type="reset" value="Wróć">

        </form>


    </div>
@endsection