@extends('master')

@section('content')

    <div class="container">
        @livewire('rabbit.rabbit-edit', ['rabbit' => $rabbit])
    </div>


@endsection
