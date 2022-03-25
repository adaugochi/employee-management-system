@extends('layouts.admin')
@section('link')
    <link rel="stylesheet" href="/plugins/css/intlTelInput.css">
@endsection
@section('content-title', 'Add new Employee')
@section('content')
    <div class="nk-block">
        <div class="card card-bordered card-preview">
            <div class="card-inner">
                <div class="contact-from-wrapper section-space--mt_30">
                    <form action="{{ route('admin.employee.save') }}" method="post" id="employeeForm"
                          enctype="multipart/form-data">
                        @csrf
                        <div class="contact-page-form">
                            <div class="row">
                                <input type="hidden" value="{{ $user ? $user->id : ''}}" name="id">
                                <div class="col-md-6">
                                    <div class="form-input">
                                        <select name="title">
                                            <option value>Select title *</option>
                                            @foreach(\App\Models\Employee::TITLES as $key => $title)
                                                <option value="{{ $key }}"
                                                    {{ $user ? ($user->title == $key ? 'selected="selected"' : '')
                                                        : old('title') }}>
                                                    {{ $title }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <x-input name="first_name"
                                         placeholder="First Name *"
                                         value="{{ $user ? $user->first_name : old('first_name') }}"
                                         column="col-md-6"/>
                                <x-input name="last_name"
                                         placeholder="Last Name *"
                                         value="{{ $user ? $user->last_name : old('last_name') }}"
                                         column="col-md-6"/>
                                <x-input name="middle_name"
                                         placeholder="Middle Name"
                                         value="{{ $user ? $user->middle_name : old('middle_name') }}"
                                         column="col-md-6"/>
                                <x-input name="phone_number"
                                         placeholder="Your Phone number *"
                                         value="{{ $user ? $user->international_number : old('phone_number') }}"
                                         class="phone-number"
                                         fieldName="international_number"/>
                                <x-input name="email"
                                         placeholder="Email address *"
                                         column="col-md-6 pl-2"
                                         value="{{ $user ? $user->email : old('email') }}"/>
                                <x-input name="job_title"
                                         placeholder="Job Title *"
                                         value="{{ $user ? $user->job_title : old('job_title') }}"
                                         column="col-md-6 pl-2"/>
                                <x-input name="salary"
                                         placeholder="Monthly Salary *"
                                         type="number"
                                         value="{{ $user ? $user->salary : old('salary') }}"
                                         column="col-md-6 pl-2"/>
                                <label class="col-md-2 text-gray">Start Date *</label>
                                <x-input name="start_date"
                                         placeholder="Start Date *"
                                         type="date"
                                         value="{{ $user ? $user->start_date : old('start_date') }}"
                                         column="col-md-4"/>
                            </div>

                            <div class="comment-submit-btn">
                                <button class="btn btn-primary btn-block" type="submit">
                                    Submit
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{ asset('plugins/js/intlTelInput-jquery.min.js') }}"></script>
    <script src="{{ asset('js/intltel.js') }}"></script>
    <script src="{{ asset('js/validation.js') }}"></script>
@endsection
