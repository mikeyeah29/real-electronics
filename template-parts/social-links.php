<?php

$suffix = $args['theme'] ?? 'light';

$suffix = $suffix === 'light' ? '-light' : '';

?>

<ul class="site-header__social ul-reset d-flex align-items-center gap-16">
    <li>
        <a href="#">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/social/facebook<?php echo $suffix; ?>.png" alt="Facebook Icon" />
        </a>
    </li>
    <li>
        <a href="#">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/social/x<?php echo $suffix; ?>.png" alt="X Icon" />
        </a>
    </li>
</ul>