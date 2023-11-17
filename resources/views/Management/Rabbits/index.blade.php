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
                        Column
                    </div>
                    <div class="col">
                        Column
                    </div>
                </div>
            </div>
                <div class="card-body">
                    <h5 class="card-title">Zarządzaj klatkami</h5>
                    <p class="card-text">Panel służący do zarządzania klatkami</p>
                    <a href="#" class="btn btn-primary">Przejdź</a>
                </div>
        </div>
    </div>


@endsection
