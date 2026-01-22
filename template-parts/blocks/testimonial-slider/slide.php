<?php

    $author = $args['author'];
    $content = $args['content'];
    $rating = $args['rating'];

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
        <p class="clamp-6"><?php echo $content; ?></p>
        <footer>
            <strong class="has-rajdhani-font-family">- <?php echo $author; ?></strong>
        </footer>
    </blockquote>
</div>