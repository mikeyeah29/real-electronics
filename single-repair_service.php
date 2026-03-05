<?php get_header(); ?>

<!-- wp:spacer {"height":132} -->
<div style="height:132px;" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer -->

<!-- wp:cover {"dimRatio":60,"overlayColor":"black","minHeight":240,"layout":{"type":"constrained"}} -->
<div class="wp-block-cover" style="min-height:240px">

	<span aria-hidden="true"
		class="wp-block-cover__background has-primary-background-color has-background-dim-100 has-background-dim"></span>

	<div class="wp-block-cover__inner-container">
		<!-- wp:paragraph {"align":"center","style":{"typography":{"fontWeight":"600"}},"textColor":"white","fontSize":"xxl"} -->
		<h1 class="has-text-align-center has-white-color has-text-color has-xxl-font-size has-font-family-heading" style="font-weight:600">
			<?php the_title(); ?>
		</h1>
		<!-- /wp:paragraph -->
	</div>

</div>
<!-- /wp:cover -->

<div class="container" style="margin-bottom: 80px; margin-top: 80px;">
    <?php the_content(); ?>
</div>

<?php get_footer(); ?>