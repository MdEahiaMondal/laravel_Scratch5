<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AuthCountroller extends Controller
{
    public function showRegisterForm()
    {
       return view('frontend.auth.registration');
    }


    public function registerStore(Request $request)
    {
        dd($request->all());
    }
}
