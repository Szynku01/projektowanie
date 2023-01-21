<!-- Widok pojedynczego cennika -->
@section('css')
<link rel="stylesheet" href="{{ asset('cssfile/price_list.css') }}">
@endsection

@extends('app')
@section('content')
<div class="wrapper">
    <div class="stats most-popular">
        <h1 class="header">Cennik</h1>

        <div class="table">

            <div class="grid">
                @foreach($price_list_items as $price_list_item)
                <div class="card">
                    <div class="info">
                        <div class="img">
                            <i class="fa-solid fa-image"></i>
                        </div>

                        <div class="names">
                            <p>{{ $price_list_item->commodity_code }}
                                {!! "&nbsp;" !!}
                                {{ $price_list_item->price }} 
                            </p>
                        </div>
                    </div>

                    <div class="more-info">
                        <button class="btn"><a href="{{ route('edytujPozycjeCennika', ['id' => $price_list_item->item_number]) }}">Edytuj pozycję</a></button>
                    </div>
                </div>
                @endforeach
            </div>

            <div class="bottom">
                <button class="btn"><a href="{{ route('dodajPozycjeCennika') }}">Dodaj pozycję</a></button>
            </div>
        </div>
    </div>
</div>
@endsection