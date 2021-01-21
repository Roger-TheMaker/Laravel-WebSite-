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

  <h1>Create Post</h1>
  {!! Form::open(['action' => 'App\Http\Controllers\PostsController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}

    <div class ="form-group">  <!-- FROM BOOTSTRAP -->

      {{Form::label('title' ,'Title')}}

      {{Form::text('title','',['class' => 'form-control', 'placeholder' => 'Title'])}}
    </div>


    <div class ="form-group">  <!-- FROM BOOTSTRAP -->
      {{Form::textarea('body','',['class' => 'form-control', 'placeholder' => 'Body'])}}
    </div>


    <div class ="form-group">
      {{Form::file('cover_image')}}
      <div>
    {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
  {!! Form::close() !!}


@endsection
