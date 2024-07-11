<div>
    <form class="row g-3" wire:submit.prevent="save">

        <div class="col-md-6">
            <label class="form-label">Nazwa klatki</label>
            <input type="text" class="form-control" id="name" wire:model="name" required>
            @error('name') <div class="text-danger"> {{ $message }} </div> @enderror
        </div>
        <div class="col-md-6">
            <label class="form-label">Liczba oczek</label>
            <input type="number" class="form-control" id="cagescount" wire:model="countNumber" required disabled style="background: #e9ecef; opacity: 1; color: #495057;">
            @error('countNumber') <div class="text-danger"> {{ $message }} </div> @enderror
        </div>

        <div class="row mt-3 d-flex align-content-center justify-content-center">
            <div class="col-6">
                <table class="table table-bordered">
                    <thead class="text-center">
                    <tr>
                        <th>
                            <span>Numer oczka</span>
                        </th>
                        <th>
                            <span>Data sprzątania</span>
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($eyes as $index => $eye)
                        <tr wire:key="eye.{{$index}}" class="text-center">
                            <td class="col-md-4">
                                <input class="form-control" type="number" wire:model.lazy="eyes.{{ $index }}.eyenumber" disabled style="background: #e9ecef; opacity: 1; color: #495057;">
                                @error('eyes.' . $index . '.eyenumber')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </td>
                            <td>
                                <input class="form-control" type="date" wire:model.lazy="eyes.{{ $index }}.cleaningDay">
                                @error('eyes.' . $index . '.cleaningDay')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                    <tr class="text-center">
                        <td>
                            <button class="btn btn-success" type="button" wire:click="addEye">Dodaj oczko</button>
                        </td>
                        <td>
                            <button class="btn btn-danger" type="button" wire:click="removeEye">Usuń oczko</button>
                        </td>
                    </tr>
                    </tfoot>
                </table>
            </div>
        </div>

        <div class="g-3 d-flex justify-content-between">
            <div>
                <a href="{{route('management.cages.index')}}" class="btn btn-primary" type="button">Powrót</a>
            </div>

            <div>
                <button class="btn btn-primary" type="submit">Zapisz</button>
            </div>
        </div>

    </form>
</div>
