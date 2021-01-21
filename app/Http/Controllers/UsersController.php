<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\User;
use App\Models\Post;
use DB;

class UsersController extends Controller
{
    //this is to control the non logged users
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function __construct()
    {
        //$this->middleware('auth', ['except' => ['index','show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index()
    {
        //$posts=Post::all();
        //$posts=Post::orderBy('title','asc')->get();

        $users=DB::select('SELECT * FROM users where id != 10');


        return view('users.index')->with('users',$users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      //  return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


     /*
    public function store(Request $request)
    {
        $this->validate($request, [
          'title' => 'required' ,
          'body' => 'required',
          //'cover_image' => 'image|nullable|max:1999'
        ]);

        //handle the file upload
        if($request->hasFile('cover_image')){
            //get filename with extension
            $filenameWithExt = $request -> file('cover_image')->getClientOriginalName();
            //get just filename
            $filename = pathInfo($filenameWithExt, PATHINFO_FILENAME);
            //GET THE extension
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            //Am avut nevoie de imagine(de text cu extensie), text si extensie
            //filename to store
            $fileNameToStore = $filename . '_' . time() . '.' . $extension;
            //to avoid the same image twice
            //UPLOAD THE IMAGE
            $path=$request ->file('cover_image')->storeAs('public/cover_images',$fileNameToStore);
        }else{
          $fileNameToStore ='noimage.jpg'; #default image
        }

       $post=new Post;
       $post->title=$request->input('title');
       $post->body =$request->input('body');
       $post->user_id=auth()->user()->id;
       $post->cover_image=$fileNameToStore;
       $post->save();

       return redirect('/posts') -> with('succes', 'Post created.');
    }

      */


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function show($id)
    {
        $user = User::find($id);
        return view('users.show')->with('user',$user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

     /*
    public function edit($id)
    {
      $post = Post::find($id);

      if(auth()->user()->id !== $post->user_id){
        return redirect ('/posts')->with('error', 'Unauthorized page!');
      }
      return view('posts.edit')->with('post',$post);
    }

    */
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

     /*
    public function update(Request $request, $id)
    {
      $this->validate($request, [
        'title' => 'required' ,
        'body' => 'required',
        'cover_image' => 'image|nullable|max:1999'
      ]);

      //handle the file upload
      if($request->hasFile('cover_image')){
          //get filename with extension
          $filenameWithExt = $request -> file('cover_image')->getClientOriginalName();
          //get just filename
          $filename = pathInfo($filenameWithExt, PATHINFO_FILENAME);
          //GET THE extension
          $extension = $request->file('cover_image')->getClientOriginalExtension();
          //Am avut nevoie de imagine(de text cu extensie), text si extensie
          //filename to store
          $fileNameToStore = $filename . '_' . time() . '.' . $extension;
          //to avoid the same image twice
          //UPLOAD THE IMAGE
          $path=$request ->file('cover_image')->storeAs('public/cover_images',$fileNameToStore);
      }


     $post=Post::find($id);
     $post->title=$request->input('title');
     $post->body =$request->input('body');
     if($request -> hasFile('cover_image')){
       $post->cover_image=$fileNameToStore;
     }
     $post->save();

     return redirect('/posts') -> with('succes', 'Post updated.');
    }


     */

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    public function destroy($id)
    {   //FUNCTIA STERGE USERUL SI TOATE POSTARILE ASOCIATE
       // POATE APELAM SI FUNCTIILE UNA PE ALTA

        $user=User::find($id);
        $posts=Post::where('user_id', $user->id)->pluck('id');
        Post::where('user_id',$user->id)->delete();

        $user->delete();


        return redirect('/users')->with ('success', 'User removed');
    }

}
