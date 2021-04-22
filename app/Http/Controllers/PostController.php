<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth'])->only(['save','destroy']);
    }

    public function index(){

        $posts= Post::latest()->with(['user','like'])->paginate(15);
        return view('posts',['posts'=>$posts]);

    }

    public function save(Request $request){
       
        $this->validate($request,[
            'body'=>'required'
        ]);

        $request->user()->posts()->create($request->only('body'));
        return back();
    }

    public function show(Post $post){
        return view('showPost',[
            'post'=>$post
        ]);
    }

    public function destroy(Post $post){

        $this->authorize('delete',$post);
        $post->delete();
        return back();
    }
}
