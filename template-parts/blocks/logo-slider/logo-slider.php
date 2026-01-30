<!-- <div class="logo-slider">
    <div class="blaze-slider">
        <div class="blaze-container">
            <div class="blaze-track-container">
                <div class="blaze-track">
                    <img src="<?php // echo get_template_directory_uri(); ?>/assets/images/logo-7.png" alt="Logo">
                    <img src="<?php // echo get_template_directory_uri(); ?>/assets/images/logo-8.png" alt="Logo">
                    <img src="<?php // echo get_template_directory_uri(); ?>/assets/images/logo-2.png" alt="Logo">
                    <img src="<?php // echo get_template_directory_uri(); ?>/assets/images/logo-9.png" alt="Logo">
                    <img src="<?php // echo get_template_directory_uri(); ?>/assets/images/logo-10.png" alt="Logo">
                    <img src="<?php // echo get_template_directory_uri(); ?>/assets/images/logo-11.png" alt="Logo">
                    <img src="<?php // echo get_template_directory_uri(); ?>/assets/images/logo-12.png" alt="Logo">

                    <img src="<?php // echo get_template_directory_uri(); ?>/assets/images/logo-7.png" alt="Logo">
                    <img src="<?php // echo get_template_directory_uri(); ?>/assets/images/logo-8.png" alt="Logo">
                    <img src="<?php // echo get_template_directory_uri(); ?>/assets/images/logo-2.png" alt="Logo">
                    <img src="<?php // echo get_template_directory_uri(); ?>/assets/images/logo-9.png" alt="Logo">
                    <img src="<?php // echo get_template_directory_uri(); ?>/assets/images/logo-10.png" alt="Logo">
                    <img src="<?php // echo get_template_directory_uri(); ?>/assets/images/logo-11.png" alt="Logo">
                    <img src="<?php // echo get_template_directory_uri(); ?>/assets/images/logo-12.png" alt="Logo">
                </div>
            </div>
        </div>
    </div>
</div> -->

<div class="logo-slider">
	<div class="blaze-slider">
		<div class="blaze-container">
			<div class="blaze-track-container">
				<div class="blaze-track">

					<?php
					$manufacturers = new WP_Query([
						'post_type'      => 'manufacturer',
						'posts_per_page' => -1,
						'post_status'    => 'publish',
						'orderby'        => 'menu_order',
						'order'          => 'ASC',
					]);

					if ($manufacturers->have_posts()) :
						while ($manufacturers->have_posts()) : $manufacturers->the_post();

							if (has_post_thumbnail()) :
								$logo_url = get_the_post_thumbnail_url(get_the_ID(), 'medium');
								$alt      = get_the_title();
								?>
								<img src="<?php echo esc_url($logo_url); ?>" alt="<?php echo esc_attr($alt); ?>">
								<?php
							endif;

						endwhile;
						wp_reset_postdata();
					endif;
					?>

					<?php
					// Duplicate logos for seamless infinite scroll
					if (!empty($manufacturers) && $manufacturers->have_posts()) :
						$manufacturers->rewind_posts();
						while ($manufacturers->have_posts()) : $manufacturers->the_post();

							if (has_post_thumbnail()) :
								$logo_url = get_the_post_thumbnail_url(get_the_ID(), 'medium');
								$alt      = get_the_title();
								?>
								<img src="<?php echo esc_url($logo_url); ?>" alt="<?php echo esc_attr($alt); ?>">
								<?php
							endif;

						endwhile;
						wp_reset_postdata();
					endif;
					?>

				</div>
			</div>
		</div>
	</div>
</div>
