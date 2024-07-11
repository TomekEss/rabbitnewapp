@extends('master')

@section('content')

    <div class="container">
        <div class="card">

            <div class="card-header">
                <a>Dodaj nową klatkę</a>
            </div>

            <div class="card-body">
                @livewire('cage.cage-create')
            </div>

        </div>
    </div>

@endsection
