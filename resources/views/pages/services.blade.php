@extends('layouts_tutorial.app')

@section('content')


  <style>
      body {
        background-image: url('/storage/cover_images/beach.jpg');
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-size: 100% 100%;
            }
   </style>


      <h1 style="font-size:40px;" >{{$title}}</h1>
      <body>

        <!--
        <hr style="width:50%;text-align:left;margin-left:0">
        <hr style="height:2px;border-width:0;color:gray;background-color:black">
        <hr style="height:30px">
        -->

        <p style="font-size:30px;">Our new page offers various possibilities, such as registration and logging into the database, viewing posts and editing those related to each user. </p>

      </body>
