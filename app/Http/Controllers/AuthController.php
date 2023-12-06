<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    public function login_form()
    {


        return view('auth.login');


    }

  public  function login(LoginRequest $request )  {
        

    $data = $request->only('email', 'password');

    if (Auth::attempt($data)) {
        return redirect()->intended('dashborard');
    }

    // return $request->all();

    }


    
    public function logout()
    {
    	Auth::logout();

    	return redirect()->route('login');
    }
}
