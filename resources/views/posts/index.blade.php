@extends ('layouts_tutorial.app')

@section('content')


  <style>

      body {
        background-image: url('/storage/cover_images/america.jpg');
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-size: 100% 100%;
            }

        .myDiv {

        border: 5px outset black;

               }

  </style>

  <!--
    .myDiv {
    border: 5px outset black;
    background-color: white;
    text-align: center;

    h1 {text-align: center;}
           }
   -->

  <a href="{{ url('/') }}" class="text-sm text-gray-700 underline">Go Back Home</a>

  <h1>Posts</h1>

  <body style="background-color:  white">


  @if(count($posts) > 0)
    @foreach($posts as $post)

      <div class ="myDiv" >

      <style>

      a:link {
        color: black;
        background-color: transparent;
        text-decoration: none;
      }
      a:visited {
        color: black;
        background-color: transparent;
        text-decoration: none;
      }
      a:hover {
        color: red;
        background-color: transparent;
        text-decoration: underline;
      }
      a:active {
        color: yellow;
        background-color: transparent;
        text-decoration: underline;
      }
      </style>


      <h3 style="font-size:200%;" > <a href = "/posts/{{$post->id}}"> {{$post->title}} </h3>
      <h4> Written on {{$post->created_at}}</h4>


      <img style="width:30%" src="/storage/cover_images/{{$post->cover_image}}" alt="">
            <!--   <img style="float:left;width:140px;" src="/storage/cover_images/{{$post->cover_image}}" alt=""> -->
      <br>

      @if(!Auth::guest()) <!-- WE ARE LIMITING THE ACCES TO THESE BUTTONS -->
      @if(Auth::user()->id == $post->user_id || Auth::user()->id==10)
      <a style="font-size:200%;"  href="/posts/{{$post->id}}/edit" class ="btn btn-default">Edit</a>

     {!!Form::open(['action' => ['App\Http\Controllers\PostsController@destroy',$post->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
     {{Form::hidden('_method', 'DELETE')}}
     {{Form::submit('Delete', ['class ' => 'btn btn-danger'])}}
     {!!Form::close()!!}
     @endif
     @endif

    </div>

    @endforeach
   @else
  @endif
@endsection
