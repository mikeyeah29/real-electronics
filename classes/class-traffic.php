<?php
/**
 * Detect user IP and filter internal traffic
 */

namespace RealElectronics\Theme;

class Traffic {

	/**
	 * Get the current user's IP address.
	 *
	 * @return string
	 */
	public static function get_user_ip(): string {
		if ( isset( $_SERVER['HTTP_CLIENT_IP'] ) ) {
			return $_SERVER['HTTP_CLIENT_IP'];
		}

		if ( isset( $_SERVER['HTTP_X_FORWARDED_FOR'] ) ) {
			$ip_list = explode( ',', $_SERVER['HTTP_X_FORWARDED_FOR'] );
			return trim( $ip_list[0] ); // first IP in list
		}

		if ( isset( $_SERVER['REMOTE_ADDR'] ) ) {
			return $_SERVER['REMOTE_ADDR'];
		}

		return '0.0.0.0';
	}

	/**
	 * Check if the request is from an internal IP (exclude from analytics etc).
	 *
	 * @return bool
	 */
	public static function is_internal(): bool {
		$excluded_ips = array(
			'94.0.83.54', // Mike's Mac
			'127.0.0.1',  // localhost
		);

		$user_ip = self::get_user_ip();

		return in_array( $user_ip, $excluded_ips, true );
	}
}
