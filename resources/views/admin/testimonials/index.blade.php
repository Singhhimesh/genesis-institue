@extends('admin.layouts.master')

@section('title', 'Testimonials')

@section('content')
    <!-- CONTAINER -->
    <div class="main-container container-fluid">

        <!-- PAGE-HEADER -->
        <div class="page-header">
            <h1 class="page-title">Testimonials</h1>
            <div>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Testimonials</a></li>
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
                            testimonials
                        </h4>

                        @can('Testimonials create')
                            <a href="{{ route('testimonials.create') }}"
                                class="btn btn-primary float-right">{{ __('Create Testimonials') }}</a>
                        @endcan
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table text-nowrap text-md-nowrap mb-0">
                                <thead>
                                    <tr>
                                        @canany(['Testimonials edit', 'Testimonials delete'])
                                            <th>{{ __('Actions') }}</th>
                                        @endcanany
                                        <th>{{ __('ID') }}</th>
                                        <th>{{ __('Name') }}</th>
                                        <th>{{ __('Description') }}</th>
                                        <th>{{ __('Status') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @can('Testimonials access')
                                        @forelse ($testimonials as $testimonial)
                                            <tr>
                                                <td>
                                                    <div class="btn-group btn-group-sm" role="group"
                                                        aria-label="{{ __('Actions') }}">
                                                        @can('Testimonials edit')
                                                            <a href="{{ route('testimonials.edit', $testimonial->id) }}"
                                                                class="btn btn-primary">{{ __('EDIT') }}</a>
                                                        @endcan

                                                        @can('Testimonials delete')
                                                            <button type="button"
                                                                onclick="return confirm('{{ __('Are you sure you want to delete this record?') }}') ? document.getElementById('delete-Testimonials').submit() : false;"
                                                                class="btn btn-danger">{{ __('DELETE') }}</button>

                                                            <form action="{{ route('testimonials.destroy', $testimonial->id) }}" id="delete-Testimonials"
                                                                method="post">
                                                                @csrf
                                                                @method('DELETE')
                                                            </form>
                                                        @endcan
                                                    </div>
                                                </td>
                                                <td>{{ $testimonial->id }}</td>
                                                <td>{{ $testimonial->name }}</td>
                                                <td>{{ Str::limit($testimonial->description, $limit = 50, $end = '...') }}</td>
                                                <td><span
                                                        class="badge bg-{{ $testimonial->status ? 'success' : 'danger' }}">{{ $testimonial->status ? 'Active' : 'Inactive' }}</span>
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

                    @can('Testimonials access')
                        @if (count($testimonials))
                            <div class="card-footer">
                                {!! $testimonials->links() !!}
                            </div>
                        @endif
                    @endcan
                </div>
            </div>
        </div>
        <!-- End Row -->
    </div>
@endsection
