<!-- ==========================================================================
     INTERACTIVE SVG FLOOR PLAN (خريطة المنزل التفاعلية لخدمات النظافة)
     ========================================================================== -->
<section class="py-5 bg-brand-light position-relative overflow-hidden" id="interactive-floorplan">
    <!-- Background Ambient Glows -->
    <div class="floorplan-ambient-glow glow-1"></div>
    <div class="floorplan-ambient-glow glow-2"></div>

    <div class="container py-4 position-relative" style="z-index: 2;">
        <!-- Section Header -->
        <div class="text-center mb-5" data-aos="fade-up">
            <span class="badge bg-white text-brand-primary border border-brand px-3 py-2 rounded-pill fw-bold mb-2 shadow-sm">
                <i class="fa-solid fa-compass-drafting me-1 text-brand-secondary"></i> جولة ثلاثية الأبعاد في منزلك
            </span>
            <h2 class="fw-heading display-6 text-brand-primary mb-2">
                خريطة المنزل التفاعلية: استكشف خدماتنا في كل غرفة
            </h2>
            <p class="text-secondary max-w-750 mx-auto">
                مرر الفأرة أو اضغط على أي غرفة في المخطط الهندسي أدناه لاكتشاف خطة التنظيف والتعقيم المتخصصة والمعدات المستخدمة فيها.
            </p>
            <div class="mx-auto bg-brand-secondary rounded-pill" style="width: 50px; height: 3.5px;"></div>
        </div>

        <!-- Room Selector Pills Bar (Quick Filter) -->
        <div class="floorplan-nav-wrapper mb-4" data-aos="fade-up" data-aos-delay="100">
            <div class="d-flex flex-wrap justify-content-center gap-2 floorplan-pills-bar">
                <button type="button" class="floorplan-nav-pill active" data-room-target="kitchen">
                    <i class="fa-solid fa-utensils"></i>
                    <span>المطبخ العصري</span>
                </button>
                <button type="button" class="floorplan-nav-pill" data-room-target="living">
                    <i class="fa-solid fa-couch"></i>
                    <span>صالة المعيشة والمجلس</span>
                </button>
                <button type="button" class="floorplan-nav-pill" data-room-target="bathroom">
                    <i class="fa-solid fa-bath"></i>
                    <span>الحمام الرئيسي</span>
                </button>
                <button type="button" class="floorplan-nav-pill" data-room-target="bedroom">
                    <i class="fa-solid fa-bed"></i>
                    <span>غرفة النوم الرئيسية</span>
                </button>
                <button type="button" class="floorplan-nav-pill" data-room-target="dining">
                    <i class="fa-solid fa-champagne-glasses"></i>
                    <span>غرفة الطعام</span>
                </button>
                <button type="button" class="floorplan-nav-pill" data-room-target="balcony">
                    <i class="fa-solid fa-wind"></i>
                    <span>الشرفة والواجهة</span>
                </button>
            </div>
        </div>

        <!-- Main Interactive Blueprint & Inspector Layout -->
        <div class="row g-4 align-items-stretch">
            
            <!-- LEFT (RTL: Main SVG Blueprint Column) -->
            <div class="col-lg-7 col-xl-8" data-aos="fade-right" data-aos-delay="150">
                <div class="blueprint-card shadow-sm h-100 position-relative">
                    <!-- Blueprint Top Toolbar -->
                    <div class="blueprint-toolbar d-flex align-items-center justify-content-between px-3 py-2 border-bottom">
                        <div class="d-flex align-items-center gap-2">
                            <span class="toolbar-dot dot-red"></span>
                            <span class="toolbar-dot dot-yellow"></span>
                            <span class="toolbar-dot dot-green"></span>
                            <span class="blueprint-code text-muted ms-2 small">
                                <i class="fa-solid fa-draw-polygon me-1 text-brand-secondary"></i>
                                Sultan-Apt-Architecture v3.2
                            </span>
                        </div>
                        <div class="d-flex align-items-center gap-2 small text-secondary">
                            <span class="badge bg-white text-brand-primary border px-2 py-1 rounded-pill">
                                <i class="fa-solid fa-hand-pointer text-brand-secondary me-1"></i> انقر على أي غرفة
                            </span>
                        </div>
                    </div>

                    <!-- SVG Container -->
                    <div class="blueprint-svg-container position-relative">
                        <svg class="blueprint-svg w-100" viewBox="0 0 960 600" preserveAspectRatio="xMidYMid meet" id="homeFloorPlanSvg">
                            <defs>
                                <!-- Architectural Blueprint Grid -->
                                <pattern id="bpGridPattern" width="30" height="30" patternUnits="userSpaceOnUse">
                                    <path d="M 30 0 L 0 0 0 30" fill="none" stroke="rgba(40, 125, 168, 0.08)" stroke-width="0.75" />
                                </pattern>
                                <!-- Ceramic Tiles Pattern for Kitchen & Bath -->
                                <pattern id="tilePattern" width="20" height="20" patternUnits="userSpaceOnUse">
                                    <rect width="20" height="20" fill="none" stroke="rgba(40, 125, 168, 0.12)" stroke-width="0.5" />
                                </pattern>
                                <!-- Wood Parquet Pattern for Bedroom -->
                                <pattern id="woodPattern" width="32" height="16" patternUnits="userSpaceOnUse">
                                    <rect width="32" height="16" fill="none" stroke="rgba(40, 125, 168, 0.1)" stroke-width="0.6" />
                                    <line x1="16" y1="0" x2="16" y2="16" stroke="rgba(40, 125, 168, 0.1)" stroke-width="0.6" />
                                </pattern>
                                <!-- Outdoor Decking Pattern for Balcony -->
                                <pattern id="deckPattern" width="10" height="60" patternUnits="userSpaceOnUse">
                                    <rect width="10" height="60" fill="none" stroke="rgba(40, 125, 168, 0.14)" stroke-width="0.6" />
                                </pattern>

                                <!-- Subtle Room Glow Filter -->
                                <filter id="roomGlowFilter" x="-10%" y="-10%" width="120%" height="120%">
                                    <feDropShadow dx="0" dy="0" stdDeviation="6" flood-color="#29C6D1" flood-opacity="0.45" />
                                </filter>
                                <filter id="pinShadowFilter" x="-20%" y="-20%" width="140%" height="140%">
                                    <feDropShadow dx="0" dy="3" stdDeviation="4" flood-color="#0c2b3d" flood-opacity="0.3" />
                                </filter>

                                <!-- Room Gradient Fills -->
                                <linearGradient id="gradDefault" x1="0%" y1="0%" x2="100%" y2="100%">
                                    <stop offset="0%" stop-color="#ffffff" stop-opacity="0.95" />
                                    <stop offset="100%" stop-color="#f0f9fc" stop-opacity="0.95" />
                                </linearGradient>
                                <linearGradient id="gradActive" x1="0%" y1="0%" x2="100%" y2="100%">
                                    <stop offset="0%" stop-color="#e3f8fa" stop-opacity="0.98" />
                                    <stop offset="100%" stop-color="#d0f2f7" stop-opacity="0.98" />
                                </linearGradient>
                            </defs>

                            <!-- Blueprint Canvas Background -->
                            <rect width="960" height="600" fill="#f8fcfe" />
                            <rect width="960" height="600" fill="url(#bpGridPattern)" />

                            <!-- Compass Rose / North Indicator -->
                            <g transform="translate(900, 45)" opacity="0.65">
                                <circle cx="0" cy="0" r="16" fill="#ffffff" stroke="#287DA8" stroke-width="1.5" />
                                <polygon points="0,-12 4,0 -4,0" fill="#287DA8" />
                                <polygon points="0,12 4,0 -4,0" fill="#D8EAF1" />
                                <text x="0" y="-14" font-size="8" font-weight="bold" fill="#287DA8" text-anchor="middle">N</text>
                            </g>

                            <!-- ==============================================
                                 ROOM 1: KITCHEN (المطبخ العصري) - Top Left
                                 ============================================== -->
                            <g class="floorplan-room active" id="room-kitchen" data-room="kitchen" tabindex="0" role="button" aria-label="المطبخ العصري">
                                <!-- Background Zone -->
                                <rect class="room-zone" x="50" y="50" width="270" height="240" rx="8" fill="url(#gradDefault)" stroke="#287DA8" stroke-width="2" />
                                <rect x="50" y="50" width="270" height="240" fill="url(#tilePattern)" opacity="0.4" pointer-events="none" />

                                <!-- Furniture: L-Shaped Counter -->
                                <path d="M 54 54 L 260 54 L 260 95 L 105 95 L 105 240 L 54 240 Z" fill="#e2edf3" stroke="#287DA8" stroke-width="1.2" />
                                
                                <!-- Cooktop Stove (4 Burners) -->
                                <rect x="120" y="60" width="55" height="30" rx="3" fill="#ffffff" stroke="#287DA8" stroke-width="1" />
                                <circle cx="132" cy="70" r="5" fill="#287DA8" opacity="0.5" />
                                <circle cx="132" cy="80" r="4" fill="#287DA8" opacity="0.5" />
                                <circle cx="162" cy="70" r="5" fill="#287DA8" opacity="0.5" />
                                <circle cx="162" cy="80" r="4" fill="#287DA8" opacity="0.5" />

                                <!-- Dual Basin Sink & Faucet -->
                                <rect x="190" y="60" width="60" height="28" rx="2" fill="#ffffff" stroke="#287DA8" stroke-width="1" />
                                <rect x="194" y="64" width="24" height="20" rx="2" fill="#cce5f0" />
                                <rect x="224" y="64" width="22" height="20" rx="2" fill="#cce5f0" />
                                <circle cx="221" cy="62" r="2.5" fill="#287DA8" />

                                <!-- Refrigerator -->
                                <rect x="56" y="165" width="44" height="55" rx="3" fill="#ffffff" stroke="#287DA8" stroke-width="1.2" />
                                <line x1="56" y1="200" x2="100" y2="200" stroke="#287DA8" stroke-width="0.8" />
                                <text x="78" y="185" font-size="8" fill="#287DA8" text-anchor="middle" font-weight="600">FRIDGE</text>

                                <!-- Kitchen Island with Stools -->
                                <rect x="145" y="145" width="125" height="55" rx="6" fill="#ffffff" stroke="#287DA8" stroke-width="1.2" />
                                <rect x="150" y="150" width="115" height="45" rx="4" fill="#f0f7fa" stroke="rgba(40, 125, 168, 0.4)" stroke-dasharray="2,2" />
                                <circle cx="175" cy="215" r="9" fill="#e2edf3" stroke="#287DA8" stroke-width="1" />
                                <circle cx="230" cy="215" r="9" fill="#e2edf3" stroke="#287DA8" stroke-width="1" />

                                <!-- Interactive Center Beacon Pin -->
                                <g class="room-beacon" transform="translate(185, 115)">
                                    <circle class="beacon-pulse" cx="0" cy="0" r="22" fill="#29C6D1" opacity="0.25" />
                                    <circle class="beacon-dot" cx="0" cy="0" r="14" fill="#287DA8" filter="url(#pinShadowFilter)" />
                                    <text x="0" y="4" font-size="11" fill="#ffffff" text-anchor="middle" font-family="FontAwesome">&#xf2e7;</text>
                                    <!-- Label Badge -->
                                    <g transform="translate(0, 26)">
                                        <rect x="-42" y="-10" width="84" height="20" rx="10" fill="#287DA8" />
                                        <text x="0" y="4" font-size="9.5" fill="#ffffff" text-anchor="middle" font-weight="bold">المطبخ العصري</text>
                                    </g>
                                </g>
                            </g>

                            <!-- ==============================================
                                 ROOM 2: LIVING ROOM & MAJLIS (صالة المعيشة) - Top Center
                                 ============================================== -->
                            <g class="floorplan-room" id="room-living" data-room="living" tabindex="0" role="button" aria-label="صالة المعيشة والمجلس">
                                <!-- Background Zone -->
                                <rect class="room-zone" x="335" y="50" width="365" height="255" rx="8" fill="url(#gradDefault)" stroke="#287DA8" stroke-width="2" />
                                
                                <!-- Panoramic Window (Top Glass) -->
                                <line x1="380" y1="50" x2="650" y2="50" stroke="#29C6D1" stroke-width="5" stroke-linecap="round" />
                                <line x1="380" y1="46" x2="650" y2="46" stroke="#287DA8" stroke-width="1" stroke-dasharray="8,4" />

                                <!-- Large Modular L-Sofa -->
                                <path d="M 365 95 L 590 95 C 596 95 600 99 600 105 L 600 145 C 600 151 596 155 590 155 L 430 155 L 430 235 C 430 241 426 245 420 245 L 375 245 C 369 245 365 241 365 235 Z" 
                                      fill="#e0eff5" stroke="#287DA8" stroke-width="1.5" />
                                <!-- Sofa Cushions Stitches -->
                                <line x1="430" y1="95" x2="430" y2="155" stroke="#287DA8" stroke-width="0.8" stroke-dasharray="3,2" />
                                <line x1="500" y1="95" x2="500" y2="155" stroke="#287DA8" stroke-width="0.8" stroke-dasharray="3,2" />
                                <line x1="365" y1="185" x2="430" y2="185" stroke="#287DA8" stroke-width="0.8" stroke-dasharray="3,2" />

                                <!-- Patterned Area Carpet / Rug -->
                                <rect x="445" y="165" width="155" height="95" rx="8" fill="#ffffff" stroke="#29C6D1" stroke-width="1" />
                                <rect x="450" y="170" width="145" height="85" rx="6" fill="#f4fafc" stroke="rgba(40, 125, 168, 0.25)" stroke-dasharray="4,2" />

                                <!-- Coffee Table -->
                                <rect x="475" y="185" width="95" height="42" rx="7" fill="#ffffff" stroke="#287DA8" stroke-width="1.3" />
                                <line x1="475" y1="206" x2="570" y2="206" stroke="rgba(40, 125, 168, 0.3)" stroke-width="1" />

                                <!-- TV Entertainment Unit -->
                                <rect x="480" y="295" width="150" height="9" rx="2" fill="#287DA8" />

                                <!-- Single Accent Armchair -->
                                <rect x="620" y="175" width="50" height="48" rx="8" fill="#e0eff5" stroke="#287DA8" stroke-width="1.2" />

                                <!-- Ficus Indoor Plant -->
                                <circle cx="665" cy="80" r="14" fill="#d5f5e3" stroke="#27ae60" stroke-width="1.2" />
                                <circle cx="665" cy="80" r="5" fill="#27ae60" />

                                <!-- Interactive Center Beacon Pin -->
                                <g class="room-beacon" transform="translate(520, 115)">
                                    <circle class="beacon-pulse" cx="0" cy="0" r="22" fill="#29C6D1" opacity="0.25" />
                                    <circle class="beacon-dot" cx="0" cy="0" r="14" fill="#287DA8" filter="url(#pinShadowFilter)" />
                                    <text x="0" y="4" font-size="11" fill="#ffffff" text-anchor="middle" font-family="FontAwesome">&#xf4b8;</text>
                                    <!-- Label Badge -->
                                    <g transform="translate(0, 26)">
                                        <rect x="-52" y="-10" width="104" height="20" rx="10" fill="#287DA8" />
                                        <text x="0" y="4" font-size="9.5" fill="#ffffff" text-anchor="middle" font-weight="bold">صالة المعيشة والمجلس</text>
                                    </g>
                                </g>
                            </g>

                            <!-- ==============================================
                                 ROOM 3: DINING ROOM (غرفة الطعام) - Top Right
                                 ============================================== -->
                            <g class="floorplan-room" id="room-dining" data-room="dining" tabindex="0" role="button" aria-label="غرفة الطعام">
                                <!-- Background Zone -->
                                <rect class="room-zone" x="715" y="50" width="195" height="255" rx="8" fill="url(#gradDefault)" stroke="#287DA8" stroke-width="2" />

                                <!-- Dining Table (6 Chairs) -->
                                <rect x="750" y="120" width="125" height="65" rx="10" fill="#ffffff" stroke="#287DA8" stroke-width="1.4" />
                                <circle cx="812" cy="152" r="12" fill="none" stroke="#29C6D1" stroke-width="1.2" stroke-dasharray="3,2" />
                                <circle cx="812" cy="152" r="3" fill="#287DA8" />

                                <!-- Top Chairs -->
                                <rect x="760" y="96" width="25" height="18" rx="4" fill="#e2edf3" stroke="#287DA8" stroke-width="1" />
                                <rect x="800" y="96" width="25" height="18" rx="4" fill="#e2edf3" stroke="#287DA8" stroke-width="1" />
                                <rect x="840" y="96" width="25" height="18" rx="4" fill="#e2edf3" stroke="#287DA8" stroke-width="1" />

                                <!-- Bottom Chairs -->
                                <rect x="760" y="191" width="25" height="18" rx="4" fill="#e2edf3" stroke="#287DA8" stroke-width="1" />
                                <rect x="800" y="191" width="25" height="18" rx="4" fill="#e2edf3" stroke="#287DA8" stroke-width="1" />
                                <rect x="840" y="191" width="25" height="18" rx="4" fill="#e2edf3" stroke="#287DA8" stroke-width="1" />

                                <!-- Sideboard Buffet Credenza -->
                                <rect x="895" y="90" width="12" height="110" rx="3" fill="#ffffff" stroke="#287DA8" stroke-width="1.2" />

                                <!-- Interactive Center Beacon Pin -->
                                <g class="room-beacon" transform="translate(812, 152)">
                                    <circle class="beacon-pulse" cx="0" cy="0" r="22" fill="#29C6D1" opacity="0.25" />
                                    <circle class="beacon-dot" cx="0" cy="0" r="14" fill="#287DA8" filter="url(#pinShadowFilter)" />
                                    <text x="0" y="4" font-size="11" fill="#ffffff" text-anchor="middle" font-family="FontAwesome">&#xf79f;</text>
                                    <!-- Label Badge -->
                                    <g transform="translate(0, 26)">
                                        <rect x="-38" y="-10" width="76" height="20" rx="10" fill="#287DA8" />
                                        <text x="0" y="4" font-size="9.5" fill="#ffffff" text-anchor="middle" font-weight="bold">غرفة الطعام</text>
                                    </g>
                                </g>
                            </g>

                            <!-- ==============================================
                                 ROOM 4: MASTER BATHROOM (الحمام الرئيسي) - Bottom Left
                                 ============================================== -->
                            <g class="floorplan-room" id="room-bathroom" data-room="bathroom" tabindex="0" role="button" aria-label="الحمام الرئيسي">
                                <!-- Background Zone -->
                                <rect class="room-zone" x="50" y="305" width="270" height="245" rx="8" fill="url(#gradDefault)" stroke="#287DA8" stroke-width="2" />
                                <rect x="50" y="305" width="270" height="245" fill="url(#tilePattern)" opacity="0.45" pointer-events="none" />

                                <!-- Freestanding Luxury Bathtub -->
                                <rect x="65" y="325" width="115" height="60" rx="28" fill="#ffffff" stroke="#287DA8" stroke-width="1.5" />
                                <rect x="75" y="333" width="95" height="44" rx="20" fill="#eaf6fa" stroke="#29C6D1" stroke-width="1" />
                                <circle cx="85" cy="355" r="4" fill="#287DA8" />

                                <!-- Walk-in Glass Shower Enclosure -->
                                <rect x="200" y="320" width="110" height="95" rx="4" fill="#ffffff" stroke="#287DA8" stroke-width="1.4" />
                                <line x1="200" y1="415" x2="310" y2="415" stroke="#29C6D1" stroke-width="3" stroke-linecap="round" />
                                <circle cx="255" cy="365" r="7" fill="none" stroke="#287DA8" stroke-width="1.2" />
                                <circle cx="255" cy="365" r="2.5" fill="#287DA8" />
                                <line x1="240" y1="365" x2="270" y2="365" stroke="rgba(40,125,168,0.3)" stroke-width="1" />
                                <line x1="255" y1="350" x2="255" y2="380" stroke="rgba(40,125,168,0.3)" stroke-width="1" />

                                <!-- Double Vanity Sink Unit -->
                                <rect x="65" y="475" width="135" height="45" rx="4" fill="#ffffff" stroke="#287DA8" stroke-width="1.4" />
                                <!-- Basin 1 -->
                                <ellipse cx="98" cy="497" rx="18" ry="12" fill="#e0f2f7" stroke="#287DA8" stroke-width="1" />
                                <circle cx="98" cy="483" r="2" fill="#287DA8" />
                                <!-- Basin 2 -->
                                <ellipse cx="165" cy="497" rx="18" ry="12" fill="#e0f2f7" stroke="#287DA8" stroke-width="1" />
                                <circle cx="165" cy="483" r="2" fill="#287DA8" />

                                <!-- Toilet Unit -->
                                <rect x="245" y="470" width="45" height="22" rx="3" fill="#ffffff" stroke="#287DA8" stroke-width="1.2" />
                                <ellipse cx="267" cy="512" rx="16" ry="20" fill="#ffffff" stroke="#287DA8" stroke-width="1.2" />
                                <ellipse cx="267" cy="514" rx="11" ry="15" fill="#e2edf3" />

                                <!-- Interactive Center Beacon Pin -->
                                <g class="room-beacon" transform="translate(180, 435)">
                                    <circle class="beacon-pulse" cx="0" cy="0" r="22" fill="#29C6D1" opacity="0.25" />
                                    <circle class="beacon-dot" cx="0" cy="0" r="14" fill="#287DA8" filter="url(#pinShadowFilter)" />
                                    <text x="0" y="4" font-size="11" fill="#ffffff" text-anchor="middle" font-family="FontAwesome">&#xf2cd;</text>
                                    <!-- Label Badge -->
                                    <g transform="translate(0, 26)">
                                        <rect x="-42" y="-10" width="84" height="20" rx="10" fill="#287DA8" />
                                        <text x="0" y="4" font-size="9.5" fill="#ffffff" text-anchor="middle" font-weight="bold">الحمام الرئيسي</text>
                                    </g>
                                </g>
                            </g>

                            <!-- ==============================================
                                 ROOM 5: MASTER BEDROOM (غرفة النوم الرئيسية) - Bottom Center
                                 ============================================== -->
                            <g class="floorplan-room" id="room-bedroom" data-room="bedroom" tabindex="0" role="button" aria-label="غرفة النوم الرئيسية">
                                <!-- Background Zone -->
                                <rect class="room-zone" x="335" y="320" width="365" height="230" rx="8" fill="url(#gradDefault)" stroke="#287DA8" stroke-width="2" />
                                <rect x="335" y="320" width="365" height="230" fill="url(#woodPattern)" opacity="0.4" pointer-events="none" />

                                <!-- King Size Bed -->
                                <rect x="430" y="340" width="175" height="150" rx="8" fill="#ffffff" stroke="#287DA8" stroke-width="1.5" />
                                <!-- Headboard -->
                                <rect x="420" y="330" width="195" height="15" rx="3" fill="#287DA8" />
                                <!-- Dual Pillows -->
                                <rect x="445" y="352" width="58" height="32" rx="6" fill="#e0f0f5" stroke="#287DA8" stroke-width="1" />
                                <rect x="532" y="352" width="58" height="32" rx="6" fill="#e0f0f5" stroke="#287DA8" stroke-width="1" />
                                <!-- Folded Duvet Texture -->
                                <path d="M 432 410 L 603 410 L 603 488 C 603 491 600 493 596 493 L 439 493 C 435 493 432 491 432 488 Z" fill="#ebf6fa" stroke="rgba(40,125,168,0.4)" stroke-width="1" />
                                <line x1="432" y1="410" x2="603" y2="410" stroke="#29C6D1" stroke-width="2" />

                                <!-- Dual Nightstands with Lamps -->
                                <rect x="390" y="345" width="28" height="34" rx="4" fill="#ffffff" stroke="#287DA8" stroke-width="1" />
                                <circle cx="404" cy="362" r="7" fill="#fdf0cd" stroke="#f39c12" stroke-width="1" />

                                <rect x="618" y="345" width="28" height="34" rx="4" fill="#ffffff" stroke="#287DA8" stroke-width="1" />
                                <circle cx="632" cy="362" r="7" fill="#fdf0cd" stroke="#f39c12" stroke-width="1" />

                                <!-- Sliding Mirror Wardrobe -->
                                <rect x="410" y="522" width="215" height="22" rx="3" fill="#ffffff" stroke="#287DA8" stroke-width="1.3" />
                                <line x1="517" y1="522" x2="517" y2="544" stroke="#287DA8" stroke-width="1.2" />
                                <text x="517" y="536" font-size="8.5" fill="#287DA8" text-anchor="middle" font-weight="600">WARDROBE</text>

                                <!-- Interactive Center Beacon Pin -->
                                <g class="room-beacon" transform="translate(517, 430)">
                                    <circle class="beacon-pulse" cx="0" cy="0" r="22" fill="#29C6D1" opacity="0.25" />
                                    <circle class="beacon-dot" cx="0" cy="0" r="14" fill="#287DA8" filter="url(#pinShadowFilter)" />
                                    <text x="0" y="4" font-size="11" fill="#ffffff" text-anchor="middle" font-family="FontAwesome">&#xf236;</text>
                                    <!-- Label Badge -->
                                    <g transform="translate(0, 26)">
                                        <rect x="-48" y="-10" width="96" height="20" rx="10" fill="#287DA8" />
                                        <text x="0" y="4" font-size="9.5" fill="#ffffff" text-anchor="middle" font-weight="bold">غرفة النوم الرئيسية</text>
                                    </g>
                                </g>
                            </g>

                            <!-- ==============================================
                                 ROOM 6: BALCONY / TERRACE (الشرفة الخارجية) - Bottom Right
                                 ============================================== -->
                            <g class="floorplan-room" id="room-balcony" data-room="balcony" tabindex="0" role="button" aria-label="الشرفة والواجهة البانورامية">
                                <!-- Background Zone -->
                                <rect class="room-zone" x="715" y="320" width="195" height="230" rx="8" fill="url(#gradDefault)" stroke="#287DA8" stroke-width="2" />
                                <rect x="715" y="320" width="195" height="230" fill="url(#deckPattern)" opacity="0.4" pointer-events="none" />

                                <!-- Balcony Glass Railing -->
                                <line x1="715" y1="545" x2="905" y2="545" stroke="#29C6D1" stroke-width="5" stroke-linecap="round" />
                                <line x1="905" y1="320" x2="905" y2="545" stroke="#29C6D1" stroke-width="5" stroke-linecap="round" />

                                <!-- Outdoor Round Bistro Table -->
                                <circle cx="810" cy="425" r="28" fill="#ffffff" stroke="#287DA8" stroke-width="1.3" />
                                <circle cx="810" cy="425" r="20" fill="#eaf6fa" stroke="rgba(40,125,168,0.3)" stroke-dasharray="3,2" />

                                <!-- 2 Outdoor Chairs -->
                                <circle cx="765" cy="425" r="13" fill="#e2edf3" stroke="#287DA8" stroke-width="1" />
                                <circle cx="855" cy="425" r="13" fill="#e2edf3" stroke="#287DA8" stroke-width="1" />

                                <!-- Foliage & Green Planter Boxes -->
                                <rect x="725" y="330" width="55" height="20" rx="4" fill="#d5f5e3" stroke="#27ae60" stroke-width="1" />
                                <circle cx="740" cy="340" r="5" fill="#27ae60" />
                                <circle cx="755" cy="340" r="6" fill="#2ecc71" />
                                <circle cx="768" cy="340" r="5" fill="#27ae60" />

                                <!-- Interactive Center Beacon Pin -->
                                <g class="room-beacon" transform="translate(810, 425)">
                                    <circle class="beacon-pulse" cx="0" cy="0" r="22" fill="#29C6D1" opacity="0.25" />
                                    <circle class="beacon-dot" cx="0" cy="0" r="14" fill="#287DA8" filter="url(#pinShadowFilter)" />
                                    <text x="0" y="4" font-size="11" fill="#ffffff" text-anchor="middle" font-family="FontAwesome">&#xf72e;</text>
                                    <!-- Label Badge -->
                                    <g transform="translate(0, 26)">
                                        <rect x="-42" y="-10" width="84" height="20" rx="10" fill="#287DA8" />
                                        <text x="0" y="4" font-size="9.5" fill="#ffffff" text-anchor="middle" font-weight="bold">الشرفة والواجهة</text>
                                    </g>
                                </g>
                            </g>

                            <!-- Hallway Doors & Swing Arcs -->
                            <g opacity="0.6">
                                <!-- Kitchen Door Arc -->
                                <path d="M 320 200 A 30 30 0 0 1 320 230" fill="none" stroke="#287DA8" stroke-width="1" stroke-dasharray="2,2" />
                                <line x1="320" y1="200" x2="320" y2="230" stroke="#287DA8" stroke-width="1.5" />
                                <!-- Bedroom Door Arc -->
                                <path d="M 335 340 A 30 30 0 0 1 365 340" fill="none" stroke="#287DA8" stroke-width="1" stroke-dasharray="2,2" />
                            </g>
                        </svg>

                        <!-- Dynamic Floating Hover Tooltip (Tracks Mouse/Pin) -->
                        <div class="floorplan-dynamic-tooltip" id="floorplanTooltip" aria-hidden="true">
                            <div class="tooltip-header d-flex align-items-center gap-2 mb-2">
                                <span class="tooltip-icon" id="tooltipIcon"><i class="fa-solid fa-utensils"></i></span>
                                <h6 class="tooltip-title mb-0 fw-bold" id="tooltipTitle">المطبخ العصري</h6>
                            </div>
                            <ul class="tooltip-list list-unstyled mb-2" id="tooltipList">
                                <li><i class="fa-solid fa-circle-check text-brand-secondary me-1"></i> إزالة الدهون والشحوم العنيدة</li>
                                <li><i class="fa-solid fa-circle-check text-brand-secondary me-1"></i> تعقيم الأفران والشفاطات بالبخار</li>
                            </ul>
                            <div class="tooltip-hint small text-muted">
                                <i class="fa-solid fa-hand-pointer text-brand-primary me-1"></i> انقر لعرض التفاصيل الكاملة
                            </div>
                        </div>
                    </div>

                    <!-- Blueprint Bottom Legend / Stats Bar -->
                    <div class="blueprint-footer p-3 bg-white border-top d-flex flex-wrap align-items-center justify-content-between gap-2">
                        <div class="d-flex align-items-center gap-3 small text-secondary">
                            <span><i class="fa-solid fa-circle text-brand-secondary me-1" style="font-size: 8px;"></i> اضغط على أي غرفة للتفاصيل</span>
                            <span class="d-none d-md-inline">•</span>
                            <span class="d-none d-md-inline"><i class="fa-solid fa-shield-virus text-brand-primary me-1"></i> تعقيم كيميائي وبخار 160°C</span>
                        </div>
                        <div class="small fw-bold text-brand-primary">
                            <i class="fa-solid fa-sparkles text-brand-secondary me-1"></i> جودة فندقية وضمان ذهبي 100%
                        </div>
                    </div>
                </div>
            </div>

            <!-- RIGHT (RTL: Inspector Detail Card Column) -->
            <div class="col-lg-5 col-xl-4" data-aos="fade-left" data-aos-delay="200">
                <div class="room-inspector-card h-100 p-4 p-md-4 shadow-sm position-relative d-flex flex-column justify-content-between" id="roomInspectorCard">
                    
                    <!-- Top Room Header -->
                    <div>
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <span class="badge bg-brand-light text-brand-primary border border-brand px-3 py-1 rounded-pill small fw-bold" id="inspectorBadge">
                                <i class="fa-solid fa-sparkles me-1 text-brand-secondary"></i> إزالة الدهون والتعقيم الفائق
                            </span>
                            <span class="inspector-icon-bubble" id="inspectorIcon">
                                <i class="fa-solid fa-utensils"></i>
                            </span>
                        </div>

                        <h3 class="fw-heading text-brand-primary fs-4 mb-2" id="inspectorTitle">
                            المطبخ العصري والأجهزة
                        </h3>
                        
                        <p class="text-secondary small mb-3 lh-base" id="inspectorTagline">
                            تنظيف عميق وإذابة أصعب الدهون والزيوت لبيئة طبخ صحية وآمنة 100% مع تعقيم شامل لجميع الأسطح.
                        </p>

                        <hr class="border-light-subtle my-3">

                        <!-- Tasks Checklist -->
                        <h6 class="fw-bold text-brand-primary mb-2 small">
                            <i class="fa-solid fa-list-check text-brand-secondary me-1"></i> قائمة مهام التنظيف المشمولة:
                        </h6>
                        <ul class="inspector-task-list list-unstyled mb-3" id="inspectorTasks">
                            <li>
                                <i class="fa-solid fa-circle-check text-success me-2"></i>
                                <span>إذابة الدهون المستعصية من الشفاطات والبوتاجازات والأفران</span>
                            </li>
                            <li>
                                <i class="fa-solid fa-circle-check text-success me-2"></i>
                                <span>تنظيف وتطهير خزائن ودواليب المطبخ من الداخل والخارج</span>
                            </li>
                            <li>
                                <i class="fa-solid fa-circle-check text-success me-2"></i>
                                <span>تعقيم وتلميع الأحواض وخلاطات المياه بمواد طبية مضادة للبكتيريا</span>
                            </li>
                            <li>
                                <i class="fa-solid fa-circle-check text-success me-2"></i>
                                <span>جلي وتطهير سيراميك الأرضيات والجدران وإزالة التراكمات الدهنية</span>
                            </li>
                            <li>
                                <i class="fa-solid fa-circle-check text-success me-2"></i>
                                <span>تنظيف وتلميع الثلاجة والميكروويف والأجهزة الكهربائية</span>
                            </li>
                        </ul>

                        <!-- Spec Highlights -->
                        <div class="inspector-specs-box p-3 rounded-3 mb-3">
                            <div class="row g-2 text-center">
                                <div class="col-6 border-end">
                                    <small class="text-muted d-block mb-1">⏱️ الوقت المقدر</small>
                                    <strong class="text-brand-primary small" id="inspectorDuration">45 - 60 دقيقة</strong>
                                </div>
                                <div class="col-6">
                                    <small class="text-muted d-block mb-1">🛡️ الضمان</small>
                                    <strong class="text-brand-primary small">إعادة مجانية 100%</strong>
                                </div>
                            </div>
                        </div>

                        <!-- Sanitizers & Products Box -->
                        <div class="d-flex align-items-center gap-2 p-2 px-3 rounded-2 bg-white border border-light-subtle small mb-3">
                            <i class="fa-solid fa-spray-can-sparkles text-brand-secondary fs-5 flex-shrink-0"></i>
                            <div>
                                <small class="text-muted d-block" style="font-size: 0.72rem;">المعدات والمواد المستخدمة:</small>
                                <span class="fw-semibold text-secondary" id="inspectorProducts" style="font-size: 0.8rem;">
                                    منظفات كارتشر الألمانية • معقمات معتمدة خالية من الروائح
                                </span>
                            </div>
                        </div>
                    </div>

                    <!-- Bottom Action Buttons -->
                    <div class="mt-2">
                        <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', setting('top_bar_whatsapp', '966531109831')) }}?text={{ urlencode('مرحباً سين ياء، أود الاستفسار وحجز خدمة تنظيف وتعقيم المطبخ العصري') }}"
                           target="_blank" class="btn btn-brand-whatsapp w-100 py-3 rounded-pill fw-bold shadow-sm mb-2" id="inspectorWaBtn">
                            <i class="fa-brands fa-whatsapp fs-5 me-2"></i> احجز تنظيف الغرفة عبر واتساب
                        </a>

                        <div class="d-flex gap-2">
                            <a href="tel:{{ preg_replace('/[^0-9+]/', '', setting('top_bar_phone', '0531109831')) }}" 
                               class="btn btn-outline-brand flex-grow-1 rounded-pill py-2 small">
                                <i class="fa-solid fa-phone me-1"></i> اتصال مباشر
                            </a>
                            <a href="#services-grid" class="btn btn-light border text-brand-primary rounded-pill px-3 py-2 small">
                                جميع الباقات
                            </a>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
</section>
