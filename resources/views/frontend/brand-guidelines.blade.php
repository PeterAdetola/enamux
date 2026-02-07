{{-- resources/views/brand/guidelines.blade.php --}}
@extends('frontend.main_master')

@section('title', 'Brand Guidelines | Enamux')

@section('content')

    <section class="section-padding">
        <div class="container">

            {{-- Page Header --}}
            <header class="text-center mb-90">
                <h1 class="text-uppercase" style="letter-spacing:15px;">
                    Brand Guidelines
                </h1>
                <p class="mt-30">
                    Official brand assets and usage rules for Enamux.
                </p>
            </header>

            {{-- Logo Section --}}
            <section class="mb-90">
                <h2 class="text-uppercase mb-40" style="letter-spacing:10px;">Logo</h2>

                <p class="mb-40">
                    Use the official Enamux logo files provided below. Always use the SVG version when possible.
                </p>

                <div class="row g-40">

                    {{-- Primary Logos --}}
                    <div class="col-md-6">
                        <h4 class="mb-20">Primary Logo</h4>

                        <img src="{{ asset('uploads/brand/logofiles/png/logo/Artboard-1.png') }}"
                             alt="Enamux Logo"
                             style="max-width:300px;"
                             class="mb-20">

                        <div class="d-flex gap-20">
                            <a href="{{ asset('uploads/brand/logofiles/svg/logo_svg/Artboard-1.svg') }}" download class="btn">
                                Download SVG
                            </a>
                            <a href="{{ asset('uploads/brand/logofiles/png/logo/Artboard-1.png') }}" download class="btn">
                                Download PNG
                            </a>
                        </div>
                    </div>

                    {{-- Icon Logos --}}
                    <div class="col-md-6">
                        <h4 class="mb-20">Icon Mark</h4>

                        <img src="{{ asset('uploads/brand/logofiles/png/icon/Artboard-4.png') }}"
                             alt="Enamux Icon"
                             style="max-width:120px;"
                             class="mb-20">

                        <div class="d-flex gap-20">
                            <a href="{{ asset('uploads/brand/logofiles/svg/icon_svg/Artboard-4.svg') }}" download class="btn">
                                Download SVG
                            </a>
                            <a href="{{ asset('uploads/brand/logofiles/png/icon/Artboard-4.png') }}" download class="btn">
                                Download PNG
                            </a>
                        </div>
                    </div>

                </div>
            </section>

            {{-- Color Palette --}}
            <section class="mb-90">
                <h2 class="text-uppercase mb-40" style="letter-spacing:10px;">Color Palette</h2>

                <div class="row g-30">

                    @php
                        $colors = [
                            ['name' => 'Primary Background', 'hex' => '#1A2B45'],
                            ['name' => 'Accent Gold', 'hex' => '#C0996B'],
                            ['name' => 'Secondary Background', 'hex' => '#253855'],
                            ['name' => 'Primary Text', 'hex' => '#999999'],
                            ['name' => 'Heading Text', 'hex' => '#FFFFFF'],
                        ];
                    @endphp

                    @foreach($colors as $color)
                        <div class="col-md-4">
                            <div style="background:{{ $color['hex'] }}; height:120px; border-radius:4px;"></div>
                            <h5 class="mt-15">{{ $color['name'] }}</h5>
                            <p class="mb-0">{{ $color['hex'] }}</p>
                        </div>
                    @endforeach

                </div>
            </section>

            {{-- Typography --}}
            <section class="mb-90">
                <h2 class="text-uppercase mb-40" style="letter-spacing:10px;">Typography</h2>

                <div class="mb-50">
                    <h3>Oswald — Headings & UI</h3>
                    <p>Used for headlines, buttons, navigation and counters.</p>

                    <h1>Heading One</h1>
                    <h2>Heading Two</h2>
                    <h3>Heading Three</h3>
                </div>

                <div>
                    <h3>Merriweather — Body Text</h3>
                    <p>
                        Enamux delivers structured, reliable, and forward-thinking digital engineering solutions.
                        Typography is designed for clarity, hierarchy, and long-form readability.
                    </p>
                </div>
            </section>

            {{-- UI Elements --}}
            <section>
                <h2 class="text-uppercase mb-40" style="letter-spacing:10px;">UI Elements</h2>

                <div class="mb-40">
                    <h4>Buttons</h4>
                    <a href="#" class="btn">Primary Button</a>
                </div>

                <div class="mb-40">
                    <h4>Form Input</h4>
                    <input type="text" placeholder="Sample input" class="form-control">
                </div>

                <div>
                    <h4>Blockquote</h4>
                    <blockquote>
                        Engineering brands should feel as structured as the systems they build.
                        <cite>Enamux</cite>
                    </blockquote>
                </div>
            </section>

        </div>
    </section>

@endsection
