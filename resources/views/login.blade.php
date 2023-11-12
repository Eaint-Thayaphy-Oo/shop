@extends('layouts.master')

@section('title', 'Login Page')

@section('content')
    <div class="login_form">
        <form action="{{ route('login') }}" method="post">
            @csrf
            <fieldset>
                <div class="field">
                    <label class="label_field">Email Address</label>
                    <input type="email" name="email" placeholder="E-mail" />
                </div>
                <div class="field">
                    <label class="label_field">Password</label>
                    <input type="password" name="password" placeholder="Password" />
                </div>
                <div class="field">
                    <label class="label_field hidden">hidden label</label>
                    <label class="form-check-label"><input type="checkbox" class="form-check-input">
                        Remember Me</label>
                    <a class="forgot" href="{{ route('auth#registerPage') }}">Forgotten Password?</a>
                </div>
                <div class="field margin_0">
                    <label class="label_field hidden">hidden label</label>
                    <button type="submit" class="main_bt">Sing In</button>
                </div>
                <div class="field">
                    <a class="forgot" href="{{ route('auth#registerPage') }}">Sign Up</a>
                </div>
            </fieldset>
        </form>
    </div>
@endsection
