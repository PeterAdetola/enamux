<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <title>ENAMUX - Brand Guidelines</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Merriweather:wght@300;400;700;900&family=Oswald:wght@200;300;400;500;600;700&display=swap">
    <link rel="stylesheet" href="/css/plugins.css" />
    <link rel="stylesheet" href="/css/style.css" />

    <style>
        /* Custom Guidelines Styling */
        .brand-section { margin-bottom: 80px; }
        .brand-section h2 { font-size: 35px; color: #c0996b; letter-spacing: 5px; text-transform: uppercase; margin-bottom: 40px; }
        .brand-section h3 { font-size: 18px; color: #fff; text-transform: uppercase; letter-spacing: 3px; margin-bottom: 25px; border-left: 3px solid #c0996b; padding-left: 15px; }

        /* Color Palette Layout */
        .color-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(180px, 1fr)); gap: 20px; }
        .color-card { background: #253855; padding: 15px; border: 1px solid #253855; transition: 0.3s; }
        .color-card:hover { border-color: #c0996b; }
        .swatch { height: 100px; width: 100%; margin-bottom: 15px; }
        .hex { font-family: 'Oswald', sans-serif; color: #fff; font-size: 14px; letter-spacing: 1px; }

        /* Logo Display */
        .logo-display-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 30px; }
        .logo-box { background: #1b2c45; padding: 40px; text-align: center; border: 1px solid #253855; position: relative; }
        .logo-box.light-bg { background: #ffffff; }
        .logo-box img { max-height: 70px; width: auto; margin-bottom: 20px; }

        /* Typography Card */
        .type-card { background: #253855; padding: 40px; border: 1px solid #253855; margin-bottom: 20px; }
        .font-spec { color: #c0996b; font-family: 'Oswald', sans-serif; text-transform: uppercase; letter-spacing: 2px; font-size: 13px; }

        /* Usage Tables */
        .usage-row { display: grid; grid-template-columns: 1fr 1fr; gap: 30px; }
        .usage-box { padding: 30px; border: 1px solid #253855; }
        .usage-box.dos { border-top: 4px solid #c0996b; }
        .usage-box.donts { border-top: 4px solid #ff4d4d; }
        .usage-box ul { list-style: none; padding: 0; }
        .usage-box ul li { margin-bottom: 10px; padding-left: 20px; position: relative; color: #999; }
        .dos li:before { content: '✓'; position: absolute; left: 0; color: #c0996b; }
        .donts li:before { content: '✕'; position: absolute; left: 0; color: #ff4d4d; }

        @media screen and (max-width: 768px) {
            .usage-row { grid-template-columns: 1fr; }
        }
    </style>
</head>

<body>
<nav class="navbar navbar-expand-lg">
    <div class="container">
        <a class="navbar-brand" href="/"> <img src="/img/logo-light.png" class="logo-img" alt=""> </a>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item"><a class="nav-link" href="/">Home</a></li>
                <li class="nav-item"><a class="nav-link active" href="/brand-guidelines.html">Brand</a></li>
            </ul>
        </div>
    </div>
</nav>

<div class="banner-header section-padding valign bg-img bg-fixed" data-overlay-darkgray="5" data-background="/img/banner.jpg">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-left caption mt-90">
                <h5>Identity System</h5>
                <h1>Brand <span>Guidelines</span></h1>
                <p>Standardized visual assets for ENAMUX engineering consultancy.</p>
            </div>
        </div>
    </div>
</div>

<section class="brand-guidelines section-padding">
    <div class="container">

        <div class="brand-section">
            <h2>01. Logo Assets</h2>
            <h3>Full Brand Marks</h3>
            <div class="logo-display-grid">
                <div class="logo-box light-bg">
                    <img src="/uploads/brand/logofiles/png/logo/Artboard 1.png" alt="Primary Logo">
                    <div class="logo-info">
                        <p style="color:#1b2c45"><b>Primary Logo</b></p>
                        <a href="/uploads/brand/logofiles/png/logo/Artboard 1.png" download class="download-btn">PNG</a>
                        <a href="/uploads/brand/logofiles/svg/logo_svg/Artboard 1.png" download class="download-btn">SVG</a>
                    </div>
                </div>
                <div class="logo-box">
                    <img src="/uploads/brand/logofiles/png/logo/Artboard 2.png" alt="Secondary Logo">
                    <div class="logo-info">
                        <p><b>Reverse Logo</b></p>
                        <a href="/uploads/brand/logofiles/png/logo/Artboard 2.png" download class="download-btn">PNG</a>
                    </div>
                </div>
            </div>

            <h3 class="mt-60">Brand Icons / Favicons</h3>
            <div class="logo-display-grid">
                <div class="logo-box">
                    <img src="/uploads/brand/logofiles/png/icon/Artboard 4.png" style="width:60px;" alt="Icon 4">
                    <p><small>Icon Variant A</small></p>
                    <a href="/uploads/brand/logofiles/png/icon/Artboard 4.png" download class="download-btn">PNG</a>
                </div>
                <div class="logo-box">
                    <img src="/uploads/brand/logofiles/png/icon/Artboard 5.png" style="width:60px;" alt="Icon 5">
                    <p><small>Icon Variant B</small></p>
                    <a href="/uploads/brand/logofiles/png/icon/Artboard 5.png" download class="download-btn">PNG</a>
                </div>
                <div class="logo-box">
                    <img src="/uploads/brand/logofiles/png/icon/Artboard 6.png" style="width:60px;" alt="Icon 6">
                    <p><small>Icon Variant C</small></p>
                    <a href="/uploads/brand/logofiles/png/icon/Artboard 6.png" download class="download-btn">PNG</a>
                </div>
            </div>
        </div>

        <div class="brand-section">
            <h2>02. Color Palette</h2>
            <div class="color-grid">
                <div class="color-card">
                    <div class="swatch" style="background:#c0996b;"></div>
                    <div class="hex">#C0996B</div>
                    <p><small>Enamux Gold</small></p>
                </div>
                <div class="color-card">
                    <div class="swatch" style="background:#1b2c45;"></div>
                    <div class="hex">#1B2C45</div>
                    <p><small>Deep Navy</small></p>
                </div>
                <div class="color-card">
                    <div class="swatch" style="background:#253855;"></div>
                    <div class="hex">#253855</div>
                    <p><small>Slate Blue</small></p>
                </div>
                <div class="color-card">
                    <div class="swatch" style="background:#999999;"></div>
                    <div class="hex">#999999</div>
                    <p><small>Neutral Gray</small></p>
                </div>
            </div>
        </div>

        <div class="brand-section">
            <h2>03. Typography</h2>
            <div class="type-card">
                <span class="font-spec">Display Font</span>
                <h1 style="font-family:'Oswald'; letter-spacing:5px; color:#fff; margin-top:10px;">OSWALD REGULAR</h1>
                <p style="font-family:'Oswald'; color:#c0996b;">ABCDEFGHIJKLMNOPQRSTUVWXYZ</p>
            </div>
            <div class="type-card">
                <span class="font-spec">Body Font</span>
                <h2 style="font-family:'Merriweather'; color:#fff; text-transform:none; letter-spacing:0; margin-top:10px;">Merriweather Serif</h2>
                <p>Designed for high readability in technical engineering reports and digital interfaces.</p>
            </div>
        </div>

        <div class="brand-section">
            <h2>04. Best Practices</h2>
            <div class="usage-row">
                <div class="usage-box dos">
                    <h3>Proper Usage</h3>
                    <ul>
                        <li>Ensure the logo has clear breathing room.</li>
                        <li>Use high-resolution PNGs for digital and SVGs for print.</li>
                        <li>Maintain the gold accent on dark backgrounds for premium feel.</li>
                    </ul>
                </div>
                <div class="usage-box donts">
                    <h3>Prohibited</h3>
                    <ul>
                        <li>Do not stretch or squeeze the logo proportions.</li>
                        <li>Do not swap the brand colors for unapproved tints.</li>
                        <li>Do not add drop shadows or glows to the primary mark.</li>
                    </ul>
                </div>
            </div>
        </div>

    </div>
</section>

<footer class="main-footer dark">
    <div class="container">
        <div class="sub-footer">
            <div class="row">
                <div class="col-md-12 text-center">
                    <p>© 2024 ENAMUX Engineering Limited. All assets confidential.</p>
                </div>
            </div>
        </div>
    </div>
</footer>

<script src="/js/jquery-3.5.1.min.js"></script>
<script src="/js/bootstrap.min.js"></script>
<script src="/js/custom.js"></script>
</body>
</html>
