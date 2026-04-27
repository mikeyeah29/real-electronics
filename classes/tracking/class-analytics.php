<?php

namespace RealElectronics\Tracking;

class AnalyticsOutput {

	private string $option_key = 'real_electronics_analytics_settings';

	public function __construct() {
		add_action('wp_footer', [ $this, 'render_cookie_banner' ], 20);
		add_action('wp_footer', [ $this, 'render_tracking_config' ], 21);
	}

	public function render_cookie_banner(): void {

		if (is_admin()) {
			return;
		}

		$opts = get_option($this->option_key);

		if (empty($opts['enabled'])) {
			return;
		}

		if (
			wp_get_environment_type() !== 'production'
			&& empty($opts['enable_on_staging'])
		) {
			return;
		}
		?>
		<div class="cookie-banner" id="cookie-banner" hidden>
			<div class="cookie-banner__inner">
				<p class="cookie-banner__text">
					We use cookies to make this site work properly and understand how it’s being used. You can accept all cookies or reject non-essential cookies. See our
					<a href="/cookie-policy/">Cookie Policy</a>
					for more information.
				</p>

				<div class="cookie-banner__actions">
					<button type="button" class="cookie-banner__button cookie-banner__button--secondary" id="cookie-reject">
						Reject non-essential
					</button>
					<button type="button" class="cookie-banner__button cookie-banner__button--primary" id="cookie-accept">
						Accept all
					</button>
				</div>
			</div>
		</div>
		<?php

	}

	public function render_tracking_config(): void {

		if (is_admin()) {
			return;
		}

		$opts = get_option($this->option_key);

		if (empty($opts['enabled'])) {
			return;
		}

		if (
			wp_get_environment_type() !== 'production'
			&& empty($opts['enable_on_staging'])
		) {
			return;
		}

		$config = [
			'ga4_id'   => !empty($opts['ga4_id']) ? $opts['ga4_id'] : '',
			'gtm_id'   => !empty($opts['gtm_id']) ? $opts['gtm_id'] : '',
			'fb_pixel' => !empty($opts['fb_pixel']) ? $opts['fb_pixel'] : '',
		];
		?>
		<script>
			window.realElectronicsTracking = <?php echo wp_json_encode($config); ?>;
		</script>

		<script>
			document.addEventListener('DOMContentLoaded', function () {
				const banner = document.getElementById('cookie-banner');
				const acceptButton = document.getElementById('cookie-accept');
				const rejectButton = document.getElementById('cookie-reject');
				const consentKey = 're_cookie_consent';

				function getConsent() {
					return localStorage.getItem(consentKey);
				}

				function setConsent(value) {
					localStorage.setItem(consentKey, value);
				}

				function showBanner() {
					if (banner) {
						banner.hidden = false;
					}
				}

				function hideBanner() {
					if (banner) {
						banner.hidden = true;
					}
				}

				function loadScript(src, callback) {
					const script = document.createElement('script');
					script.async = true;
					script.src = src;

					if (typeof callback === 'function') {
						script.onload = callback;
					}

					document.head.appendChild(script);
				}

				function loadGA4(id) {
					if (!id || window.reGaLoaded) {
						return;
					}

					window.reGaLoaded = true;
					window.dataLayer = window.dataLayer || [];
					window.gtag = window.gtag || function () {
						window.dataLayer.push(arguments);
					};

					loadScript('https://www.googletagmanager.com/gtag/js?id=' + encodeURIComponent(id), function () {
						window.gtag('js', new Date());
						window.gtag('config', id);
					});
				}

				function loadGTM(id) {
					if (!id || window.reGtmLoaded) {
						return;
					}

					window.reGtmLoaded = true;
					window.dataLayer = window.dataLayer || [];

					(function(w, d, s, l, i) {
						w[l] = w[l] || [];
						w[l].push({
							'gtm.start': new Date().getTime(),
							event: 'gtm.js'
						});

						const f = d.getElementsByTagName(s)[0];
						const j = d.createElement(s);
						const dl = l !== 'dataLayer' ? '&l=' + l : '';

						j.async = true;
						j.src = 'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
						f.parentNode.insertBefore(j, f);
					})(window, document, 'script', 'dataLayer', id);
				}

				function loadMetaPixel(id) {
					if (!id || window.reMetaLoaded) {
						return;
					}

					window.reMetaLoaded = true;

					!function(f,b,e,v,n,t,s) {
						if (f.fbq) return;
						n = f.fbq = function() {
							n.callMethod ? n.callMethod.apply(n, arguments) : n.queue.push(arguments);
						};
						if (!f._fbq) f._fbq = n;
						n.push = n;
						n.loaded = true;
						n.version = '2.0';
						n.queue = [];
						t = b.createElement(e);
						t.async = true;
						t.src = v;
						s = b.getElementsByTagName(e)[0];
						s.parentNode.insertBefore(t, s);
					}(window, document, 'script', 'https://connect.facebook.net/en_US/fbevents.js');

					window.fbq('init', id);
					window.fbq('track', 'PageView');
				}

				function loadAcceptedTracking() {
					const config = window.realElectronicsTracking || {};

					if (config.gtm_id) {
						loadGTM(config.gtm_id);
						return;
					}

					if (config.ga4_id) {
						loadGA4(config.ga4_id);
					}

					if (config.fb_pixel) {
						loadMetaPixel(config.fb_pixel);
					}
				}

				const consent = getConsent();

				if (consent === 'accepted') {
					hideBanner();
					loadAcceptedTracking();
				} else if (consent === 'rejected') {
					hideBanner();
				} else {
					showBanner();
				}

				if (acceptButton) {
					acceptButton.addEventListener('click', function () {
						setConsent('accepted');
						hideBanner();
						loadAcceptedTracking();
					});
				}

				if (rejectButton) {
					rejectButton.addEventListener('click', function () {
						setConsent('rejected');
						hideBanner();
					});
				}
			});
		</script>
		<?php

	}

}