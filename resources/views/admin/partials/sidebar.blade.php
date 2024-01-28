<!--APP-SIDEBAR-->
<div class="sticky">
    <div class="app-sidebar__overlay" data-bs-toggle="sidebar"></div>
    <div class="app-sidebar">
        <div class="side-header">
            <a class="header-brand1" href="{{ route('dashboard') }}">
                <img src="{{ core()->getSetting('app_logo')
                    ? Storage::url(core()->getSetting('app_logo'))
                    : asset('frontend/images/logo.png') }}"
                    style="mix-blend-mode: multiply;" height="50" width="50" class="" alt="logo">
            </a>
            <!-- LOGO -->
        </div>
        <div class="main-sidemenu">
            <div class="slide-left disabled" id="slide-left"><svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191"
                    width="24" height="24" viewBox="0 0 24 24">
                    <path d="M13.293 6.293 7.586 12l5.707 5.707 1.414-1.414L10.414 12l4.293-4.293z" />
                </svg></div>
            <ul class="side-menu">
                <li class="sub-category">
                    <h3>{{ __('Main') }}</h3>
                </li>
                <li class="slide">
                    <a class="side-menu__item" data-bs-toggle="slide" href="{{ route('dashboard') }}"><i
                            class="side-menu__icon fe fe-home"></i><span
                            class="side-menu__label">{{ __('Dashboard') }}</span></a>
                </li>

                <li class="sub-category">
                    <h3>{{ __('Courses') }}</h3>
                </li>

                @can('Courses access')
                    <li class="slide">
                        <a class="side-menu__item {{ request()->is('admin/courses*') ? 'active' : '' }}"
                            data-bs-toggle="slide" href="{{ route('courses.index') }}"><i
                                class="side-menu__icon fe fe-file"></i><span
                                class="side-menu__label">{{ __('Courses') }}</span></a>
                    </li>
                @endcan
                    
                @can('Testimonials access')
                    <li class="slide">
                        <a class="side-menu__item {{ request()->is('admin/testimonials*') ? 'active' : '' }}"
                            data-bs-toggle="slide" href="{{ route('testimonials.index') }}"><i
                                class="side-menu__icon fe fe-users"></i><span
                                class="side-menu__label">{{ __('Testimonials') }}</span></a>
                    </li>
                @endcan

                @can('Enroll access')
                    <li class="slide">
                        <a class="side-menu__item {{ request()->is('admin/enrolls*') ? 'active' : '' }}"
                            data-bs-toggle="slide" href="{{ route('enrolls.index') }}"><i
                                class="side-menu__icon fe fe-users"></i><span
                                class="side-menu__label">{{ __('Enrolls') }}</span></a>
                    </li>
                @endcan

                <li class="sub-category">
                    <h3>{{ __('Accounts') }}</h3>
                </li>

                @can('User access')
                    <li class="slide {{ request()->is('admin/users*') ? 'is-expanded' : '' }}">
                        <a class="side-menu__item {{ request()->is('admin/users*') ? 'active is-expanded' : '' }}"
                            data-bs-toggle="slide" href="javascript:void(0)"><i
                                class="side-menu__icon fe fe-users"></i><span
                                class="side-menu__label">{{ __('Users') }}</span><i
                                class="angle fe fe-chevron-right"></i></a>
                        <ul class="slide-menu">
                            <li class="side-menu-label1"><a href="javascript:void(0)">Apps</a></li>
                            <li><a href="{{ route('users.index') }}"
                                    class="slide-item {{ request()->is('admin/users*') ? 'active' : '' }}">{{ __('Users') }}</a>
                            </li>
                        </ul>
                    </li>
                @endcan

                @can('Role access')
                    <li class="slide {{ request()->is('admin/roles*') ? 'is-expanded' : '' }}">
                        <a class="side-menu__item  {{ request()->is('admin/roles*') ? 'active is-expanded' : '' }}"
                            data-bs-toggle="slide" href="javascript:void(0)"><i class="side-menu__icon fe fe-lock"></i><span
                                class="side-menu__label">{{ __('Role & Permission') }}</span><i
                                class="angle fe fe-chevron-right"></i></a>
                        <ul class="slide-menu">
                            <li class="side-menu-label1"><a href="javascript:void(0)">Apps</a></li>
                            <li><a href="{{ route('roles.index') }}"
                                    class="slide-item  {{ request()->is('admin/roles*') ? 'active' : '' }}">{{ __('Roles') }}</a>
                            </li>
                        </ul>
                    </li>
                @endcan

                @can('Settings access')
                    <li class="slide">
                        <a class="side-menu__item" data-bs-toggle="slide" href="{{ route('settings.create') }}"><i
                                class="side-menu__icon fe fe-settings"></i><span
                                class="side-menu__label">{{ __('Settings') }}</span></a>
                    </li>
                @endcan
            </ul>

            <div class="slide-right" id="slide-right">
                <svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191" width="24" height="24"
                    viewBox="0 0 24 24">
                    <path d="M10.707 17.707 16.414 12l-5.707-5.707-1.414 1.414L13.586 12l-4.293 4.293z" />
                </svg>
            </div>
        </div>
    </div>
    <!--/APP-SIDEBAR-->
</div>
