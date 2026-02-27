<?php
$repair_services = get_posts([
    'post_type' => 'repair_service',
    'post_status' => 'publish',
    'posts_per_page' => -1,
    'orderby' => [
        'menu_order' => 'ASC',
        'date' => 'ASC',
    ],
]);
?>

<section class="repairs-tabs" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="400">
    <?php if (empty($repair_services)) : ?>
        <div class="repairs-tabs__content">
            <p><?php esc_html_e('Add some Repair Services in the admin to populate these tabs.', 'realelectronics'); ?></p>
        </div>
    <?php else : ?>
        <div class="repairs-tabs__controls" role="tablist" aria-label="Repair categories">
            <?php foreach ($repair_services as $index => $repair_service) : ?>
                <?php
                $post_id = $repair_service->ID;
                $panel_key = 'repair-' . $post_id;
                $input_id = 'tab-repair-' . $post_id;
                $tab_colour = get_post_meta($post_id, 'repair_tab_colour', true);
                $icon_slug = sanitize_key(get_post_meta($post_id, 'repair_tab_icon', true));
                $icon_slug = $icon_slug ?: 'amp';
                $icon_template = 'template-parts/svg/' . $icon_slug;
                $control_classes = 'repairs-tabs__control';

                if (!empty($tab_colour)) {
                    $control_classes .= ' repairs-tabs__control--' . sanitize_html_class($tab_colour);
                }
                ?>
                <div class="<?php echo esc_attr($control_classes); ?>">
                    <input class="repairs-tabs__input" type="radio" name="repair-tabs" id="<?php echo esc_attr($input_id); ?>" data-panel="<?php echo esc_attr($panel_key); ?>" <?php checked($index, 0); ?>>
                    <label class="repairs-tabs__label" for="<?php echo esc_attr($input_id); ?>">
                        <?php get_template_part($icon_template); ?>
                        <span><?php echo esc_html(get_the_title($post_id)); ?></span>
                    </label>
                </div>
            <?php endforeach; ?>
        </div>

        <div class="repairs-tabs__content">
            <?php foreach ($repair_services as $repair_service) : ?>
                <?php
                $post_id = $repair_service->ID;
                $panel_key = 'repair-' . $post_id;
                $panel_title = get_post_meta($post_id, 'repair_panel_title', true);
                $panel_title = $panel_title ?: get_the_title($post_id);
                $cta_label = get_post_meta($post_id, 'repair_cta_label', true);
                $cta_url = get_post_meta($post_id, 'repair_cta_url', true);
                $image_id = get_post_thumbnail_id($post_id);
                $image_url = $image_id ? wp_get_attachment_image_url($image_id, 'large') : '';
                $image_alt = $image_id ? get_post_meta($image_id, '_wp_attachment_image_alt', true) : '';
                $image_alt = $image_alt ?: get_the_title($post_id);
                $content_html = apply_filters('the_content', $repair_service->post_content);
                ?>
                <div class="repairs-tabs__panel" data-panel="<?php echo esc_attr($panel_key); ?>">
                    <?php get_template_part('template-parts/blocks/repair-tabs/repair-content', null, [
                        'title' => $panel_title,
                        'content_html' => $content_html,
                        'cta_label' => $cta_label,
                        'cta_url' => $cta_url,
                        'image_url' => $image_url,
                        'image_alt' => $image_alt,
                    ]); ?>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</section>
