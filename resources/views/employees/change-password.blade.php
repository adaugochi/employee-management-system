@extends('layouts.app')
@section('title', 'My Profile')
@section('header-breadcrumb')
    <li><a href="{{ route('employee.home') }}">Dashboard</a></li>
    <li class="active">Password</li>
@endsection()
@section('content')
    <section class="bg-white py-5">
        <div class="container">
            <form action="{{ route('change-password') }}" method="post" id="passwordForm">
                @csrf
                <div class="row">
                    <div class="col-lg-6 col-md-12 col-12">
                        <div class="checkbox-form">
                            <h3>Change Password</h3>
                            <div class="row">
                                <div class="col-md-12">
                                    <label>Old Password <span class="required">*</span></label>
                                    <div class="form-input">
                                        <input type="password" name="old_password"/>
                                        @include('partials.error', ['fieldName' => 'old_password'])
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <label>New Password <span class="required">*</span></label>
                                    <div class="form-input">
                                        <input type="password" name="password"/>
                                        @include('partials.error', ['fieldName' => 'password'])
                                    </div>
                                </div>

                                <div class="col-12 mt-4 text-right">
                                    <button type="submit" class="btn btn--lg btn--primary">change password</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
@endsection
