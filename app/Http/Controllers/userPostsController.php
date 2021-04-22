<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class userPostsController extends Controller
{
    public function getPosts(User $user){

        $posts = $user->posts()->with(['user','like'])->paginate(12);
        return view('user',[
            'user' => $user,
            'posts' => $posts
        ]);
    }
}
