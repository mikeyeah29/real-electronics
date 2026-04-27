<?php
/**
 * Template Name: Warranty
 */

the_post();

$manufacturer_warranty_query = new \WP_Query([
	'post_type' => 'manufacturer',
	'post_status' => 'publish',
	'posts_per_page' => -1,
	'orderby' => 'title',
	'order' => 'ASC',
	'meta_query' => [
		[
			'key' => 'warranty_enabled',
			'value' => '1',
			'compare' => '=',
		],
	],
]);
?>

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

<div class="container d-md-flex gap-lg" style="margin-bottom: 80px; margin-top: 80px;">
	<div class="w-md-33">
		<h2 class="wp-block-heading has-xl-font-size">Manufacturers</h2>

		<?php if ( $manufacturer_warranty_query->have_posts() ) : ?>
			<ul class="list-reset warranty-list">
				<?php while ( $manufacturer_warranty_query->have_posts() ) : $manufacturer_warranty_query->the_post(); ?>
					<li>
						<a href="#<?php echo esc_attr( sanitize_title( get_the_title() ) ); ?>">
							<?php echo esc_html( get_the_title() ); ?>
						</a>
					</li>
				<?php endwhile; ?>
			</ul>

			<?php wp_reset_postdata(); ?>
		<?php endif; ?>
	</div>

	<div class="w-md-66">
		<div class="post-content">
			<?php the_content(); ?>

			<?php if ( $manufacturer_warranty_query->have_posts() ) : ?>
				<?php $manufacturer_warranty_query->rewind_posts(); ?>

				<?php while ( $manufacturer_warranty_query->have_posts() ) : $manufacturer_warranty_query->the_post(); ?>
					<?php
					$warranty_info_heading = get_field( 'warranty_info_heading' );
					$warranty_summary = get_field( 'warranty_summary' );
					$warranty_cta_text = get_field( 'warranty_cta_text' );
					$warranty_cta_url = get_field( 'warranty_cta_url' );
					$warranty_details = get_field( 'warranty_details' );
					?>

					<div id="<?php echo esc_attr( sanitize_title( get_the_title() ) ); ?>" class="mb-lg" style="scroll-margin-top: 150px;">
						<h2 class="wp-block-heading has-xl-font-size">
							<?php echo esc_html( $warranty_info_heading ?: get_the_title() . ' In-Warranty Repairs' ); ?>
						</h2>

						<?php if ( $warranty_summary ) : ?>
							<?php echo wpautop( esc_html( $warranty_summary ) ); ?>
						<?php endif; ?>

                        <h3 class="wp-block-heading has-lg-font-size">How to Book a Repair</h3>

						<?php if ( $warranty_details ) : ?>
							<?php echo wp_kses_post( apply_filters( 'the_content', $warranty_details ) ); ?>
						<?php endif; ?>

						<?php if ( $warranty_cta_text && $warranty_cta_url ) : ?>
							<p>
								<a class="btn btn-primary" href="<?php echo esc_url( $warranty_cta_url ); ?>">
									<?php echo esc_html( $warranty_cta_text ); ?>
								</a>
							</p>
						<?php endif; ?>
                        <hr class="mt-lg b-light-orange">
					</div>
				<?php endwhile; ?>

				<?php wp_reset_postdata(); ?>
			<?php else : ?>
				<p>No warranty information is available right now.</p>
			<?php endif; ?>
		</div>
	</div>
</div>

<?php get_footer(); ?>
