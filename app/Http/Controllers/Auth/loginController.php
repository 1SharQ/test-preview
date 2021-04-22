<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class loginController extends Controller
{

    public function index(){
        return view('auth.login');
    }
    
    public function save(Request $request){
        $this->validate($request,[
            'email'=>['required','email'],
            'password'=>'required'
        ]);
        if(!auth()->attempt(['email' => $request->email, 'password' => $request->password],$request->remember)){
            return back()->with('status','Invalid login status');
        }
        return redirect()->route('posts');   



    }
    

}
