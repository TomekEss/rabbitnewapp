 <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Edycja królika {{$name}}</h5>
                    <p class="card-text">Panel służący do edycji królika</p>
                </div>

            <div class="card-body">
                <form class="row g-3" wire:submit="save_rabbit">
                    @csrf
                    <div class="col-md-6">
                        <label for="inputName" class="form-label"><strong>Imię</strong></label>
                        <input type="text" class="form-control" name="name" id="name" wire:model="name">
                        @error('name')<span class="col-md-4 help-block text-danger"><strong>{{ $message }}</strong></span>@enderror
                    </div>
                    <div class="col-md-6">
                        <label for="inputGender" class="form-label"><strong>Płeć</strong></label>
                        <select wire:model="gender" id="gender" name="gender" class="form-select">
                            <option value="Nieznana" {{ $gender === 'Nieznana' ? 'selected' : '' }}>Nieznana</option>
                            <option value="Samiec" {{ $gender === 'Samiec' ? 'selected' : '' }}>Samiec</option>
                            <option value="Samica" {{ $gender === 'Samica' ? 'selected' : '' }}>Samica <i class="fa-solid fa-venus"></i></option>
                        </select>
                        @error('gender')<span class="col-md-4 help-block text-danger"><strong>{{ $message }}</strong></span>@enderror
                    </div>

                    <div class="col-md-6">
                        <label for="inputBreed" class="form-label">Rasa</label>
                        <input type="text" class="form-control" name="breed" id="breed" wire:model="breed">
                        @error('breed')<span class="col-md-4 help-block text-danger"><strong>{{ $message }}</strong></span>@enderror
                    </div>
                    <div class="col-md-6">
                        <label for="inputBorn" class="form-label">Data urodzenia</label>
                        <input type="date" name="born" class="form-control" id="inputBorn" wire:model="born">
                        @error('born')<span class="col-md-4 help-block text-danger"><strong>{{ $message }}</strong></span>@enderror
                    </div>

                    <div class="col-md-6">
                        <label for="inputDeworming" class="form-label">Data odrobaczania</label>
                        <input type="date" name="deworming" id="deworming" class="form-control" wire:model="deworming">
                        @error('deworming')<span class="col-md-4 help-block text-danger"><strong>{{ $message }}</strong></span>@enderror
                    </div>
                    <div class="col-md-6">
                        <label for="inputPhoto" class="form-label">Zdjęcie</label>
                        <input class="form-control" name="photo" type="file" id="photo">
                    </div>

                    <div class="col-md-6">
                        <label for="inputNote" class="form-label">Notatka</label>
                        <div class="form-floating">
                            <textarea class="form-control" name="note" placeholder="Leave a comment here" id="floatingTextarea" wire:model="note"></textarea>
                            @error('note')<span class="col-md-4 help-block text-danger"><strong>{{ $message }}</strong></span>@enderror
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label for="inputCageName" class="form-label"><strong>Nazwa klatki</strong></label>
                        <select id="cages_name" name="cages_name" class="form-select" wire:model.live="cages_name_selected">
                                <option value="">Wybierz klatkę...</option>
                            @foreach($cages_name as $key => $cn)
                                <option value="{{ $cn->id }}">{{ $cn->name }}</option>
                            @endforeach
                        </select>
                        @error('cages_name')<span class="col-md-4 help-block text-danger"><strong>{{ $message }}</strong></span>@enderror
                    </div>
                    <div class="col-md-3">
                        <label for="inputCageName" class="form-label"><strong>Nazwa klatki</strong></label>
                        <select id="cages_name" name="cages_name" class="form-select" wire:model.live="cages_eye_selected">
                                <option value="">Wybierz numer oczka...</option>
                            @foreach($cages_eye as $ce)
                                <option value="{{ $ce->id }}">{{ $ce->eyes_number }}</option>
                            @endforeach
                        </select>
                        @error('cage_name')<span class="col-md-4 help-block text-danger"><strong>{{ $message }}</strong></span>@enderror
                    </div>

                    <div class="col-12 d-flex align-items-end">
                        <a href="{{ route('management.rabbits.index') }}" type="button" style="width: 165px" class="btn btn-primary"><i class="fa-solid fa-arrow-rotate-left"></i><strong> Powrót do listy</strong></a>

                        <button type="submit" style="width: 150px" class="btn btn-primary ms-auto"><i class="fa-regular fa-floppy-disk"></i><strong> Zapisz</strong></button>
                    </div>
                </form>
            </div>
        </div>
