<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AuthRequest;
use App\Actions\Fortify\CreateNewUser;

class RegisterController extends Controller
{
    public function store(AuthRequest $request, CreateNewUser $creator)
    {
        $user = $creator->create($request->all());
        // ログイン画面へ遷移
        return redirect()->route('login');
    }
}
