@extends('layouts_tutorial.app')

@section('content')

      <h1>{{$title}}</h1>
      <p style="font-size:30px;" >Our website is under development, we will keep you in touch</p>

      <style>
          body {
            background-image: url('/storage/cover_images/beach.jpg');
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: 100% 100%;
                }
       </style>


@endsection
