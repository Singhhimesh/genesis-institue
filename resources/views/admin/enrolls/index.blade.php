@extends('admin.layouts.master')

@section('title', 'Enrolls')

@section('content')
    <!-- CONTAINER -->
    <div class="main-container container-fluid">

        <!-- PAGE-HEADER -->
        <div class="page-header">
            <h1 class="page-title">Enrolls</h1>
            <div>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Enrolls</a></li>
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
                            Enrolls
                        </h4>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table text-nowrap text-md-nowrap mb-0">
                                <thead>
                                    <tr>
                                        @canany(['Enroll edit', 'Enroll delete'])
                                            <th>{{ __('Actions') }}</th>
                                        @endcanany
                                        <th>{{ __('ID') }}</th>
                                        <th>{{ __('Name') }}</th>
                                        <th>{{ __('Course Name') }}</th>
                                        <th>{{ __('phone') }}</th>
                                        <th>{{ __('Email') }}</th>
                                        <th>{{ __('Address') }}</th>
                                        <th>{{ __('Status') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @can('Enroll access')
                                        @forelse ($enrolls as $enroll)
                                            <tr>
                                                <td>
                                                    <div class="btn-group btn-group-sm" role="group"
                                                        aria-label="{{ __('Actions') }}">
                                                        @can('Enroll edit')
                                                            <a href="{{ route('enrolls.edit', $enroll->id) }}"
                                                                class="btn btn-primary">{{ __('EDIT') }}</a>
                                                        @endcan

                                                        @can('Enroll delete')
                                                            <button type="button"
                                                                onclick="return confirm('{{ __('Are you sure you want to delete this record?') }}') ? document.getElementById('delete-Enrolls').submit() : false;"
                                                                class="btn btn-danger">{{ __('DELETE') }}</button>

                                                            <form action="{{ route('enrolls.destroy', $enroll->id) }}" id="delete-Enrolls"
                                                                method="post">
                                                                @csrf
                                                                @method('DELETE')
                                                            </form>
                                                        @endcan
                                                    </div>
                                                </td>
                                                <td>{{ $enroll->id }}</td>
                                                <td>{{ $enroll->name }}</td>
                                                <td><a href="{{ route('courses.edit', $enroll->course->id) }}" target="_blank">{{ $enroll->course->title }}</a></td>
                                                <td>{{ $enroll->phone }}</td>
                                                <td>{{ $enroll->email }}</td>
                                                <td>{{ $enroll->address }}</td>
                                                <td>
                                                    @if ($enroll->status == 'pending')
                                                        <span
                                                            class="badge bg-warning">{{ ucfirst($enroll->status) }}</span>
                                                    @elseif($enroll->status == 'processing')
                                                        <span
                                                            class="badge bg-success">{{ ucfirst($enroll->status) }}</span>
                                                    @else 
                                                        <span
                                                            class="badge bg-primary">{{ ucfirst($enroll->status) }}</span>
                                                    @endif
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

                    @can('Enrolls access')
                        @if (count($enrolls))
                            <div class="card-footer">
                                {!! $enrolls->links() !!}
                            </div>
                        @endif
                    @endcan
                </div>
            </div>
        </div>
        <!-- End Row -->
    </div>
@endsection
