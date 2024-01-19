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
                    <h5 class="card-title">Zarządzaj królikami</h5>
                    <p class="card-text">Panel służący do zarządzania królikami</p>
                    <table class="table table-dark table-hover">
                        <thead>
                          <th scope="col">ID</th>
                          <th scope="col">Nazwa</th>
                          <th scope="col">Płeć</th>
                          <th scope="col">Rasa</th>
                          <th scope="col">Data urodzenia</th>
                          <th scope="col">Odrobaczenie</th>
                          <th scope="col"></th>
                        </thead>
                        <tbody>
                        @foreach($rabbits as $rabbit)
                        <tr class="table-active">
                            <td>{{ $rabbit->id }}</td>
                            <td>{{ $rabbit->name }}</td>
                            <td>{{ $rabbit->gender }}</td>
                            <td>{{ $rabbit->breed }}</td>
                            <td>{{ $rabbit->born }}</td>
                            <td>{{ $rabbit->deworming }}</td>
                            <td>
                                <div class="d-flex align-content-center justify-content-center">

                                <form action="{{ route('management.rabbits.delete', ['rabbit' => $rabbit]) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-danger">Usuń</button>
                                </form>

                                <a href="{{ route('management.rabbits.show', ['rabbit' => $rabbit]) }}" class="btn bg-info mx-2">Szczegóły</a>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="d-flex align-items-end justify-content-end"
                    {!! $rabbits->links() !!}

                </div>
        </div>
    </div>


@endsection
