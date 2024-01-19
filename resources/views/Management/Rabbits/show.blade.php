@extends('master')

@section('content')

    <div class="container">

        <div class="card text-center">
                <div class="card-body">
                    <h5 class="card-title">Szczegółowe dane królika: {{$rabbit->name}}</h5>

                        <div class="card-group">
                            <div class="card w-50" >
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">Imie: {{ $rabbit->name }}</li>
                                    <li class="list-group-item">Płeć: {{ $rabbit->gender }}</li>
                                    <li class="list-group-item">Urodzona: {{ $rabbit->born }}</li>
                                </ul>
                            </div>
                            <div class="card">
                                @if($rabbit->photo == null && $rabbit->gender == 'Samica')
                                    <img src="{{ asset('images/dziewa.png') }}" alt="" width="500" height="700" class="card-img">
                                @elseif($rabbit->photo == null && $rabbit->gender == 'Samiec')
                                        <img src="{{ asset('images/chopok.png') }}" alt="" width="500" height="700" class="card-img">
                                @else
                                    <img src="data:image/jpeg;base64,{{ base64_encode($rabbit->photo) }}" alt="" width="500" height="700" class="card-img">
                                @endif
                            </div>
                            </div>


                    <a href="{{ route('management.rabbits.edit', ['rabbit' => $rabbit]) }}" class="btn btn-primary mt-2">Edytuj</a>
                </div>
        </div>

    </div>


@endsection
