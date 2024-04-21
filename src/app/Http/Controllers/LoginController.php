<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AuthRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Auth;

// いらない？最終確認後に削除予定
class LoginController extends Controller
{
    public function showLogin()
    {
        return view('auth/login');
    }
    // public function login(AuthRequest $request)
    // {
    //     if (Auth::attempt($request->only('email', 'password'))) {
    //         return redirect('/admin');
    //     }
    //     return redirect('/login')->with('error', 'ログインに失敗しました。');
    // }

    public function login(AuthRequest $request)
    {
        $request->validate($request->rules(), $request->messages());

        if (Auth::attempt($request->only('email', 'password'))) {
            return redirect('/admin');
        }
        return redirect('/login')->with('error', 'ログインに失敗しました。');


        // if (Auth::check()) {
        //     // 通常のホームページにリダイレクト
        //     return redirect('/admin');
        // }

        // // $credentials = $request->validated();

        // return redirect('/admin');


        // return redirect()->intended(RouteServiceProvider::HOME);
        // $request->authenticate();
        // $request->session()->regenerate();

        // return redirect()->intended(RouteServiceProvider::HOME);

        // $validation = $request->only(['email', 'password']);
        // return view('auth/login', compact('validation'));
    }
    
}