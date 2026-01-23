@php
    $slides = App\Models\HeroSection::all()->sortBy('order');
@endphp
    <!-- Slider -->
<header class="header slider-fade">
    <div class="owl-carousel owl-theme">
        <!-- The opacity on the image is made with "data-overlay-dark="number". You can change it using the numbers 0-9. -->
        @foreach($slides as $slide)
            <div class="text-start item bg-img" data-overlay-dark="3" data-background="{{ url($slide->image) }}">
                <div class="v-middle caption mt-30">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-8 offset-md-2">
                                <h1>{{ $slide->heading }}</h1>
                                <p>{{ $slide->sub_heading }}</p>
                                <div class="butn-light mt-30 mb-30">
                                    <a href="{{ route('contact.page') }}"><span>Contact us</span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <!-- Left Panel -->
    <div class="left-panel">
        <ul class="social-left clearfix">
            <li><a href="#"><i class="ti-pinterest"></i></a></li>
            <li><a href="#"><i class="ti-instagram"></i></a></li>
            <li><a href="#"><i class="ti-twitter"></i></a></li>
            <li><a href="#"><i class="ti-facebook"></i></a></li>
        </ul>
    </div>
</header>
