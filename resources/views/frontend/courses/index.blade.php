@extends('frontend.layouts.master')

@push('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/styles/courses.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/styles/course_responsive.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/styles/paginate.css') }}">
@endpush

@section('content')
    <!-- Courses -->
    <div class="home" style="background: #f8f8f8"></div>
    <div class="courses">
        <div class="courses_background"></div>
        <div class="container">
            <div class="row">
                <div class="col">
                    <h2 class="section_title text-center">{{ __('Popular Courses') }}</h2>
                </div>
            </div>

            <div class="row courses_row">
                @if (count($courses))
                    @foreach ($courses as $course)
                        <div class="col-lg-4 course_col">
                            <div class="">
                                <div class="course_image"><img src="{{ asset('frontend/images/course_4.jpg') }}" alt="">
                                </div>
                                <div class="course_body">
                                    <div class="course_title"><a href="{{ route('courses.details', $course->id) }}">{{ $course->title }}</a></div>
                                    <div class="course_info">
                                        <ul>
                                            <li><a href="{{ route('courses.details', $course->id) }}">{{ $course->duration }}</a></li>
                                        </ul>
                                    </div>
                                    <div class="course_text">
                                        <p>{{ Str::limit($course->sort_description, $limit = 50, $end = '...') }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else 
                    <p>No recods found</p>
                @endif
            </div>
            <div class="col d-flex align-items-center justify-content-center">
                {!! $courses->links() !!}
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
