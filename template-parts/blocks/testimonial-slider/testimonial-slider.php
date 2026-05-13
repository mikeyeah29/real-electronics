<?php
    $testimonials = new WP_Query([
        'post_type' => 'review',
        'posts_per_page' => -1,
        'post_status' => 'publish',
        'orderby' => [
            'menu_order' => 'ASC',
            'date' => 'DESC',
        ],
    ]);

    if (!$testimonials->have_posts()) {
        return;
    }
?>

<div class="testimonials-slider">
    <div class="blaze-slider">

        <div class="d-flex justify-content-between align-items-center">

            <div data-aos="fade-up" data-aos-duration="1000">
                <h2 class="mb-0 pb-0">What Our Customers Say</h2>
                <p class="mb-0 pb-0 pt-xs">View all reviews on <a class="txt-white" href="https://www.google.com/search?q=real+electronics+sheffield" target="_blank">Google</a></p>
            </div>

            <div class="d-flex gap-32 pioneer-search" data-aos="fade-up" data-aos-duration="1000">
                <button class="blaze-prev" aria-label="Previous" style="color: var(--wp--preset--color--white);">
                    <?php get_template_part('template-parts/svg/rewind'); ?>
                </button>
                <button class="blaze-next" aria-label="Next" style="color: var(--wp--preset--color--white);">
                    <?php get_template_part('template-parts/svg/next'); ?>
                </button>
            </div>

        </div>

        <div class="blaze-container pt-lg" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="400">
            <div class="blaze-track-container">
                <div class="blaze-track">

                    <?php while($testimonials->have_posts()) {
                        $testimonials->the_post();

                        $testimonial = [
                            'author' => get_the_title(),
                            'content' => apply_filters('the_content', get_the_content()),
                            'rating' => get_post_meta(get_the_ID(), 'review_rating', true) ?: 5,
                        ];
                    ?>
                        <div class="blaze-slide">
                            <?php get_template_part('template-parts/blocks/testimonial-slider/slide', null, $testimonial); ?>
                        </div>
                    <?php } ?>

                </div>
            </div>
        </div>

        <?php wp_reset_postdata(); ?>
        
    </div>
</div>
