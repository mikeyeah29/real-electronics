// import AOS from 'aos';
// import BlazeSlider from 'blaze-slider';

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
