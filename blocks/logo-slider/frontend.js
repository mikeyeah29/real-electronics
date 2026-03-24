(function() {
    
    const track = document.querySelector('.logo-slider .blaze-track');

    const speed = 90; // pixels per second (tweak this)

    const trackWidth = track.scrollWidth;

    const duration = trackWidth / speed;

    track.style.animationDuration = `${duration}s`;

})();