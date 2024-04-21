<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthRequest;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    // なくてもいいけどフォームリクエスト適用のため再調整予定
    public function register(AuthRequest $request)
    {
        $content = $request->only(['name', 'email', 'password']);
        return view('register', compact('content'));
    }
}
