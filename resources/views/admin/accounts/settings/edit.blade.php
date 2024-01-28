@extends('admin.layouts.master')

@section('title', 'Settings')

@section('content')
    <!-- CONTAINER -->
    <div class="main-container container-fluid">

        <!-- PAGE-HEADER -->
        <div class="page-header">
            <h1 class="page-title">{{ __('Update Setting') }}</h1>
            <div>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">{{ __('Settings') }}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ __('Update Setting') }}</li>
                </ol>
            </div>
        </div>
        <!-- PAGE-HEADER END -->

        <!-- Row -->
        <form action="{{ route('settings.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-12 col-xl-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <h4 class="card-title">
                                {{ __('Update Setting') }}
                            </h4>

                            <button type="submit" class="btn btn-primary float-right">{{ __('Save') }}</button>
                        </div>

                        <div class="card-body">
                            <div>
                                <div class="form-group">
                                    <label for="app_name" class="form-label">{{ __('App Name') }}</label>
                                    <input id="app_name" type="text"
                                        class="form-control @error('app_name') is-invalid @enderror" name="app_name"
                                        value="{{ old('app_name') ?? core()->getSetting('app_name') }}"
                                        autocomplete="app_name" autofocus placeholder="App Name">

                                    @error('app_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="fevicon" class="form-label">{{ __('Fevicon') }}</label>
                                    <input id="favicon" type="file"
                                        class="form-control mb-5 @error('favicon') is-invalid @enderror" name="favicon"
                                        value="{{ old('favicon') ?? core()->getSetting('favicon') }}"
                                        accept="image/png, image/gif, image/jpeg" autocomplete="favicon" autofocus
                                        placeholder="App Name">

                                    @if (core()->getSetting('favicon'))
                                        <img src="{{ Storage::url(core()->getSetting('favicon')) }}" height="50"
                                            width="50" alt="{{ core()->getSetting('favicon') }}">
                                    @endif

                                    @error('favicon')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="app_logo" class="form-label">{{ __('Logo') }}</label>
                                    <input id="app_logo" type="file"
                                        class="form-control mb-5 @error('app_logo') is-invalid @enderror" name="app_logo"
                                        value="{{ old('app_logo') ?? core()->getSetting('app_logo') }}"
                                        accept="image/png, image/gif, image/jpeg" autocomplete="app_logo" autofocus
                                        placeholder="App Name">

                                    @if (core()->getSetting('app_logo'))
                                        <img src="{{ Storage::url(core()->getSetting('app_logo')) }}" height="50"
                                            width="50" alt="{{ core()->getSetting('app_logo') }}">
                                    @endif

                                    @error('app_logo')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="enroll_description" class="form-label">{{ __('Enroll Description') }}</label>
                                    <textarea id="enroll_description"
                                        class="form-control mb-5 @error('enroll_description') is-invalid @enderror" name="enroll_description"
                                        autocomplete="enroll_description" autofocus
                                        placeholder="Enroll Description">{{ old('enroll_description') ?? core()->getSetting('enroll_description') }}</textarea>

                                    @error('enroll_description')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="front_hero_title" class="form-label">{{ __('Hero Title') }}</label>
                                <input id="front_hero_title" type="text"
                                    class="form-control @error('front_hero_title') is-invalid @enderror"
                                    name="front_hero_title"
                                    value="{{ old('front_hero_title') ?? core()->getSetting('front_hero_title') }}"
                                    autocomplete="front_hero_title" autofocus placeholder="Hero Title">

                                @error('front_hero_title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="phone_numbers" class="form-label">{{ __('Phone Numbers') }}</label>
                                <input id="phone_numbers" type="text"
                                    class="form-control @error('phone_numbers') is-invalid @enderror"
                                    name="phone_numbers"
                                    value="{{ old('phone_numbers') ?? core()->getSetting('phone_numbers') }}"
                                    autocomplete="phone_numbers" autofocus placeholder="Add multiple using , seperator">

                                @error('phone_numbers')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="app_logo" class="form-label">{{ __('Hero Image') }}</label>
                                <input id="front_hero_image" type="file"
                                    class="form-control mb-5 @error('front_hero_image') is-invalid @enderror"
                                    name="front_hero_image"
                                    value="{{ old('front_hero_image') ?? core()->getSetting('front_hero_image') }}"
                                    accept="image/png, image/gif, image/jpeg" autocomplete="front_hero_image" autofocus
                                    placeholder="Front hero image">

                                @if (core()->getSetting('front_hero_image'))
                                    <img src="{{ Storage::url(core()->getSetting('front_hero_image')) }}" height="50"
                                        width="50" alt="{{ core()->getSetting('front_hero_image') }}">
                                @endif

                                @error('front_hero_image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="Facebook" class="form-label">{{ __('Facebook') }}</label>
                                <input id="Facebook" type="text"
                                    class="form-control @error('Facebook') is-invalid @enderror"
                                    name="facebook"
                                    value="{{ old('facebook') ?? core()->getSetting('facebook') }}"
                                    autocomplete="facebook" autofocus placeholder="Facebook">

                                @error('facebook')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="Twitter" class="form-label">{{ __('Twitter') }}</label>
                                <input id="Twitter" type="text"
                                    class="form-control @error('Twitter') is-invalid @enderror"
                                    name="twitter"
                                    value="{{ old('twitter') ?? core()->getSetting('twitter') }}"
                                    autocomplete="twitter" autofocus placeholder="Twitter">

                                @error('twitter')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="instagram" class="form-label">{{ __('Instagram') }}</label>
                                <input id="Instagram" type="text"
                                    class="form-control @error('instagram') is-invalid @enderror"
                                    name="instagram"
                                    value="{{ old('instagram') ?? core()->getSetting('instagram') }}"
                                    autocomplete="instagram" autofocus placeholder="Instagram">

                                @error('instagram')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <!-- End Row -->
    </div>
@endsection
