<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RegisterFormController extends Controller
{
    public function showForm()
    {
        return view('frontend.auth.registration');
    }



}
