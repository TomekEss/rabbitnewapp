<!doctype html>
<html lang="en" data-bs-theme="auto">
  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Tomasz Siemek">
    <title>Rabbit  Management v.1.0.0</title>

      <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
      <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
      <link href="{{ asset('fontawesome-free-6.5.1-web/css/all.min.css') }}" rel="stylesheet">
      <script src="{{ asset('vendor/sweetalert/sweetalert.all.js') }}"></script>


    <!-- Custom styles for this template -->
    <link href="{{ asset('css/sign-in.css') }}" rel="stylesheet">
      <x-livewire-alert::scripts />

  </head>

  <header>
      {{View::make('layouts.header')}}
  </header>

  <body>

  <div class="starter" style="padding-bottom: 80px;"></div>
    @yield('content')
    @include('sweetalert::alert')
  </body>


  {{View::make('layouts.footer')}}


  <script src="{{ asset('js/bootstrap.js') }}"></script>
  <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>


</html>
