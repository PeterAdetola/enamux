@extends('frontend.main_master')
@section('main')

@php
$projects = App\Models\Project::orderBy('order', 'desc')->get();
@endphp
            <!-- Projects -->
            <section class="projects section-padding2">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 animate-box" data-animate-effect="fadeInUp">
                            <h2 class="section-title">Our <span>Projects</span></h2>
                        </div>
                    </div>
                    <div class="row">

            @foreach($projects as $project)
            @php
            $link = route('project_detailed.page', $project->id);
            @endphp
                        <div class="col-md-6 animate-box" data-animate-effect="fadeInUp">
                            <div class="item">
                                <div class="position-re o-hidden"> <img src="{{ url($project->image) }}" alt="{{ $project->name }}"> </div>
                                <div class="con">
                @if($project->details)
                                    <h6><a href="{{ route('project_detailed.page', $project->id) }}">{{ $project->category }}</a></h6>
                                    <h5><a href="{{ route('project_detailed.page', $project->id) }}">{{ $project->name }}</a></h5>
                                    <div class="line"></div> 
                                    <a href="{{ route('project_detailed.page', $project->id) }}"><i class="ti-arrow-right"></i></a>
                @else
                                    <h6>{{ $project->category }}</h6>
                                    <h5>{{ $project->name }}</h5>
                                    <div class="line"></div> 
                                    <i class="ti-arrow-right"></i>
                @endif
                                </div>
                            </div>
                        </div>
            @endforeach

                    </div>
                </div>
            </section>

    @endsection