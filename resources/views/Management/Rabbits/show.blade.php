@extends('master')

@section('content')

    <div class="container">

        <div class="card text-center">
                <div class="card-body">
                    <h5 class="card-title">Szczegółowe dane królika: {{$rabbit->name}}</h5>

                        <div class="card-group">

                            <div class="card w-50">
                                <table class="table table-striped-columns text-lg-start">
                                    <tbody>
                                        <tr>
                                            <td class="w-50">
                                                <a>Imię:</a>
                                            </td>
                                            <td>
                                                {{ $rabbit->name }}
                                            </td>
                                        </tr>

                                        <tr>
                                            <td class="w-50">
                                                <a>Płeć:</a>
                                            </td>
                                            <td>
                                                {{ $rabbit->gender }}
                                            </td>
                                        </tr>

                                        <tr>
                                            <td class="w-50">
                                                <a>Data urodzenia:</a>
                                            </td>
                                            <td>
                                                {{ $rabbit->born }}
                                            </td>
                                        </tr>

                                        <tr>
                                            <td class="w-50">
                                                <a>Rasa:</a>
                                            </td>
                                            <td>
                                                {{ $rabbit->breed }}
                                            </td>
                                        </tr>

                                        <tr>
                                            <td class="w-50">
                                                <a>Data odrobaczania:</a>
                                            </td>
                                            <td>
                                                {{ $rabbit->deworming }}
                                            </td>
                                        </tr>

                                        <tr>
                                            <td class="w-50">
                                                <a>Data dodania do systemu:</a>
                                            </td>
                                            <td>
                                                {{ $rabbit->created_at }}
                                            </td>
                                        </tr>

                                        <tr>
                                            <td class="w-50">
                                                <a>Data aktualizacji danych:</a>
                                            </td>
                                            <td>
                                                {{ $rabbit->updated_at }}
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>

                                @if($rabbit->note)
                                <p><label for="w3review">Notatka:</label></p>
                                <textarea id="w3review" name="w3review" disabled>{{ $rabbit->note }} </textarea>
                                @else
                                @endif


                            </div>

{{--                            Prawa strona CARD ze zdjeciem                 --}}
                            <div class="card">
                                @if($rabbit->photo == null && $rabbit->gender == 'Samica')
                                    <img src="{{ asset('images/dziewa.png') }}" alt="" width="500" height="700" class="card-img">
                                @elseif($rabbit->photo == null && $rabbit->gender == 'Samiec')
                                        <img src="{{ asset('images/chopok.png') }}" alt="" width="500" height="700" class="card-img">
                                @elseif($rabbit->photo == null && $rabbit->gender == 'Nieznana')
                                        <img src="{{ asset('images/undifine.png') }}" alt="" width="500" height="700" class="card-img">
                                @else
                                    <img src="data:image/jpeg;base64,{{ base64_encode($rabbit->photo) }}" alt="" width="500" height="700" class="card-img">
                                @endif
                            </div>
                            </div>
                    <div class="btn-toolbar justify-content-between" role="toolbar" aria-label="Toolbar with button groups">
                        <div class="btn-group" role="group" aria-label="First group">
                    <a href="{{ route('management.rabbits.index')}}" class="btn btn-primary mt-2"><i class="fa-solid fa-arrow-rotate-left"></i> Powrót do listy</a>
                        </div>

                        <div class="input-group">
                            <div class="input-group-prepend">
                    <a href="{{ route('management.rabbits.edit', ['rabbit' => $rabbit]) }}" class="btn btn-primary mt-2"><i class="fa-regular fa-pen-to-square"></i> Edytuj</a>
                            </div>
                        </div>
                    </div>
                </div>
        </div>

    </div>


@endsection
