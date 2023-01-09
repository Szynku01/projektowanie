{{-- Podlaczenie swojego css --}}
@section('css')
<link rel="stylesheet" href="{{ asset('cssfile/commodity_info.css') }}">
@endsection

{{-- Pisanie frontu --}}
@extends('app')
@section('content')
    <div class="wrapper">
        <header class="header">
            <h1>Towar</h1>
            <button class="btn-edit">Edytuj</button>
        </header>

        <div class="main-info">
            <div class="img">
                <i class="fa-solid fa-image"></i>
            </div>

            <div class="names">
                <h3>Nazwa: <span>Towar A</span></h3>
                <h3>Kategoria: <span>Kategoria</span></h3>
            </div>
        </div>

        <div class="infos">
            <div class="info code">
                <div class="label">
                    <i class="fa-solid fa-barcode"></i>
                    <h2>Kod:</h2>
                </div>
                <p class="value">12345</p>
            </div>

            <div class="info unit">
                <div class="label">
                    <i class="fa-solid fa-ruler"></i>
                    <h2>Jednostka miary:</h2>
                </div>
                <p class="value">metr</p>
            </div>

            <div class="info price">
                <div class="label">
                    <i class="fa-solid fa-tag"></i>
                    <h2>Cena:</h2>
                </div>
                <p class="value">9999 zł z dnia 01.01.2023</p>
            </div>

            <div class="info purchase-price">
                <div class="label">
                    <i class="fa-solid fa-dollar-sign"></i>
                    <h2>Cena zakupu:</h2>
                </div>
                <p class="value">1234zł</p>
            </div>

        </div>

        <div class="bottom">
            <button class="btn">Wróć</button> 
         </div>
    </div>
@endsection