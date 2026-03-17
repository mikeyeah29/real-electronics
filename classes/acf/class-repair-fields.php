<?php

namespace RealElectronics\ACF;

class RepairFields {

	public function __construct() {
		add_action( 'acf/init', [ $this, 'register_fields' ] );
	}

	public function register_fields() {

		if ( ! function_exists( 'acf_add_local_field_group' ) ) {
			return;
		}

	}

}