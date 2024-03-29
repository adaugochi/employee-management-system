@extends('layouts.auth')
@section('route', $formActionURL)
@section('header', $title)
@section('content')
    <input type="hidden" value="{{ $token }}" name="token">
    <div class="row">
        <x-input name="email" placeholder="Your Email *" value="{{ $email }}" readonly></x-input>
        <x-input name="password" type="password" placeholder="Your Password *" id="password"></x-input>
        <x-input name="password_confirmation" type="password" placeholder="Your Confirm password *"></x-input>

        <div class="col-12">
            <button class="btn btn--gradient btn-block" type="submit">{{ $title }}</button>
            <div class="mt-5 text-center fs-14">
                Not interested?
                <a href="{{ url('login') }}" class="text-primary font-weight-bold"> Sign In</a>
            </div>
        </div>
    </div>
@endsection
