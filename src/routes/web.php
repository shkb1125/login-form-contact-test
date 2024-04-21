<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;

// 問い合わせフォーム入力ページ
Route::get('/', [ContactController::class, 'index']);

// 問い合わせフォーム確認ページ
Route::post('/confirm', [ContactController::class, 'confirm']);

// 問い合わせフォーム登録→サンクスページの表示
Route::post('/thanks', [ContactController::class, 'store']);

// 管理画面
Route::get('/admin', [AdminController::class, 'index']);
Route::post('/admin', [AdminController::class, 'search']);

// Route::post('/register', [AuthController::class, 'store']);