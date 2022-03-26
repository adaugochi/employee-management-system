@extends('layouts.admin')
@section('content-title', "Payroll")
@section('content-side')
    <a href="{{ route('admin.payroll.new') }}" class="btn btn--primary btn--sm">
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
                            <th>Balance</th>
                            <th>Status</th>
                            <th>Created At</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($payments as $key => $payment)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $payment->employee->user->name }}</td>
                                <td>{{ $payment->employee->user->email }}</td>
                                <td>{{ $payment->amount_paid }}</td>
                                <td>None</td>
                                <td>
                                    <span class="status status-active">
                                        active
                                    </span>
                                </td>
                                <td>{{ $payment->created_at }}</td>
                                <td class="nk-tb-col nk-tb-col-tools">
                                    <ul class="nk-tb-actions gx-1">
                                        <li>
                                            <div class="dropdown">
                                                <a href="#" class="dropdown-toggle btn btn-icon btn-trigger"
                                                   data-toggle="dropdown">
                                                    <x-bootstrap-icon name="three-dots-vertical"/>
                                                </a>

                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <ul class="link-list-opt no-bdr">
                                                        <li>
                                                            <a href="{{ route('admin.employee', ['id' => $user->id]) }}">
                                                                <span>Edit</span>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </td>
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
