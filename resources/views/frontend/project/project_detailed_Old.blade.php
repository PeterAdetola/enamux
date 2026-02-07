@extends('frontend.main_master')
@section('main')

            <!-- Projects Page -->
            <section class="section-padding2">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h2 class="section-title2">{{ $project->name }}</h2>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-8">
                            <p>{!! $project->details !!}</p>
                        </div>
                        <div class="col-md-4">
    @if ($project->year)<p><b>Year : </b> {{ $project->year }}</p>@endif
                            <!-- <p><b>Company : </b> WPS International</p> -->
                            <p><b>Project Name : </b> {{ $project->name }}</p>
    @if ($project->location)<p><b>Location : </b> {{ $project->location }}</p>@endif
                        </div>
                    </div>
    @if ($projectImages->count() > 0) 
             
                    <div class="row mt-30">
      @foreach ($projectImages as $projectImage)
                        <div class="col-md-6 gallery-item">
                            <a href="{{ url($projectImage->image) }}" title="{{ $project->title }}" class="img-zoom">
                                <div class="gallery-box">
                                    <div class="gallery-img"> <img src="{{ url($projectImage->image) }}" class="img-fluid mx-auto d-block" alt="work-img"> </div>
                                </div>
                            </a>
                        </div>
      @endforeach
                    </div>

    @else 


    <div class="row mb-30">

        <div class="col-md-8 gallery-item">
            <a href="{{ url($project->image) }}" title="{{ $project->name }}" class="img-zoom">
                <div class="gallery-box">
                    <div class="gallery-img"> <img src="{{ url($project->image) }}" class="img-fluid mx-auto d-block" alt="work-img"> </div>
                </div>
            </a>
        </div>
        
    </div>            

    @endif
                </div>
            </section>

            <!-- Prev-Next Projects -->
            <section class="projects-prev-next">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="d-sm-flex align-items-center justify-content-between">
                                <div class="projects-prev-next-left">
                                    @if($previousProject)
                                    <a href="{{ route('project_detailed.page', $previousProject) }}"> <i class="ti-arrow-left"></i> Previous Project</a>
                                    @else
                                    <span style="color: grey;"> <i class="ti-arrow-left"></i> Previous Project</span>                                    
                                    @endif
                                </div> <a href="{{ route('projects.page') }}"><i class="ti-layout-grid3-alt"></i></a>
                                <div class="projects-prev-next-right"> 
                                    @if($nextProject)
                                    <a href="{{ route('project_detailed.page', $nextProject) }}">Next Project <i class="ti-arrow-right"></i></a> 
                                    @else
                                    <span style="color: grey;"> Next Project <i class="ti-arrow-right"></i></span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

    @endsection