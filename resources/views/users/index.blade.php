@extends ('layouts_tutorial.app')

@section('content')
  <style>
      body {
        background-image: url('/storage/cover_images/beach.jpg');
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-size: 100% 100%;
            }
   </style>

  <a href="{{ url('/') }}" class="text-sm text-gray-700 underline">Go Back Home</a>

  <h1>Users</h1>

  @if(count($users) > 0)
    @foreach($users as $user)

      <p style="font-size:200%;"> {{$user->name}} </p>
      {!!Form::open(['action' => ['App\Http\Controllers\UsersController@destroy',$user->id], 'method' => 'USER', 'class' => 'pull-right'])!!}
      {{Form::hidden('_method', 'DELETE')}}
      {{Form::submit('Delete', ['class ' => 'btn btn-danger'])}}
      {!!Form::close()!!}



    @endforeach
   @else
  @endif
@endsection
