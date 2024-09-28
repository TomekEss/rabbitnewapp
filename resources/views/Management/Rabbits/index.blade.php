@extends('master')

@section('content')
{{--    Doładuj styl    --}}
<link href="{{ asset('css/rabbit_management_index/indexrabmanastyle.css') }}" rel="stylesheet">

<div class="container">

    <div class="card">

        <div class="position-relative">
            <div class="position-absolute top-0 end-0">
                <div class="d-flex">
                    <a href="{{ route('management.rabbits.create') }}" class="column col-xs-6 me-1" id="caption">
                        <span class="text"><i class="fa-solid fa-heart"></i></span>
                        <img src="{{ asset('images/rabsex.png') }}"
                             style="max-height: 120px; max-width: 120px; border-radius: 50%;border: 3px solid #fff; box-shadow: 0 0 10px #000;">
                    </a>
                    <a href="{{ route('management.rabbits.create') }}" class="column col-xs-6" id="caption">
                        <span class="text"><i class="fa-solid fa-plus"></i></span>
                        <img src="{{ asset('images/addrab.png') }}"
                             style="max-height: 120px; max-width: 120px; border-radius: 50%;border: 3px solid #fff; box-shadow: 0 0 10px #000;">
                    </a>
                </div>
            </div>
        </div>


        <div class="card-header d-flex justify-content-between align-items-center">
            <h3><strong>Lista królików</strong></h3>
        </div>

        <div class="card-body">
                <table class="table table-dark table-hover text-center">
                    <thead>
                      <th scope="col">ID</th>
                      <th scope="col">Zdjęcie</th>
                      <th scope="col">Nazwa</th>
                      <th scope="col">Płeć</th>
                      <th scope="col">Rasa</th>
                      <th scope="col">Data urodzenia</th>
                      <th scope="col">Klatka</th>
                      <th scope="col">Numer Oczka</th>
                      <th scope="col">Odrobaczenie</th>
                      <th scope="col"></th>
                    </thead>
                    <tbody>
                    @foreach($rabbits as $rabbitcage)
                        @foreach($rabbitcage as $rabbit)
                            <tr class="table-active">

                                <td>{{ $rabbit->id ?? '' }}</td>
                                <td>
                                    @if(isset($rabbit->photo))
                                    <img src="{{ asset('kroliki/' . $rabbit->photo) }}" alt="{{ $rabbit->name }}" width="30" height="60" class="card-img">
                                    @else
                                    @endif
                                </td>
                                <td>{{ $rabbit->name }}</td>
                                <td>{{ $rabbit->gender }}
                                    @if($rabbit->gender == 'Samica')
                                        <i class="fa-solid fa-venus"></i>
                                    @elseif($rabbit->gender == 'Samiec')
                                        <i class="fa-solid fa-mars"></i>
                                    @else
                                        <i class="fa-solid fa-genderless"></i>
                                    @endif
                                </td>
                                <td>{{ $rabbit->breed }}</td>
                                <td>{{ $rabbit->born }}</td>
                                <td>{{ $rabbit->rabbit_in_cage->cage_name?->name ?? '' }}</td>
                                <td>{{ $rabbit->rabbit_in_cage->eye->eyes_number ?? '' }}</td>
                                <td>{{ $rabbit->deworming }}</td>
                                <td>
                                    <div class="d-flex align-content-center justify-content-center">
                                        <a href="{{ route('management.rabbits.show', ['rabbit' => $rabbit]) }}" class="btn bg-info mx-2">Szczegóły</a>

                                        <a href="{{ route('management.rabbits.edit', ['rabbit' => $rabbit]) }}" class="btn bg-white mx-2">Edytuj</a>

                                        <form action="{{ route('management.rabbits.delete', ['rabbit' => $rabbit]) }}" method="POST">
                                            @csrf
                                            <button type="submit" class="btn btn-danger mx-2">Usuń</button>
                                        </form>
                                    </div>
                                </td>

                            </tr>
                        @endforeach
                    @endforeach
                    </tbody>
                </table>
        </div>

    </div>

</div>
@endsection
