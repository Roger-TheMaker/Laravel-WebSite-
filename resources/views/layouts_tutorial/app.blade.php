<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{config('app.name','Project')}}</title>

    </head>
    <body>
      @include('inc.messages')
      @yield('content')
    <!--  <p>Gank Mid</p> -->
    </body>
    </html>
