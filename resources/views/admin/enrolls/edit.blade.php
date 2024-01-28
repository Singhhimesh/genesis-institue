@extends('admin.layouts.master')

@section('title', __('Edit Enroll'))

@section('content')
    <!-- CONTAINER -->
    <div class="main-container container-fluid">

        <!-- PAGE-HEADER -->
        <div class="page-header">
            <h1 class="page-title">{{ __('Edit Enroll') }}</h1>
            <div>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">{{ __('Edit Enroll') }}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ __('Edit Enroll') }}</li>
                </ol>
            </div>
        </div>
        <!-- PAGE-HEADER END -->

        <!-- Row -->
        <form action="{{ route('enrolls.update', $enroll->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-12 col-xl-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <h4 class="card-title">
                                {{ __('Edit Enroll') }}
                            </h4>

                            <button type="submit" class="btn btn-primary float-right">Update</button>
                        </div>

                        <div class="card-body">
                            <div>
                                <div class="form-group">
                                    <label for="name" class="form-label">{{ __('Name') }}</label>
                                    <input id="name" type="text"
                                        class="form-control @error('name') is-invalid @enderror" name="name"
                                        value="{{ old('name') ?? $enroll->name }}" autocomplete="name" autofocus disabled
                                        placeholder="name">

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="phone" class="form-label">{{ __('Phone') }}</label>
                                    <input id="phone" type="text"
                                        class="form-control @error('phone') is-invalid @enderror" name="phone"
                                        value="{{ old('phone') ?? $enroll->phone }}" autocomplete="phone" autofocus disabled
                                        placeholder="phone">

                                    @error('phone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="email" class="form-label">{{ __('Email') }}</label>
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') ?? $enroll->email }}" autocomplete="email" autofocus disabled
                                        placeholder="email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="message" class="form-label">{{ __('Message') }}</label>

                                    <textarea id="message" class="form-control @error('message') is-invalid @enderror" name="message" disabled
                                        cols="5" rows="5">{{ old('message') ?? $enroll->message }}</textarea>

                                    @error('message')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="status" class="form-label">{{ __('Status') }}</label>

                                    <select id="status" class="form-control @error('status') is-invalid @enderror"
                                        name="status">
                                        <option value="pending" {{ $enroll->status == 'pending' ? 'selected' : '' }}>
                                            {{ __('Pending') }}</option>
                                            
                                        <option value="processing" {{ $enroll->status == 'processing' ? 'selected' : '' }}>
                                            {{ __('Processing') }}</option>
                                            
                                        <option value="completed" {{ $enroll->status == 'completed' ? 'selected' : '' }}>
                                            {{ __('Completed') }}</option>
                                    </select>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <!-- End Row -->
    </div>
@endsection
