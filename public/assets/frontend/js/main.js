/**
 * Sin Yaa Cleaning - Main JS (Bootstrap 5 Integrated)
 */

document.addEventListener("DOMContentLoaded", () => {
    const WHATSAPP_NUMBER = "966582102525";

    // 0. Preloader Controller (Smooth Dismissal & Coordinate Refresh)
    const preloader = document.getElementById("preloader");
    if (preloader) {
        const hidePreloader = () => {
            if (!preloader.classList.contains("loaded")) {
                preloader.classList.add("loaded");
                setTimeout(() => {
                    preloader.style.display = "none";
                    if (typeof AOS !== "undefined") {
                        AOS.refresh();
                    }
                }, 650);
            }
        };

        if (document.readyState === "complete") {
            setTimeout(hidePreloader, 350);
        } else {
            window.addEventListener("load", () =>
                setTimeout(hidePreloader, 350),
            );
            // Guaranteed safety timeout (1.5s)
            setTimeout(hidePreloader, 1500);
        }
    }

    // 1. Service Filter Tabs (Bootstrap buttons filter)
    const filterBtns = document.querySelectorAll("[data-filter]");
    const serviceCards = document.querySelectorAll(".service-item");

    if (filterBtns.length && serviceCards.length) {
        filterBtns.forEach((btn) => {
            btn.addEventListener("click", () => {
                filterBtns.forEach((b) => {
                    b.classList.remove("btn-brand-primary");
                    b.classList.add("btn-outline-secondary");
                });
                btn.classList.remove("btn-outline-secondary");
                btn.classList.add("btn-brand-primary");

                const cat = btn.getAttribute("data-filter");
                serviceCards.forEach((card) => {
                    if (
                        cat === "all" ||
                        card.getAttribute("data-cat") === cat
                    ) {
                        card.closest(".col-service").style.display = "block";
                    } else {
                        card.closest(".col-service").style.display = "none";
                    }
                });
                if (typeof AOS !== "undefined") {
                    AOS.refresh();
                }
            });
        });
    }

    // 2. Before / After Comparison Slider
    const baBefore = document.querySelector(".ba-before");
    const baHandle = document.querySelector(".ba-handle");
    const baInput = document.querySelector('.ba-slider input[type="range"]');

    if (baBefore && baHandle && baInput) {
        baInput.addEventListener("input", (e) => {
            const val = e.target.value;
            baBefore.style.width = `${val}%`;
            baHandle.style.left = `${val}%`;
        });
    }

    // 3. WhatsApp Direct Booking Form (Prepares formatted WhatsApp message)
    document.querySelectorAll(".whatsapp-booking-form").forEach((form) => {
        form.addEventListener("submit", (e) => {
            e.preventDefault();
            const fd = new FormData(form);
            const name = fd.get("name") || "عميلنا العزيز";
            const phone = fd.get("phone") || "";
            const service = fd.get("service") || "خدمة تنظيف شامل";
            const city = fd.get("city") || "الرياض";
            const notes = fd.get("notes") || "";

            const msg =
                `مرحباً سين ياء كلين 🌟%0A` +
                `أود تأكيد طلب حجز خدمة تنظيف:%0A%0A` +
                `👤 *الاسم:* ${encodeURIComponent(name)}%0A` +
                `📱 *الجوال:* ${encodeURIComponent(phone)}%0A` +
                `🧹 *الخدمة:* ${encodeURIComponent(service)}%0A` +
                `📍 *المدينة / الحي:* ${encodeURIComponent(city)}` +
                (notes ? `%0A📝 *ملاحظات:* ${encodeURIComponent(notes)}` : "");

            showToast("جاري تحويلك إلى واتساب لإتمام الحجز...");
            setTimeout(() => {
                window.open(
                    `https://wa.me/${WHATSAPP_NUMBER}?text=${msg}`,
                    "_blank",
                );
                form.reset();
                // Close modal if open
                const modalEl = document.getElementById("bookingModal");
                if (modalEl) {
                    const modalInstance = bootstrap.Modal.getInstance(modalEl);
                    if (modalInstance) modalInstance.hide();
                }
            }, 700);
        });
    });

    // 4. Direct Service WhatsApp Buttons
    document.querySelectorAll("[data-wa-service]").forEach((btn) => {
        btn.addEventListener("click", (e) => {
            e.preventDefault();
            const service = btn.getAttribute("data-wa-service");
            const msg = encodeURIComponent(
                `مرحباًشركة سين ياء كلين  أود الاستفسار وحجز خدمة: *${service}*`,
            );
            window.open(
                `https://wa.me/${WHATSAPP_NUMBER}?text=${msg}`,
                "_blank",
            );
        });
    });

    // 7. Gallery Lightbox Modal Handler
    document.querySelectorAll("[data-gallery-img]").forEach((item) => {
        item.addEventListener("click", (e) => {
            e.preventDefault();
            const imgSrc = item.getAttribute("data-gallery-img");
            const title =
                item.getAttribute("data-gallery-title") ||
                "معرض أعمال سلطان كلين";
            const category =
                item.getAttribute("data-gallery-cat") || "خدمة نظافة متخصصة";
            const location =
                item.getAttribute("data-gallery-location") || "الرياض";

            const modalEl = document.getElementById("galleryLightboxModal");
            if (modalEl) {
                const modalImg = modalEl.querySelector("#lightboxImg");
                const modalTitle = modalEl.querySelector("#lightboxTitle");
                const modalCat = modalEl.querySelector("#lightboxCategory");
                const modalLoc = modalEl.querySelector("#lightboxLocation");
                const modalWaBtn = modalEl.querySelector("#lightboxWaBtn");

                if (modalImg) modalImg.src = imgSrc;
                if (modalTitle) modalTitle.textContent = title;
                if (modalCat) modalCat.textContent = category;
                if (modalLoc) modalLoc.textContent = location;
                if (modalWaBtn) {
                    const waMsg = `مرحباً سين ياء 🌟 شاهدت صورة عملكم في المعرض (${title} - ${location}) وأرغب في حجز نفس الخدمة`;
                    modalWaBtn.href = `https://wa.me/${WHATSAPP_NUMBER}?text=${encodeURIComponent(waMsg)}`;
                }

                const modal = new bootstrap.Modal(modalEl);
                modal.show();
            }
        });
    });

    // 8. Auto-close mobile navbar on link click
    const navCollapse = document.getElementById("mainNav");
    if (navCollapse) {
        const navLinks = navCollapse.querySelectorAll(".nav-link");
        navLinks.forEach((link) => {
            link.addEventListener("click", () => {
                if (
                    window.innerWidth < 992 &&
                    navCollapse.classList.contains("show")
                ) {
                    const bsCollapse =
                        bootstrap.Collapse.getInstance(navCollapse) ||
                        new bootstrap.Collapse(navCollapse, { toggle: false });
                    bsCollapse.hide();
                }
            });
        });
    }

    // 9. Scroll To Top Button (Auto-injected if not present + smooth scroll)
    let scrollBtn = document.getElementById("scrollTopBtn");
    if (!scrollBtn) {
        scrollBtn = document.createElement("button");
        scrollBtn.id = "scrollTopBtn";
        scrollBtn.className = "scroll-top-btn";
        scrollBtn.setAttribute("aria-label", "العودة للأعلى");
        scrollBtn.setAttribute("title", "العودة لأعلى الصفحة");
        scrollBtn.innerHTML = '<i class="fa-solid fa-arrow-up"></i>';
        document.body.appendChild(scrollBtn);
    }

    const handleScrollBtn = () => {
        if (window.scrollY > 280) {
            scrollBtn.classList.add("show");
        } else {
            scrollBtn.classList.remove("show");
        }
    };

    window.addEventListener("scroll", handleScrollBtn, { passive: true });
    handleScrollBtn();

    scrollBtn.addEventListener("click", () => {
        window.scrollTo({
            top: 0,
            behavior: "smooth",
        });
    });

    // 10. Simple Toast Notification
    function showToast(text) {
        let toast = document.querySelector(".toast-msg");
        if (!toast) {
            toast = document.createElement("div");
            toast.className = "toast-msg";
            document.body.appendChild(toast);
        }
        toast.innerHTML = `<i class="fa-solid fa-circle-check text-brand-accent me-2"></i> ${text}`;
        toast.classList.add("show");
        setTimeout(() => toast.classList.remove("show"), 3500);
    }

    // 11. AOS (Animate On Scroll) Initialization
    if (typeof AOS !== "undefined") {
        AOS.init({
            duration: 800,
            easing: "ease-out-cubic",
            once: true,
            offset: 50,
            delay: 50,
            disableMutationObserver: false,
        });
    }

    // 12. Interactive Living Room Hotspots Handler
    const hotspots = document.querySelectorAll(".room-hotspot");
    if (hotspots.length) {
        const mobileHint = document.getElementById("interactiveMobileHint");
        const mobileCard = document.getElementById("interactiveMobileCard");
        const mobileIcon = document.getElementById("mobileCardIcon");
        const mobileTitle = document.getElementById("mobileCardTitle");
        const mobileDesc = document.getElementById("mobileCardDesc");
        const mobileBtn = document.getElementById("mobileCardBtn");
        const closeMobileBtn = document.getElementById("closeMobileCardBtn");

        function closeMobileDetails() {
            hotspots.forEach((s) => s.classList.remove("active"));
            if (mobileCard && mobileHint) {
                mobileCard.classList.add("d-none");
                mobileHint.classList.remove("d-none");
            }
        }

        if (closeMobileBtn) {
            closeMobileBtn.addEventListener("click", (e) => {
                e.stopPropagation();
                closeMobileDetails();
            });
        }

        hotspots.forEach((spot) => {
            const trigger = spot.querySelector(".hotspot-trigger");
            if (trigger) {
                trigger.addEventListener("click", (e) => {
                    e.stopPropagation();
                    const isCurrentlyActive = spot.classList.contains("active");
                    hotspots.forEach((s) => s.classList.remove("active"));

                    if (!isCurrentlyActive) {
                        spot.classList.add("active");

                        // Update Mobile Card
                        if (mobileCard && mobileHint) {
                            const title = spot.querySelector(".popover-header h6")?.textContent.trim();
                            const desc = spot.querySelector(".popover-desc")?.textContent.trim();
                            const iconEl = spot.querySelector(".popover-header i");
                            const iconClass = iconEl ? iconEl.className : "fa-solid fa-sparkles";
                            const btn = spot.querySelector(".hotspot-popover a.btn");
                            const btnUrl = btn ? btn.getAttribute("href") : "#";
                            const btnText = btn ? btn.innerHTML : "طلب الخدمة";

                            if (mobileTitle) mobileTitle.textContent = title || "";
                            if (mobileDesc) mobileDesc.textContent = desc || "";
                            if (mobileIcon) mobileIcon.innerHTML = `<i class="${iconClass}"></i>`;
                            if (mobileBtn) {
                                mobileBtn.setAttribute("href", btnUrl);
                                mobileBtn.innerHTML = btnText;
                            }

                            mobileHint.classList.add("d-none");
                            mobileCard.classList.remove("d-none");
                        }
                    } else {
                        closeMobileDetails();
                    }
                });
            }
        });

        // Close any active hotspot when clicking outside
        document.addEventListener("click", (e) => {
            if (!e.target.closest(".room-hotspot") && !e.target.closest(".interactive-mobile-dock")) {
                closeMobileDetails();
            }
        });
    }

    // 13. Interactive SVG Floor Plan Handler
    const floorplanSvg = document.getElementById("homeFloorPlanSvg");
    if (floorplanSvg) {
        const floorplanRoomsData = {
            kitchen: {
                title: "المطبخ العصري والأجهزة",
                badge: "إزالة الدهون والتعقيم الفائق",
                icon: "fa-solid fa-utensils",
                tagline: "تنظيف عميق وإذابة أصعب الدهون والزيوت لبيئة طبخ صحية وآمنة 100% مع تعقيم شامل لجميع الأسطح.",
                tasks: [
                    "إذابة الدهون المستعصية من الشفاطات والبوتاجازات والأفران",
                    "تنظيف وتطهير خزائن ودواليب المطبخ من الداخل والخارج",
                    "تعقيم وتلميع الأحواض وخلاطات المياه بمواد طبية مضادة للبكتيريا",
                    "جلي وتطهير سيراميك الأرضيات والجدران وإزالة التراكمات الدهنية",
                    "تنظيف وتلميع الثلاجة والميكروويف والأجهزة الكهربائية"
                ],
                duration: "45 - 60 دقيقة",
                products: "منظفات كارتشر الألمانية • معقمات معتمدة خالية من الروائح",
                waMessage: "مرحباً سين ياء، أود الاستفسار وحجز خدمة تنظيف وتعقيم المطبخ العصري والأجهزة"
            },
            living: {
                title: "صالة المعيشة والمجلس",
                badge: "نظافة فندقية للمفروشات والرخام",
                icon: "fa-solid fa-couch",
                tagline: "استعادة رونق أثاثك ومفروشاتك بأحدث تقنيات الغسيل بالبخار الجاف وحماية الأنسجة.",
                tasks: [
                    "غسيل الكنب والمجالس وأطقم الجلوس بالبخار مع إزالة البقع العميقة",
                    "غسيل وتطهير السجاد والموكيت في مكانه وتجفيفه السريع",
                    "جلي وتلميع وتريستلة الأرضيات الرخامية والبلاط بأقراص الماس",
                    "تلميع النوافذ والواجهات الزجاجية والشاشات والتحف الفنية",
                    "تعطير فندقي ملكي يدوم طويلاً بمستخلصات طبيعية منعشة"
                ],
                duration: "60 - 90 دقيقة",
                products: "أجهزة بخار إيطالية بضغط 8 بار • شامبوهات أقمشة معتمدة",
                waMessage: "مرحباً سين ياء، أود حجز خدمة تنظيف وتعقيم صالة المعيشة والمجلس بالبخار"
            },
            bathroom: {
                title: "الحمام الرئيسي وغرف الاستحمام",
                badge: "مكافحة الجراثيم 99.9%",
                icon: "fa-solid fa-bath",
                tagline: "تطهير وقائي شامل وإزالة الترسبات الجيرية والتكلسات المزعجة واستعادة بريق السيراميك.",
                tasks: [
                    "إزالة التكلسات والأملاح والاصفرار من كبائن الشاور والبانيو",
                    "تطهير وتلميع المرايا والزجاج بفلاتر مانعة للبخار والضباب",
                    "تعقيم عميق للمراحيض والأحواض بدرجات حرارة عالية تقضي على البكتيريا",
                    "تسليك وتعقيم فتحات التصريف ومكافحة مسببات الروائح الكريهة",
                    "تلميع الإكسسوارات المعدنية وحنفيات الكروم والاستانلس ستيل"
                ],
                duration: "40 - 50 دقيقة",
                products: "أحماض تنظيف آمنة متوازنة • معقمات هيدروجينية معتمدة",
                waMessage: "مرحباً سين ياء، أود حجز خدمة تعقيم وتنظيف الحمام الرئيسي وإزالة التكلسات"
            },
            bedroom: {
                title: "غرفة النوم الرئيسية",
                badge: "راحة صحية ونوم عميق",
                icon: "fa-solid fa-bed",
                tagline: "بيئة نوم خالية تماماً من مسببات الحساسية وعث الغبار بأعلى معايير النقاء والعناية.",
                tasks: [
                    "تعقيم المراتب بالبخار الساخن 160°C للقضاء على عث الغبار والبكتيريا",
                    "تنظيف وغسيل الستائر في مكانها بدون فك بأجهزة الشفط والبخار الجاف",
                    "تلميع وتنظيف خزائن الملابس والأسطح الخشبية بزيوت شمعية واقية",
                    "تنظيف دقيق لخلف وتحت الأسرّة وإزالة تراكمات الأتربة الدقيقة",
                    "تعقيم الأجواء بتقنية الرذاذ البارد وتعطير اللافندر المهدئ للأعصاب"
                ],
                duration: "45 - 60 دقيقة",
                products: "بخار جاف بدون رطوبة زائدة • زيوت شمعية طبيعية للأخشاب",
                waMessage: "مرحباً سين ياء، أود حجز خدمة تعقيم وتنظيف غرفة النوم الرئيسية والمراتب بالبخار"
            },
            dining: {
                title: "غرفة الطعام وركن الضيافة",
                badge: "فخامة ولمعان مائدة الضيافة",
                icon: "fa-solid fa-champagne-glasses",
                tagline: "العناية الفائقة بطاولات الطعام الفاخرة والكراسي وتلميع الثريات الكريستالية الثمينة.",
                tasks: [
                    "تنظيف وتلميع طاولات السفرة الخشبية والرخامية وحمايتها من الخدوش",
                    "غسيل وتعقيم كراسي الطعام القماشية والجلدية وإزالة بقع الأطعمة",
                    "تنظيف وتلميع الثريات الكريستالية ووحدات الإضاءة بدقة متناهية",
                    "تلميع البوفيه ودواليب حفظ أواني الضيافة من الخارج والداخل",
                    "تنظيف وتطهير أرضيات الباركيه أو الرخام المحيطة بمائدة الطعام"
                ],
                duration: "35 - 50 دقيقة",
                products: "ملمعات كريستال خاصة • مستحلبات حماية الأقمشة والجلد الطبيعي",
                waMessage: "مرحباً سين ياء، أود حجز خدمة تنظيف وتلميع غرفة الطعام ومائدة الضيافة"
            },
            balcony: {
                title: "الشرفة والواجهة البانورامية",
                badge: "إطلالة نقية مقاومة للأتربة",
                icon: "fa-solid fa-wind",
                tagline: "إزالة الأتربة وغسيل النوافذ والدرابزين للاستمتاع بإطلالة مشرقة ونقية بدون غبار.",
                tasks: [
                    "غسيل وتطهير بلاط وأرضيات الشرفة بمضخات الضغط العالي المعتدلة",
                    "تلميع النوافذ الزجاجية والواجهات المقاومة لعوامل الطقس والغبار",
                    "تنظيف وتلميع درابزين الشرفة الزجاجي أو الاستانلس ستيل",
                    "تنظيف أثاث الجلسات الخارجية وحمايته من أشعة الشمس والأتربة",
                    "إزالة شباك العنكبوت وأعشاش الأتربة في الزوايا العلوية والأسقف"
                ],
                duration: "30 - 45 دقيقة",
                products: "مضخات مياه نفاثة • مواد نانو بوليمر طاردة للأتربة",
                waMessage: "مرحباً سين ياء، أود حجز خدمة غسيل الشرفة وتلميع الواجهات الزجاجية الخارجية"
            }
        };

        const rooms = floorplanSvg.querySelectorAll(".floorplan-room");
        const pills = document.querySelectorAll(".floorplan-nav-pill");
        const tooltip = document.getElementById("floorplanTooltip");
        const tooltipIcon = document.getElementById("tooltipIcon");
        const tooltipTitle = document.getElementById("tooltipTitle");
        const tooltipList = document.getElementById("tooltipList");
        const svgContainer = floorplanSvg.closest(".blueprint-svg-container");

        // Inspector Card Elements
        const inspectorBadge = document.getElementById("inspectorBadge");
        const inspectorIcon = document.getElementById("inspectorIcon");
        const inspectorTitle = document.getElementById("inspectorTitle");
        const inspectorTagline = document.getElementById("inspectorTagline");
        const inspectorTasks = document.getElementById("inspectorTasks");
        const inspectorDuration = document.getElementById("inspectorDuration");
        const inspectorProducts = document.getElementById("inspectorProducts");
        const inspectorWaBtn = document.getElementById("inspectorWaBtn");
        const inspectorCard = document.getElementById("roomInspectorCard");

        function selectFloorplanRoom(roomId) {
            const data = floorplanRoomsData[roomId];
            if (!data) return;

            // Highlight in SVG
            rooms.forEach((r) => {
                if (r.dataset.room === roomId) {
                    r.classList.add("active");
                } else {
                    r.classList.remove("active");
                }
            });

            // Highlight in Pills
            pills.forEach((p) => {
                if (p.dataset.roomTarget === roomId) {
                    p.classList.add("active");
                } else {
                    p.classList.remove("active");
                }
            });

            // Update Inspector Card with smooth transition
            if (inspectorCard) {
                inspectorCard.style.opacity = "0.4";
                inspectorCard.style.transform = "scale(0.99)";

                setTimeout(() => {
                    if (inspectorBadge) {
                        inspectorBadge.innerHTML = `<i class="fa-solid fa-sparkles me-1 text-brand-secondary"></i> ${data.badge}`;
                    }
                    if (inspectorIcon) {
                        inspectorIcon.innerHTML = `<i class="${data.icon}"></i>`;
                    }
                    if (inspectorTitle) {
                        inspectorTitle.textContent = data.title;
                    }
                    if (inspectorTagline) {
                        inspectorTagline.textContent = data.tagline;
                    }
                    if (inspectorTasks) {
                        inspectorTasks.innerHTML = data.tasks
                            .map(
                                (task) => `
                            <li>
                                <i class="fa-solid fa-circle-check text-success me-2"></i>
                                <span>${task}</span>
                            </li>
                        `
                            )
                            .join("");
                    }
                    if (inspectorDuration) {
                        inspectorDuration.textContent = data.duration;
                    }
                    if (inspectorProducts) {
                        inspectorProducts.textContent = data.products;
                    }
                    if (inspectorWaBtn) {
                        inspectorWaBtn.href = `https://wa.me/${WHATSAPP_NUMBER}?text=${encodeURIComponent(data.waMessage)}`;
                    }

                    inspectorCard.style.opacity = "1";
                    inspectorCard.style.transform = "scale(1)";
                }, 160);
            }
        }

        // Click on SVG Rooms
        rooms.forEach((room) => {
            const roomId = room.dataset.room;
            room.addEventListener("click", () => {
                selectFloorplanRoom(roomId);
            });

            // Mouse hover tooltip on desktop
            if (tooltip && svgContainer) {
                room.addEventListener("mouseenter", () => {
                    const data = floorplanRoomsData[roomId];
                    if (!data) return;

                    if (tooltipIcon) tooltipIcon.innerHTML = `<i class="${data.icon}"></i>`;
                    if (tooltipTitle) tooltipTitle.textContent = data.title;
                    if (tooltipList) {
                        tooltipList.innerHTML = data.tasks
                            .slice(0, 2)
                            .map(
                                (t) => `
                            <li><i class="fa-solid fa-circle-check text-brand-secondary me-1"></i> ${t}</li>
                        `
                            )
                            .join("");
                    }
                    tooltip.classList.add("visible");
                });

                room.addEventListener("mousemove", (e) => {
                    const containerRect = svgContainer.getBoundingClientRect();
                    const x = e.clientX - containerRect.left;
                    const y = e.clientY - containerRect.top;

                    const tooltipWidth = 260;
                    const tooltipHeight = 130;
                    let left = x + 18;
                    let top = y + 18;

                    if (left + tooltipWidth > containerRect.width) {
                        left = x - tooltipWidth - 18;
                    }
                    if (top + tooltipHeight > containerRect.height) {
                        top = y - tooltipHeight - 18;
                    }

                    tooltip.style.left = `${Math.max(10, left)}px`;
                    tooltip.style.top = `${Math.max(10, top)}px`;
                });

                room.addEventListener("mouseleave", () => {
                    tooltip.classList.remove("visible");
                });
            }
        });

        // Click on Pills
        pills.forEach((pill) => {
            pill.addEventListener("click", () => {
                const target = pill.dataset.roomTarget;
                selectFloorplanRoom(target);
            });
        });
    }
});
