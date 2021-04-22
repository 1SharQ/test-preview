<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class registerController extends Controller
{
    public function __construct()
    {
        $this->middleware(['guest']);  
    }

    public function index() {
        return view('auth.register');
    }

    public function save(Request $request) {

        $this->validate($request,[
            'name'=>['required','max:255'],
            'email'=>['required','email','max:255'],
            'username'=>['required','max:255'],
            'password'=>['required','confirmed']
        ]);

        User::create([
            'name'=> $request->name,
            'username'=> $request->username,
            'email'=> $request->email,
            'password'=> Hash::make($request->password),

        ]);     
        
        auth()->attempt(['email' => $request->email, 'password' => $request->password]);    
        return redirect()->route('posts');

    }

}
