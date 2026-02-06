<?php

$link = $args['link'] ?? '#';
$text = $args['text'] ?? 'Default Button';
$color_slug = $args['color_slug'] ?? 'primary';
$text_color = $args['text_color'] ?? 'white';
$icon = $args['icon'] ?? false;
$solid = $args['solid'] ?? false;

$classes = array('wp-block-button__link', 'txt-100', 'd-inline-block', 'gap-2', 'font-heading', 'txt-600', 'has-sm-font-size');

if (!$solid) {
    $classes[] = 'is-outline';
}
if ($color_slug) {
    $classes[] = 'has-' . $color_slug . '-background-color';
}

?>

<a href="<?php echo $link; ?>" class="<?php echo implode(' ', $classes); ?>" style="color: var(--wp--preset--color--<?php echo $text_color; ?>);">
    <div class="d-flex align-items-center gap-2">
        <?php echo $text; ?>
        <?php if ($icon) { ?>
            <?php // get_template_part('template-parts/svg/next.php'); ?>
            <svg  xmlns="http://www.w3.org/2000/svg" width="24" height="24"  
            fill="currentColor" viewBox="0 0 24 24" >
            <!--Boxicons v3.0.8 https://boxicons.com | License  https://docs.boxicons.com/free-->
            <path d="m19.58 11.19-7-5A.997.997 0 0 0 11 7v3.06L5.58 6.19A.997.997 0 0 0 4 7v10c0 .37.21.72.54.89.14.07.3.11.46.11.2 0 .41-.06.58-.19L11 13.94V17c0 .37.21.72.54.89.14.07.3.11.46.11.2 0 .41-.06.58-.19l7-5c.26-.19.42-.49.42-.81s-.16-.63-.42-.81M6 15.06V8.95l4.28 3.06L6 15.07Zm7 0V8.95l4.28 3.06L13 15.07Z"></path>
            </svg>
        <?php } ?>
    </div>
</a>