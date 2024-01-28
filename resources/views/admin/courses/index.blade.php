@extends('admin.layouts.master')

@section('title', 'Courses')

@section('content')
    <!-- CONTAINER -->
    <div class="main-container container-fluid">

        <!-- PAGE-HEADER -->
        <div class="page-header">
            <h1 class="page-title">Courses</h1>
            <div>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Courses</a></li>
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
                            Courses
                        </h4>

                        @can('Courses create')
                            <a href="{{ route('courses.create') }}"
                                class="btn btn-primary float-right">{{ __('Create courses') }}</a>
                        @endcan
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table text-nowrap text-md-nowrap mb-0">
                                <thead>
                                    <tr>
                                        @canany(['Courses edit', 'Courses delete'])
                                            <th>{{ __('Actions') }}</th>
                                        @endcanany
                                        <th>{{ __('ID') }}</th>
                                        <th>{{ __('Name') }}</th>
                                        <th>{{ __('Description') }}</th>
                                        <th>{{ __('Status') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @can('Courses access')
                                        @forelse ($courses as $course)
                                            <tr>
                                                <td>
                                                    <div class="btn-group btn-group-sm" role="group"
                                                        aria-label="{{ __('Actions') }}">
                                                        @can('Courses edit')
                                                            <a href="{{ route('courses.edit', $course->id) }}"
                                                                class="btn btn-primary">{{ __('EDIT') }}</a>
                                                        @endcan

                                                        @can('Courses delete')
                                                            <button type="button"
                                                                onclick="return confirm('{{ __('Are you sure you want to delete this record?') }}') ? document.getElementById('delete-courses').submit() : false;"
                                                                class="btn btn-danger">{{ __('DELETE') }}</button>

                                                            <form action="{{ route('courses.destroy', $course->id) }}" id="delete-courses"
                                                                method="post">
                                                                @csrf
                                                                @method('DELETE')
                                                            </form>
                                                        @endcan
                                                    </div>
                                                </td>
                                                <td>{{ $course->id }}</td>
                                                <td>{{ $course->title }}</td>
                                                <td>{{ Str::limit($course->sort_description, $limit = 50, $end = '...') }}</td>
                                                <td><span
                                                        class="badge bg-{{ $course->status ? 'success' : 'danger' }}">{{ $course->status ? 'Active' : 'Inactive' }}</span>
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

                    @can('courses access')
                        @if (count($courses))
                            <div class="card-footer">
                                {!! $courses->links() !!}
                            </div>
                        @endif
                    @endcan
                </div>
            </div>
        </div>
        <!-- End Row -->
    </div>
@endsection
