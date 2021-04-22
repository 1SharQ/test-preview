<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class logoutController extends Controller
{
    public function save (){
        auth()->logout();
        return redirect()->route('home');

    }

}
