@extends('layouts.master')

@section('title','Register Page')

@section('content')
    <div class="login_form">
        <form>
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
                    <a class="forgot" href="">Forgotten Password?</a>
                </div>
                <div class="field margin_0">
                    <label class="label_field hidden">hidden label</label>
                    <button class="main_bt">Sing In</button>
                </div>
            </fieldset>
        </form>
    </div>
@endsection
