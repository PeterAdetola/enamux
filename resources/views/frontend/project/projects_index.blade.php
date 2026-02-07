@extends('frontend.main_master')
@section('main')

    <!-- Projects Section -->
    <section class="services section-padding2">
        <div class="container">
            <div class="row">
                <div class="col-md-12 animate-box" data-animate-effect="fadeInUp">
                    <h2 class="section-title">OUR <span>PROJECTS</span></h2>
                </div>
            </div>
            <div class="row">
                @foreach($projects as $project)
                    <div class="col-md-4" style="margin-bottom: 30px;">
                        <div class="services3" style="height: 100%; display: flex; flex-direction: column;">
                            <div class="services3-img-area">
                                <img src="{{ asset('frontend/assets/img/icons/Artboard-1.png') }}" alt="{{ $project['title'] }}">
                            </div>
                            <a href="{{ route('projects.show', $project['slug']) }}" style="flex-grow: 1; display: flex; flex-direction: column;">
                                <div class="services3-text-area" style="flex-grow: 1; display: flex; flex-direction: column;">
                                    <h4 class="services3-heading" style="min-height: 40px; display: flex; align-items: center;">{{ $project['title'] }}</h4>
                                    <p style="flex-grow: 1;">{{ $project['location'] }} @if($project['project_type']) - {{ $project['project_type'] }}@endif</p>
                                </div>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

@endsection
