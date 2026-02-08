@extends('frontend.main_master')
@section('main')
    @php
        $about = App\Models\AboutSummary::first();
        $members = App\Models\TeamMember::all();
    @endphp
    <style>
        @media (max-width: 768px) {
            .process2 .number {
                position: static !important;
                display: block !important;
                text-align: left !important;
                opacity: 0.3 !important;
                margin-bottom: 0.3em !important;
            }
        }
    </style>        <!-- About Summary (Existing - From Database) -->
    <section class="about section-padding2">
        <div class="container">
            <div class="row">
                <div class="col-md-6 mb-30 animate-box" data-animate-effect="fadeInUp">
                    <h2 class="section-title">About <span>Us</span></h2>
                    @if($about)
                        <p>{!! $about->summary !!}</p>
                    @endif
                </div>
                <div class="col-md-6 animate-box" data-animate-effect="fadeInUp">
                    <div class="about-img">
                        @if($about)
                            <div class="img"> <img src="{{ url($about->image) }}" class="img-fluid" alt=""> </div>
                            <div class="about-img-2 about-buro">{{ $about->caption }}</div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Key Statistics (Adapted from Careers/Position component) -->
    <section class="positions section-padding2">
        <div class="container">
            <div class="row">
                <div class="col-md-8 offset-md-2 mb-30 text-center">
                    <h2 class="section-title">Our <span>Impact</span></h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 mb-60">
                    <div class="stats-grid">
                        <div class="position stat-card">
                            <div class="position-title">100+ <span>Projects</span></div>
                            <div class="position-location"><span>Successfully</span> Completed</div>
                            <div class="position-time">Since 2018</div>
                            <div class="position-icon"><i class="flaticon-briefcase"></i></div>
                        </div>
                        <div class="position stat-card">
                            <div class="position-title">₦15B+ <span>Value</span></div>
                            <div class="position-location"><span>Cumulative</span> Project Value</div>
                            <div class="position-time">Nationwide Reach</div>
                            <div class="position-icon"><i class="flaticon-medal"></i></div>
                        </div>
                        <div class="position stat-card">
                            <div class="position-title">22+ <span>Professionals</span></div>
                            <div class="position-location"><span>Highly Qualified</span> Engineers</div>
                            <div class="position-time">Expert Team</div>
                            <div class="position-icon"><i class="flaticon-employee"></i></div>
                        </div>
                        <div class="position stat-card">
                            <div class="position-title">15 <span>COREN</span></div>
                            <div class="position-location"><span>Registered</span> Engineers</div>
                            <div class="position-time">Professional Excellence</div>
                            <div class="position-icon"><i class="flaticon-quality"></i></div>
                        </div>
                        <div class="position stat-card">
                            <div class="position-title">7+ <span>Years</span></div>
                            <div class="position-location"><span>Of</span> Excellence</div>
                            <div class="position-time">Established 2018</div>
                            <div class="position-icon"><i class="flaticon-calendar"></i></div>
                        </div>
                        <div class="position stat-card">
                            <div class="position-title">13 <span>Storeys</span></div>
                            <div class="position-location"><span>Highest</span> Building Designed</div>
                            <div class="position-time">Technical Capability</div>
                            <div class="position-icon"><i class="flaticon-apartment"></i></div>
                        </div>
                        <div class="position stat-card">
                            <div class="position-title">2,044 km <span>Railway</span></div>
                            <div class="position-location"><span>Port Harcourt</span> - Maiduguri</div>
                            <div class="position-time">Major Infrastructure</div>
                            <div class="position-icon"><i class="flaticon-bridge"></i></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Design Software & Technology (Adapted from Pricing Cards) -->
    <section class="section-padding2">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="section-title">Design <span>Software</span></h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="pricing-card">
                        <p class="pricing-card-name">CAD & Drafting</p>
                        <h3 class="pricing-card-amount"><i class="flaticon-design"></i></h3>
                        <div class="pricing-card-bottom">
                            <ul class="list-unstyled pricing-card-list">
                                <li><i class="ti-check"></i> AutoCAD</li>
                                <li><i class="ti-check"></i> Civil 3D</li>
                                <li><i class="ti-check"></i> Revit</li>
                                <li><i class="ti-check"></i> BIM 360</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="pricing-card">
                        <p class="pricing-card-name">Structural Analysis</p>
                        <h3 class="pricing-card-amount"><i class="flaticon-engineering"></i></h3>
                        <div class="pricing-card-bottom">
                            <ul class="list-unstyled pricing-card-list">
                                <li><i class="ti-check"></i> STAADPro</li>
                                <li><i class="ti-check"></i> SAP2000</li>
                                <li><i class="ti-check"></i> ETAB</li>
                                <li><i class="ti-check"></i> Orion</li>
                                <li><i class="ti-check"></i> ProtaStructure</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="pricing-card">
                        <p class="pricing-card-name">Project Management</p>
                        <h3 class="pricing-card-amount"><i class="flaticon-project"></i></h3>
                        <div class="pricing-card-bottom">
                            <ul class="list-unstyled pricing-card-list">
                                <li><i class="ti-check"></i> Microsoft Project</li>
                                <li><i class="ti-check"></i> Primavera P6</li>
                                <li><i class="ti-check"></i> GIS & Remote Sensing</li>
                                <li><i class="ti-check"></i> AutoCAD Civil 3D</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Equipment & Facilities (Adapted from FAQs) -->
    <section class="section-padding2">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="section-title">Equipment & <span>Facilities</span></h2>
                </div>
                <div class="col-md-6">
                    <ul class="accordion-box clearfix">
                        <li class="accordion block active-block">
                            <div class="acc-btn active"><span class="count">1.</span> Surveying Equipment</div>
                            <div class="acc-content current">
                                <div class="content">
                                    <div class="text">
                                        <ul class="equipment-list">
                                            <li><i class="ti-check"></i> Total Stations (Wild T1/T2) - 2 units</li>
                                            <li><i class="ti-check"></i> Dumpy Levels - 3 units</li>
                                            <li><i class="ti-check"></i> GPS Surveying Equipment</li>
                                            <li><i class="ti-check"></i> Complete Surveying Accessories</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="accordion block">
                            <div class="acc-btn"><span class="count">2.</span> Construction Equipment</div>
                            <div class="acc-content">
                                <div class="content">
                                    <div class="text">
                                        <ul class="equipment-list">
                                            <li><i class="ti-check"></i> Excavators - 4 units</li>
                                            <li><i class="ti-check"></i> Concrete Mixers - 6 units</li>
                                            <li><i class="ti-check"></i> Compaction Machines - 3 units</li>
                                            <li><i class="ti-check"></i> Rollers - 4 units</li>
                                            <li><i class="ti-check"></i> Paving Machine - 1 unit</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="accordion block">
                            <div class="acc-btn"><span class="count">3.</span> Testing Equipment</div>
                            <div class="acc-content">
                                <div class="content">
                                    <div class="text">
                                        <ul class="equipment-list">
                                            <li><i class="ti-check"></i> DANDO 150 Mobile Drilling Rigs</li>
                                            <li><i class="ti-check"></i> Dutch Cone Penetrometer (10 ton)</li>
                                            <li><i class="ti-check"></i> Geotechnical Investigation Equipment</li>
                                            <li><i class="ti-check"></i> Complete Soil Testing Laboratory</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="col-md-6">
                    <ul class="accordion-box clearfix">
                        <li class="accordion block">
                            <div class="acc-btn"><span class="count">4.</span> Design Office Equipment</div>
                            <div class="acc-content">
                                <div class="content">
                                    <div class="text">
                                        <ul class="equipment-list">
                                            <li><i class="ti-check"></i> Multiple CAD Workstations</li>
                                            <li><i class="ti-check"></i> Advanced Structural Analysis Systems</li>
                                            <li><i class="ti-check"></i> Plotters & Large-Format Printers</li>
                                            <li><i class="ti-check"></i> Complete Microsoft Office Suite</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="accordion block">
                            <div class="acc-btn"><span class="count">5.</span> Site Investigation Tools</div>
                            <div class="acc-content">
                                <div class="content">
                                    <div class="text">
                                        <ul class="equipment-list">
                                            <li><i class="ti-check"></i> Core Drilling Equipment</li>
                                            <li><i class="ti-check"></i> Soil Sampling Tools</li>
                                            <li><i class="ti-check"></i> Groundwater Monitoring Equipment</li>
                                            <li><i class="ti-check"></i> Field Testing Kits</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="accordion block active-block">
                            <div class="acc-btn active"><span class="count">6.</span> Quality Control Equipment</div>
                            <div class="acc-content current">
                                <div class="content">
                                    <div class="text">
                                        <ul class="equipment-list">
                                            <li><i class="ti-check"></i> Concrete Testing Equipment</li>
                                            <li><i class="ti-check"></i> Steel Testing Machines</li>
                                            <li><i class="ti-check"></i> Material Testing Laboratory</li>
                                            <li><i class="ti-check"></i> Calibrated Measuring Instruments</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- Certifications & Registrations (Adapted from Pricing Cards) -->
    <section class="section-padding2 bg-cream">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="section-title">Certifications & <span>Registrations</span></h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="pricing-card">
                        <p class="pricing-card-name">Corporate</p>
                        <h3 class="pricing-card-amount"><i class="flaticon-quality"></i></h3>
                        <div class="pricing-card-bottom">
                            <ul class="list-unstyled pricing-card-list">
                                <li><i class="ti-check"></i> CAC Registered</li>
                                <li><i class="ti-check"></i> Tax Clearance Certificate</li>
                                <li><i class="ti-check"></i> VAT Registered</li>
                                <li><i class="ti-check"></i> Pension Compliance</li>
                                <li><i class="ti-check"></i> SCUML Certified</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="pricing-card">
                        <p class="pricing-card-name">Professional</p>
                        <h3 class="pricing-card-amount"><i class="flaticon-medal"></i></h3>
                        <div class="pricing-card-bottom">
                            <ul class="list-unstyled pricing-card-list">
                                <li><i class="ti-check"></i> COREN Registered</li>
                                <li><i class="ti-check"></i> NSE Member</li>
                                <li><i class="ti-check"></i> NIStructE Member</li>
                                <li><i class="ti-check"></i> NIQS Member</li>
                                <li><i class="ti-check"></i> SURCON Registered</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="pricing-card">
                        <p class="pricing-card-name">Insurance</p>
                        <h3 class="pricing-card-amount"><i class="flaticon-security"></i></h3>
                        <div class="pricing-card-bottom">
                            <ul class="list-unstyled pricing-card-list">
                                <li><i class="ti-check"></i> Professional Indemnity</li>
                                <li><i class="ti-check"></i> ₦2,000,000 Coverage</li>
                                <li><i class="ti-check"></i> NEM Insurance PLC</li>
                                <li><i class="ti-check"></i> Valid: Nov 2025</li>
                                <li><i class="ti-check"></i> Full Compliance</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Our Values -->
    <section class="section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="section-title">Our <span>Values</span></h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3 col-sm-6 mb-30">
                    <div class="process2 item"> <i class="number">01</i>
                        <div class="icon"> <i class="flaticon-medal"></i> </div>
                        <h3>Excellence</h3>
                        <div class="line"></div>
                        <p>Delivering projects that exceed expectations through meticulous attention to detail, innovative solutions, and unwavering commitment to quality in every aspect of our work.</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 mb-30">
                    <div class="process2 item"> <i class="number">02</i>
                        <div class="icon"> <i class="flaticon-quality"></i> </div>
                        <h3>Integrity</h3>
                        <div class="line"></div>
                        <p>Maintaining the highest professional standards through transparent communication, ethical practices, and honest dealings with all stakeholders in every project we undertake.</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 mb-30">
                    <div class="process2 item"> <i class="number">03</i>
                        <div class="icon"> <i class="flaticon-idea"></i> </div>
                        <h3>Innovation</h3>
                        <div class="line"></div>
                        <p>Leveraging cutting-edge technology and creative engineering solutions to deliver optimal results while continuously improving our methods and approaches to solve complex challenges.</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 mb-30">
                    <div class="process2 item"> <i class="number">04</i>
                        <div class="icon"> <i class="flaticon-security"></i> </div>
                        <h3>Safety</h3>
                        <div class="line"></div>
                        <p>Prioritizing safety in every project phase, ensuring the wellbeing of our team, clients, and the public through rigorous safety protocols and comprehensive risk management.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Why Choose Enamux (Adapted from FAQs) -->
    <section class="section-padding2">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="section-title">Why Choose <span>Enamux</span></h2>
                </div>
                <div class="col-md-6">
                    <ul class="accordion-box clearfix">
                        <li class="accordion block active-block">
                            <div class="acc-btn active"><span class="count">1.</span> Proven Track Record</div>
                            <div class="acc-content current">
                                <div class="content">
                                    <div class="text">7+ years of consistent project delivery with over 100 successful projects completed. Experience with projects up to ₦12 billion in value across diverse engineering disciplines.</div>
                                </div>
                            </div>
                        </li>
                        <li class="accordion block">
                            <div class="acc-btn"><span class="count">2.</span> Technical Excellence</div>
                            <div class="acc-content">
                                <div class="content">
                                    <div class="text">State-of-the-art design software and technology. Experienced team with 10+ years average experience. Full compliance with Nigerian and international engineering standards.</div>
                                </div>
                            </div>
                        </li>
                        <li class="accordion block">
                            <div class="acc-btn"><span class="count">3.</span> Comprehensive Resources</div>
                            <div class="acc-content">
                                <div class="content">
                                    <div class="text">Extensive construction equipment fleet, advanced surveying and testing equipment, in-house laboratory facilities, and 24/7 project support capability ensure seamless project execution.</div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="col-md-6">
                    <ul class="accordion-box clearfix">
                        <li class="accordion block">
                            <div class="acc-btn"><span class="count">4.</span> Professional Credentials</div>
                            <div class="acc-content">
                                <div class="content">
                                    <div class="text">15 COREN-registered engineers, professional indemnity insurance (₦2M coverage), SCUML certified for anti-money laundering compliance, and active membership in NSE, NIStructE, NIQS, and SURCON.</div>
                                </div>
                            </div>
                        </li>
                        <li class="accordion block">
                            <div class="acc-btn"><span class="count">5.</span> Client-Focused Approach</div>
                            <div class="acc-content">
                                <div class="content">
                                    <div class="text">Collaborative working methodology, cost-effective solutions without compromising quality, timely project delivery, and transparent communication throughout the project lifecycle.</div>
                                </div>
                            </div>
                        </li>
                        <li class="accordion block active-block">
                            <div class="acc-btn active"><span class="count">6.</span> Quality Assurance</div>
                            <div class="acc-content current">
                                <div class="content">
                                    <div class="text">Rigorous quality control procedures, compliance with national and international building codes, continuous professional development, and commitment to sustainable engineering practices.</div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- Team (Existing - From Database) -->
    <section class="team section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="section-title">Our <span>Team</span></h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 owl-carousel owl-theme">
                    @foreach($members as $member)
                        <div class="item">
                            <div class="img"> <a href="team-details.html"><img src="{{ url($member->image) }}" alt=""></a> </div>
                            <div class="info">
                                <h6>{{ $member->name }}</h6>
                                <p>{{ $member->role }}</p>
                                <div class="social valign">
                                    <div class="full-width">
                                        <a href="{{ $member->linked_in }}"><i class="ti-linkedin"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    @push('styles')
        <style>
            /* Stats Grid */
            .stats-grid {
                display: grid;
                grid-template-columns: repeat(3, 1fr);
                gap: 20px;
            }

            .stat-card {
                cursor: default !important;
                transition: transform 0.3s ease;
            }

            .stat-card:hover {
                transform: translateY(-5px);
            }

            .stat-card .position-icon {
                font-size: 40px;
            }

            /* Equipment List */
            .equipment-list {
                list-style: none;
                padding: 0;
                margin: 0;
            }

            .equipment-list li {
                padding: 8px 0;
                color: #999;
            }

            .equipment-list i {
                color: #c0996b;
                margin-right: 10px;
            }

            /* Pricing Card Icons */
            .pricing-card-amount i {
                font-size: 50px;
                color: #c0996b;
            }

            /* Our Values - Mobile Responsive */
            .process2 {
                position: relative;
            }

            .process2 .number {
                font-size: 3em !important;
                position: absolute;
                top: 0.5em;
                right: 0.5em;
                opacity: 0.1;
                font-weight: 700;
                line-height: 1;
            }

            .process2 h3 {
                font-family: 'Oswald', sans-serif;
                font-size: 1.5em !important;
                font-weight: 400;
                text-transform: uppercase;
                letter-spacing: 0.15em;
                color: #fff;
                margin-top: 1em;
                margin-bottom: 0.8em;
                line-height: 1.2;
                word-wrap: break-word;
            }

            .process2 p {
                font-family: 'Merriweather', serif;
                font-size: 0.9em;
                line-height: 1.7em;
                color: #999;
            }

            /* Responsive */
            @media (max-width: 768px) {
                .stats-grid {
                    grid-template-columns: 1fr;
                }

                /* Our Values Mobile Fix - Number at Top */
                .process2 {
                    padding: 1em 1.5em 1.5em 1.5em;
                    margin-bottom: 1.5em;
                }

                .process2 .number {
                    position: static !important; /* Remove absolute positioning */
                    display: block;
                    font-size: 2.5em !important;
                    opacity: 0.3;
                    margin-bottom: 0.3em;
                    text-align: left;
                }

                .process2 .icon {
                    font-size: 2em;
                    margin-top: 0;
                }

                .process2 h3 {
                    font-size: 1.3em !important;
                    letter-spacing: 0.1em;
                    margin-top: 0.5em;
                    padding-right: 0; /* Remove padding since number is now on top */
                }

                .process2 p {
                    font-size: 0.875em;
                }

                /* Certifications heading - reduce font size on mobile */
                .section-title {
                    font-size: 1.8em !important;
                    letter-spacing: 0.15em !important;
                    word-spacing: 0.2em !important;
                }
            }

            @media (max-width: 992px) and (min-width: 769px) {
                .stats-grid {
                    grid-template-columns: repeat(2, 1fr);
                }

                /* Tablet - 2 columns for Our Values */
                .process2 h3 {
                    font-size: 1.4em !important;
                    letter-spacing: 0.12em;
                }

                .process2 .number {
                    font-size: 2.8em !important;
                }

                /* Certifications heading - slightly smaller on tablet */
                .section-title {
                    font-size: 2em !important;
                    letter-spacing: 0.2em !important;
                }
            }

            @media (max-width: 576px) {
                /* Small mobile - even more compact */
                .process2 {
                    padding: 1em;
                }

                .process2 .number {
                    font-size: 2em !important;
                    margin-bottom: 0.2em;
                }

                .process2 h3 {
                    font-size: 1.2em !important;
                    letter-spacing: 0.08em;
                }

                /* Certifications heading - smallest on small mobile */
                .section-title {
                    font-size: 1.5em !important;
                    letter-spacing: 0.1em !important;
                    word-spacing: 0.15em !important;
                }
            }
        </style>
    @endpush

@endsection
