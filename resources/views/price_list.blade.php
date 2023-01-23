@php
    use App\Models\Commoditie;
@endphp
<!-- Widok pojedynczego cennika -->
@section('css')
<link rel="stylesheet" href="{{ asset('cssfile/price_list.css') }}">
@endsection

@extends('app')
@section('content')
<div class="wrapper">
    <div class="stats most-popular">
        <h1 class="header">{{ $date_from }} - {{ $date_to }}</h1>

        <div class="">

            <div class="table-head">
                <table>
                    <thead>
                        <th>Lp</th>
                        <th>Nazwa</th>
                        <th>Kod</th>
                        <th>Jednostka miary</th>
                        <th>Cena jednostkowa</th>
                        <th>Akcje</th>
                    </thead>
            </div>
            <div class="table-body">
                <tbody>
                @php
                    $lp = 1;
                @endphp
                @foreach($price_list_items as $price_list_item)
                @php
                    $commodity_code = $price_list_item->commodity_code;
                    $commodity = Commoditie::whereCommodityCode($commodity_code)->first();
                    $commodity_name = $commodity->commodity_name;
                    $unit_shortcut = $commodity->unit_shortcut;
                    
                @endphp
                {{-- <div class="card">
                    <div class="info">

                        <div class="names">
                            <p>{{ $commodity_name }}
                                {!! "&nbsp;" !!}
                                {{ $price_list_item->commodity_code }} 
                                {!! "&nbsp;" !!}
                                {{ $price_list_item->price }}
                                {!! "&nbsp;" !!}
                                {{ $unit_shortcut}} 
                            </p>
                        </div>
                    </div>

                    <div class="more-info">
                        <button class="btn"><a href="{{ route('edytujPozycjeCennika', ['id' => $price_list_item->item_number]) }}">Edytuj pozycję</a></button>
                    </div>
                </div> --}}
                    <tr>
                        <td style="text-align:right">{{ $lp }}</td>
                        <td style="text-align:left">{{ $commodity_name }}</td>
                        <td style="text-align:left">{{ $price_list_item->commodity_code }}</td>
                        <td style="text-align:left">{{ $unit_shortcut}} </td>
                        <td style="text-align:right">{{ $price_list_item->price }}</td>
                        <td style="text-align:center"><div class="more-info">
                            <button class="btn-edit"><a href="{{ route('edytujPozycjeCennika', ['id' => $price_list_item->item_number]) }}">Edytuj pozycję</a></button>
                        </div></td>
                    </tr>
            
                    @php
                    $lp = $lp + 1;

                @endphp
                @endforeach
                </tbody>
            </table>
            </div>

            <div class="bottom">
                <button class="btn"><a href="{{ route('dodajPozycjeCennika') }}">Dodaj pozycję</a></button>
            </div>
        </div>
    </div>
</div>
@endsection