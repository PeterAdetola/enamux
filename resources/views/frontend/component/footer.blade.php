
@php
$separators = ",|-|_|\n";
$smedia = App\Models\SocialMedia::all();
$contact = App\Models\Contact::limit(1)->get();
$clients = App\Models\Client::all();
$testimonials = App\Models\Testimonial::all();
@endphp
            <!-- Promo video - Testiominals -->
            <section class="testimonials">
                <div class="background bg-img bg-fixed section-padding pb-0" data-background="{{ asset('frontend/assets/img/banner2.jpg') }}" data-overlay-dark="3">
                    <div class="container">
                        <div class="row">
                            <!-- Promo video -->
                            <div class="col-md-6">
                                <div class="vid-area">
                                    <!-- <div class="vid-icon">
                                        <a class="play-button vid" href="https://youtu.be/RziCmLzpFNY">
                                            <svg class="circle-fill">
                                                <circle cx="43" cy="43" r="39" stroke="#fff" stroke-width=".5"></circle>
                                            </svg>
                                            <svg class="circle-track">
                                                <circle cx="43" cy="43" r="39" stroke="none" stroke-width="1" fill="none"></circle>
                                            </svg> <span class="polygon">
                                                <i class="ti-control-play"></i>
                                            </span> </a>
                                    </div>
                                    <div class="cont mt-15 mb-30">
                                        <h5>View promo video</h5>
                                    </div> -->
                                </div>
                            </div>
                            <!-- Testiominals -->
                            <div class="col-md-5 offset-md-1">
                                <div class="testimonials-box animate-box" data-animate-effect="fadeInUp">
                                    <div class="head-box">
                                        <h4>What Client's Say?</h4>
                                    </div>
                                    <div class="owl-carousel owl-theme">
    @if(count($testimonials) > 0)
    @foreach($testimonials as $testimonial)
                                        <div class="item"> <span class="quote">
                                        <img src="{{ asset('frontend/assets/img/quot.png') }}" alt="">
                                        </span>
                                            <p>{{ $testimonial->content }}</p>
                                            <div class="info">
          @if($testimonial->image)
                                        <div class="author-img"> <img src="{{ url($testimonial->image) }}" alt=""> </div>
          @else
                                        <div class="initial-avatar" style="margin-bottom: -3em">{{ $testimonial->initials }}</div>
          @endif
                                                <div class="cont">
                                                    <h6>{{ $testimonial->name }}</h6>
                                                    <span>{{ $testimonial->role }}</span>
                                                </div>
                                            </div>
                                        </div>
    @endforeach
    @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Clients -->
            <section class="clients">
                  <div class="container">
                    <div class="row">
                        <div class="col-md-7">
                            <div class="owl-carousel owl-theme">
    @if(count($clients) > 0)
    @foreach($clients as $client)
                                <div class="clients-logo">
                                    <a href="#!"><img src="{{ url($client->image) }}" alt="{{ $client->name }}"></a>
                                </div>
    @endforeach
    @endif
                            </div>
                        </div>
                    </div>
                  </div>
            </section>
            <!-- Footer -->
            <footer class="main-footer dark">
                <div class="container">
    @if(count($contact) > 0)
    @foreach($contact as $contact)
                    <div class="row">
                        <div class="col-md-4 mb-30">
                            <div class="item fotcont">
                                <div class="fothead">
                                    <h6>Phone</h6>
                                </div>
            @php
                $phone = $contact->phone;
                $phones = explode('<br>', $phone);
            @endphp
                            @foreach($phones as $phone)
                                <p><a href="tel:+{{ preg_replace('/\D/', '', $phone) }}">{{ strip_tags($phone) }}</a></p>
                            @endforeach
                            </div>
                        </div>
                        <div class="col-md-4 mb-30">
                            <div class="item fotcont">
                                <div class="fothead">
                                    <h6>Email</h6>
                                </div>
            @php
                $email = $contact->email;
                $emails = preg_split("#(?<=$separators)#", $email);
            @endphp
                            @foreach($emails as $email)
                                <p><a href="mailto:{{ strip_tags($email) }}">{{ strip_tags($email) }}</a></p>
                            @endforeach
                            </div>
                        </div>
                    @if($contact->address)
                        <div class="col-md-4 mb-30">
                            <div class="item fotcont">
                                <div class="fothead">
                                    <h6>Our Address</h6>
                                </div>
                                <p>{!! $contact->address !!}</p>
                            </div>
                        </div>
                    @endif
                    </div>
    @endforeach
    @endif
                </div>
                <div class="sub-footer">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="text-left">
                                    <p>© <span id="currentYear"></span> <b ><a style="color: grey;" onclick="return false" ondblclick="location=this.href" href="{{ url('login') }}">Enamux Limited.</a></b> All right reserved.</p>
                                </div>
                            </div>
                            <div class="col-md-4 abot">
                                <div class="social-icon">
    @foreach($smedia as $smedia)
        @if($smedia->name === 'Facebook')
                                    <a href="{{ $smedia->link }}"><i class="ti-facebook"></i></a>
        @elseif($smedia->name === 'LinkedIn')
                                    <a href="{{ $smedia->link }}"><i class="ti-linkedin"></i></a>
        @elseif($smedia->name === 'Instagram')
                                    <a href="{{ $smedia->link }}"><i class="ti-instagram"></i></a>
        @elseif($smedia->name === 'Twitter')
                                    <a href="{{ $smedia->link }}"><i class="ti-twitter"></i></a>
        @endif
    @endforeach
                                </div>
                            </div>
                            <div class="col-md-4">
                            <p><a href="https://thepacmedia.com/" style="text-decoration: none"> Made by Pacmedia Creatives</a></p>
                        </div>
                        </div>
                    </div>
                </div>
            </footer>
                                    <script>
                                        const currentDate = new Date();
                                        const currentYear = currentDate.getFullYear();

                                        const yearElement = document.getElementById("currentYear");
                                        yearElement.textContent = currentYear;

                                    </script>
