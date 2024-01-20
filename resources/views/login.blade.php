@extends('master')

@section('content')
<div class="register">
    <main class="form-signin w-100 m-auto">
      <form action="{{ route('user.login') }}" method="POST">
          @csrf
          <div class="d-flex align-items-center justify-content-center">
        <img class="mb-4 text-center" src="{{ asset('images/rabbit-logo.png') }}" alt="" width="110" height="130">
          </div>
        <h1 class="h3 mb-3 fw-normal text-center">Logowanie</h1>


        <div class="form-floating">
          <input type="text" class="form-control" name="login" placeholder="Login">
          <label for="login">Wpisz login</label>
        </div>
        <div class="form-floating">
          <input type="password" class="form-control" name="password" placeholder="Hasło">
          <label for="password">Wpisz hasło</label>
        </div>

        <div class="form-check text-start my-3">
          <input class="form-check-input" type="checkbox" value="remember-me" id="flexCheckDefault">
          <label class="form-check-label" for="flexCheckDefault">
            Zapamiętaj mnie
          </label>
        </div>
          @if ($errors->any())
              <div class="alert alert-danger">
                  <ul>
                      @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                      @endforeach
                  </ul>
              </div>
          @endif

        <button class="btn btn-primary w-100 py-2" type="submit">Zaloguj</button>
        <p class="mt-5 mb-3 text-body-secondary text-center">&copy;2024 - Tomasz Siemek</p>
      </form>
    </main>
</div>

@if($errors->any())
    <script>
        swal.fire({
            title: "Wystąpił błąd",
            text:  "Nieprawidłowy login lub hasło",
            icon: "warning",
            button:true,
            button:"OK"
        });
    </script>
@endif


@endsection
