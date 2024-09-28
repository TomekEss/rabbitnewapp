@extends('master')

@section('content')
<style>
    .card:hover {
        box-shadow: 0 0 5px 10px black; /* Dodaje cień dookoła karty */
    }
</style>

<div class="container">
    <div class="row row-cols-1 row-cols-lg-5 g-4">
        <div class="col">
            <a href="{{ route('management.rabbits.index') }}" class="card h-100" style="text-decoration: none; color: inherit">
                <img src={{ asset('images/rabmancard.png') }} class="card-img-top" alt="rabmancard"/>
                <div class="card-body text-center">
                    <h5 class="card-title"><strong>Zarządzanie królikami</strong></h5>
                    <p class="card-text">
                        Panel służący do zarządzania królikami w hodowli.
                    </p>
                </div>
            </a>
        </div>
        <div class="col">
            <a href="{{ route('management.cages.index') }}" class="card h-100" style="text-decoration: none; color: inherit">
                <img src={{ asset('images/cagmancard.png') }} class="card-img-top" alt="cagmancard"/>
                <div class="card-body text-center">
                    <h5 class="card-title"><strong>Zarządzanie klatkami</strong></h5>
                    <p class="card-text">
                        Panel służący do zarządzania klatkami w hodowli.
                    </p>
                </div>
            </a>
        </div>
        <div class="col">
            <a href="{{ route('management.cages.index') }}" class="card h-100" style="text-decoration: none; color: inherit">
                <img src={{ asset('images/rabsex.png') }} class="card-img-top" alt="finmancard" />
                <div class="card-body text-center">
                    <h5 class="card-title"><strong>Wykoty</strong></h5>
                    <p class="card-text">
                        Panel służący do zarządzania terminami zakotów oraz wykotów.
                    </p>
                </div>
            </a>
        </div>
        <div class="col">
            <a href="{{ route('management.cages.index') }}" class="card h-100" style="text-decoration: none; color: inherit">
                <img src={{ asset('images/finmancard.png') }} class="card-img-top" alt="finmancard" />
                <div class="card-body text-center">
                    <h5 class="card-title"><strong>Finanse</strong></h5>
                    <p class="card-text">
                        Panel służący do prowadzenia na bieżąco wydatków oraz zysków z hodowli królików.
                    </p>
                </div>
            </a>
        </div>
    </div>
</div>


@endsection
