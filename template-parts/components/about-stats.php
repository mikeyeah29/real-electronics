<?php
/**
 * About stats section.
 */

$stats = [
    [
        'value' => '6+',
        'label' => 'Years in Business',
        'description' => 'Established, trusted, and still hands-on.',
    ],
    [
        'value' => '1,000+',
        'label' => 'Repairs Completed',
        'description' => 'From everyday faults to complex component-level issues.',
    ],
    [
        'value' => '5',
        'label' => 'Customer Reviews',
        'description' => 'Consistently rated for quality, honesty, and service.',
        'is_star' => true,
    ],
    [
        'value' => 'Authorised',
        'label' => 'Service Centre',
        'description' => 'Approved by leading manufacturers to carry out specialist repairs.',
    ],
];
?>

<section class="about-stats has-black-background-color" aria-label="About stats" style="padding-top: var(--wp--preset--spacing--xl); padding-bottom: var(--wp--preset--spacing--xl);">
    <div class="container container--wide">
        <div class="about-stats__grid">
            <?php foreach ($stats as $stat) :
                $card_classes = 'about-stats__card';
                if (!empty($stat['is_star'])) {
                    $card_classes .= ' is-star';
                }
            ?>
                <article class="<?php echo esc_attr($card_classes); ?>">
                    <div class="about-stats__top">
                        <span class="about-stats__value"><?php echo esc_html($stat['value']); ?></span>
                        <h3 class="about-stats__label"><?php echo esc_html($stat['label']); ?></h3>
                    </div>
                    <p class="about-stats__description"><?php echo esc_html($stat['description']); ?></p>
                </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>
