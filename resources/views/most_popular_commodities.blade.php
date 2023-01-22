{{-- Podlaczenie swojego css --}}
@section('css')
<link rel="stylesheet" href="{{ asset('cssfile/most_popular_commodities.css') }}">
@endsection

{{-- Pisanie frontu --}}
@extends('app')
@section('content')
<div class="wrapper">
    <div class="stats most-popular">
        <h1 class="header">Najpopularniejsze</h1>

        <div class="table">
            <div class="title">
                <h3>Towary</h3>
                <h3>Ilosc</h3>
            </div>

            <div class="grid">
                @foreach ($mosts as $most)
        
                <div class="card">
                    <div class="info">
                        <div class="img">
                            <i class="fa-solid fa-image"></i>
                        </div>

                        <div class="names">
                            <h3>
                               {{ $slownik[$most->commodity_code] }}
                            </h3>
                            <p>{{ $most->commodity_code }}</p>
                        </div>
                    </div>

                    <div class="more-info">
                        <h3>{{ $most->count }}</h3>
                        <button class="btn"><a href="{{ url('towarInfo/' . $most->commodity_code) }}">Szczegoly</a></button>
                    </div>
                </div>

                @endforeach
               

                {{-- <div class="card">
                    <div class="info">
                        <div class="img">
                            <i class="fa-solid fa-image"></i>
                        </div>

                        <div class="names">
                            <h3>Towar B</h3>
                            <p>Kod</p>
                        </div>
                    </div>

                    <div class="more-info">
                        <h3>123</h3>
                        <button class="btn">Szczegóły</button>
                    </div>
                </div> --}}

            </div>

            <div class="bottom">
                <button class="btn">Wszystkie towary</button>
            </div>
        </div>
    </div>

    <div class="stats least-popular">
        <h1 class="header">Najmniej popularne</h1>

        <div class="table">
            <div class="title">
                <h3>Towary</h3>
                <h3>Ilosc</h3>
            </div>

            <div class="grid">

                @foreach ($leasts as $least)
                <div class="card">
                    <div class="info">
                        <div class="img">
                            <i class="fa-solid fa-image"></i>
                        </div>

                        <div class="names">
                            <h3>{{ $slownik[$least->commodity_code] }}</h3>
                            <p>{{ $least->commodity_code }}</p>
                        </div>
                    </div>

                    <div class="more-info">
                        <h3>{{ $least->count }}</h3>
                        <button class="btn">Szczegóły</button>
                    </div>
                </div>
                @endforeach

                {{-- <div class="card">
                    <div class="info">
                        <div class="img">
                            <i class="fa-solid fa-image"></i>
                        </div>

                        <div class="names">
                            <h3>Towar B</h3>
                            <p>Kod</p>
                        </div>
                    </div>

                    <div class="more-info">
                        <h3>123</h3>
                        <button class="btn">Szczegóły</button>
                    </div>
                </div> --}}

            </div>

            <div class="bottom">
                <button class="btn">Wszystkie towary</button>
            </div>
        </div>
    </div>

</div>
@endsection