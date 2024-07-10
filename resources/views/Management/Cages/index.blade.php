@extends('master')

@section('content')

    <div class="container">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col">
                        <a href=" {{ route('management.cages.eye.create') }}" class="btn btn-bd-primary">Dodaj Oczko +</a>
                    </div>
                    <div class="col">

                    </div>
                    <div class="col text-end">
                        <a href=" {{ route('management.cages.create') }}" class="btn btn-info">Dodaj Klatkę +</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <h5 class="card-title">Zarządzaj klatkami</h5>
                <p class="card-text">Panel służący do zarządzania klatkami</p>


                <table class="table table-dark table-hover">
                    <thead class="text-center">
                    <th scope="col">ID</th>
                    <th scope="col">Nazwa klatki</th>
                    <th scope="col">Numer oczka</th>
                    <th scope="col">Data sprzątania</th>
                    <th scope="col">Liczba królików</th>
                    <th scope="col"></th>
                    </thead>
                    <tbody class="text-center">
                    @foreach($cages_eyes as $eye)
                        <a class="table-active">
                            <td>{{ $eye->id }}</td>
                            <td>
                                {{ $eye->cages_name?->name }}
                                @if($eye->cages_name?->name == 'Skrzynia')
                                    <i class="fa-solid fa-toolbox" style="color: chocolate"></i>
                                @elseif($eye->cages_name?->name == 'Metalowa')
                                    <i class="fa-solid fa-building" style="color: lightgrey"></i>
                                @elseif($eye->cages_name?->name == 'Południowa')
                                    <i class="fa-solid fa-building" style="color: orangered"></i>
                                @elseif($eye->cages_name?->name == 'Zielona')
                                    <i class="fa-solid fa-building" style="color: green"></i>
                                @else
                                @endif
                            </td>
                            <td>{{ $eye->eyes_number }}</td>
                            <td>{{ $eye->cleaning_day }}</td>
                            <td>{{ $eye->rabbits_in_cages_count }}</td>
                            <td>
{{--                                <div class="d-flex align-content-center justify-content-center">--}}
{{--                                    <a href="{{ route('management.rabbits.show', ['rabbit' => $rabbit]) }}" class="btn bg-info mx-2">Szczegóły</a>--}}

{{--                                    <a href="{{ route('management.rabbits.edit', ['rabbit' => $rabbit]) }}" class="btn bg-white mx-2">Edytuj</a>--}}

{{--                                    <form action="{{ route('management.rabbits.delete', ['rabbit' => $rabbit]) }}" method="POST">--}}
{{--                                        @csrf--}}
{{--                                        <button type="submit" class="btn btn-danger mx-2">Usuń</button>--}}
{{--                                    </form>--}}
{{--                                </div>--}}
                            </td>
                            </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>


@endsection
