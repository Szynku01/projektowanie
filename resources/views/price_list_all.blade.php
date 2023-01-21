<!-- Widok wszystkich cenników -->
@section('css')
<link rel="stylesheet" href="{{ asset('cssfile/price_list_all.css') }}">
@endsection

@extends('app')
@section('content')
<div class="wrapper">
    <div class="stats most-popular">
        <h1 class="header">Cenniki</h1>

        <div class="table">

            <div class="grid">
                @foreach ($price_lists as $price_list)
                <div class="card">
                    <div class="info">
                        <div class="img">
                            <i class="fa-solid fa-image"></i>
                        </div>

                        <div class="names">
                            <p>{{ $price_list->date_from }}</p>
                            <p>{{ $price_list->date_to }}</p>
                        </div>
                    </div>

                    <div class="more-info">
                        <button class="btn"><a href="{{ route('cennik', ['id' => $price_list->price_list_number]) }}">Szczegóły</a></button>
                    </div>
                </div>
                @endforeach
            </div>

            <div class="bottom">
                <button class="btn">Stwórz nowy cennik</button>
            </div>
        </div>
    </div>
</div>
@endsection