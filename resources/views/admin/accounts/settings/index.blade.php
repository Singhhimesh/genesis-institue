@extends('admin.layouts.master')

@section('title', 'Settings')

@section('content')
    <!-- CONTAINER -->
    <div class="main-container container-fluid">

        <!-- PAGE-HEADER -->
        <div class="page-header">
            <h1 class="page-title">{{ __('Settings') }}</h1>
            <div>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">{{ __('Settings') }}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ __('Index') }}</li>
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
                            {{ __('Settings') }}
                        </h4>

                        @can('Settings create')
                            <a href="{{ route('settings.create') }}"
                                class="btn btn-primary float-right">{{ __('Create setting') }}</a>
                        @endcan
                    </div>
                </div>
            </div>
        </div>
        <!-- End Row -->
    </div>
@endsection
