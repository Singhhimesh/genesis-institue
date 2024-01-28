@extends('admin.layouts.master')

@section('title', 'Users')

@section('content')
    <!-- CONTAINER -->
    <div class="main-container container-fluid">

        <!-- PAGE-HEADER -->
        <div class="page-header">
            <h1 class="page-title">Users</h1>
            <div>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Users</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Index</li>
                </ol>
            </div>
        </div>
        <!-- PAGE-HEADER END -->

        <!-- Row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <h4 class="card-title">
                            Users
                        </h4>

                        @can('User create')
                            <a href="{{ route('users.create') }}"
                                class="btn btn-primary float-right">{{ __('Create User') }}</a>
                        @endcan
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table text-nowrap text-md-nowrap mb-0">
                                <thead>
                                    <tr>
                                        <th>{{ __('ID') }}</th>
                                        <th>{{ __('Name') }}</th>
                                        <th>{{ __('Email') }}</th>
                                        <th>{{ __('Roles') }}</th>
                                        <th>{{ __('Status') }}</th>
                                        @canany(['User edit', 'User delete'])
                                            <th>{{ __('Actions') }}</th>
                                        @endcanany
                                    </tr>
                                </thead>
                                <tbody>
                                    @can('User access')
                                        @forelse ($users as $user)
                                            <tr>
                                                <td>{{ $user->id }}</td>
                                                <td>{{ $user->name }}</td>
                                                <td><a href="mailto:{{ $user->email }}">{{ $user->email }}</a></td>
                                                <td>
                                                    @foreach ($user->roles as $index => $role)
                                                        <span class="badge bg-primary">{{ $role->name }}</span>
                                                        @if (($index + 1) % 5 == 0)
                                                            <br>
                                                        @endif
                                                    @endforeach
                                                </td>
                                                <td><span
                                                        class="badge bg-{{ $user->status ? 'success' : 'danger' }}">{{ $user->status ? 'Active' : 'Inactive' }}</span>
                                                </td>
                                                <td>
                                                    <div class="btn-group btn-group-sm" role="group"
                                                        aria-label="{{ __('Actions') }}">
                                                        @can('User edit')
                                                            <a href="{{ route('users.edit', $user->id) }}"
                                                                class="btn btn-primary">{{ __('EDIT') }}</a>
                                                        @endcan

                                                        @can('User delete')
                                                            <button type="button"
                                                                onclick="return confirm('{{ __('Are you sure you want to delete this record?') }}') ? document.getElementById('delete-user').submit() : false;"
                                                                class="btn btn-danger">{{ __('DELETE') }}</button>

                                                            <form action="{{ route('users.destroy', $user->id) }}" id="delete-user"
                                                                method="post">
                                                                @csrf
                                                                @method('DELETE')
                                                            </form>
                                                        @endcan
                                                    </div>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="5" class="text-center">{{ __('No records found.') }}</td>
                                            </tr>
                                        @endforelse
                                    @endcan
                                </tbody>
                            </table>
                        </div>
                    </div>

                    @can('User access')
                        @if (count($users))
                            <div class="card-footer">
                                {!! $users->links() !!}
                            </div>
                        @endif
                    @endcan
                </div>
            </div>
        </div>
        <!-- End Row -->
    </div>
@endsection
