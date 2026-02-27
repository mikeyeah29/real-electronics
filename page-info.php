<?php

/**
 * Template Name: Info
 */

?>

<?php get_header(); ?>

<?php if ( is_user_logged_in() ) {
    phpinfo();
} else {    
    echo '<div class="container">';
    echo '<h1>Info</h1>';
    echo '<p>You are not logged in.</p>';
    echo '</div>';
} ?>

<?php get_footer(); ?>