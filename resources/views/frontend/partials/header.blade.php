<!-- Header -->
<header class="header">
    <!-- Top Bar -->
    <div class="top_bar">
        <div class="top_bar_container">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="top_bar_content d-flex flex-row align-items-center justify-content-start">
                            <div class="top_bar_phone">
                                <span class="top_bar_title">phone:</span>

                                @foreach (explode(',', core()->getSetting('phone_numbers')) as $item)
                                    <a href="tel:{{ $item }}">{{ $item }}</a>
                                @endforeach
                            </div>
                            <div class="top_bar_right ml-auto">
                                <!-- Social -->
                                <div class="top_bar_social">
                                    <span class="top_bar_title social_title">follow us</span>
                                    <ul>
                                        @if (!empty(core()->getSetting('facebook')))
                                            <li><a href="{{ core()->getSetting('facebook') }}"><i class="fa fa-facebook"
                                                        aria-hidden="true"></i></a></li>
                                        @endif
                                        @if (!empty(core()->getSetting('instagram')))
                                            <li><a href="{{ core()->getSetting('instagram') }}"><i
                                                        class="fa fa-instagram" aria-hidden="true"></i></a>
                                            </li>
                                        @endif
                                        @if (!empty(core()->getSetting('twitter')))
                                            <li><a href="{{ core()->getSetting('twitter') }}"><i class="fa fa-twitter"
                                                        aria-hidden="true"></i></a></li>
                                        @endif
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Header Content -->
    <div class="header_container">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="header_content d-flex flex-row align-items-center justify-content-start">
                        <div class="logo_container mr-auto">
                            <a href="{{ route('home') }}">
                                <div class="logo_text">
                                    <img src="{{ 
                                            core()->getSetting('app_logo') 
                                            ? Storage::url(core()->getSetting('app_logo')) 
                                            : asset('frontend/images/logo.png')
                                        }}"
                                        style="mix-blend-mode: multiply;" height="50" width="50" class=""
                                        alt="logo">
                                </div>
                            </a>
                        </div>
                        <nav class="main_nav_contaner">
                            <ul class="main_nav">
                                <li class="{{ request()->routeIs('home') ? 'active' : '' }}"><a href="{{ route('home') }}">Home</a></li>
                                <li class="{{ request()->routeIs('courses') ? 'active' : '' }}"><a href="{{ route('courses') }}">Courses</a></li>
                                <li class="{{ request()->routeIs('contact.index') ? 'active' : '' }}"><a href="{{ route('contact.index') }}">Contact</a></li>
                            </ul>
                        </nav>
                        <div class="header_content_right ml-auto text-right">
                            <div class="header_search">
                                <div class="search_form_container active">
                                    <form action="{{ route('courses') }}" class="search_form trans_400">
                                        <input type="search" name="query" value="{{ request('query') }}" class="header_search_input trans_400"
                                            placeholder="Type for Search" required="required">
                                        <div class="search_button">
                                            <i class="fa fa-search" aria-hidden="true"></i>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <!-- Hamburger -->

                            <div class="user"><a href="#"><i class="fa fa-user" aria-hidden="true"></i></a>
                            </div>
                            <div class="hamburger menu_mm">
                                <i class="fa fa-bars menu_mm" aria-hidden="true"></i>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

</header>
