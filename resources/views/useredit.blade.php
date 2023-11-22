@extends('master')

@section('content')

<div class="container">
      <form action="{{ route('user.update', ['user'=>$user]) }}" method="POST">
          @csrf
          <div class="d-flex align-items-center justify-content-center">
              <img class="mb-4 text-center" src="{{ asset('images/useredit.png') }}" alt="" width="250" height="250">
          </div>
                <h1 class="h3 mb-3 fw-normal text-center">Dane Użytkownika</h1>

          <div class="d-flex align-items-center justify-content-center">
          <div class="row w-75">
              <div class="col-6">
                  <label class="form-label" for="login">Login</label>
                  <input type="text" value="{{ $user->name }}" class="form-control" name="login" placeholder="Login">
                  @error('login')<strong> {{ $message }} </strong> @enderror
              </div>
              <div class="col-6">
                  <label class="form-label" for="login">Adres Email</label>
                  <input type="text" value="{{ $user->email }}" class="form-control" placeholder="Adres Email" disabled>

              </div>
          </div>
          </div>

          <div class="d-flex align-items-center justify-content-center">
          <div class="row w-75 mt-3">
              <div class="col-6">
                      <label class="form-label" for="password" id="currentPasswordLabel">Obecne hasło</label>
              <div class="input-group mb-3">
                  <button class="btn btn-outline-secondary" type="button" id="button-addon1">Zmień hasło</button>
                  <input type="password" class="form-control" name="password" id="password" disabled>
              </div>
              </div>
              <div class="col-6">
                  <label class="form-label" for="password" id="newPasswordLabel">Nowe hasło</label>
                  <input type="password" data-changepassword class="form-control" name="newpassword" id="newPasswordInput">
              </div>
          </div>
          </div>

          <div class="d-flex align-items-center justify-content-center">
              <div class="row w-25">
                <button class="btn btn-primary" type="submit">Zapisz</button>
                <p class="mt-5 mb-3 text-body-secondary text-center">&copy;2023 - Tomasz Siemek</p>
              </div>
          </div>

      </form>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        var button = document.getElementById("button-addon1");
        var input = document.getElementById("password");
        var currentPasswordLabel = document.getElementById("currentPasswordLabel");
        var newPasswordLabel = document.getElementById("newPasswordLabel");
        var newPasswordInput = document.getElementById("newPasswordInput");
        currentPasswordLabel.style.display = 'none';
        newPasswordLabel.style.display = 'none';
        newPasswordInput.style.display = 'none';

        button.addEventListener("click", function() {
            if (input.disabled) {
                input.removeAttribute("disabled");
                currentPasswordLabel.style.display = ''; // Pokaż label
                newPasswordLabel.style.display = '';
                newPasswordInput.style.display = '';
            } else {
                input.setAttribute("disabled", "disabled");
                input.value = "";
                currentPasswordLabel.style.display = 'none'; // Ukryj label
                newPasswordLabel.style.display = 'none';
                newPasswordInput.style.display = 'none';
            }
        });
    });
</script>


@if ($errors->has('Somethink'))
    <script>
        swal.fire({
            title: "Wystąpił błąd",
            text:  "{{ $errors->first('Somethink') }}",
            icon: "warning",
            button: true,
            button: "OK"
        });
    </script>
@endif



@endsection
