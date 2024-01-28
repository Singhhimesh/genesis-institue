@extends('frontend.layouts.master')

@push('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/styles/course.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/styles/course_responsive.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/styles/contact.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/styles/contact_responsive.css') }}">
@endpush

@section('content')
    <!-- Intro -->
    <div class="intro">
        <div class="intro_background parallax-window" data-parallax="scroll"
            data-image-src="{{ Storage::url($course->bg) }}" data-speed="0.8"></div>
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="intro_container d-flex flex-column align-items-start justify-content-end">
                        <div class="intro_content">
                            <div class="intro_price">{{ $course->duration }}</div>
                            <div class="intro_title">{{ $course->title }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Course -->

    <div class="course">
        <div class="course_top"></div>
        <div class="container">
            <div class="row row-lg-eq-height">

                <!-- Panels -->
                <div class="col-lg-9">
                    <div class="tab_panels">

                        <!-- Tabs -->
                        <div class="course_tabs_container">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-9">
                                        <div class="tabs d-flex flex-row align-items-center justify-content-start">
                                            <div class="tab active">description</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Description -->
                        <div class="tab_panel description active">
                            <div class="panel_title">About this course</div>
                            <div class="panel_text">
                                <p>
                                    {!! $course->description     !!}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>


                <!-- Sidebar -->
                <div class="col-lg-3">
                    <div class="sidebar">
                        <div class="sidebar_background"></div>
                        <div class="sidebar_top"><a href="#enroll">{{ __('Enroll Now') }}</a></div>
                        <div class="sidebar_content">

                            <!-- Features -->
                            <div class="sidebar_section features">
                                <div class="sidebar_title">{{ __('Course Features') }}</div>
                                <div class="features_content">
                                    <ul class="features_list">

                                        <!-- Feature -->
                                        <li class="d-flex flex-row align-items-start justify-content-start">
                                            <div class="feature_title"><i class="fa fa-clock-o"
                                                    aria-hidden="true"></i><span>Duration</span></div>
                                            <div class="feature_text ml-auto">{{ $course->duration }}</div>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            <!-- Cert -->
                            <div class="sidebar_section cert">
                                <div class="sidebar_title">Certification</div>
                                <div class="cert_image"><img src="{{ asset('frontend/images/cert.jpg') }}" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
        <div class="register" id="enroll">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="register_timer_container">
                            <div class="register_timer_title">Enroll Now</div>
                            <div class="register_timer_text">
                                <p>{{ core()->getSetting('enroll_description') }}.</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="register_form_container">
                            <div class="register_form_title mb-2">Enroll Now</div>
                            <form action="{{ route('enroll', $course->id) }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                                        id="name" name="name" aria-describedby="nameHelp" value="{{ old('name') }}"
                                        placeholder="Enter your name">
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <small>{{ $message }}</small>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="phone">Phone Number</label>
                                    <input type="text" class="form-control @error('phone') is-invalid @enderror"
                                        id="phone" name="phone" aria-describedby="phoneHelp" value="{{ old('phone') }}"
                                        placeholder="Enter your phone">
                                    @error('phone')
                                        <span class="invalid-feedback" role="alert">
                                            <small>{{ $message }}</small>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="email">Email address</label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror"
                                        id="email" name="email" aria-describedby="emailHelp" value="{{ old('email') }}"
                                        placeholder="Enter email">
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <small>{{ $message }}</small>
                                        </span>
                                    @enderror
                                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with
                                        anyone else.</small>
                                </div>
                                <div class="form-group">
                                    <label for="address">Address</label>
                                    <textarea rows="5" class="form-control @error('address') is-invalid @enderror" id="address" name="address"
                                        placeholder="Address"></textarea>
                                    @error('address')
                                        <span class="invalid-feedback" role="alert">
                                            <small>{{ $message }}</small>
                                        </span>
                                    @enderror
                                </div>
                                <button type="submit" class="form_button trans_200">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@push('js')
    <script src="{{ asset('frontend/plugins/easing/easing.js') }}"></script>
    <script src="{{ asset('frontend/plugins/parallax-js-master/parallax.min.js') }}"></script>
    <script src="{{ asset('frontend/plugins/progressbar/progressbar.min.js') }}"></script>
    <script src="{{ asset('frontend/js/course.js') }}"></script>
@endpush
