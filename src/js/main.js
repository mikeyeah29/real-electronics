// import AOS from 'aos';
import BlazeSlider from 'blaze-slider';

import AOS from 'aos';
AOS.init();

window.addEventListener('load', () => {
    AOS.refresh();
});

/* Smooth scroll to anchor links
=============================================*/

document.addEventListener("DOMContentLoaded", () => {
    // Select all links that have a hash in their href
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener("click", function (e) {
            const targetId = this.getAttribute("href");

            // Ignore if it's just "#"
            if (targetId.length > 1) {
                e.preventDefault();
                const targetElement = document.querySelector(targetId);

                if (targetElement) {
                    targetElement.scrollIntoView({
                        behavior: "smooth",
                        block: "start"
                    });
                }
            }
        });
    });
});

/* Hero Scale
=============================================*/

const inner = document.querySelector('.wp-block-cover__image-background');
const section = document.querySelector('.page-start-after-hero');

// 🔧 TUNE THESE
const maxZoom = 0.8; // 0.04 = subtle, 0.08 = strong
const maxScale = 1 + maxZoom;

window.addEventListener('scroll', () => {

    console.log(section.offsetTop);

    const raw = window.pageYOffset / section.offsetTop;
    const clamped = Math.min(raw, 1);

    const scale = 1 + clamped * maxZoom;

    inner.style.transform = `scale(${scale.toFixed(3)})`;
});

/* Repairs Tabs
=============================================*/

document.addEventListener('DOMContentLoaded', () => {
    const tabs = document.querySelectorAll(
        '.repairs-tabs input[name="repair-tabs"]'
    );

    const panels = document.querySelectorAll(
        '.repairs-tabs .panel'
    );

    function showPanel(panelClass) {
        panels.forEach(panel => {
            panel.classList.toggle(
                'is-active',
                panel.classList.contains(panelClass)
            );
        });
    }

    tabs.forEach(tab => {
        tab.addEventListener('change', () => {
            if (!tab.checked) return;

            // tab-amps → amps
            const panelClass = tab.id.replace('tab-', '');
            showPanel(panelClass);
        });
    });

    // Initialise on load
    const checked = document.querySelector(
        '.repairs-tabs input[name="repair-tabs"]:checked'
    );

    if (checked) {
        showPanel(checked.id.replace('tab-', ''));
    }
});

/* Testimonials Slider
=============================================*/

document.addEventListener('DOMContentLoaded', () => {
    const el = document.querySelector('.testimonials-slider .blaze-slider')

    if (!el) return

    new BlazeSlider(el, {
        all: {
            slidesToShow: 1,
            slidesToScroll: 1,
            loop: true,
            enableAutoplay: true,
            autoplayInterval: 5000,
            transitionDuration: 400,
        },
        '(min-width: 768px)': {
            slidesToShow: 2,
        },
        '(min-width: 1200px)': {
            slidesToShow: 2,
        }
    })
})
