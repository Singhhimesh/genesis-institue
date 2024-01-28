<!DOCTYPE html>
<html lang="en">

<head>
    <title>{{ core()->getSetting('app_name') }}</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Lingua project">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/styles/bootstrap4/bootstrap.min.css') }}">
    <link href="{{ asset('frontend/plugins/font-awesome-4.7.0/css/font-awesome.min.css') }}" rel="stylesheet"
        type="text/css">
    @if (core()->getSetting('favicon'))
        <link rel="shortcut icon" type="image/x-icon" href="{{ Storage::url(core()->getSetting('favicon')) }}" />
    @endif
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/plugins/OwlCarousel2-2.2.1/owl.carousel.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('frontend/plugins/OwlCarousel2-2.2.1/owl.theme.default.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/plugins/OwlCarousel2-2.2.1/animate.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/styles/main_styles.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/styles/responsive.css') }}">
    @if (request()->routeIs('home'))
        @include('frontend.partials.particles-css')
    @endif
    <style>
        html,
        body {
            scroll-behavior: smooth;
        }
    </style>
    @stack('css')
</head>

<body>
    <div class="super_container">
        @include('frontend.partials.header')

        @include('frontend.partials.menu')

        @if (request()->routeIs('home'))
            @include('frontend.partials.sliders')

            @if ($totalCourse = count($courses))
                <!-- Courses -->
                <div class="courses">
                    <div class="courses_background"></div>
                    <div class="container">
                        <div class="row">
                            <div class="col">
                                <h2 class="section_title text-center">{{ __('Popular Courses') }}</h2>
                            </div>
                        </div>
                        <div class="row courses_row">

                            @foreach ($courses as $course)
                                <!-- Course -->
                                <a href="{{ route('courses.details', $course->id) }}">
                                    <div class="col-lg-4 course_col">
                                        <div class="course">
                                            <div class="course_image"><img src="{{ Storage::url($course->bg) }}"
                                                    alt="">
                                            </div>
                                            <div class="course_body">
                                                <div class="course_title"><a
                                                        href="{{ route('courses.details', $course->id) }}">{{ $course->title }}</a>
                                                </div>
                                                <div class="course_info">
                                                    <ul>
                                                        <li><a
                                                                href="{{ route('courses.details', $course->id) }}">{{ $course->duration }}</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="course_text">
                                                    <p>{{  Str::limit($course->sort_description, $limit = 50, $end = '...') }}<p>
                                                    <div class="home_button trans_200"><a
                                                            href="{{ route('courses.details', $course->id) }}">Explore
                                                            Now</a></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            @endforeach

                            @if ($totalCourse > 3)
                                <div class="row">
                                    <div class="col">
                                        <div class="ml-3 home_button"><a
                                                href="{{ route('courses') }}">{{ __('Explore All') }}</a></div>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            @endif

            @include('frontend.partials.testimonial')
        @else
            @yield('content')
        @endif

        @include('frontend.partials.footer')
    </div>

    <script src="{{ asset('frontend/js/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('frontend/styles/bootstrap4/popper.js') }}"></script>
    <script src="{{ asset('frontend/styles/bootstrap4/bootstrap.min.js') }}"></script>
    <script src="{{ asset('frontend/plugins/OwlCarousel2-2.2.1/owl.carousel.js') }}"></script>
    <script src="{{ asset('frontend/plugins/easing/easing.js') }}"></script>
    <script src="{{ asset('frontend/js/custom.js') }}"></script>
    @if (request()->routeIs('home'))
        @include('frontend.partials.particles-js')
    @endif
    @stack('js')
</body>

</html>
