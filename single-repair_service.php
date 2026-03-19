<?php 

// require_once get_template_directory() . '/classes/class-options.php';

get_header(); ?>

<?php 

$image = get_the_post_thumbnail_url();

$repair_service = new \RealElectronics\Models\RepairService(get_the_ID());

?>

<!-- wp:spacer {"height":132} -->
<div style="height:132px;" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer -->

<!-- wp:cover {"dimRatio":60,"overlayColor":"black","minHeight":240,"layout":{"type":"constrained"}} -->
<div class="wp-block-cover" style="min-height:240px">

	<img fetchpriority="high" decoding="async" width="1600" height="900" class="wp-block-cover__image-background wp-image-109 size-full" alt="" 
		src="<?php echo $image; ?>" 
		style="object-position:50% 50%" 
		data-object-fit="cover" 
		data-object-position="50% 50%" 
		sizes="(max-width: 1600px) 100vw, 1600px">

	<span aria-hidden="true"
		class="wp-block-cover__background has-black-background-color has-background-dim-60 has-background-dim"></span>

	<div class="wp-block-cover__inner-container">
		<!-- wp:paragraph {"align":"center","style":{"typography":{"fontWeight":"600"}},"textColor":"white","fontSize":"xxl"} -->
		<a href="<?php echo home_url('/repair-services'); ?>" class="text-center d-block mb-8 has-white-color txt-300 has-sm-font-size">< Back to Repairs</a>
		<h1 class="has-text-align-center has-white-color has-text-color has-xxl-font-size has-font-family-heading" style="font-weight:600">
			<?php the_title(); ?>
		</h1>
		<!-- /wp:paragraph -->
	</div>

</div>
<!-- /wp:cover -->

<div class="container pt-lg pb-lg page-start-after-hero">
    <?php the_content(); ?>
</div>

<?php 
	
	$cta_args = $repair_service->getCallToAction();

	get_template_part('template-parts/section-cta', null, [
		'image' => $cta_args['image'],
		'heading' => $cta_args['heading'],
		'description' => $cta_args['description'],
	]); 

?>

<?php get_footer(); ?>