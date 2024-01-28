@extends('admin.layouts.master')

@section('title', __('Edit Testimonials'))

@section('content')
    <!-- CONTAINER -->
    <div class="main-container container-fluid">

        <!-- PAGE-HEADER -->
        <div class="page-header">
            <h1 class="page-title">{{ __('Edit Testimonials') }}</h1>
            <div>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">{{ __('Testimonials') }}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ __('Edit Testimonials') }}</li>
                </ol>
            </div>
        </div>
        <!-- PAGE-HEADER END -->

        <!-- Row -->
        <form action="{{ route('testimonials.update', $testimonial->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-12 col-xl-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <h4 class="card-title">
                                {{ __('Testimonials') }}
                            </h4>

                            <button type="submit" class="btn btn-primary float-right">Update</button>
                        </div>

                        <div class="card-body">
                            <div>
                                <div class="form-group">
                                    <label for="name" class="form-label">{{ __('Name') }}</label>
                                    <input id="name" type="text"
                                        class="form-control @error('name') is-invalid @enderror" name="name"
                                        value="{{ old('name') ?? $testimonial->name}}" autocomplete="name" autofocus placeholder="Name">

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

                                    @if ($testimonial->profile)
                                        <img src="{{ Storage::url($testimonial->profile) }}" class="mt-2" height="50" width="50" alt="{{ $testimonial->name }}">
                                    @endif

                                    @error('profile')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="description" class="form-label">{{ __('Description') }}</label>

                                    <textarea id="description" class="form-control @error('description') is-invalid @enderror" name="description"
                                        value="{{ old('description') }}" cols="5" rows="5">{{ $testimonial->description }}</textarea>

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
                                        <option value="0" {{ $testimonial->status == 0 ? 'selected' : '' }}>{{ __('Inactive') }}</option>
                                        <option value="1" {{ $testimonial->status ? 'selected' : '' }}>{{ __('Active') }}</option>
                                    </select>

                                    @error('status')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="profile" class="form-label">{{ __('Facebook') }}</label>

                                    <input id="facebook" type="text"
                                        class="form-control @error('facebook') is-invalid @enderror" name="social[]"
                                        value="{{ old('facebook') ?? ($testimonial->social[0] ?? '') }}" autocomplete="email">
                                </div>

                                <div class="form-group">
                                    <label for="twiter" class="form-label">{{ __('Twiter') }}</label>

                                    <input id="twiter" type="text"
                                        class="form-control @error('twiter') is-invalid @enderror" name="social[]"
                                        value="{{ old('twiter') ?? ($testimonial->social[1] ?? '') }}" autocomplete="email">
                                </div>
                                
                                <div class="form-group">
                                    <label for="instagram" class="form-label">{{ __('Instagram') }}</label>

                                    <input id="instagram" type="text"
                                        class="form-control @error('instagram') is-invalid @enderror" name="social[]"
                                        value="{{ old('instagram') ?? ($testimonial->social[2] ?? '') }}" autocomplete="email">
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
