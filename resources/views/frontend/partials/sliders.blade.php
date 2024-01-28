<div class="home">
    <div class="home_background" id="particles-js"
        style="background-image: url({{ 
            core()->getSetting('front_hero_image') ? 
            Storage::url(core()->getSetting('front_hero_image')) 
            : asset('frontend/images/index_background.jpg')
        }});">
        <div class="home_content">
            <div class="container">
                <div class="row">
                    <div class="col text-center">
                        <h1 class="home_title">{{ core()->getSetting('front_hero_title') }}</h1>
                        <div class="home_button trans_200"><a href="{{ route('courses') }}">Explore Now</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
