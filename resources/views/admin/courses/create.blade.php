@extends('admin.layouts.master')

@section('title', __('Course'))

@push('js')
    <script
        src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/6.6.2/tinymce.min.js"
        crossorigin="anonymous"
        referrerpolicy="no-referrer"
    ></script>  
    <script>
        tinymce.init({
            selector: 'textarea#description',
            menubar: false,
            plugins: 'image media wordcount save fullscreen code table lists link',
            toolbar1: 'formatselect | bold italic strikethrough forecolor backcolor alignleft aligncenter alignright alignjustify | link hr |numlist bullist outdent indent  | removeformat | code | table',
            valid_elements: '*[*]',
        });
    </script>
@endpush

@section('content')
    <!-- CONTAINER -->
    <div class="main-container container-fluid">

        <!-- PAGE-HEADER -->
        <div class="page-header">
            <h1 class="page-title">{{ __('Course') }}</h1>
            <div>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">{{ __('Course') }}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ __('Course') }}</li>
                </ol>
            </div>
        </div>
        <!-- PAGE-HEADER END -->

        <!-- Row -->
        <form action="{{ route('courses.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-12 col-xl-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <h4 class="card-title">
                                {{ __('Course') }}
                            </h4>

                            <button type="submit" class="btn btn-primary float-right">Save</button>
                        </div>

                        <div class="card-body">
                            <div>
                                <div class="form-group">
                                    <label for="title" class="form-label">{{ __('Title') }}</label>
                                    <input id="title" type="text"
                                        class="form-control @error('title') is-invalid @enderror" name="title"
                                        value="{{ old('title') }}" autocomplete="title" autofocus placeholder="Title">

                                    @error('title')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="bg" class="form-label">{{ __('Backgound Image') }}</label>

                                    <input id="bg" type="file"
                                        class="form-control @error('bg') is-invalid @enderror" name="bg"
                                        value="{{ old('bg') }}" autocomplete="email">

                                    @error('bg')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="sort_description" class="form-label">{{ __('Short Description') }}</label>

                                    <textarea id="sort_description" class="form-control @error('sort_description') is-invalid @enderror" name="sort_description"
                                        value="{{ old('sort_description') }}" cols="5" rows="5"></textarea>

                                    @error('sort_description')
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
                                    <label for="duration" class="form-label">{{ __('Durations') }}</label>

                                    <input id="duration" type="text"
                                        class="form-control @error('duration') is-invalid @enderror" name="duration"
                                        value="{{ old('duration') }}" autocomplete="email">

                                    @error('duration')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                
                                <div class="form-group">
                                    <label for="status" class="form-label">{{ __('Status') }}</label>

                                    <select id="status" class="form-control @error('status') is-invalid @enderror"
                                        name="status">
                                        <option value="1">{{ __('Active') }}</option>
                                        <option value="0">{{ __('Inactive') }}</option>
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
