<?php
$text = $args['text'] ?? 'REPAIR ENQUIRY';
$link = $args['link'] ?? '#';
$class = $args['class'] ?? '';
$style = $args['style'] ?? '';
?>

<button href="<?php echo $link; ?>" class="pioneer-slip <?php echo $class; ?>" aria-label="<?php echo $text; ?>">
    <span class="pioneer-slip__label <?php echo $style; ?>"><?php echo esc_html($text); ?></span>
</button>