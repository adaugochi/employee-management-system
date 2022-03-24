@extends('layouts.auth')
@section('header', 'Forgot Password')
@section('route', route('password.forget'))
@section('content')
    <div class="row">
        <x-input name="email" placeholder="Your Email address *" value="{{ old('email') }}"></x-input>
        <div class="col-12">
            <button class="btn btn--gradient btn-block" type="submit">
                Send reset link
            </button>
        </div>
        <div class="col-12">
            <div class="mt-5 text-center fs-14">
                Not interested?
                <a href="{{ url('login') }}" class="text-primary font-weight-bold">Sign In</a>
            </div>
        </div>
    </div>
@endsection
