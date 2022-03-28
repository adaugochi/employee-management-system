@extends('layouts.admin')
@section('content-title', "Payment History")
@section('content-side')
    <a href="{{ route('admin.payment-history.new') }}" class="btn btn--primary btn--sm">
        make payment
    </a>
@endsection
@section('content')
    @if(sizeof($payments) > 0)
        <div class="nk-block">
            <div class="card card-bordered card-preview">
                <div class="card-inner table-responsive">
                    <table id="list-order" class="table table-hover">
                        <thead>
                        <tr>
                            <th>S/N</th>
                            <th>Employee Name</th>
                            <th>Email</th>
                            <th>Amount Paid</th>
                            <th>Month</th>
                            <th>Balance</th>
                            <th>Created At</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($payments as $key => $payment)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $payment->employee->user->name }}</td>
                                <td>{{ $payment->employee->user->email }}</td>
                                <td>{{ number_format($payment->amount_paid, 2) }}</td>
                                <td>{{ \App\Models\PaymentHistory::MONTHS_OF_YEAR[$payment->month] }}</td>
                                <td>
                                    {{ ($payment->employee->salary - $payment->amount_paid) >= 0 ?
                                        number_format($payment->employee->salary - $payment->amount_paid, 2) : '0.00' }}
                                </td>
                                <td>{{ $payment->paid_at }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @else
        @include('partials.empty-state', ['message' => 'No Payment has been added.', 'icon' => 'cash'])
    @endif

@endsection
@section('script')
    <script>

    </script>
@endsection
