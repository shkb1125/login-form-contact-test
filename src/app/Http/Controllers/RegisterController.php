<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\AuthRequest;

class RegisterController extends Controller
{
    // public function create()
    // {
    //     return view('auth/register');
    // }

    // なくてもいいけどフォームリクエスト適用させるために再調整予定
    public function store(AuthRequest $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);
        return view('login', compact('user'));
        //  Auth::login($user);
        // return redirect(RouteServiceProvider::HOME);
    }
}
