@extends('layouts.admin')
@section('content-title', 'Single/Bulk Payment')
@section('content-side')
    <a href="javascript:void(0);" class="btn btn--primary btn--sm" id="add-more">
        add more
    </a>
@endsection
@section('content')
    <div class="nk-block">
        <div class="card card-bordered card-preview">
            <div class="card-inner">
                <div class="contact-from-wrapper section-space--mt_30">
                    <form action="{{ route('admin.payroll.save') }}" method="post" id="payForm">
                        @csrf
                        <div class="contact-page-form">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-input">
                                        <select name="employee_id[]">
                                            <option value>Select employee *</option>
                                            @foreach($employees as $employee)
                                                <option value="{{ $employee->id }}">
                                                    {{ $employee->user->name }} ({{ $employee->user->email }})
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <x-input name="amount_paid[]"
                                         placeholder="Amount to Pay *"
                                         type="number"
                                         value="{{ old('amount_paid') }}"
                                         column="col-md-6 pl-2"/>
                            </div>

                            <div id="parentRoll"></div>

                            <template id="payment-template">
                                <div class="row payment-template-wrapper">
                                    <div class="col-md-5">
                                        <div class="form-input">
                                            <select name="employee_id[]">
                                                <option value>Select employee *</option>
                                                @foreach($employees as $employee)
                                                    <option value="{{ $employee->id }}">
                                                        {{ $employee->user->name }} ({{ $employee->user->email }})
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <x-input name="amount_paid[]"
                                             placeholder="Amount to Pay *"
                                             type="number"
                                             value="{{ old('amount_paid') }}"
                                             column="col-md-5"/>
                                    <div class="col-md-2">
                                        <button type="button" class="close fs-26px payment-close"
                                                onclick="removePaymentField(this)">
                                            <x-bootstrap-icon name="x-lg"/>
                                        </button>
                                    </div>
                                </div>
                            </template>


                            <div class="comment-submit-btn">
                                <button class="btn btn-primary" type="submit">
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
    <script src="{{ asset('js/validation.js') }}"></script>

    <script>
        (function ($) {
            $("#add-more").on('click', function () {
                let input = $("#payment-template").first().clone();
                $("#parentRoll").append(input.html());
            })

        })(jQuery)

        function removePaymentField($this) {
            $this.closest('.payment-template-wrapper').remove();
        }

    </script>
@endsection
