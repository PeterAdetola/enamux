@extends('frontend.main_master')
@section('main')

    @php
        use App\Helpers\ProjectGalleryParser;

        // Get the project slug from route parameter
        $projectSlug = request()->route('slug') ?? '042_arena';

        // Parse the project markdown
        $project = new ProjectGalleryParser($projectSlug);
        $project->parse();

        // Get all projects for navigation
        $allProjects = getProjects();

        // Find current project index
        $currentIndex = null;
        foreach ($allProjects as $index => $proj) {
            if ($proj['slug'] === $projectSlug) {
                $currentIndex = $index;
                break;
            }
        }

        // Get prev and next projects
        $prevProject = null;
        $nextProject = null;

        if ($currentIndex !== null) {
            // Previous project (wrap around to last if at beginning)
            $prevIndex = $currentIndex > 0 ? $currentIndex - 1 : count($allProjects) - 1;
            $prevProject = $allProjects[$prevIndex];

            // Next project (wrap around to first if at end)
            $nextIndex = $currentIndex < count($allProjects) - 1 ? $currentIndex + 1 : 0;
            $nextProject = $allProjects[$nextIndex];
        }
    @endphp

        <!-- Project Details -->
    <section class="services section-padding2">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="section-title" style="font-size: 40px; text-transform: uppercase; letter-spacing: 10px; word-spacing: 5px; color: #fff; margin-bottom: 30px;">
                        {{ strtoupper($project->getMetadata('title')) }}
                    </h2>
                </div>
            </div>

            @if($project->getMetadata('location'))
                <div class="row">
                    <div class="col-md-12">
                        <div class="project-meta" style="margin-bottom: 40px; padding-bottom: 20px; border-bottom: 1px solid rgba(26, 43, 69, 0.1);">
                            <h6 style="font-family: 'Oswald', sans-serif; font-size: 20px; font-weight: 400; color: #c0996b; text-transform: uppercase; letter-spacing: 3px; margin-bottom: 15px;">
                                PROJECT INFORMATION
                            </h6>
                            <p style="font-family: 'Merriweather', serif; margin-bottom: 10px; color: #999;">
                                <strong style="font-family: 'Oswald', sans-serif; text-transform: uppercase; letter-spacing: 2px; color: #c0996b;">LOCATION:</strong>
                                {{ $project->getMetadata('location') }}
                            </p>
                            @if($project->getMetadata('project_type'))
                                <p style="font-family: 'Merriweather', serif; margin-bottom: 10px; color: #999;">
                                    <strong style="font-family: 'Oswald', sans-serif; text-transform: uppercase; letter-spacing: 2px; color: #c0996b;">PROJECT TYPE:</strong>
                                    {{ $project->getMetadata('project_type') }}
                                </p>
                            @endif
                            @if($project->getMetadata('capacity'))
                                <p style="font-family: 'Merriweather', serif; margin-bottom: 10px; color: #999;">
                                    <strong style="font-family: 'Oswald', sans-serif; text-transform: uppercase; letter-spacing: 2px; color: #c0996b;">CAPACITY:</strong>
                                    {{ $project->getMetadata('capacity') }}
                                </p>
                            @endif
                            @if($project->getMetadata('client'))
                                <p style="font-family: 'Merriweather', serif; margin-bottom: 10px; color: #999;">
                                    <strong style="font-family: 'Oswald', sans-serif; text-transform: uppercase; letter-spacing: 2px; color: #c0996b;">CLIENT:</strong>
                                    {{ $project->getMetadata('client') }}
                                </p>
                            @endif
                        </div>
                    </div>
                </div>
            @endif

            <!-- Project Description -->
            <div class="row">
                <div class="col-md-12">
                    <div class="project-content" style="font-family: 'Merriweather', serif; line-height: 1.8; color: #999;">
                        {!! $project->getContent() !!}
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Gallery Section with Dark Background -->
    <section class="section-padding" style="background-color: #253855;">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="section-title" style="font-size: 40px; text-transform: uppercase; letter-spacing: 10px; word-spacing: 5px; color: #fff; margin-bottom: 50px;">
                        PROJECT <span style="color: #c0996b;">GALLERY</span>
                    </h2>
                </div>
            </div>

            {!! $project->generateGalleryHtmlWithSections() !!}
        </div>
    </section>

    <!-- Prev-Next Projects -->
    <section class="projects-prev-next">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="d-sm-flex align-items-center justify-content-between">
                        @if($prevProject)
                            <div class="projects-prev-next-left">
                                <a href="{{ route('projects.show', $prevProject['slug']) }}" title="{{ $prevProject['title'] }}">
                                    <i class="ti-arrow-left"></i> Previous Project</a>
                            </div>
                        @else
                            <div class="projects-prev-next-left">
                                <!-- Empty div to maintain spacing -->
                            </div>
                        @endif
                        <a href="{{ route('projects.page') }}" title="View All Projects"><i class="ti-layout-grid3-alt"></i></a>
                        @if($nextProject)
                            <div class="projects-prev-next-right"> <a href="{{ route('projects.show', $nextProject['slug']) }}" title="{{ $nextProject['title'] }}">Next Project <i class="ti-arrow-right"></i></a> </div>
                        @else
                            <div class="projects-prev-next-right">
                                <!-- Empty div to maintain spacing -->
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

@push('scripts')
    <style>
        /* Project Content Typography - Following Brand Guidelines */

        .project-content {
            font-family: 'Merriweather', serif;
            font-size: 15px;
            line-height: 1.7em;
            color: #999;
        }

        /* H2 in content - Standard Section Title style */
        .project-content h2 {
            font-family: 'Oswald', sans-serif;
            font-size: 30px;
            font-weight: 400;
            text-transform: uppercase;
            letter-spacing: 5px;
            color: #fff !important;
            margin-top: 40px;
            margin-bottom: 20px;
            line-height: 1.25em;
        }

        /* H3 in content - Secondary heading with gold accent */
        .project-content h3 {
            font-family: 'Oswald', sans-serif;
            font-size: 25px;
            font-weight: 400;
            text-transform: uppercase;
            letter-spacing: 3px;
            color: #c0996b !important;
            margin-top: 30px;
            margin-bottom: 15px;
            line-height: 1.25em;
        }

        /* H4 in content */
        .project-content h4 {
            font-family: 'Oswald', sans-serif;
            font-size: 20px;
            font-weight: 400;
            text-transform: uppercase;
            letter-spacing: 3px;
            color: #fff !important;
            margin-top: 25px;
            margin-bottom: 15px;
            line-height: 1.25em;
        }

        /* H5 in content */
        .project-content h5 {
            font-family: 'Oswald', sans-serif;
            font-size: 17px;
            font-weight: 400;
            text-transform: uppercase;
            letter-spacing: 2px;
            color: #c0996b !important;
            margin-top: 20px;
            margin-bottom: 10px;
            line-height: 1.25em;
        }

        /* H6 in content */
        .project-content h6 {
            font-family: 'Oswald', sans-serif;
            font-size: 20px;
            font-weight: 400;
            text-transform: uppercase;
            letter-spacing: 2px;
            color: #c0996b !important;
            margin-top: 20px;
            margin-bottom: 10px;
            line-height: 1.25em;
        }

        /* Paragraphs */
        .project-content p {
            color: #999 !important;
            margin-bottom: 20px;
            font-family: 'Merriweather', serif;
            font-size: 15px;
            line-height: 1.7em;
        }

        /* Strong/Bold text - gold accent */
        .project-content strong {
            color: #c0996b !important;
            font-weight: 600;
        }

        /* Lists */
        .project-content ul,
        .project-content ol {
            color: #999;
            margin-bottom: 20px;
            padding-left: 30px;
        }

        .project-content li {
            margin-bottom: 10px;
            line-height: 1.7em;
        }

        /* Links */
        .project-content a {
            color: #c0996b;
            text-decoration: underline;
        }

        .project-content a:hover {
            color: #fff;
        }

        /* Blockquotes */
        .project-content blockquote {
            border-left: 3px solid #c0996b;
            padding-left: 20px;
            margin: 30px 0;
            color: #999;
            font-style: italic;
        }

        /* Responsive Typography */
        @media (max-width: 768px) {
            .project-content h2 {
                font-size: 24px !important;
                letter-spacing: 3px !important;
            }

            .project-content h3 {
                font-size: 20px !important;
                letter-spacing: 2px !important;
            }

            .project-content h4 {
                font-size: 18px !important;
                letter-spacing: 2px !important;
            }

            .project-content h5,
            .project-content h6 {
                font-size: 16px !important;
                letter-spacing: 1px !important;
            }
        }
    </style>
    <script>
        // Initialize your image zoom/lightbox plugin here
        // Example: $('.img-zoom').magnificPopup({type: 'image'});
    </script>
@endpush
