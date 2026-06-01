document.documentElement.classList.add("has-js");

(function () {
    const header = document.querySelector(".site-header");
    const navToggle = document.querySelector(".nav-toggle");
    const navigation = document.querySelector(".main-nav");
    const mobileBreakpoint = 1080;

    if (header && navToggle && navigation) {
        const closeMenu = () => {
            header.classList.remove("is-menu-open");
            document.body.classList.remove("menu-open");
            navToggle.setAttribute("aria-expanded", "false");
        };

        navToggle.addEventListener("click", () => {
            const isOpen = header.classList.toggle("is-menu-open");
            document.body.classList.toggle("menu-open", isOpen);
            navToggle.setAttribute("aria-expanded", String(isOpen));
        });

        navigation.querySelectorAll("a").forEach((link) => {
            link.addEventListener("click", () => {
                if (window.innerWidth <= mobileBreakpoint) {
                    closeMenu();
                }
            });
        });

        window.addEventListener("resize", () => {
            if (window.innerWidth > mobileBreakpoint) {
                closeMenu();
            }
        });

        document.addEventListener("click", (event) => {
            if (window.innerWidth > mobileBreakpoint) {
                return;
            }

            if (!header.contains(event.target)) {
                closeMenu();
            }
        });
    }

    const prefersReducedMotion = window.matchMedia("(prefers-reduced-motion: reduce)").matches;
    const revealItems = document.querySelectorAll(".reveal");

    if (prefersReducedMotion) {
        revealItems.forEach((item) => item.classList.add("is-visible"));
    } else if (revealItems.length) {
        document.querySelectorAll(".why-cards .why-card").forEach((item, index) => {
            item.style.setProperty("--reveal-delay", `${index * 0.13}s`);
        });

        const observer = new IntersectionObserver(
            (entries) => {
                entries.forEach((entry) => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add("is-visible");
                        observer.unobserve(entry.target);
                    }
                });
            },
            {
                threshold: 0.12,
                rootMargin: "0px 0px -40px 0px",
            }
        );

        revealItems.forEach((item) => observer.observe(item));
    }

    const initGallerySlider = (slider) => {
        const slides = Array.from(slider.querySelectorAll(".gallery-slide"));
        const dots = Array.from(slider.querySelectorAll(".gallery-dot"));
        const prevButton = slider.querySelector(".gallery-btn-prev");
        const nextButton = slider.querySelector(".gallery-btn-next");
        let currentIndex = 0;

        if (!slides.length || !prevButton || !nextButton || !dots.length) {
            return;
        }

        const goTo = (index) => {
            slides[currentIndex].classList.remove("active");
            dots[currentIndex].classList.remove("active");
            currentIndex = (index + slides.length) % slides.length;
            slides[currentIndex].classList.add("active");
            dots[currentIndex].classList.add("active");
        };

        prevButton.addEventListener("click", () => goTo(currentIndex - 1));
        nextButton.addEventListener("click", () => goTo(currentIndex + 1));

        dots.forEach((dot) => {
            dot.addEventListener("click", () => {
                goTo(Number(dot.dataset.idx));
            });
        });
    };

    document.querySelectorAll(".js-gallery-slider").forEach(initGallerySlider);

    const getSlidesPerView = (slider) => {
        if (window.innerWidth <= 767) {
            return Number(slider.dataset.mobile) || 1;
        }

        if (window.innerWidth <= 1024) {
            return Number(slider.dataset.tablet) || 1;
        }

        return Number(slider.dataset.desktop) || 1;
    };

    const sliderInstances = Array.from(document.querySelectorAll(".js-slider")).map((slider) => {
        const viewport = slider.querySelector(".slider__viewport");
        const track = slider.querySelector(".slider__track");
        const slides = Array.from(slider.querySelectorAll(".slider__slide"));
        const prevButton = slider.querySelector(".slider__arrow--prev");
        const nextButton = slider.querySelector(".slider__arrow--next");
        const dotsRoot = slider.querySelector(".slider__dots");

        if (!viewport || !track || !slides.length || !prevButton || !nextButton || !dotsRoot) {
            return null;
        }

        return {
            slider,
            viewport,
            track,
            slides,
            prevButton,
            nextButton,
            dotsRoot,
            current: 0,
            perView: 1,
            maxIndex: 0,
            slideWidth: 0,
        };
    }).filter(Boolean);

    const renderDots = (instance) => {
        instance.dotsRoot.innerHTML = "";

        if (!instance.slider.classList.contains("slider--enabled")) {
            return;
        }

        for (let index = 0; index <= instance.maxIndex; index += 1) {
            const button = document.createElement("button");
            button.type = "button";
            button.className = "slider__dot";
            button.setAttribute("aria-label", `Перейти к слайду ${index + 1}`);

            if (index === instance.current) {
                button.classList.add("is-active");
            }

            button.addEventListener("click", () => {
                instance.current = index;
                updateSlider(instance);
            });

            instance.dotsRoot.appendChild(button);
        }
    };

    const updateSlider = (instance) => {
        if (!instance.slider.classList.contains("slider--enabled")) {
            instance.track.style.transform = "";
            instance.slides.forEach((slide) => {
                slide.style.flexBasis = "";
                slide.style.maxWidth = "";
            });
            return;
        }

        const gap = parseFloat(window.getComputedStyle(instance.track).gap) || 0;
        const offset = (instance.slideWidth + gap) * instance.current;
        instance.track.style.transform = `translateX(-${offset}px)`;
        instance.prevButton.classList.toggle("is-disabled", instance.current === 0);
        instance.nextButton.classList.toggle("is-disabled", instance.current >= instance.maxIndex);

        instance.dotsRoot.querySelectorAll(".slider__dot").forEach((dot, index) => {
            dot.classList.toggle("is-active", index === instance.current);
        });
    };

    const refreshSlider = (instance) => {
        instance.perView = getSlidesPerView(instance.slider);
        instance.maxIndex = Math.max(instance.slides.length - instance.perView, 0);
        instance.current = Math.min(instance.current, instance.maxIndex);

        if (instance.slides.length <= instance.perView) {
            instance.slider.classList.remove("slider--enabled");
            instance.track.style.transform = "";
            instance.slides.forEach((slide) => {
                slide.style.flexBasis = "";
                slide.style.maxWidth = "";
            });
            renderDots(instance);
            return;
        }

        instance.slider.classList.add("slider--enabled");
        const gap = parseFloat(window.getComputedStyle(instance.track).gap) || 0;
        const totalGap = gap * (instance.perView - 1);
        instance.slideWidth = (instance.viewport.clientWidth - totalGap) / instance.perView;

        instance.slides.forEach((slide) => {
            slide.style.flexBasis = `${instance.slideWidth}px`;
            slide.style.maxWidth = `${instance.slideWidth}px`;
        });

        renderDots(instance);
        updateSlider(instance);
    };

    sliderInstances.forEach((instance) => {
        instance.prevButton.addEventListener("click", () => {
            if (instance.current > 0) {
                instance.current -= 1;
                updateSlider(instance);
            }
        });

        instance.nextButton.addEventListener("click", () => {
            if (instance.current < instance.maxIndex) {
                instance.current += 1;
                updateSlider(instance);
            }
        });

        let touchStartX = 0;
        let touchEndX = 0;

        instance.viewport.addEventListener("touchstart", (event) => {
            touchStartX = event.changedTouches[0].clientX;
        }, { passive: true });

        instance.viewport.addEventListener("touchend", (event) => {
            touchEndX = event.changedTouches[0].clientX;
            const deltaX = touchStartX - touchEndX;

            if (Math.abs(deltaX) < 40 || !instance.slider.classList.contains("slider--enabled")) {
                return;
            }

            if (deltaX > 0 && instance.current < instance.maxIndex) {
                instance.current += 1;
            }

            if (deltaX < 0 && instance.current > 0) {
                instance.current -= 1;
            }

            updateSlider(instance);
        }, { passive: true });

        refreshSlider(instance);
    });

    let resizeTimer = 0;
    window.addEventListener("resize", () => {
        window.clearTimeout(resizeTimer);
        resizeTimer = window.setTimeout(() => {
            sliderInstances.forEach(refreshSlider);
        }, 120);
    });
})();
