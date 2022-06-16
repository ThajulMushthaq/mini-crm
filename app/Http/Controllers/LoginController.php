<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    //


    public function __construct()
    {
    }

    public function login()
    {
        return view('login.login');
    }

    public function validate_login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:4',
        ]);
        $credentials = [
            'email' => $request->get('email'),
            'password' => $request->get('password')
        ];
        // dd($credentials);

        if (!Auth::validate($credentials)) :
            return redirect()->to('/')->with("error", "Wrong credentials..!");
        endif;

        $user = Auth::getProvider()->retrieveByCredentials($credentials);
        Auth::login($user);

        return $this->authenticated($request, $user);
    }

    protected function authenticated(Request $request, $user)
    {
        return redirect()->intended();
    }



    public function do_logout()
    {
        Session::flush();

        Auth::logout();

        return redirect('/');
    }
}
