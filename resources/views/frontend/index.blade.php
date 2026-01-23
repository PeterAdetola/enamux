@extends('frontend.main_master')
@section('main')

@php
$abouts = App\Models\AboutSummary::all();
//$services = App\Models\Service::orderBy('order')->limit(3)->get();
$services = App\Models\Service::orderBy('order')->get();
$projects = App\Models\Project::orderBy('created_at')->get();
@endphp

        <!-- Add slider here -->

        <!-- Content -->
            <!-- --------------------------------------------- -->
            <!-- About -->
            <section class="about section-padding">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 mb-30 animate-box" data-animate-effect="fadeInUp">
                            <h2 class="section-title">About <span>us</span></h2>

            @foreach($abouts as $about)
                            <p>{!! $about->summary !!}</p>
            @endforeach
                        </div>
                        <div class="col-md-6 animate-box" data-animate-effect="fadeInUp">
                            <div class="about-img">
                                <div class="img"> <img src="{{ url($abouts->first()->image) }}" class="img-fluid" alt=""> </div>
                                <div class="about-img-2 about-buro">{{ $abouts->first()->caption }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Services -->
        @if(count($services) > 0)
            <section class="services section-padding">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h2 class="section-title">Our <span>Services</span></h2>
                        </div>
                    </div>
                    <div class="row">
            @php
            $i = 1
            @endphp
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
            @endif

            <!-- Projects -->
        @if(count($projects) > 0)
            <section class="projects section-padding">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h2 class="section-title">Our <span>Projects</span></h2>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="owl-carousel owl-theme">
            @foreach($projects as $project)
            @php
            $link = route('project_detailed.page', $project->id);
            @endphp
                                <div class="item">
                                    <div class="position-re o-hidden"> <img src="{{ url($project->image) }}" alt="{{ $project->name }}"> </div>
                                    <div class="con">
                                        <h6><a href="{{ ($project->details)? $link : '#!' }}">{{ $project->category }}</a></h6>
                                        <h5><a href="{{ ($project->details)? $link : '#!' }}">{{ $project->name }}</a></h5>
                                        <div class="line"></div>
                                        <a href="{{ ($project->details)? $link : '#!' }}"><i class="ti-arrow-right"></i></a>
                                    </div>
                                </div>
            @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            @endif

<!-- Process -->
<section class="process section-padding2">
    <div class="container">
        <div class="row">
            <div class="col-md-12 animate-box" data-animate-effect="fadeInUp">
                <h2 class="section-title">Work <span>Process</span></h2>
            </div>
        </div>
        <div class="row text-center mt-60 mb-60">
            <div class="col-md-3">
                <div class="item first"> <img src="img/arrow.png" class="tobotm" alt=""> <span class="icon ti-thought"></span>
                    <div class="cont">
                        <h6>Client Consultation</h6>
                        <div class="line"></div>
                        <p>We conduct comprehensive project assessment, understand client requirements, evaluate site conditions, and establish project scope, budget, and timeline expectations.</p>
                        <h3>01</h3>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="item odd mb-md50"> <img src="img/arrow.png" alt=""> <span class="icon ti-direction-alt"></span>
                    <div class="cont">
                        <h3>02</h3>
                        <h6>Feasibility Study</h6>
                        <div class="line"></div>
                        <p>Our engineers perform technical analysis, geotechnical investigations, cost-benefit studies, and preliminary design to determine project viability and optimal solutions.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="item"> <img src="img/arrow.png" class="tobotm" alt=""> <span class="icon ti-ruler-pencil"></span>
                    <div class="cont">
                        <h3>03</h3>
                        <h6>Detailed Design</h6>
                        <div class="line"></div>
                        <p>We develop comprehensive structural calculations, architectural drawings, specifications, and tender documents using advanced software like AutoCAD, STAADPro, and Civil 3D.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="item odd"> <span class="icon ti-tag"></span>
                    <div class="cont">
                        <h3>04</h3>
                        <h6>Construction Supervision</h6>
                        <div class="line"></div>
                        <p>Our team provides on-site supervision, quality control testing, progress monitoring, contractor coordination, and project management ensuring timely delivery within budget.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
            <!-- --------------------------------------------- -->

            <!-- Footer Here -->

    @endsection


