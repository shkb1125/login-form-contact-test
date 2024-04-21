{{-- 
□ レイアウト：css
□ link先への遷移
 --}}

@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/register.css') }}">
@endsection

@section('link')
    <div class="login__link">
        <button class="login__button-submit" type="submit" onclick="location.href='http://localhost/login'">login</button>
        {{-- <a class="login__button-submit" href="/login" type="submit">login</a> --}}
    </div>
@endsection


@section('content')
    <div class="register__content">
        <div class="register-form__heading">
            <h2>Register</h2>
        </div>
        <form class="form" action="/register" method="POST">
            @csrf
            <div class="form__group">
                <div class="form__group-title">
                    <span class="form__label--item">お名前</span>
                </div>
                <div class="form__group-content">
                    <div class="form__input--text">
                        <input type="text" name="name" value="{{ old('name') }}" />
                    </div>
                    <div class="form__error">
                        @error('name')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
            </div>
            <div class="form__group">
                <div class="form__group-title">
                    <span class="form__label--item">メールアドレス</span>
                </div>
                <div class="form__group-content">
                    <div class="form__input--text">
                        <input type="email" name="email" value="{{ old('email') }}" />
                    </div>
                    {{-- @if ($error->any()) --}}
                    <div class="form__error">
                        {{-- @foreach ($errors as $error)
                                {{ $error }}
                            @endforeach --}}
                        @error('email')
                            {{ $message }}
                        @enderror
                    </div>
                    {{-- @endif --}}
                </div>
            </div>
            <div class="form__group">
                <div class="form__group-title">
                    <span class="form__label--item">パスワード</span>
                </div>
                <div class="form__group-content">
                    <div class="form__input--text">
                        <input type="password" name="password" />
                        {{-- <input type="hidden" name="password_confirmation" /> --}}
                    </div>
                    <div class="form__error">
                        @error('password')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
            </div>
            <div class="form__button">
                <button class="form__button-submit" type="submit">登録</button>
            </div>
        </form>

    </div>
@endsection
