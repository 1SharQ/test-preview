<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class postLikeController extends Controller
{
    
    public function __construct()
    {
        $this->middleware(['auth']);
    }
    public function like(Request $request,Post $post){
        
        $post->like()->create([
            'user_id'=>$request->user()->id,
        ]);
        return back();
    }

    public function destroy(Request $request,Post $post){
        $request->user()->like()->where('post_id',$post->id)->delete();
        return back();
    }


}
