<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class LoginController extends Controller
{
    public function index(Request $request){


        if ($request->isMethod('post'))
        {


            $credentials = $request->validate([
                'email' => ['required', 'email'],
                'password' => ['required'],
            ]);

            if (Auth::attempt($credentials)) {
                $request->session()->regenerate();

                return redirect()->intended('Linkolustur');
            }

            return back()->with('error', 'Giriş Bilgileri Hatalı');




        }

        return view('index');
    }

    public function logout(Request $request){
        Auth::logout();
        return redirect()->intended('login');

    }
}
