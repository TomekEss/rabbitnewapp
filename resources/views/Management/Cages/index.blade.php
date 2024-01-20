@extends('master')

@section('content')

    <div class="container">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col">
                        <a href=" {{ route('management.rabbits.create') }}" class="btn btn-bd-primary">Dodaj królika +</a>
                    </div>
                    <div class="col">

                    </div>
                    <div class="col">

                    </div>
                </div>
            </div>
            <div class="card-body">
                <h5 class="card-title">Zarządzaj klatkami</h5>
                <p class="card-text">Panel służący do zarządzania klatkami</p>









                <table class="table table-dark table-hover">
                    <thead>
                    <th scope="col">ID</th>
                    <th scope="col">Nazwa klatki</th>
                    <th scope="col">Numer oczka</th>
                    <th scope="col">Data sprzątania</th>
                    <th scope="col">Liczba królików</th>
                    <th scope="col"></th>
                    </thead>
                    <tbody>
                    @foreach($cages_eays as $eay)
                        <a class="table-active">
                            <td>{{ $eay->id }}</td>
                            <td>{{ $eay->cages_name?->name }}</td>
                            <td>{{ $eay->eays_number }}</td>
                            <td>{{ $eay->cleaning_day }}</td>
                            <td>{{ $eay->born }}</td>
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














                <div class="d-flex align-items-end justify-content-end"
                {!! $cages_eays->links() !!}

            </div>
        </div>
    </div>


@endsection
