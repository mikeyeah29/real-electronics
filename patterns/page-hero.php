<?php
/**
 * Title: Page Hero
 * Slug: real-electronics/page-hero
 * Categories: real-electronics
 * Description: Hero section with background image and title.
 * Block Types: core/spacer, core/cover, core/paragraph
 */
?>

<!-- wp:spacer {"height":132} -->
<div style="height:132px" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer -->

<!-- wp:cover {"dimRatio":60,"overlayColor":"black","minHeight":240,"layout":{"type":"constrained"}} -->
<div class="wp-block-cover" style="min-height:240px">

	<span aria-hidden="true"
		class="wp-block-cover__background has-black-background-color has-background-dim-60 has-background-dim"></span>

	<div class="wp-block-cover__inner-container">
		<!-- wp:paragraph {"align":"center","style":{"typography":{"fontWeight":"600"}},"textColor":"white","fontSize":"xxl"} -->
		<p class="has-text-align-center has-white-color has-text-color has-xxl-font-size" style="font-weight:600">
			Request a Repair
		</p>
		<!-- /wp:paragraph -->
	</div>

</div>
<!-- /wp:cover -->
