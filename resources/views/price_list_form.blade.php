<!-- Formularz tworzenia cennika -->
@section('css')
<link rel="stylesheet" href="{{ asset('cssfile/price_list_form.css') }}">
@endsection

@extends('app')
@section('content')
    <div class="wrapper">
    <h1 class="header">Tworznie cennika</h1>
        <form action="{{ url('savePriceList') }}" method="post">
            @csrf
            <label class="label">Data od</label> <input type="text" name="date_from" placeholder="RRRR-MM-DD"/>
            <label class="label">Data do</label> <input type="text" name="date_to" placeholder="RRRR-MM-DD"/>

            <input class="btn-form" type="submit" value="Dodaj"/>
            {{-- TODO zrobic styl do przycisku wróć --}}
            <a class="btn-form" href="{{ url('cenniki') }}">Wróć</a>
        </form>
    </div>
@endsection