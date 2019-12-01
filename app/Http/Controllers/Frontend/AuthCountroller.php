<?php

namespace App\Http\Controllers\Frontend;

use App\User;
use Exception;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;

class AuthCountroller extends Controller
{
    public function showRegisterForm()
    {
       return view('frontend.auth.registration');
    }


    public function processRegister(Request $request)
    {


        $request->except('_token'); // we will need without this token

        $validator = Validator::make($request->all(), [
            'name' => 'required|max:40',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required|unique:users,phone',
            'password' => 'required|max:20|min:5|confirmed',
            'avatar' => 'nullable|mimes:jpeg,jpg,png'
        ]);

        if ($validator->fails())
        {
            return redirect()->back()->withErrors($validator)->withInput();
        }


        $image = $request->file('avatar');

        if ($image)
        {
            $setImageName = uniqid() . '-' .rand().'.'.$image->getClientOriginalExtension();
            $image->storeAs('avatars',$setImageName);
        }else{
            $setImageName = 'default.png';
        }


        $data = [
            'name' => $request->input('name'),
            'email' => strtolower($request->input('email')),
            'phone' => $request->input('phone'),
            'password' => bcrypt($request->input('password')),
            'avatar' => $setImageName,
        ];

        try
        {
            User::create($data);

            session()->flash('message', 'Registration Successfull !');
            session()->flash('type', 'success');

            return redirect()->route('login');
        }catch (Exception $exception)
        {
            session()->flash('message', $exception->getMessage());
            session()->flash('type', 'danger');
            return redirect()->back();
        }


    }


    public function showLoginForm()
    {
        return view('frontend.auth.login');
    }


    public function loginCheck(Request $request)
    {
       $credentials = $request->only(['email', 'password']);

       $this->validate($request, [
           'email' => 'required',
           'password' => 'required',
       ]);

       if (auth()->attempt($credentials))
       {
           session()->flash('message', 'your are now login !');
           session()->flash('type', 'success');
            return redirect()->route('home');
       }

       session()->flash('message', 'Invalid Credentials !');
       session()->flash('type', 'danger');

       return redirect()->back();


    }



    public function logout()
    {
        auth()->logout();

        return redirect()->route('login');
    }





}
