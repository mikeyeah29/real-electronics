<?php

get_header();

$manufacturer_options = get_option('real_electronics_manufacturer_settings') ?: [];
$other_manufacturers = preg_split('/\r\n|\r|\n/', $manufacturer_options['other_manufacturers'] ?? '');
$other_manufacturers = array_values(array_filter(array_map('trim', $other_manufacturers ?: [])));
?>

<main id="primary" class="site-main archive">

	<div class="archive-hero">
		<h1 class="has-xxl-font-size">Manufacturers</h1>
	</div>

	<div class="container container--wide archive-content pt-lg pb-lg">

		<?php if ( have_posts() ) : ?>

			<div class="archive-grid d-md-flex flex-wrap">

				<?php
				while ( have_posts() ) :
					the_post();
					?>

                    <div class="w-100 w-md-33 w-lg-25 pl-sm pr-sm pb-sm mb-sm">

                        <article class="archive-card">

                            <a href="<?php the_permalink(); ?>" class="archive-card__link">

                                <?php if ( get_post_meta(get_the_ID(), 'is_authorised', true) ) : ?>
                                    <span class="panel-badge">
                                        Authorised Service Centre
                                    </span>
                                <?php endif; ?>

                                <div class="archive-card__logo">
                                    <?php 

									$manufacturer = new \RealElectronics\Models\Manufacturer(get_the_ID());
									$logo = $manufacturer->getLogo();

									if ( $logo ) : ?>
										<img src="<?php echo $logo['url']; ?>" alt="<?php echo $logo['alt']; ?>">
									<?php endif; ?>
                                </div>

                                <h3 class="archive-card__title">
                                    <?php the_title(); ?>
                                </h3>

                            </a>

                        </article>

                    </div>

				<?php endwhile; ?>

			</div>

			<nav class="archive-pagination">
				<?php
				the_posts_pagination( [
					'mid_size'  => 2,
					'prev_text' => __( '← Previous', 'theme' ),
					'next_text' => __( 'Next →', 'theme' ),
				] );
				?>
			</nav>

		<?php else : ?>

			<section class="no-results">
				<h2><?php esc_html_e( 'Nothing found', 'theme' ); ?></h2>
				<p><?php esc_html_e( 'There are no posts to display here yet.', 'theme' ); ?></p>
			</section>

		<?php endif; ?>

		<h2 class="hdln-2 text-center mt-lg">Other Manufacturers We Repair</h2>

		<div class="archive-manufacturers-other">
			<ul class="cols-2 cols-md-3 cols-lg-4 ul-reset">
				<?php foreach ( $other_manufacturers as $other_manufacturer ) : ?>
					<li><?php echo esc_html($other_manufacturer); ?></li>
				<?php endforeach; ?>
			</ul>
		</div>

	</div>

</main>

<?php
get_footer();
