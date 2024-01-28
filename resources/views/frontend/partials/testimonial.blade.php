@if (count($testimonials))
    <div class="instructors mb-5" style="background-image:url({{ asset('frontend/images/instructors_background.png') }})">
        <div class="instructors_background"></div>
        <div class="container">
            <div class="row">
                <div class="col">
                    <h2 class="section_title text-center">{{ __('What ours students says') }}</h2>
                </div>
            </div>

            <div class="row instructors_row">
                <div class="owl-carousel owl-theme instructor_slider">
                    @foreach ($testimonials as $testimonial)
                        <!-- Instructor -->
                        <div class="owl-item instructor_col">
                            <div class="instructor text-center">
                                <div class="instructor_image_container">
                                    <div class="instructor_image"><img
                                            src="{{ Storage::url($testimonial->profile) }}" alt="">
                                    </div>
                                </div>
                                <div class="instructor_name">
                                    <a href="instructors.html">{{ $testimonial->name }}</a>
                                </div>
                                <div class="instructor_text">
                                    <p>{{ $testimonial->description }}</p>
                                </div>
                                <div class="instructor_social">
                                    <ul>
                                        @if (isset($testimonial->social[0]))
                                            <li>
                                                <a href="{{ $testimonial->social[0] }}">
                                                    <i class="fa fa-facebook"
                                                        aria-hidden="true"></i>
                                                </a>
                                            </li>
                                        @endif

                                        @if ($testimonial->social[2])
                                            <li>
                                                <a href="{{ $testimonial->social[2] }}">
                                                    <i class="fa fa-instagram"
                                                        aria-hidden="true"></i>
                                                </a>
                                            </li>
                                        @endif

                                        @if ($testimonial->social[1])
                                            <li>
                                                <a href="{{ $testimonial->social[1] }}">
                                                    <i class="fa fa-twitter"
                                                        aria-hidden="true"></i>
                                                </a>
                                            </li>
                                        @endif
                                    </ul>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endif
