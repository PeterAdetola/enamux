@extends('frontend.main_master')
@section('main')

    <style>
        /* ============================================================
           BRAND GUIDELINES — SCOPED MOBILE & POLISH STYLES
           These layer on top of style.css without touching it.
           ============================================================ */

        /* ---------- shared helpers ---------- */
        .bg-section {
            background: #253855;
        }

        /* ---------- section titles on mobile ---------- */
        @media (max-width: 767px) {
            .section-title {
                font-size: 26px !important;
                letter-spacing: 4px !important;
                margin-bottom: 20px !important;
            }
        }

        /* ============================================================
           LOGO SECTION
           ============================================================ */

        /* Logo card wrapper — gives each logo a contained card feel */
        .logo-card {
            background: #253855;
            border: 1px solid #253855;
            border-radius: 4px;
            padding: 30px 25px 25px;
            transition: border-color 0.3s;
            height: 100%;
        }

        .logo-card:hover {
            border-color: #c0996b;
        }

        .logo-card h5 {
            font-family: 'Oswald', sans-serif;
            font-size: 16px;
            font-weight: 300;
            color: #fff;
            text-transform: uppercase;
            letter-spacing: 3px;
            margin-bottom: 20px;
        }

        /* Preview strip — neutral surface behind the logo image */
        .logo-preview-strip {
            background: rgba(255, 255, 255, 0.04);
            border: 1px solid rgba(255, 255, 255, 0.08);
            border-radius: 3px;
            padding: 28px 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 140px;
            margin-bottom: 22px;
        }

        .logo-preview-strip img {
            max-width: 100%;
            height: auto;
            max-height: 100px;
        }

        /* Download buttons row */
        .logo-downloads {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }

        .logo-downloads .btn {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            font-family: 'Oswald', sans-serif;
            font-size: 13px;
            font-weight: 300;
            letter-spacing: 2px;
            text-transform: uppercase;
            color: #fff;
            background: #c0996b;
            border: none;
            border-radius: 3px;
            padding: 10px 20px;
            text-decoration: none;
            transition: background 0.3s;
            cursor: pointer;
        }

        .logo-downloads .btn:hover {
            background: #1b2c45;
            border: 1px solid #c0996b;
        }

        /* Mobile: stack the two logo cards, full width each */
        @media (max-width: 767px) {
            .logo-card {
                margin-bottom: 24px;
            }

            .logo-preview-strip {
                min-height: 120px;
                padding: 22px 16px;
            }

            .logo-preview-strip img {
                max-height: 80px;
            }
        }

        /* ============================================================
           COLOR PALETTE
           ============================================================ */

        .color-card {
            background: #bcbfc5;
            padding: 20px;
            border-radius: 4px;
            margin-bottom: 24px;
        }

        .color-swatch {
            height: 120px;
            border-radius: 2px;
            margin-bottom: 15px;
        }

        .color-card h6 {
            font-family: 'Oswald', sans-serif;
            font-size: 15px;
            font-weight: 300;
            color: #1b2c45;
            text-transform: uppercase;
            letter-spacing: 2px;
            margin-bottom: 6px;
        }

        .color-card p {
            font-family: 'Merriweather', serif;
            font-size: 14px;
            color: #3a3a3a;
            margin-bottom: 0;
        }

        /* Mobile: 2-column grid, fall back to 1 on very small screens */
        @media (max-width: 767px) {
            .color-row {
                display: grid;
                grid-template-columns: 1fr 1fr;
                gap: 16px;
            }

            .color-row .col-md-4 {
                padding: 0 !important;
            }

            .color-card {
                margin-bottom: 0;
            }

            .color-swatch {
                height: 90px;
            }

            .color-card h6 {
                font-size: 13px;
            }

            .color-card p {
                font-size: 13px;
            }
        }

        @media (max-width: 380px) {
            .color-row {
                grid-template-columns: 1fr;
            }
        }

        /* ============================================================
           TYPOGRAPHY
           ============================================================ */

        .type-card {
            background: #253855;
            border: 1px solid #253855;
            border-radius: 4px;
            padding: 30px 25px;
            margin-bottom: 30px;
            transition: border-color 0.3s;
        }

        .type-card:hover {
            border-color: #c0996b;
        }

        .type-card h4 {
            color: #c0996b;
            margin-bottom: 12px;
            font-size: 18px;
        }

        .type-card > p {
            color: #999;
            font-size: 15px;
            margin-bottom: 22px;
        }

        /* Alphabet & numeral rows */
        .type-alphabet {
            color: #fff;
            margin-bottom: 12px;
            line-height: 1.8;
            word-break: break-word;
        }

        .type-numerals {
            color: #c0996b;
            margin-bottom: 24px;
            line-height: 1.8;
        }

        /* Weight scale label */
        .type-card h6 {
            font-family: 'Oswald', sans-serif;
            font-size: 13px;
            color: #c0996b;
            letter-spacing: 3px;
            text-transform: uppercase;
            margin-bottom: 12px;
        }

        /* Individual weight rows */
        .weight-row {
            color: #fff;
            padding: 6px 0;
            border-bottom: 1px solid rgba(255, 255, 255, 0.06);
            font-size: 16px;
        }

        .weight-row:last-child {
            border-bottom: none;
        }

        .weight-label {
            display: inline-block;
            font-size: 11px;
            color: #999;
            letter-spacing: 1px;
            margin-left: 12px;
            vertical-align: middle;
        }

        /* Mobile typography tweaks */
        @media (max-width: 767px) {
            .type-card {
                padding: 24px 18px;
            }

            .type-card h4 {
                font-size: 16px;
            }

            .type-alphabet {
                font-size: 15px !important;
                letter-spacing: 4px !important;
            }

            .type-numerals {
                font-size: 15px !important;
                letter-spacing: 4px !important;
            }

            .weight-row {
                font-size: 15px;
            }
        }

        /* ============================================================
           ACCESSIBILITY
           ============================================================ */

        .access-list {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .access-list li {
            position: relative;
            padding: 14px 0 14px 28px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.07);
            color: #999;
            font-size: 15px;
            line-height: 1.6;
        }

        .access-list li:last-child {
            border-bottom: none;
        }

        .access-list li::before {
            content: '';
            position: absolute;
            left: 0;
            top: 22px;
            width: 10px;
            height: 10px;
            border-radius: 50%;
            background: #c0996b;
        }

        @media (max-width: 767px) {
            .access-list li {
                font-size: 14px;
                padding-left: 22px;
            }

            .access-list li::before {
                width: 8px;
                height: 8px;
                top: 20px;
            }
        }

        /* ============================================================
           UI ELEMENTS
           ============================================================ */

        .ui-card {
            background: #253855;
            border: 1px solid #253855;
            border-radius: 4px;
            padding: 28px 22px;
            margin-bottom: 24px;
            transition: border-color 0.3s;
        }

        .ui-card:hover {
            border-color: #c0996b;
        }

        .ui-card h6 {
            font-family: 'Oswald', sans-serif;
            font-size: 13px;
            color: #c0996b;
            letter-spacing: 3px;
            text-transform: uppercase;
            margin-bottom: 18px;
        }

        /* Primary button */
        .ui-card .button {
            display: inline-block;
            font-family: 'Oswald', sans-serif;
            font-size: 14px;
            font-weight: 300;
            letter-spacing: 3px;
            text-transform: uppercase;
            color: #fff;
            background: #c0996b;
            padding: 12px 28px;
            border-radius: 3px;
            text-decoration: none;
            transition: background 0.3s;
            min-height: 44px;
            line-height: 1.4;
        }

        .ui-card .button:hover {
            background: #1b2c45;
            border: 1px solid #c0996b;
        }

        /* Form input override */
        .ui-card .form-control {
            background: #1b2c45;
            border: 1px solid #373737;
            border-radius: 3px;
            color: #999;
            font-family: 'Merriweather', serif;
            font-size: 15px;
            padding: 12px 16px;
            width: 100%;
            min-height: 44px;
            outline: none;
            transition: border-color 0.3s;
        }

        .ui-card .form-control:focus {
            border-color: #c0996b;
        }

        .ui-card .form-control::placeholder {
            color: #555;
        }

        /* Blockquote reset inside card */
        .ui-card blockquote {
            background: #1b2c45;
            padding: 22px 20px;
            margin: 0;
            border-radius: 3px;
            font-size: 14px;
            line-height: 1.7;
            color: #999;
        }

        .ui-card blockquote p {
            margin-bottom: 0;
            font-size: 14px;
        }

        .ui-card blockquote cite {
            display: block;
            margin-top: 12px;
            padding-left: 0;
            font-size: 12px;
            color: #c0996b;
            letter-spacing: 2px;
            text-transform: uppercase;
        }

        .ui-card blockquote cite::before {
            display: none;
        }

        /* Mobile: stack UI cards full width */
        @media (max-width: 767px) {
            .ui-card {
                padding: 22px 18px;
            }

            .ui-card .button {
                width: 100%;
                text-align: center;
                min-height: 48px;
            }

            .ui-card .form-control {
                min-height: 48px;
            }
        }
    </style>

    <!-- Brand Guidelines Hero -->
    <section class="about section-padding2">
        <div class="container">
            <div class="row">
                <div class="col-md-12 mb-30 animate-box" data-animate-effect="fadeInUp">
                    <h2 class="section-title">Brand <span>Guidelines</span></h2>
                    <p>
                        This page provides official Enamux brand assets and usage rules.
                        All designers, developers, and partners should follow these standards.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Logo Section -->
    <section class="section-padding">
        <div class="container">
            <div class="row">

                <div class="col-md-12 mb-30">
                    <h2 class="section-title">Logo <span>Usage</span></h2>
                    <p>
                        Always use the SVG logo when possible. Do not stretch, rotate,
                        recolor, or apply effects to the logo.
                    </p>
                </div>

                <!-- Primary Logo -->
                <div class="col-md-6 animate-box" data-animate-effect="fadeInUp">
                    <div class="logo-card">
                        <h5>Primary Logo</h5>

                        <div class="logo-preview-strip">
                            <img src="{{ asset('uploads/brand/logofiles/svg/logo_svg/Artboard-2.svg') }}"
                                 alt="Enamux Logo">
                        </div>

                        <div class="logo-downloads">
                            <a href="{{ asset('uploads/brand/logofiles/svg/logo_svg/Artboard-2.svg') }}"
                               download="Enamux-Logo.svg"
                               class="btn">
                                ↓ SVG
                            </a>
                            <a href="{{ asset('uploads/brand/logofiles/png/logo/Artboard-2.png') }}"
                               download
                               class="btn">
                                ↓ PNG
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Icon Logo -->
                <div class="col-md-6 animate-box" data-animate-effect="fadeInUp">
                    <div class="logo-card">
                        <h5>Icon Mark</h5>

                        <div class="logo-preview-strip">
                            <img src="{{ asset('uploads/brand/logofiles/svg/icon_svg/Artboard-5.svg') }}"
                                 alt="Enamux Icon">
                        </div>

                        <div class="logo-downloads">
                            <a href="{{ asset('uploads/brand/logofiles/svg/icon_svg/Artboard-5.svg') }}"
                               download="Enamux-Icon.svg"
                               class="btn">
                                ↓ SVG
                            </a>
                            <a href="{{ asset('uploads/brand/logofiles/png/icon/Artboard-5.png') }}"
                               download
                               class="btn">
                                ↓ PNG
                            </a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>


    <!-- Color Palette -->
    <section class="section-padding">
        <div class="container">
            <div class="row">

                <div class="col-md-12 mb-30">
                    <h2 class="section-title">Color <span>Palette</span></h2>
                    <p>
                        The Enamux color system balances deep architectural blues
                        with refined gold accents.
                    </p>
                </div>

                <div class="col-md-12 color-row">

                    <div class="col-md-4">
                        <div class="color-card">
                            <div class="color-swatch" style="background:#1A2B45;"></div>
                            <h6>Primary Background</h6>
                            <p>#1A2B45</p>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="color-card">
                            <div class="color-swatch" style="background:#C0996B;"></div>
                            <h6>Accent Gold</h6>
                            <p>#C0996B</p>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="color-card">
                            <div class="color-swatch" style="background:#253855;"></div>
                            <h6>Secondary Background</h6>
                            <p>#253855</p>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </section>


    <!-- Typography -->
    <section class="section-padding">
        <div class="container">
            <div class="row">

                <div class="col-md-12 mb-30">
                    <h2 class="section-title">Typography <span>System</span></h2>
                    <p>
                        Enamux typography is intentionally structured and engineered
                        for clarity across digital and print.
                    </p>
                </div>

                <!-- Oswald -->
                <div class="col-md-6 animate-box" data-animate-effect="fadeInUp">
                    <div class="type-card" style="font-family:'Oswald', sans-serif;">

                        <h4 style="font-family:'Oswald', sans-serif; text-transform:uppercase;">
                            OSWALD — Headings & UI
                        </h4>

                        <p>
                            Oswald is exclusively used in uppercase for headings,
                            navigation, buttons, and numeric counters.
                        </p>

                        <div class="type-alphabet" style="font-family:'Oswald', sans-serif; font-size:20px; letter-spacing:8px; text-transform:uppercase;">
                            A B C D E F G H I J K L M N O P Q R S T U V W X Y Z
                        </div>

                        <div class="type-numerals" style="font-family:'Oswald', sans-serif; font-size:20px; letter-spacing:6px;">
                            0 1 2 3 4 5 6 7 8 9
                        </div>

                        <h6>Weight Scale</h6>
                        <div class="weight-row" style="font-family:'Oswald', sans-serif; font-weight:200;">OSWALD 200 <span class="weight-label">ExtraLight</span></div>
                        <div class="weight-row" style="font-family:'Oswald', sans-serif; font-weight:300;">OSWALD 300 <span class="weight-label">Light</span></div>
                        <div class="weight-row" style="font-family:'Oswald', sans-serif; font-weight:400;">OSWALD 400 <span class="weight-label">Regular</span></div>
                        <div class="weight-row" style="font-family:'Oswald', sans-serif; font-weight:500;">OSWALD 500 <span class="weight-label">Medium</span></div>
                        <div class="weight-row" style="font-family:'Oswald', sans-serif; font-weight:600;">OSWALD 600 <span class="weight-label">SemiBold</span></div>
                        <div class="weight-row" style="font-family:'Oswald', sans-serif; font-weight:700;">OSWALD 700 <span class="weight-label">Bold</span></div>
                    </div>
                </div>

                <!-- Merriweather -->
                <div class="col-md-6 animate-box" data-animate-effect="fadeInUp">
                    <div class="type-card" style="font-family:'Merriweather', serif;">

                        <h4 style="font-family:'Merriweather', serif;">
                            Merriweather — Body Text
                        </h4>

                        <p>
                            Merriweather is used for paragraphs, long-form content,
                            and form inputs.
                        </p>

                        <div class="type-alphabet" style="font-family:'Merriweather', serif; font-size:16px; letter-spacing:3px;">
                            Aa Bb Cc Dd Ee Ff Gg Hh Ii Jj Kk Ll Mm Nn Oo Pp Qq Rr Ss Tt Uu Vv Ww Xx Yy Zz
                        </div>

                        <div class="type-numerals" style="font-family:'Merriweather', serif; font-size:16px; letter-spacing:4px;">
                            0 1 2 3 4 5 6 7 8 9
                        </div>

                        <h6>Weight Scale</h6>
                        <div class="weight-row" style="font-family:'Merriweather', serif; font-weight:300;">Merriweather 300 <span class="weight-label">Light</span></div>
                        <div class="weight-row" style="font-family:'Merriweather', serif; font-weight:400;">Merriweather 400 <span class="weight-label">Regular</span></div>
                        <div class="weight-row" style="font-family:'Merriweather', serif; font-weight:700;">Merriweather 700 <span class="weight-label">Bold</span></div>
                        <div class="weight-row" style="font-family:'Merriweather', serif; font-weight:900;">Merriweather 900 <span class="weight-label">Black</span></div>
                    </div>
                </div>

            </div>
        </div>
    </section>


    <!-- Accessibility -->
    <section class="section-padding bg-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12 animate-box" data-animate-effect="fadeInUp">
                    <h2 class="section-title">Accessibility <span>Standards</span></h2>

                    <ul class="access-list">
                        <li>White text (#FFFFFF) on primary background (#1A2B45) meets WCAG AA contrast.</li>
                        <li>Gold (#C0996B) is reserved for accents and emphasis, not long-form text.</li>
                        <li>Body text (#999999) is used only on dark backgrounds for optimal readability.</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>


    <!-- UI Elements -->
    <section class="section-padding bg-section">
        <div class="container">
            <div class="row">

                <div class="col-md-12 mb-30">
                    <h2 class="section-title">UI <span>Elements</span></h2>
                </div>

                <div class="col-md-4 animate-box" data-animate-effect="fadeInUp">
                    <div class="ui-card">
                        <h6>Buttons</h6>
                        <a href="#" class="button">Primary Button</a>
                    </div>
                </div>

                <div class="col-md-4 animate-box" data-animate-effect="fadeInUp">
                    <div class="ui-card">
                        <h6>Form Input</h6>
                        <input type="text" class="form-control" placeholder="Sample input">
                    </div>
                </div>

                <div class="col-md-4 animate-box" data-animate-effect="fadeInUp">
                    <div class="ui-card">
                        <h6>Blockquote</h6>
                        <blockquote>
                            Engineering brands should feel as structured as the systems they build.
                            <cite>Enamux</cite>
                        </blockquote>
                    </div>
                </div>

            </div>
        </div>
    </section>

@endsection
