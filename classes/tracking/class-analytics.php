<?php

namespace RealElectronics\Tracking;

class AnalyticsOutput {

	private string $option_key = 'real_electronics_analytics_settings';

	public function __construct() {
		add_action('wp_head', [ $this, 'render' ], 5);
	}

	public function render(): void {

		if (is_admin()) {
			return;
		}

		$opts = get_option($this->option_key);

		if (empty($opts['enabled'])) {
			return;
		}

		// Optional: Block on staging/local
		if (
			wp_get_environment_type() !== 'production'
			&& empty($opts['enable_on_staging'])
		) {
			return;
		}

		// Prefer GTM if present
		if (!empty($opts['gtm_id'])) {
			$this->render_gtm($opts['gtm_id']);
			return;
		}

		if (!empty($opts['ga4_id'])) {
			$this->render_ga4($opts['ga4_id']);
		}

		if (!empty($opts['fb_pixel'])) {
			$this->render_fb_pixel($opts['fb_pixel']);
		}

	}

	private function render_gtm(string $id): void {
		?>
		<!-- Google Tag Manager -->
		<script async src="https://www.googletagmanager.com/gtm.js?id=<?php echo esc_attr($id); ?>"></script>
		<!-- End GTM -->
		<?php
	}

	private function render_ga4(string $id): void {
		?>
		<!-- Google Analytics -->
		<script async src="https://www.googletagmanager.com/gtag/js?id=<?php echo esc_attr($id); ?>"></script>
		<script>
			window.dataLayer = window.dataLayer || [];
			function gtag(){dataLayer.push(arguments);}
			gtag('js', new Date());
			gtag('config', '<?php echo esc_js($id); ?>');
		</script>
		<!-- End GA -->
		<?php
	}

	private function render_fb_pixel(string $id): void {
		?>
		<!-- Meta Pixel -->
		<script>
			!function(f,b,e,v,n,t,s)
			{if(f.fbq)return;n=f.fbq=function(){n.callMethod?
			n.callMethod.apply(n,arguments):n.queue.push(arguments)};
			if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
			n.queue=[];t=b.createElement(e);t.async=!0;
			t.src=v;s=b.getElementsByTagName(e)[0];
			s.parentNode.insertBefore(t,s)}(window, document,'script',
			'https://connect.facebook.net/en_US/fbevents.js');
			fbq('init', '<?php echo esc_js($id); ?>');
			fbq('track', 'PageView');
		</script>
		<!-- End Meta Pixel -->
		<?php
	}

}
