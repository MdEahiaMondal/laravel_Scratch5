<?php

namespace App\Http\Controllers\Frontend;


use App\Mail\UserVerifyEmail;
use App\Notifications\notifyAdmin;
use App\Notifications\VerifyUserEmail;
use App\User;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
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


        /** @noinspection PhpDeprecationInspection */
        $data = [
            'name' => $request->input('name'),
            'email' => strtolower($request->input('email')),
            'phone' => $request->input('phone'),
            'password' => bcrypt($request->input('password')),
            'avatar' => $setImageName,
            'email_verification_token' => str_random(32),
        ];

        try
        {
            $user = User::create($data);

//            Mail::to($user->email)->queue(new UserVerifyEmail($user));
            $user->notify(new VerifyUserEmail($user));


            $admin = User::find(176);
            if ($admin->id === 176)
            {
                $admin->notify(new  notifyAdmin($user));
            }



            $this->setSuccessMessage('Registration Successfull !');

            return redirect()->route('login');
        }catch (Exception $exception)
        {
            $this->setErrorMessage($exception->getMessage());
            return redirect()->back();
        }


    }


    public function verifyUser($token)
    {
        if ($token === null)
        {
            $this->setErrorMessage('invalide Token');
            auth()->logout();
            return redirect()->route('login');
        }

        $user = User::where('email_verification_token', $token)->first();

        if ($user === null)
        {
            $this->setErrorMessage('invalide Token');
                auth()->logout();
            return redirect()->route('login');
        }


        $user->update([
            'email_verification_token' => '',
            'email_verified' => 1,
            'email_verified_at' => Carbon::now()
        ]);

        $this->setSuccessMessage('Your Account Actived, you can now login');
        return redirect()->route('login');
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
           $user = auth()->user();

           if ($user->email_verified === 0)
           {
               $this->setErrorMessage('Your Acount Not Active please Verify your email');
               auth()->logout();
               return redirect()->route('login');
           }

           $this->setSuccessMessage('your are now login');
            return redirect()->route('dashboard');
       }

       $this->setErrorMessage('Invalide Credentials');

       return redirect()->back();


    }



    public function logout()
    {
        auth()->logout();

        $this->setSuccessMessage('Your are now logout');
        return redirect()->route('login');
    }





}
