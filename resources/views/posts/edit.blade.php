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
        background-image: url('/storage/cover_images/beach.jpg');
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-size: 100% 100%;
            }
   </style>

  <h1>Edit Post</h1>
  {!! Form::open(['action' => ['App\Http\Controllers\PostsController@update',$post->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}

    <div class ="form-group">  <!-- FROM BOOTSTRAP -->
      {{Form::label('title' ,'Title')}}
      {{Form::text('title',$post->title,['class' => 'form-control', 'placeholder' => 'Title'])}}
    </div>

    <div class ="form-group">  <!-- FROM BOOTSTRAP -->
      <!--{{Form::label('body' ,'Body')}} -->
      {{Form::textarea('body',$post->body,['class' => 'form-control', 'placeholder' => 'Body'])}}


    </div>

    <div class ="form-group">
      {{Form::file('cover_image')}}
      <div>

    {{Form::hidden('_method', 'PUT')}}
    {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
  {!! Form::close() !!}

@endsection
