@extends('layouts.admin')
@section('content-title', "Employees")
@section('content-side')
    <a href="{{ route('admin.employee') }}" class="btn btn--primary btn--sm">
        add employee
    </a>
@endsection
@section('content')
    @if(sizeof($users) > 0)
        <div class="nk-block">
            <div class="card card-bordered card-preview">
                <div class="card-inner table-responsive">
                    <table id="list-order" class="table table-hover">
                        <thead>
                        <tr>
                            <th>S/N</th>
                            <th>Employee Name</th>
                            <th>Email</th>
                            <th>Phone Number</th>
                            <th>Status</th>
                            <th>Created At</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $key => $user)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->international_number }}</td>
                                <td>
                                    <span class="status status-{{ $user->is_active ? 'active' : 'inactive' }}">
                                        {{ $user->is_active ? 'active' : 'inactive' }}
                                    </span>
                                </td>
                                <td>{{ $user->created_at }}</td>
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
                                                        @if(!$user->is_active)
                                                        <li>
                                                            <a href="{{ route('password.resend.token', ['id' => $user->id]) }}"
                                                               onclick="event.preventDefault();
                                                                        document.getElementById('resendToken{{$user->id}}').submit();">
                                                                <span>Resend Token</span>
                                                            </a>
                                                            <form action="{{ route('password.resend.token', ['id' => $user->id]) }}"
                                                                  method="POST" id="resendToken{{$user->id}}" >
                                                                @csrf
                                                            </form>
                                                        </li>
                                                        @endif
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
        @include('partials.empty-state', ['message' => 'No Employee has been added.', 'icon' => 'person'])
    @endif

@endsection
@section('script')
    <script>

    </script>
@endsection
