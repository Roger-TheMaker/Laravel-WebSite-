<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
<!-- AICI SE ADAUGA STILURILE -->

</head>

<body>

  <style>
      body {
        background-image: url('/storage/cover_images/beach.jpg');
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-size: 100% 100%;
            }
   </style>

  <!-- TOT CE ESTE AICI FACE EXACT CE SE INTAMPLA SI IN PAGINA DE HOME , INSA FARA LINKURI-->

    <div id="app">

          <div class ="container">
            @include('inc.messages')
            <main class="py-4"> <!--ESTE NEVOIE DE PUTINA INDENTARE -->
                  @yield('content')
            </main>
          </div>
    </div>
</body>
</html>
