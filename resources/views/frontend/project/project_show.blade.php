@extends('frontend.main_master')
@section('main')

    @php
        use App\Helpers\ProjectGalleryParser;

        // Get the project slug from route parameter
        $projectSlug = request()->route('slug') ?? '042_arena';

        // Parse the project markdown
        $project = new ProjectGalleryParser($projectSlug);
        $project->parse();
    @endphp

        <!-- Project Header -->
    <section class="section-padding2">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="section-title"><span>{{ $project->getMetadata('title') }}</span></h2>
                </div>
            </div>

            @if($project->getMetadata('location'))
                <div class="row mb-3">
                    <div class="col-md-12">
                        <p><strong>Location:</strong> {{ $project->getMetadata('location') }}</p>
                        @if($project->getMetadata('capacity'))
                            <p><strong>Capacity:</strong> {{ $project->getMetadata('capacity') }}</p>
                        @endif
                    </div>
                </div>
            @endif

            <!-- Project Content/Description -->
            <div class="row">
                <div class="col-md-12">
                    {!! $project->getContent() !!}
                </div>
            </div>
        </div>
    </section>

    <!-- Gallery Section -->
    <section class="section-padding2 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="section-title"><span>Project Gallery</span></h2>
                </div>
            </div>

            <div class="row">
                {!! $project->generateGalleryHtml() !!}
            </div>
        </div>
    </section>

@endsection

@push('scripts')
    <script>
        // Initialize your image zoom/lightbox plugin here
        // Example: $('.img-zoom').magnificPopup({type: 'image'});
    </script>
@endpush
