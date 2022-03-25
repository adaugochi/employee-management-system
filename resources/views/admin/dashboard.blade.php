@extends('layouts.admin')
@section('content-title', 'My Dashboard')

@section('content')
    <div class="row">
        @include('partials.dashboard-card', [
            'icon' => 'person-dash',
            'cardTitle' => 'Total Employees',
            'totalCount' => $countEmployees,
            'placement' => 'top',
            'cardDescription' => 'The shows the total number of employees details records by the admin'
        ])

        @include('partials.dashboard-card', [
            'icon' => 'person-plus',
            'cardTitle' => 'Active Employees',
            'totalCount' => $countActiveEmployees,
            'placement' => 'right',
            'cardDescription' => 'The shows the total number of employees that has activated their account. i.e they have access to their dashboard'
        ])

        @include('partials.dashboard-card', [
            'icon' => 'person-x',
            'cardTitle' => 'Inactive Employees',
            'totalCount' => $countInactiveEmployees,
            'placement' => 'bottom',
            'cardDescription' => 'The shows the total number of employees that have not activated their account or has leave the organisation'
        ])

        @include('partials.dashboard-card', [
            'icon' => 'person-check',
            'cardTitle' => 'Employees Profile Complete',
            'totalCount' => 0,
            'placement' => 'left',
            'cardDescription' => 'The shows the total number of employees that have completed their profile'
        ])
    </div>
@endsection
