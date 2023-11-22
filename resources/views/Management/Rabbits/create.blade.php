@extends('master')

@section('content')

    <div class="container">
        <div class="card">
            <div class="card-header">
                <div class="row justify-content-center">
                    <div class="col-4">
                        <strong>Formularz dodawania nowego królika</strong>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form class="row g-3" action="{{ route('management.rabbits.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="col-md-6">
                        <label for="inputName" class="form-label">Imię</label>
                        <input type="text" class="form-control" name="name" id="name">
                        @error('name')<span class="col-md-4 help-block text-danger"><strong>{{ $message }}</strong></span>@enderror
                    </div>
                    <div class="col-md-6">
                        <label for="inputGender" class="form-label">Płeć</label>
                        <select id="gender" name="gender" class="form-select">
                            <option value="Nieznana" selected>Nieznana</option>
                            <option value="Samiec">Samiec</option>
                            <option value="Samica">Samica</option>
                        </select>
                        @error('gender')<span class="col-md-4 help-block text-danger"><strong>{{ $message }}</strong></span>@enderror
                    </div>
                    <div class="col-md-6">
                        <label for="inputBorn" class="form-label">Data urodzenia</label>
                        <input type="date" name="born" class="form-control" id="inputBorn">
                        @error('born')<span class="col-md-4 help-block text-danger"><strong>{{ $message }}</strong></span>@enderror
                    </div>
                    <div class="col-md-6">
                        <label for="inputDeworming" class="form-label">Data odrobaczania</label>
                        <input type="date" name="deworming" id="deworming" class="form-select">
                        @error('deworming')<span class="col-md-4 help-block text-danger"><strong>{{ $message }}</strong></span>@enderror
                    </div>
                    <div class="col-md-6">
                        <label for="inputNote" class="form-label">Notatka</label>
                        <div class="form-floating">
                            <textarea class="form-control" name="note" placeholder="Leave a comment here" id="floatingTextarea"></textarea>
                            @error('note')<span class="col-md-4 help-block text-danger"><strong>{{ $message }}</strong></span>@enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="inputPhoto" class="form-label">Zdjęcie</label>
                        <input class="form-control" name="photo" type="file" id="photo">
                    </div>
                    <div class="col-12 d-flex align-items-end">

                        <button type="submit" style="width: 150px" class="btn btn-primary ms-auto"><strong>Dodaj</strong></button>

                    </div>
                </form>
            </div>
        </div>
    </div>

    @if($errors->any())
        <script>
            swal.fire({
                title: "Wystąpił błąd",
                text:  "W przesłanym formularzu występują błędy",
                icon: "warning",
                button:true,
                button:"OK"
            });
        </script>
    @endif


@endsection
