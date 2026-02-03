<?php
/**
 * Template Name: Site Map
 */
?>

<?php get_header(); ?>

<div class="container container--wide" style="margin-top: 200px;">
    <ul class="sitemap-list">
        <li>
            <a href="<?php echo home_url('/'); ?>">Home</a>
        </li>
        <li>
            <a href="<?php echo home_url('/about'); ?>">About</a>
        </li>
        <li>
            <a href="<?php echo home_url('/manufacturers'); ?>">Manufacturers</a>
        </li>
        <li>
            <a href="<?php echo home_url('/request-a-repair'); ?>">Request a Repair</a>
        </li>
        <li>
            <a href="<?php echo home_url('/parts'); ?>">Submit a Parts Enquiry</a>
        </li>
        <li>
            <a href="<?php echo home_url('/contact'); ?>">Contact Us</a>
        </li>
    </ul>
</div>

<?php get_footer(); ?>
