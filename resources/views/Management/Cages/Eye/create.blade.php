@extends('master')

@section('content')

<div class="container">
    <div class="card">

        <div class="card-header">
            <a>Dodaj nowe oczko</a>
        </div>

        <div class="card-body">

            <form class="row g-3" action="{{ route('management.cages.eye.store') }}" method="POST">
                @csrf
                <div class="col-md-6">


                    <label for="cage_name" class="form-label">Email</label>
                    <select type="text" class="form-select" id="cage_name" name="cage_name">
                            <option value="">Wybierz nazwę klatki...</option>
                        @foreach($cages_name as $cage)
                            <option value="{{ $cage->id }}">{{ $cage->name }}</option>
                        @endforeach
                    </select>
                    <div>
                    @error('cage_name')<strong>{{ $message }}</strong>@enderror
                    </div>


                    <label for="eye_number" class="form-label mt-2">Numer oczka</label>
                    <input type="number" class="form-control" id="eye_number" name="eye_number" placeholder="Wpisz numer oczka">
                    <div>
                    @error('eye_number')<strong>{{ $message }}</strong>@enderror
                    </div>



                    <label for="cleaning_date" class="form-label mt-2">Data sprzątania</label>
                    <input type="date" class="form-control" id="cleaning_date" name="cleaning_date" placeholder="Data sprzątania">
                    <div>
                    @error('cleaning_date')<strong>{{ $message }}</strong>@enderror
                    </div>

                    <div class="d-flex align-items-end mt-2">
                        <button type="submit" class="btn btn-primary ms-auto">Dodaj</button>
                    </div>

                </div>
                <div class="col-6">
                    <img src="{{ asset('images/cageye.png') }}" alt="" width="500" height="700" class="card-img">
                </div>
            </form>
        </div>
    </div>
</div>


@if($errors->any())
    <script>
        swal.fire({
            title: "Wystąpił błąd",
            text:  "Sprawdz poprawność formularza",
            icon: "warning",
            button:true,
            button:"OK"
        });
    </script>
@endif

@endsection
