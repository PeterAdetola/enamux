@extends('frontend.main_master')
@section('main')

@php
$services = App\Models\Service::all()->sortBy('order');
            $i = 1
@endphp
            <!-- Services -->
            <section class="services section-padding2">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 animate-box" data-animate-effect="fadeInUp">
                            <h2 class="section-title">Our <span>Services</span></h2>
                        </div>
                    </div>
                    <div class="row">

            @foreach($services as $service)
                        <div class="col-md-4">
                            <div class="item">
                            @if($service->details)
                                <a href="{{ route('service_detailed.page', $service->id) }}"> <img src="{{ url($service->image) }}" alt="">
                                    <h5>{{ $service->name }}</h5>
                                    <div class="line"></div>
                                    <p>{{ $service->summary }}</p>
                                    <div class="numb">0{{ $i++ }}</div>
                                </a>
                            @else
                                    <img src="{{ url($service->image) }}" alt="">
                                    <h5>{{ $service->name }}</h5>
                                    <div class="line"></div>
                                    <p>{{ $service->summary }}</p>
                                    <div class="numb">0{{ $i++ }}</div>
                            @endif
                            </div>
                        </div>
            @endforeach
                    </div>
                </div>
            </section>

    @endsection
