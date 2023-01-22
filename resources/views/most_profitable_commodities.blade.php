{{-- Podlaczenie swojego css --}}
@section('css')
<link rel="stylesheet" href="{{ asset('cssfile/most_profitable_commodities.css') }}">
@endsection

{{-- Pisanie frontu --}}
@extends('app')
@section('content')
    <div class="wrapper">
        <h1 class="header">Najbardziej dochodowe towary</h1>

        <div class="table">
            <div class="title">
                <h3>Towary</h3>
                <h3>Zysk</h3>
            </div>

            <div class="grid">
                
                @foreach ($slownik as $slow)
        
                <div class="card">
                    <div class="info">
                        <div class="img">
                            <i class="fa-solid fa-image"></i>
                        </div>

                        <div class="names">
                            <h3>
                               {{ $slownikTow[$slow]}}
                            </h3>
                            <p>{{ $slow }}</p>
                        </div>
                    </div>

                    <div class="more-info">
                        <h3>{{ $profits[$slow] }}</h3>
                        <button class="btn"><a href="{{ url('towarInfo/') . '$towary[$slow]->commodity_code'}}">Szczegoly</a></button>
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
                            <p>Kategoria</p>
                        </div>
                    </div>

                    <div class="profit">
                        <h3>1253 zł</h3>
                    </div>
                </div> --}}

            </div>
            
            <div class="bottom">
                <button class="btn">Wszystkie towary</button> 
             </div>
        </div>

    </div>
@endsection