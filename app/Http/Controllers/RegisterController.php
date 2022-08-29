<?php

namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    //
    public function save(Request $request){
        if(Auth::check()){
            return redirect(route('home'));
        }
        $validateFields = $request->validate([
           'email' => 'required',
           'password' => 'required'
        ]);

        if(User::where('email',$validateFields['email'])->exists()){
            return redirect(route('registration'))->withErrors([
                'formError' => 'Такой пользователь уже существует'
            ]);
        }

        $user = User::create($validateFields);
        if($user){
            Auth::login($user);
            return redirect()->to(route('home'));
        }
        return redirect(route('registration'))->withErrors([
           'formError' => 'Произошла ошибка при сохранении пользователя'
        ]);

    }
}
