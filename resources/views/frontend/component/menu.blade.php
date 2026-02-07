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
                <li class="{{ ($route == 'projects.page' || $route == 'project_detailed.page')? 'active' : '' }}"><a href='{{ route('projects.page') }}'>Projects </a> </li>


                <li class="{{ ($route == 'contact.page')? 'active' : '' }}"><a href="{{ route('contact.page') }}">Contact</a></li>
            </ul>
        </nav>

        <div class="bauen-menu-footer">
            <div class="contact">
                <div class="icon"><span class="ti-mobile"></span></div>
                <div class="text"><a href="tel:+2348131363181">+234 813 136 3181</a></div>
            </div>
            <div class="contact">
                <div class="icon"><span class="ti-email"></span></div>
                <div class="text"><a href="mailto:info@enamux.com">info@enamux.com</a></div>
            </div>
        </div>

    </div>
</div>
