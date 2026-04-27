<?php
/**
 * Template Name: Warranty
 */
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
        <ul class="list-reset warranty-list">
            <li>
                <a href="#pioneer">Pioneer</a>
            </li>
            <li>
                <a href="#mark-bass">Mark Bass</a>
            </li>
            <li>
                <a href="#dynaudio">Dynaudio</a>
            </li>
            <li>
                <a href="#adam-hall">Adam Hall</a>
            </li>
            <li>
                <a href="#ld-systems">LD Systems</a>
            </li>
            <li>
                <a href="#roland-boss">Roland/BOSS</a>
            </li>
            <li>
                <a href="#zoom">Zoom</a>
            </li>
            <li>
                <a href="#icon">iCON</a>
            </li>
        </ul>
    </div>
    <div class="w-md-66">
        <?php the_content(); ?>
        <div id="pioneer">
            <h2 class="wp-block-heading has-xl-font-size">In warranty repairs for Pioneer</h2>
            <p>Pioneer is a Japanese company that produces audio equipment. It is a subsidiary of Sony. Pioneer was founded in 1938 by Masaru Ibuka and Akio Morita. Pioneer is known for its audio equipment, such as CD players, DVD players, and Blu-ray players.</p>
            <h3>How to book a repair</h3>
            <p>To book a repair for Pioneer, please contact us at <a href="mailto:info@pioneer.com">info@pioneer.com</a>.</p>
        </div>
        <div id="mark-bass">
            <h2 class="wp-block-heading has-xl-font-size">In warranty repairs for Mark Bass</h2>
            <p>Mark Bass is a company that produces audio equipment. It is a subsidiary of Yamaha. Mark Bass was founded in 1970 by Mark Bass. Mark Bass is known for its audio equipment, such as amplifiers, speakers, and mixers.</p>
            <h3>How to book a repair</h3>
            <p>To book a repair for Mark Bass, please contact us at <a href="mailto:info@markbass.com">info@markbass.com</a>.</p>
        </div>
        <div id="dynaudio">
            <h2 class="wp-block-heading has-xl-font-size">In warranty repairs for Dynaudio</h2>
            <p>Dynaudio is a company that produces audio equipment. It is a subsidiary of Yamaha. Dynaudio was founded in 1972 by Søren Pind. Dynaudio is known for its audio equipment, such as amplifiers, speakers, and mixers.</p>
            <h3>How to book a repair</h3>
            <p>To book a repair for Dynaudio, please contact us at <a href="mailto:info@dynaudio.com">info@dynaudio.com</a>.</p>
        </div>
        <div id="adam-hall">
            <h2 class="wp-block-heading has-xl-font-size">In warranty repairs for Adam Hall</h2>
            <p>Adam Hall is a company that produces audio equipment. It is a subsidiary of Yamaha. Adam Hall was founded in 1974 by Adam Hall. Adam Hall is known for its audio equipment, such as amplifiers, speakers, and mixers.</p>
            <h3>How to book a repair</h3>
            <p>To book a repair for Adam Hall, please contact us at <a href="mailto:info@adamhall.com">info@adamhall.com</a>.</p>
        </div>
        <div id="ld-systems">
            <h2 class="wp-block-heading has-xl-font-size">In warranty repairs for LD Systems</h2>
            <p>LD Systems is a company that produces audio equipment. It is a subsidiary of Yamaha. LD Systems was founded in 1976 by LD Systems. LD Systems is known for its audio equipment, such as amplifiers, speakers, and mixers.</p>
            <h3>How to book a repair</h3>
            <p>To book a repair for LD Systems, please contact us at <a href="mailto:info@ldsystems.com">info@ldsystems.com</a>.</p>
        </div>
        <div id="roland-boss">
            <h2 class="wp-block-heading has-xl-font-size">In warranty repairs for Roland/BOSS</h2>
            <p>Roland/BOSS is a company that produces audio equipment. It is a subsidiary of Yamaha. Roland/BOSS was founded in 1978 by Roland/BOSS. Roland/BOSS is known for its audio equipment, such as amplifiers, speakers, and mixers.</p>
            <h3>How to book a repair</h3>
            <p>To book a repair for Roland/BOSS, please contact us at <a href="mailto:info@rolandboss.com">info@rolandboss.com</a>.</p>
        </div>
        <div id="zoom">
            <h2 class="wp-block-heading has-xl-font-size">In warranty repairs for Zoom</h2>
            <p>Zoom is a company that produces audio equipment. It is a subsidiary of Yamaha. Zoom was founded in 1980 by Zoom. Zoom is known for its audio equipment, such as amplifiers, speakers, and mixers.</p>
            <h3>How to book a repair</h3>
            <p>To book a repair for Zoom, please contact us at <a href="mailto:info@zoom.com">info@zoom.com</a>.</p>
        </div>
        <div id="icon">
            <h2 class="wp-block-heading has-xl-font-size">In warranty repairs for iCON</h2>
            <p>iCON is a company that produces audio equipment. It is a subsidiary of Yamaha. iCON was founded in 1982 by iCON. iCON is known for its audio equipment, such as amplifiers, speakers, and mixers.</p>
            <h3>How to book a repair</h3>
            <p>To book a repair for iCON, please contact us at <a href="mailto:info@icon.com">info@icon.com</a>.</p>
        </div>
    </div>
</div>

<?php get_footer(); ?>