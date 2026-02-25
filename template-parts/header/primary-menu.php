<nav class="site-header__nav" id="primary-menu" aria-label="<?php esc_attr_e('Primary navigation', 'realelectronics'); ?>">
    <?php
        wp_nav_menu([
            'theme_location' => 'primary',
            'menu_class'     => 'primary-menu',
            'container'      => false,
            'fallback_cb'    => false,
        ]);
    ?>
</nav>