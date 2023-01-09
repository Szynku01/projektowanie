{{-- Podlaczenie swojego css --}}
@section('css')
<link rel="stylesheet" href="{{ asset('cssfile/most_profitable_commodities.blade.css') }}">
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
                
                <div class="card">
                    <div class="info">
                        <div class="img">
                            <i class="fa-solid fa-image"></i>
                        </div>

                        <div class="names">
                            <h3>Towar A</h3>
                            <p>Kategoria</p>
                        </div>
                    </div>

                    <div class="profit">
                        <h3>9843 zł</h3>
                    </div>
                </div>

                <div class="card">
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
                </div>

            </div>
            
            <div class="bottom">
                <button class="btn">Wszystkie towary</button> 
             </div>
        </div>

    </div>
@endsection