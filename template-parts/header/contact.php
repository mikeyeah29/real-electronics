<?php 

$contact_details = $args['contact_details'];

?>

<ul class="site-header-contact gap-16 ml-md-auto">
    <!-- <li>
        <a href="#" class="d-flex align-items-start gap-8" style="margin-top: 3px; font-size: 18px;">
            <?php // get_template_part('template-parts/svg/clock'); ?>
            Open 9:00 - 17:00 Monday - Friday
        </a>
    </li> -->
    <li>
        <a href="<?php echo $contact_details['address_link']; ?>" target="_blank" class="d-flex align-items-start gap-8" style="margin-top: 3px; font-size: 18px;">
            <?php get_template_part('template-parts/svg/marker'); ?>
            <?php echo $contact_details['address']; ?>
        </a>
    </li>
    <li>
        <a href="tel:<?php echo $contact_details['phone']; ?>" class="d-flex align-items-center gap-8" style="margin-top: 3px; font-size: 18px;">
            <?php get_template_part('template-parts/svg/phone'); ?>
            <span class="font-heading"><?php echo $contact_details['phone']; ?></span>
        </a>
    </li>
</ul>