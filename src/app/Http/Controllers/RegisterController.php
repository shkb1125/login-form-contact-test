<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\AuthRequest;

use App\Actions\Fortify\CreateNewUser;

class RegisterController extends Controller
{
    // public function create()
    // {
    //     return view('auth/register');
    // }

    // ユーザー登録とログイン画面へ遷移
    public function store(AuthRequest $request, CreateNewUser $creator)
    {
        $user = $creator->create($request->all());

        // リダイレクトを行う
        return redirect()->route('login');
    }


    // なくてもいいけどフォームリクエスト適用させるために再調整予定
    // public function store(Request $request)
    // {
    //     $user = User::create([
    //         'name' => $request->name,
    //         'email' => $request->email,
    //         'password' => bcrypt($request->password),
    //     ]);
    //     return view('login', compact('user'));
        //  Auth::login($user);
        // return redirect(RouteServiceProvider::HOME);
    // }
}