  <!-- Menu -->
  <div class="menu d-flex flex-column align-items-end justify-content-start text-right menu_mm trans_400">
      <div class="menu_close_container">
          <div class="menu_close">
              <div></div>
              <div></div>
          </div>
      </div>
      <div class="search">
          <form action="{{ route('courses') }}" class="header_search_form menu_mm">
              <input type="search" class="search_input menu_mm" value="{{ request('query') }}" name="query"
                  placeholder="Search" required="required">
              <button class="header_search_button d-flex flex-column align-items-center justify-content-center menu_mm">
                  <i class="fa fa-search menu_mm" aria-hidden="true"></i>
              </button>
          </form>
      </div>
      <nav class="menu_nav">
          <ul class="menu_mm">
              <li class="menu_mm"><a href="{{ route('home') }}">{{ __('Home') }}</a></li>
              <li class="menu_mm"><a href="{{ route('courses') }}">{{ __('Courses') }}</a></li>
              <li class="menu_mm"><a href="{{ route('contact.index') }}">{{ __('Contact') }}</a></li>
          </ul>
      </nav>
      <div class="menu_extra">
          <div class="menu_phone">
              <span class="menu_title">phone:</span>
              @foreach (explode(',', core()->getSetting('phone_numbers')) as $item)
                  <a href="tel:{{ $item }}">{{ $item }}</a>
              @endforeach
          </div>
          <div class="menu_social">
              <span class="menu_title">follow us</span>
              <ul>
                  @if (!empty(core()->getSetting('facebook')))
                      <li><a href="{{ core()->getSetting('facebook') }}"><i class="fa fa-facebook"
                                  aria-hidden="true"></i></a></li>
                  @endif
                  @if (!empty(core()->getSetting('instagram')))
                      <li><a href="{{ core()->getSetting('instagram') }}"><i class="fa fa-instagram"
                                  aria-hidden="true"></i></a>
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
