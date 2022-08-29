<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //
    public function login(Request $request){
        if(Auth::check()){
            return redirect(route('home'));
        }

        $formFields = $request->only(['email','password']);

        if(Auth::attempt($formFields)){
            return redirect(route('home'));
        }

        return redirect(route('home'))->withErrors([
           'email' => 'Не удалось авторизоваться'
        ]);
    }
}
