<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$defaults = [
    'value1' => '6+',
    'label1' => 'Years in Business',
    'description1' => 'Established, trusted, and still hands-on.',
    'value2' => '1,000+',
    'label2' => 'Repairs Completed',
    'description2' => 'From everyday faults to complex component-level issues.',
    'value3' => '5',
    'label3' => 'Customer Reviews',
    'description3' => 'Consistently rated for quality, honesty, and service.',
    'value4' => 'Authorised',
    'label4' => 'Service Centre',
    'description4' => 'Approved by leading manufacturers to carry out specialist repairs.',
];

$attributes = wp_parse_args( $attributes, $defaults );

$stats = [
    [
        'value' => $attributes['value1'],
        'label' => $attributes['label1'],
        'description' => $attributes['description1'],
    ],
    [
        'value' => $attributes['value2'],
        'label' => $attributes['label2'],
        'description' => $attributes['description2'],
    ],
    [
        'value' => $attributes['value3'],
        'label' => $attributes['label3'],
        'description' => $attributes['description3'],
        'is_star' => true,
    ],
    [
        'value' => $attributes['value4'],
        'label' => $attributes['label4'],
        'description' => $attributes['description4'],
    ],
];

$wrapper_attributes = get_block_wrapper_attributes( [
    'class' => 'about-stats',
] );

?>

<div <?php echo $wrapper_attributes; ?>>
    <?php foreach ( $stats as $stat ) :
        $card_classes = 'about-stats__card';
        if ( ! empty( $stat['is_star'] ) ) {
            $card_classes .= ' is-star';
        }
    ?>
        <article class="<?php echo esc_attr( $card_classes ); ?>">
            <div class="about-stats__top">
                <span class="about-stats__value"><?php echo wp_kses_post( $stat['value'] ); ?></span>
                <h3 class="about-stats__label"><?php echo wp_kses_post( $stat['label'] ); ?></h3>
            </div>
            <p class="about-stats__description"><?php echo wp_kses_post( $stat['description'] ); ?></p>
        </article>
    <?php endforeach; ?>
</div>
