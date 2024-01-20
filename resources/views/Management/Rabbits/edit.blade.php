@extends('master')

@section('content')

    <div class="container">
        <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Edycja królika {{ $rabbit->name }}</h5>
                    <p class="card-text">Panel służący do edycji królika</p>
                </div>

            <div class="card-body">
                <form class="row g-3" action="{{ route('management.rabbits.update', $rabbit) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="col-md-6">
                        <label for="inputName" class="form-label"><strong>Imię</strong></label>
                        <input type="text" class="form-control" name="name" id="name" value="{{ $rabbit->name }}">
                        @error('name')<span class="col-md-4 help-block text-danger"><strong>{{ $message }}</strong></span>@enderror
                    </div>
                    <div class="col-md-6">
                        <label for="inputGender" class="form-label"><strong>Płeć</strong></label>
                        <select id="gender" name="gender" class="form-select">
                            <option value="Nieznana" {{ $rabbit->gender === 'Nieznana' ? 'selected' : '' }}>Nieznana</option>
                            <option value="Samiec" {{ $rabbit->gender === 'Samiec' ? 'selected' : '' }}>Samiec</option>
                            <option value="Samica" {{ $rabbit->gender === 'Samica' ? 'selected' : '' }}>Samica <i class="fa-solid fa-venus"></i></option>
                        </select>
                        @error('gender')<span class="col-md-4 help-block text-danger"><strong>{{ $message }}</strong></span>@enderror
                    </div>
                    <div class="col-md-6">
                        <label for="inputBreed" class="form-label">Rasa</label>
                        <input type="text" class="form-control" name="breed" id="breed" value="{{ $rabbit->breed }}">
                        @error('breed')<span class="col-md-4 help-block text-danger"><strong>{{ $message }}</strong></span>@enderror
                    </div>
                    <div class="col-md-6">
                        <label for="inputBorn" class="form-label">Data urodzenia</label>
                        <input type="date" name="born" class="form-control" id="inputBorn" value="{{ $rabbit->born }}">
                        @error('born')<span class="col-md-4 help-block text-danger"><strong>{{ $message }}</strong></span>@enderror
                    </div>
                    <div class="col-md-6">
                        <label for="inputDeworming" class="form-label">Data odrobaczania</label>
                        <input type="date" name="deworming" id="deworming" class="form-control" value="{{ $rabbit->deworming }}">
                        @error('deworming')<span class="col-md-4 help-block text-danger"><strong>{{ $message }}</strong></span>@enderror
                    </div>
                    <div class="col-md-6">
                        <label for="inputPhoto" class="form-label">Zdjęcie</label>
                        <input class="form-control" name="photo" type="file" id="photo">
                    </div>
                    <div class="col-md-6">
                        <label for="inputNote" class="form-label">Notatka</label>
                        <div class="form-floating">
                            <textarea class="form-control" name="note" placeholder="Leave a comment here" id="floatingTextarea" value="{{ $rabbit->note }}"></textarea>
                            @error('note')<span class="col-md-4 help-block text-danger"><strong>{{ $message }}</strong></span>@enderror
                        </div>
                    </div>
                    <div class="col-12 d-flex align-items-end">

                        <button type="submit" style="width: 150px" class="btn btn-primary ms-auto"><strong>Zapisz</strong></button>

                    </div>
                </form>
            </div>
        </div>
    </div>


@endsection
