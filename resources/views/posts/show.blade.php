@extends ('layouts_tutorial.app')

@section('content')


  <script src="https://cdn.tiny.cloud/1/irk3apmtkdi7y77htseokb9ou3kta1u84asvrjmkc2ira8tj/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

  <script>
    tinymce.init({
      selector: 'textarea'
    });

  </script>
  
  <style>
      body {
        background-image: url('/storage/cover_images/america.jpg');
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-size: 100% 100%;
            }
   </style>


<body style="background-color: white">
<!-- above-->
  <a href="/posts" class ="btn-default">Go Back</a>
  <br>
  <br>

  <div class ="row">
    <div class ="col-md-12">
      <img  width="600" height="400" src="/storage/cover_images/{{$post->cover_image}}" alt="">
    </div>
  </div>


  <h1>{{$post->title}}</h1>
  <p>{{$post->body}}</p>
  <hr style="height:2px;border-width:0;color:gray;background-color:black">
  <small>Written on {{$post->created_at}}</small>
  <hr style="height:2px;border-width:0;color:gray;background-color:black">

  @if(!Auth::guest()) <!-- WE ARE LIMITING THE ACCES TO THESE BUTTONS -->
  @if(Auth::user()->id == $post->user_id)
    <a style="font-size:200%;"  href="/posts/{{$post->id}}/edit" class ="btn btn-default">Edit</a>

    {!!Form::open(['action' => ['App\Http\Controllers\PostsController@destroy',$post->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
    {{Form::hidden('_method', 'DELETE')}}
    {{Form::submit('Delete', ['class ' => 'btn btn-danger'])}}
    {!!Form::close()!!}
  @endif
@endif
@endsection
