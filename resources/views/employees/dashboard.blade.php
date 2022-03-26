@extends('layouts.app')
@section('title', 'My Dashboard')
@section('header-breadcrumb')
    <li class="active">Dashboard</li>
@endsection()
@section('content')
    <div class="container py-5">
        <div class="row">
            @include('partials.dashboard-card', [
                'actionURL' => route('employee.profile'),
                'icon' => 'journal-text',
                'cardTitle' => 'My Profile',
                'totalCount' => 'Update profile',
                'placement' => 'top',
                'cardDescription' => 'Click here to view or update your profile information'
            ])

            @include('partials.dashboard-card', [
                'actionURL' => route('employee.account'),
                'icon' => 'person-circle',
                'cardTitle' => 'Account Details',
                'totalCount' => 'Change password',
                'placement' => 'right',
                'cardDescription' => 'Click here to change your password'
            ])

            @include('partials.dashboard-card', [
                'icon' => 'cash-stack',
                'cardTitle' => 'My Wallet',
                'totalCount' => number_format(auth()->user()->employee->wallet, 2),
                'placement' => 'bottom',
                'cardDescription' => 'This show your the total amount in your wallet'
            ])

            @include('partials.dashboard-card', [
                'actionURL' => route('employee.wallets'),
                'icon' => 'wallet2',
                'cardTitle' => 'Wallet History',
                'totalCount' => 'View wallet history',
                'placement' => 'left',
                'cardDescription' => 'Click here to see your wallet history'
            ])
        </div>
    </div>
@endsection
