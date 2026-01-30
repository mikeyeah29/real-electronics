<?php

get_header();
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

                        <article class="manufacturer-card">

                            <a href="<?php the_permalink(); ?>" class="manufacturer-card__link">

                                <?php if ( get_post_meta(get_the_ID(), 'is_authorised', true) ) : ?>
                                    <span class="manufacturer-card__badge">
                                        Authorised Service Centre
                                    </span>
                                <?php endif; ?>

                                <div class="manufacturer-card__logo">
                                    <?php the_post_thumbnail('medium', [
                                        'alt' => get_the_title() . ' repairs'
                                    ]); ?>
                                </div>

                                <h3 class="manufacturer-card__title">
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

	</div>

</main>

<?php
get_footer();
