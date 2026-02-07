<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Brand Guidelines | Enamux</title>

    <link href="https://fonts.googleapis.com/css2?family=Merriweather:wght@300;400;700;900&family=Oswald:wght@200;300;400;500;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <link rel="stylesheet" href="assets/css/style.css">

    <style>
        /* =========================================
           INTERNAL STYLES FOR BRAND PAGE LAYOUT
           (These specific styles organize the brand page
            while inheriting your global theme)
           ========================================= */

        body {
            background: #1b2c45; /* Your Main BG */
            color: #999;
            font-family: 'Merriweather', serif;
        }

        /* Container helper if not in bootstrap */
        .brand-container {
            max-width: 1140px;
            margin: 0 auto;
            padding: 0 15px;
        }

        /* Header Spacer (to prevent overlap with fixed header) */
        .header-spacer { height: 120px; }

        /* Color Cards */
        .color-grid {
            display: flex;
            flex-wrap: wrap;
            gap: 30px;
            margin-top: 30px;
        }
        .color-card {
            background: #253855;
            border: 1px solid rgba(255,255,255,0.05);
            width: 200px;
            padding: 20px;
            text-align: center;
            transition: 0.3s;
        }
        .color-card:hover { transform: translateY(-5px); border-color: #c0996b; }

        .swatch {
            height: 100px;
            width: 100%;
            margin-bottom: 15px;
            border: 1px solid rgba(255,255,255,0.1);
        }

        .hex-code {
            font-family: 'Oswald', sans-serif;
            color: #fff;
            letter-spacing: 2px;
            font-size: 14px;
            cursor: pointer;
            display: block;
            margin-top: 10px;
        }
        .hex-code:hover { color: #c0996b; }

        /* Typography Cards */
        .type-card {
            background: #253855;
            padding: 40px;
            margin-bottom: 30px;
            border-left: 3px solid #c0996b;
        }
        .font-name {
            font-size: 14px;
            text-transform: uppercase;
            letter-spacing: 3px;
            color: #c0996b;
            margin-bottom: 15px;
            display: block;
            font-family: 'Oswald', sans-serif;
        }

        /* Logo Section */
        .logo-box {
            background: #fff; /* White background to check logo contrast */
            padding: 60px;
            text-align: center;
            margin-bottom: 20px;
            border-radius: 4px;
            background-image: linear-gradient(45deg, #f0f0f0 25%, transparent 25%), linear-gradient(-45deg, #f0f0f0 25%, transparent 25%), linear-gradient(45deg, transparent 75%, #f0f0f0 75%), linear-gradient(-45deg, transparent 75%, #f0f0f0 75%);
            background-size: 20px 20px;
            background-position: 0 0, 0 10px, 10px -10px, -10px 0px;
        }
        .logo-img-preview {
            max-width: 250px;
            height: auto;
            margin-bottom: 30px;
        }

        /* Custom Button based on your CSS input[type="submit"] */
        .btn-download {
            font-family: 'Oswald', sans-serif;
            text-transform: uppercase;
            background: #c0996b;
            color: #fff;
            padding: 12px 30px;
            letter-spacing: 3px;
            border: none;
            cursor: pointer;
            transition: 0.3s;
            display: inline-block;
            font-size: 14px;
        }
        .btn-download:hover {
            background: #253855;
            color: #fff;
        }

        .divider {
            height: 1px;
            background: rgba(255,255,255,0.1);
            margin: 60px 0;
        }

    </style>
</head>
<body>

    <header class="bauen-header scrolled">
        <div class="container brand-container">
            <div class="bauen-logo-wrap" style="padding-left:0;">
                <div class="bauen-logo">
                    ENAMUX
                </div>
            </div>
            <div class="bauen-nav-toggle">
                <i></i>
            </div>
        </div>
    </header>

    <div class="header-spacer"></div>

    <section class="banner-header section-padding2 valign bg-img bg-fixed" data-overlay-dark="4" style="height: 40vh; min-height:300px;">
        <div class="container brand-container">
            <div class="row">
                <div class="col-md-12 text-center caption mt-90">
                    <h5>Resources</h5>
                    <h1>Brand Guidelines</h1>
                    <p>Official assets, colors, and typography for Enamux.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="section-padding">
        <div class="container brand-container">
            <div class="section-title2">01. Identity</div>
            <h2 class="section-title">Official <span>Logos</span></h2>

            <div class="row" style="display:flex; flex-wrap:wrap; gap: 30px;">
                <div style="flex:1; min-width:300px;">
                    <div class="logo-box">
                        <img src="https://via.placeholder.com/300x100/c0996b/ffffff?text=ENAMUX+LOGO" alt="Enamux Logo High Res" class="logo-img-preview">
                    </div>
                    <h4>Primary Logo</h4>
                    <p>Use on light backgrounds. Format: PNG (Transparent).</p>
                    <a href="YOUR_LOGO_URL_HERE" download class="btn-download">
                        <i class="fas fa-download"></i> Download High-Res
                    </a>
                </div>

                <div style="flex:1; min-width:300px;">
                    <div class="logo-box" style="background: #1b2c45; background-image:none;">
                         <img src="https://via.placeholder.com/300x100/1b2c45/ffffff?text=ENAMUX+WHITE" alt="Enamux White Logo" class="logo-img-preview">
                    </div>
                    <h4>Reverse Logo</h4>
                    <p>Use on dark backgrounds. Format: PNG (Transparent).</p>
                    <a href="YOUR_WHITE_LOGO_URL_HERE" download class="btn-download">
                        <i class="fas fa-download"></i> Download White
                    </a>
                </div>
            </div>
        </div>
    </section>

    <div class="container brand-container"><div class="divider"></div></div>

    <section class="section-padding pt-0">
        <div class="container brand-container">
            <div class="section-title2">02. Palette</div>
            <h2 class="section-title">Brand <span>Colors</span></h2>
            <p>Our color palette is inspired by engineering precision and structural integrity.</p>

            <div class="color-grid">
                <div class="color-card">
                    <div class="swatch" style="background: #1b2c45;"></div>
                    <h6>Enamux Navy</h6>
                    <span class="hex-code" onclick="copyToClipboard('#1b2c45')">#1b2c45</span>
                </div>

                <div class="color-card">
                    <div class="swatch" style="background: #253855;"></div>
                    <h6>Slate Blue</h6>
                    <span class="hex-code" onclick="copyToClipboard('#253855')">#253855</span>
                </div>

                <div class="color-card">
                    <div class="swatch" style="background: #c0996b;"></div>
                    <h6>Enamux Gold</h6>
                    <span class="hex-code" onclick="copyToClipboard('#c0996b')">#c0996b</span>
                </div>

                <div class="color-card">
                    <div class="swatch" style="background: #999999;"></div>
                    <h6>Text Grey</h6>
                    <span class="hex-code" onclick="copyToClipboard('#999999')">#999999</span>
                </div>
            </div>
        </div>
    </section>

    <div class="container brand-container"><div class="divider"></div></div>

    <section class="section-padding pt-0">
        <div class="container brand-container">
            <div class="section-title2">03. Typography</div>
            <h2 class="section-title">Our <span>Fonts</span></h2>

            <div class="type-card">
                <span class="font-name">Headings: OSWALD</span>
                <h1 style="margin:0; color:#fff;">Ag Engineering Excellence</h1>
                <h2 style="margin:0; color:#c0996b;">Ag Building the Future</h2>
                <h3 style="margin:0; color:#fff;">Ag Structural Integrity</h3>
                <p style="margin-top:20px; font-family:'Merriweather'; font-size:14px;">Used for all H1 - H6 tags. Uppercase preferred for top level headers.</p>
            </div>

            <div class="type-card">
                <span class="font-name">Body: MERRIWEATHER</span>
                <p style="font-size:18px; color:#fff;">Aa Bb Cc Dd Ee Fg</p>
                <p>Enamux Limited is a leading civil and structural engineering consultancy. We deliver excellence across building, transportation, and water resources projects nationwide.</p>
                <p style="margin-top:20px; font-family:'Oswald'; font-size:14px; color: #c0996b; letter-spacing:2px;">USED FOR ALL PARAGRAPHS AND LONG FORM TEXT.</p>
            </div>
        </div>
    </section>

    <footer class="footer-section section-padding" style="background: #152235; border-top: 1px solid #253855;">
        <div class="container brand-container">
            <div class="row" style="display:flex; flex-wrap:wrap; justify-content:space-between;">
                <div class="col-md-4">
                    <h2 style="color:#c0996b; font-family:'Oswald'; letter-spacing:5px;">ENAMUX</h2>
                    <p>Engineering the future with precision.</p>
                </div>
                <div class="col-md-4 text-right">
                    <p>&copy; Enamux Limited.</p>
                </div>
            </div>
        </div>
    </footer>

    <script>
        function copyToClipboard(text) {
            navigator.clipboard.writeText(text).then(function() {
                alert('Color code ' + text + ' copied to clipboard!');
            }, function(err) {
                console.error('Could not copy text: ', err);
            });
        }
    </script>

</body>
</html>
