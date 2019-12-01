<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;

class RegisterFormController extends Controller
{
    public function showForm()
    {
        return view('frontend.auth.registration');
    }


    public function store(Request $request)
    {
        /*$this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:5',
            'photo' => 'nullable|image',
        ]);*/

        $validate = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:5',
            'photo' => 'nullable|image',
        ]);

        if ($validate->fails())
        {
            return redirect()->back()->withErrors($validate)->withInput();
        }


        $photo = $request->file('photo');

        $setFileName = uniqid('photo_',true). '-' . rand().'.'. $photo->getClientOriginalExtension();

        if ($photo->isValid())
        {
            $photo->storeAs('images',$setFileName);
        }


        session()->flash('success', 'Register Successfull');

        return redirect()->back();


    }

}
