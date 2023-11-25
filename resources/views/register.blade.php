@extends('layouts.master')

@section('title', 'Register Page')

@section('content')
    <div class="login_form">
        <form action="{{ route('register') }}" method="post">
            @csrf
            @error('terms')
                <small class="text-danger">{{ $message }}</small>
            @enderror
            <fieldset>
                <div class="field">
                    <label class="label_field">Your Name</label>
                    <input type="text" name="name" placeholder="Name" />
                    @error('name')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="field">
                    <label class="label_field">Email Address</label>
                    <input type="email" name="email" placeholder="E-mail" />
                    @error('email')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="field">
                    <label class="label_field">Phone Number</label>
                    <input type="number" name="phone" placeholder="09xxxxxxxxx" />
                    @error('phone')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="field">
                    <label class="label_field">Gender</label>
                    <select name="gender" class="">
                        <option value="">Choose gender...</option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                    </select>
                    @error('gender')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="field">
                    <label class="label_field">Address</label>
                    <input type="text" name="address" placeholder="Address" />
                    @error('address')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="field">
                    <label class="label_field">Password</label>
                    <input type="password" name="password" placeholder="Password" />
                    @error('password')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="field">
                    <label class="label_field">Confirm Password</label>
                    <input type="password" name="password_confirmation" placeholder="Confirm Password" />
                    @error('password_confirmation')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="field margin_0">
                    <label class="label_field hidden">hidden label</label>
                    <button type="submit" class="main_bt">Register</button>
                </div>
                <div class="field">
                    <a class="forgot" href="{{ route('auth#loginPage') }}">Sign In</a>
                </div>
            </fieldset>
        </form>
    </div>
@endsection
