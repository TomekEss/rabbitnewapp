@extends('master')

@section('content')


<div class="container">
    <div class="row">
        <div class="col-sm-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Zarządzaj królikami</h5>
                    <p class="card-text">Panel służący do zarządzania królikami</p>
                    <a href="{{ route('management.rabbits.index') }}" class="btn btn-primary">Przejdź</a>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Zarządzaj klatkami</h5>
                    <p class="card-text">Panel służący do zarządzania klatkami</p>
                    <a href="{{ route('management.cages.index') }}" class="btn btn-primary">Przejdź</a>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
