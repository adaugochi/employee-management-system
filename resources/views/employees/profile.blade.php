@extends('layouts.app')
@section('link')
    <link rel="stylesheet" href="/plugins/css/intlTelInput.css">
@endsection
@section('title', 'My Profile')
@section('header-breadcrumb')
    <li><a href="{{ route('employee.home') }}">Dashboard</a></li>
    <li class="active">Profile</li>
@endsection()
@section('content')
    <section class="bg-white py-5">
        <div class="container">
            <form action="{{ route('update.profile') }}" method="post" id="profileForm">
                @csrf
                <div class="row">
                    <div class="col-lg-6 col-md-12 col-12">
                        <div class="checkbox-form">
                            <h3>Employee Information</h3>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Email Address <span class="required">*</span></label>
                                    <div class="form-input">
                                        <input type="text" value="{{ $user->email }}" disabled name="email"/>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label>Phone Number <span class="required">*</span></label>
                                    <div class="form-input">
                                        <input type="text" disabled value="{{ $user->international_number }}"
                                               class="phone-number" name="phone_number"/>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label>Title <span class="required">*</span></label>
                                    <div class="form-input">
                                        <select name="title">
                                            <option value>Select title *</option>
                                            @foreach(\App\Models\Employee::TITLES as $key => $title)
                                                <option value="{{ $key }}"
                                                    {{ $user->title == $key ? 'selected="selected"' : old('title') }}>
                                                    {{ $title }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label>First Name <span class="required">*</span></label>
                                    <div class="form-input">
                                        <input type="text" value="{{ $user->first_name }}" name="first_name"/>
                                        @include('partials.error', ['fieldName' => 'first_name'])
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label>Last Name <span class="required">*</span></label>
                                    <div class="form-input">
                                        <input type="text" value="{{ $user->last_name }}" name="last_name"/>
                                        @include('partials.error', ['fieldName' => 'last_name'])
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label>Middle Name <span class="required">*</span></label>
                                    <div class="form-input">
                                        <input type="text" value="{{ $user->middle_name }}" name="middle_name"/>
                                        @include('partials.error', ['fieldName' => 'middle_name'])
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label>Job Title <span class="required">*</span></label>
                                    <div class="form-input">
                                        <input type="text" value="{{ $employee->job_title }}" name="job_title" disabled/>
                                        @include('partials.error', ['fieldName' => 'job_title'])
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label>Monthly Salary <span class="required">*</span></label>
                                    <div class="form-input">
                                        <input type="text" value="{{ number_format($employee->salary, 2) }}" disabled name="salary"/>
                                        @include('partials.error', ['fieldName' => 'salary'])
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-12">
                        <div class="checkbox-form">
                            <h3>Address Information</h3>
                            <div class="row">
                                <div class="col-md-12">
                                    <label>Street Address <span class="required">*</span></label>
                                    <div class="form-input">
                                        <input type="text" value="{{$employee->street_address}}" name="street_address"/>
                                        @include('partials.error', ['fieldName' => 'street_address'])
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label>Town / City <span class="required">*</span></label>
                                    <div class="form-input">
                                        <input type="text" value="{{$employee->city}}" name="city"/>
                                        @include('partials.error', ['fieldName' => 'city'])
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label>Postcode / Zip Code</label>
                                    <div class="form-input">
                                        <input type="text" value="{{ $employee->zip_code }}" name="zip_code"/>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label>Country <span class="required">*</span></label>
                                    <div class="form-input">
                                        <select class="select" name="country" id="country">
                                        </select>
                                        @include('partials.error', ['fieldName' => 'country'])
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label>State <span class="required">*</span></label>
                                    <div class="form-input">
                                        <select class="select" name="state" id="state">
                                        </select>
                                        @include('partials.error', ['fieldName' => 'state'])
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt-4 text-right">
                    <button type="submit" class="btn btn--lg btn--primary">update</button>
                </div>
            </form>
        </div>
    </section>
@endsection
@section('script')
    <script src="/js/countries.js"></script>
    <script>
        populateCountries("country", "state");

        let country = "{{ old('country') ? old('country') : $employee->country}}";
        if (country !== '') {
            let state = "{{ old('state') ? old('state') : $employee->state}}";
            $('#country').val(country);
            $('#country').trigger('onchange');
            $('#state').val(state);
        }
    </script>
    <script src="{{ asset('plugins/js/intlTelInput-jquery.min.js') }}"></script>
    <script src="{{ asset('js/intltel.js') }}"></script>
@endsection
