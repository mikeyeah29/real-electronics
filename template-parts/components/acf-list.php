<?php
                                
$textarea_field = $args['textarea_field'];
$columns = $args['columns'] ?? 2;

$items = [];

if ($textarea_field) {
    $items = preg_split('/\r\n|\r|\n/', $textarea_field);
}

?>

<ul class="wp-block-list cols-<?php echo esc_attr($columns); ?> mb-md">
    <?php foreach ($items as $item) { ?>
        <li><?php echo esc_html($item); ?></li>
    <?php } ?>
</ul>