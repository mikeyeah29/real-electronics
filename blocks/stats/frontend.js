(function () {
    var blocks = document.querySelectorAll('.wp-block-real-electronics-stats');
    if (!blocks.length) {
        return;
    }

    var prefersReducedMotion = window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches;

    var getNumberParts = function (text) {
        var match = text.match(/(-?\d[\d,.]*)/);
        if (!match) {
            return null;
        }

        var numberText = match[0];
        var prefix = text.slice(0, match.index);
        var suffix = text.slice(match.index + numberText.length);

        var normalized = numberText.replace(/,/g, '');
        var value = Number(normalized);
        if (!isFinite(value)) {
            return null;
        }

        var decimalIndex = normalized.indexOf('.');
        var decimals = decimalIndex === -1 ? 0 : normalized.length - decimalIndex - 1;

        return { value: value, prefix: prefix, suffix: suffix, decimals: decimals };
    };

    var formatNumber = function (value, decimals) {
        return new Intl.NumberFormat('en-US', {
            minimumFractionDigits: decimals,
            maximumFractionDigits: decimals
        }).format(value);
    };

    var animateValue = function (el) {
        if (el.dataset.animated === 'true') {
            return;
        }

        var originalText = el.dataset.originalText || el.textContent.trim();
        var parts = getNumberParts(originalText);
        if (!parts) {
            return;
        }

        el.dataset.animated = 'true';

        if (prefersReducedMotion) {
            el.textContent = originalText;
            return;
        }

        var duration = 1200;
        var start = performance.now();
        var startValue = 0;
        var endValue = parts.value;
        var prefix = parts.prefix;
        var suffix = parts.suffix;
        var decimals = parts.decimals;

        var tick = function (now) {
            var elapsed = now - start;
            var progress = Math.min(elapsed / duration, 1);
            var eased = 1 - Math.pow(1 - progress, 3);
            var currentValue = startValue + (endValue - startValue) * eased;

            el.textContent = prefix + formatNumber(currentValue, decimals) + suffix;

            if (progress < 1) {
                requestAnimationFrame(tick);
            } else {
                el.textContent = originalText;
            }
        };

        requestAnimationFrame(tick);
    };

    var animateBlock = function (block) {
        var values = block.querySelectorAll('.about-stats__value');
        Array.prototype.forEach.call(values, animateValue);
    };

    var initializeValues = function (block) {
        var values = block.querySelectorAll('.about-stats__value');
        Array.prototype.forEach.call(values, function (el) {
            if (el.dataset.initialized === 'true') {
                return;
            }

            var originalText = el.textContent.trim();
            var parts = getNumberParts(originalText);
            if (!parts) {
                return;
            }

            el.dataset.initialized = 'true';
            el.dataset.originalText = originalText;

            if (!prefersReducedMotion) {
                el.textContent = parts.prefix + formatNumber(0, parts.decimals) + parts.suffix;
            }
        });
    };

    Array.prototype.forEach.call(blocks, function (block) {
        initializeValues(block);
    });

    if (!('IntersectionObserver' in window)) {
        Array.prototype.forEach.call(blocks, function (block) {
            animateBlock(block);
        });
        return;
    }

    var observer = new IntersectionObserver(
        function (entries, obs) {
            Array.prototype.forEach.call(entries, function (entry) {
                if (!entry.isIntersecting) {
                    return;
                }
                initializeValues(entry.target);
                animateBlock(entry.target);
                obs.unobserve(entry.target);
            });
        },
        {
            rootMargin: '0px 0px -10% 0px',
            threshold: 0.8
        }
    );

    Array.prototype.forEach.call(blocks, function (block) {
        observer.observe(block);
    });
})();
