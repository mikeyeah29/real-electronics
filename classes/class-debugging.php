<?php

namespace RealElectronics\Debugging;

class Debugging {

	public function __construct(bool $enabled = false) {
		
        if ($enabled) {
            add_action( 'wp_footer', function () {
                if ( is_user_logged_in() ) {
                    global $template;
                    echo '<div style="position:fixed;bottom:10px;right:10px;
                                background:#000;color:#fff;padding:5px 8px;
                                font-size:12px;z-index:9999;">
                            Template: ' . basename( $template ) . '
                        </div>';
                }
            });
        }

	}
}