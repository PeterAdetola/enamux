@php

    $route = Route::current()->getName();
//    $smedia = App\Models\SocialMedia::all();

@endphp
<div class="bauen-wrap">
    <div class="bauen-wrap-inner">
        <nav class="bauen-menu">
            <ul>
                <li><a class="{{ ($route == 'home')? 'active' : '' }}" href="{{ url('/') }}">Home</a></li>
                <li><a class="{{ ($route == 'aboutus.page')? 'active' : '' }}" href="{{ route('aboutus.page') }}">About</a></li>
                <li class='{{ ($route == 'services.page' || $route == 'service_detailed.page')? 'active' : '' }}'><a href="{{ route('services.page') }}">Services</a></li>
                <li class="{{ ($route == 'projects.page' || $route == 'project_detailed.page')? 'active' : '' }}"><a href='{{ route('projects.page') }}'>Projects <i class="ti-angle-down"></i></a> </li>

                <li class='bauen-menu-sub'><a href='#'>Blog <i class="ti-angle-down"></i></a>
                    <ul>
                        <li><a href='blog.html'>Blog 01</a></li>
                        <li><a href='blog2.html'>Blog 02</a></li>
                        <li><a href='blog3.html'>Blog 03</a></li>
                        <li><a href='blog4.html'>Blog 04</a></li>
                    </ul>
                </li>
                <li><a href="contact.html">Contact</a></li>
            </ul>
        </nav>

        <div class="bauen-menu-footer">
            <div class="contact">
                <div class="icon"><span class="ti-mobile"></span></div>
                <div class="text"><a href="tel:+1 203-123-0606">+1 203-123-0606</a></div>
            </div>
            <div class="contact">
                <div class="icon"><span class="ti-email"></span></div>
                <div class="text"><a href="mailto:architecture@bauen.com">architecture@bauen.com</a></div>
            </div>
        </div>

    </div>
</div>
