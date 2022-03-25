@extends('layouts.auth')
@section('route', route('login'))
@section('header', 'Login')
@section('content')
    <div class="row">
        <x-input name="email" placeholder="Your Email *"></x-input>
        <x-input name="password" type="password" placeholder="Your Password *"></x-input>

        <div class="col-12">
            <button class="btn btn--gradient btn-block" type="submit">Sign In</button>
            <div class="mt-5 text-center fs-14">
                Forgot your password?
                <a href="{{ route('password.request') }}" class="text-primary font-weight-bold"> Click here</a>
            </div>
        </div>
    </div>
@endsection
