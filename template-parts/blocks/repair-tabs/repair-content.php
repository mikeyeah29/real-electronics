<?php
$title = $args['title'] ?? 'Amplifier Repairs';
$content_html = $args['content_html'] ?? '';
$cta_label = $args['cta_label'] ?? '';
$cta_url = $args['cta_url'] ?? '';
$image_url = $args['image_url'] ?? '';
$image_alt = $args['image_alt'] ?? $title;
?>

<div class="d-md-flex gap-32">
                    
    <div class="w-md-66">

        <!-- <h3 class="has-lg-font-size pb-sm"><?php // echo esc_html($title); ?></h3> -->

        <?php if (!empty($content_html)) : ?>
            <?php echo $content_html; ?>
        <?php endif; ?>

        <?php if (!empty($cta_label) && !empty($cta_url)) : ?>
            <div class="pt-sm">
                <?php get_template_part('template-parts/components/button', '', array('link' => $cta_url, 'text' => $cta_label)); ?>
            </div>
        <?php endif; ?>

    </div>
    <div class="d-none d-md-block w-md-33">
        <?php if (!empty($image_url)) : ?>
            <img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($image_alt); ?>" class="square">
        <?php else : ?>
            <img src="https://placehold.co/600x600" alt="<?php echo esc_attr($image_alt); ?>" class="square">
        <?php endif; ?>
    </div>
</div>
