@extends('layouts.app')

@section('content')

<body>


  <div class="container">

  <style>
      body {
        background-image: url('/storage/cover_images/america.jpg');
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-size: 100% 100%;
            }

    .container {
    display: flex;
              }
     .center  {
     width: 800px;
              }

   </style>



    <div class="row justify-content-center">


                <a href="/" class ='btn btn-success' style="font-size:20px" >Go Back To The Welcome Page</a>
                &nbsp;&nbsp;<a style="font-size:20px">Or</a>&nbsp;&nbsp;
                <a href="/posts" class ='btn btn-success' style="font-size:20px" >Visit The Posts Page</a>

                <div class="card-header">{{ __('') }}</div>
                <br>

                <div class="card-body" style="font-size:25px" >
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('Now You are logged in!') }}

                    <p> If you didnt't check our services, Do it now !<p>

                    <h3  style="color:white;" ><u>Your Blog Posts</u></h3>


                    <div style="color:white;" class ="myDiv" >
                    <style>

                    a:link {
                      color:  red;
                      background-color: transparent;
                      text-decoration: none;
                    }
                    a:visited {
                      color: red;
                      background-color: transparent;
                      text-decoration: none;
                    }
                    a:hover {
                      color: white;
                      background-color: transparent;
                      text-decoration: underline;
                    }
                    a:active {
                      color: yellow;
                      background-color: transparent;
                      text-decoration: underline;
                    }


                    </style>


                    @if (count($posts) >0)
                    <table class ="table table-striped">
                      <tr>
                        <th></th>
                        <th></th>
                      </tr>
                      @foreach($posts as $post)
                      <tr>
                        <th>{{$post->title}}</th>
                        <div>
                        <th><a href="/posts/{{$post->id}}/edit" class="btn btn-default">&nbsp;&nbsp; Edit</a></th>
                      </div>
                        <th></th>
                      </tr>
                    @endforeach
                    </table>
                  @else
                    <p>You have no posts</p>
                  @endif
                </div>
                </div>
              </div>


</div>
</body>
@endsection
