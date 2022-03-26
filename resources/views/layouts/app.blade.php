<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="description" content="">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="/img/favicon.png">

    <!-- all css here -->
    <link rel="stylesheet" href="/css/bootstrap-icon.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="/css/bundle.css">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/app.css">
    <link rel="stylesheet" href="/css/toastr.css">

    @yield('link')

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,700%7CSource+Code+Pro&amp;display=swap" rel="stylesheet">
</head>
<body>
<div class="wrapper">

    @include('elements.employee.header')

    <main>
        <div class="jumbotron bg--gradient bd-0 mb-0">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 mb-4 mb-md-0">
                        <div class="d-flex align-items-center">
                            <div class="jumbotron__user-avatar">
                                <i class="icon bi bi-person"></i>
                            </div>
                            <div class="ml-3">
                                <div class="jumbotron__user-email">{{ auth()->user()->email }}</div>
                                <div class="jumbotron__user-name">{{ auth()->user()->name }}</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 align-self-center">
                        <h1 class="font-weight-bold text-white fs-48">
                            @yield('title')
                        </h1>
                        <ol class="breadcrumb">
                            <li><a href="/">Home</a></li>
                            @yield('header-breadcrumb')
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        @yield('content')
    </main>

    @include('elements.employee.footer')
</div>

<script src="/js/plugins.js"></script>
<script src="/node_modules/toastr/toastr.js"></script>
<script src="/js/app.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap4.min.js"></script>
<script src="{{ asset('js/validation.js') }}"></script>
@include('partials.flash-messages')

@yield('script')
</body>
</html>
