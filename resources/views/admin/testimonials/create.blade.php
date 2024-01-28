@extends('admin.layouts.master')

@section('title', __('Testimonials'))

@section('content')
    <!-- CONTAINER -->
    <div class="main-container container-fluid">

        <!-- PAGE-HEADER -->
        <div class="page-header">
            <h1 class="page-title">{{ __('Testimonials') }}</h1>
            <div>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">{{ __('Testimonials') }}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ __('Testimonials User') }}</li>
                </ol>
            </div>
        </div>
        <!-- PAGE-HEADER END -->

        <!-- Row -->
        <form action="{{ route('testimonials.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-12 col-xl-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <h4 class="card-title">
                                {{ __('Testimonials') }}
                            </h4>

                            <button type="submit" class="btn btn-primary float-right">Save</button>
                        </div>

                        <div class="card-body">
                            <div>
                                <div class="form-group">
                                    <label for="name" class="form-label">{{ __('Name') }}</label>
                                    <input id="name" type="text"
                                        class="form-control @error('name') is-invalid @enderror" name="name"
                                        value="{{ old('name') }}" autocomplete="name" autofocus placeholder="Name">

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="profile" class="form-label">{{ __('Profile') }}</label>

                                    <input id="profile" type="file"
                                        class="form-control @error('profile') is-invalid @enderror" name="profile"
                                        value="{{ old('profile') }}" autocomplete="email">

                                    @error('profile')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="description" class="form-label">{{ __('Description') }}</label>

                                    <textarea id="description" class="form-control @error('description') is-invalid @enderror" name="description"
                                        value="{{ old('description') }}" cols="5" rows="5"></textarea>

                                    @error('description')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                
                                <div class="form-group">
                                    <label for="status" class="form-label">{{ __('Status') }}</label>

                                    <select id="status" class="form-control @error('status') is-invalid @enderror"
                                        name="status">
                                        <option value="0">{{ __('Active') }}</option>
                                        <option value="1">{{ __('Inactive') }}</option>
                                    </select>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="profile" class="form-label">{{ __('Facebook') }}</label>

                                    <input id="facebook" type="text"
                                        class="form-control @error('facebook') is-invalid @enderror" name="social[]"
                                        value="{{ old('facebook') }}" autocomplete="email">
                                </div>

                                <div class="form-group">
                                    <label for="twiter" class="form-label">{{ __('Twiter') }}</label>

                                    <input id="twiter" type="text"
                                        class="form-control @error('twiter') is-invalid @enderror" name="social[]"
                                        value="{{ old('twiter') }}" autocomplete="email">
                                </div>
                                
                                <div class="form-group">
                                    <label for="instagram" class="form-label">{{ __('Instagram') }}</label>

                                    <input id="instagram" type="text"
                                        class="form-control @error('instagram') is-invalid @enderror" name="social[]"
                                        value="{{ old('instagram') }}" autocomplete="email">
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
