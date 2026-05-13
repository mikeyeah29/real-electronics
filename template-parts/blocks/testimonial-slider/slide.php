<?php

    $author = $args['author'] ?? '';
    $content = $args['content'] ?? '';
    $rating = max(0, min(5, absint($args['rating'] ?? 5)));

?>

<div class="testimonial-slide">
    <div class="star-rating pb-sm">
        <?php for($i = 0; $i < $rating; $i++) { ?>
            <span class="star-rating__star star-rating__star--filled">★</span>
        <?php } ?>
        <?php for($i = 0; $i < 5 - $rating; $i++) { ?>
            <span class="star-rating__star star-rating__star--empty">★</span>
        <?php } ?>
    </div>
    <blockquote>
        <div class="clamp-6"><?php echo wp_kses_post($content); ?></div>
        <footer>
            <strong class="has-rajdhani-font-family">- <?php echo esc_html($author); ?></strong>
        </footer>
    </blockquote>
</div>
