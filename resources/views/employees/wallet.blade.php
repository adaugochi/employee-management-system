@extends('layouts.app')
@section('content-title', "Wallet History")
@section('header-breadcrumb')
    <li><a href="{{ route('employee.home') }}">Dashboard</a></li>
    <li class="active">Wallet History</li>
@endsection()
@section('content')
    <div class="container my-5">
    @if(sizeof($payments) > 0)
        <div class="nk-block">
            <div class="card card-bordered card-preview">
                <div class="card-inner table-responsive">
                    <table id="list-order" class="table table-hover">
                        <thead>
                        <tr>
                            <th>S/N</th>
                            <th>Amount Paid</th>
                            <th>Transaction Reference</th>
                            <th>Month</th>
                            <th>Paid At</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($payments as $key => $payment)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ number_format($payment->amount_paid, 2) }}</td>
                                <td>{{ $payment->transaction_reference}}</td>
                                <td>{{ \App\Models\PaymentHistory::MONTHS_OF_YEAR[$payment->month] }}</td>
                                <td>{{ $payment->paid_at }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @else
        @include('partials.empty-state', ['message' => 'No Payment has been made into your wallet.', 'icon' => 'cash'])
    @endif
    </div>
@endsection
