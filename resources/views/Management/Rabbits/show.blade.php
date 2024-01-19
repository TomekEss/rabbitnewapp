@extends('master')

@section('content')

    <div class="container">

        <div class="card text-center">
                <div class="card-body">
                    <h5 class="card-title">Szczegółowe dane królika</h5>

                    <a href="{{ route('management.rabbits.edit', ['rabbit' => $rabbit]) }}" class="btn btn-primary">Przejdź</a>
                </div>
        </div>

    </div>


@endsection
