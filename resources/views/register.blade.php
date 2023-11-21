@extends('master')

@section('content')
<div class="register">
    <main class="form-signin w-100 m-auto">
      <form action="{{ route('user.store') }}" method="POST">
          @csrf
          <div class="d-flex align-items-center justify-content-center">
        <img class="mb-4 text-center" src="{{ asset('images/rabbit-logo.png') }}" alt="" width="110" height="130">
          </div>
        <h1 class="h3 mb-3 fw-normal text-center">Rejestracja</h1>


        <div class="form-floating">
          <input type="text" class="form-control" name="login" placeholder="Login">
          <label for="login">Wpisz login</label>
            @error('login')<strong>{{ $message }}</strong>@enderror
        </div>
          <div class="form-floating">
              <input type="email" class="form-control" name="email" placeholder="Email">
              <label for="email">Wpisz adres email</label>
              @error('email')<strong>{{ $message }}</strong>@enderror
          </div>
        <div class="form-floating">
          <input type="password" class="form-control" name="password" placeholder="Hasło">
          <label for="password">Wpisz hasło</label>
            @error('password')<strong>{{ $message }}</strong>@enderror
        </div>

        <button class="btn btn-primary w-100 py-2" type="submit">Zarejestruj</button>
        <p class="mt-3 mb-3 text-body-secondary text-center">&copy;2023 - Tomasz Siemek</p>
      </form>
    </main>
</div>


@endsection
