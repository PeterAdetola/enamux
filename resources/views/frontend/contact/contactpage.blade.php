@extends('frontend.main_master')
@section('main')
@php
$contact = App\Models\Contact::limit(1)->get();
$separators = ",|-|_|\n";
if (Session::has('message') ) {
    $msg = Session::get('message');
} else {
    $msg = 'Message not sent';
}
@endphp

            <!-- Contact -->
            <section class="section-padding2">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 animate-box" data-animate-effect="fadeInUp">
                            <h2 class="section-title">Contact <span>Us</span></h2>
                        </div>
                    </div>
                    <div class="row mb-90">
                        <div class="col-md-4 mb-30 animate-box" data-animate-effect="fadeInUp">
                            <p><b>Enamux Limited</b></p>
                            <p>For strong and the state of the art structures in your residence, environment and even interior, we got you always</p>
                            <!-- <p>@php echo $msg @endphp</p> -->
                        </div>
    @if(count($contact) > 0)
                        <div class="col-md-4 mb-30 animate-box" data-animate-effect="fadeInUp">
    @foreach($contact as $contact)
                            <p><b>Contact Details</b></p>
            @php
                $phone = $contact->phone;
                $phones = explode('<br>', $phone);
                $i = 1;
            @endphp
                            <p>
                            @foreach($phones as $phone)
                                <b>Phone {{$i++}}:</b>&nbsp;&nbsp;<a href="tel:+{{ preg_replace('/\D/', '', $phone) }}">{{ strip_tags($phone) }}</a><br>
                            @endforeach
                            </p>
            @php
                $email = $contact->email;
                $emails = preg_split("#(?<=$separators)#", $email);
                $i = 1;
            @endphp
                            <p>
                        @foreach($emails as $email)
                            <b>Email {{$i++}}:</b>&nbsp;&nbsp;<a href="mailto:{{ strip_tags($email) }}">{{ strip_tags($email) }}</a><br>
                        @endforeach
                            </p>
                    @if($contact->address)
                            <p><b>Address :</b>&nbsp;&nbsp; {{ $contact->address }}</p>
                    @endif
    @endforeach
                        </div>
    @endif
                        <div class="col-md-4 animate-box" data-animate-effect="fadeInUp">
                            <p><b>Contact Form</b></p>

                            <form method="post" class="contact__form" action="{{ route('send.enquiry') }}">
                            @csrf
                            <!-- Form message -->
                    <div class="row">
                        <div class="col-12">
                            <div id="msg" class="alert alert-success contact__msg" style="display: none;" role="alert">
                                {{ $msg }}
                            </div>
                        </div>
                    </div>
                            <!-- Form elements -->
                            <div class="row">
                                <div class="col-md-12 form-group">
                                    <input name="name" type="text" placeholder="Your Name *" required>
                                </div>
                                <div class="col-md-6 form-group">
                                    <input name="email" type="email" placeholder="Your Email *" required>
                                </div>
                                <div class="col-md-6 form-group">
                                    <input name="phone" type="text" placeholder="Your Number *" required>
                                </div>
                                <div class="col-md-12 form-group">
                                    <input name="subject" type="text" placeholder="Subject *" required>
                                </div>
                                <div class="col-md-12 form-group">
                                    <textarea name="message" id="message" cols="30" rows="4" placeholder="Message *" required></textarea>
                                </div>
                                <div class="col-md-12">
                                    <input name="submit" type="submit"  value="Send Message">
                                </div>
                            </div>
                        </form>
                        </div>
                    </div>
                    <!-- Map Section -->
                    <!-- <div class="row">
                        <div class="col-md-12 mb-30 animate-box" data-animate-effect="fadeInUp">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d13419.040333881774!2d-79.93218134282569!3d32.77209999120473!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x88fe7a1ae84ff639%3A0xe5c782f71924a526!2s24%20King%20St%2C%20Charleston%2C%20SC%2029401%2C%20Amerika%20Birle%C5%9Fik%20Devletleri!5e0!3m2!1str!2str!4v1635894790855!5m2!1str!2str" width="100%" height="500" style="border:0;" allowfullscreen="" loading="lazy" class="map"></iframe>
                        </div>
                    </div> -->
                </div>
            </section>
<script>
@if(Session::has('message'))
  document.getElementById("msg").style.display = "block";
@endif
</script>
@endsection
