<?php get_header(); ?>

<?php the_content(); ?>

<?php // get_template_part('template-parts/blocks/hero-callout/hero-callout'); ?>

<!-- <div style="padding-top: var(--wp--preset--spacing--xl); padding-bottom: var(--wp--preset--spacing--xl);" class="manufacturers-slider page-start-after-hero" data-aos="fade-up" data-aos-duration="1000">

    <div class="container container--wide" data-aos="fade-up" data-aos-duration="1000">

        <h2 style="color: var(--wp--preset--color--primary); text-align: center;">Manufacturers & Partners</h2>

        <p style="color: var(--wp--preset--color--black); text-align: center;">We are proud to work with some of the world's leading manufacturers and partners.</p>

    </div>

    <div data-aos="fade-up" data-aos-duration="1000">
        <?php // get_template_part('template-parts/blocks/logo-slider/logo-slider'); ?>
    </div>

    <div class="container container--wide" style="text-align: center;" data-aos="fade-up" data-aos-duration="1000">
        <?php // get_template_part('template-parts/components/button', '', array('link' => '#', 'text' => 'View All Manufacturers', 'icon' => 'next')); ?>
    </div>

</div> -->

<!-- <div class="about-us">
    <div class="container container--wide">
        <div style="border-radius: 4px; background-color: var(--wp--preset--color--white);">
            <div class="d-flex align-items-stretch">
                <div class="about-us__image">
                    <img src="https://www.realelectronics.co.uk/img/RE5.jpeg" alt="Logo" style="border-radius: 4px 0px 0px 4px;">
                </div>
                <div class="about-us__content p-lg" data-aos="fade-up" data-aos-duration="1000">
                    <h2>About Real Electronics</h2>
                    <p>Real Electronics is a specialist audio repair company based in Sheffield, trusted by manufacturers, musicians, DJs, and venues across the UK.</p>
                    <p>We’re an authorised service and repair centre for leading professional audio brands — including Pioneer DJ, Markbass, and Adam Hall — carrying out both warranty and non-warranty repairs to the highest standards. Our workshop handles everything from DJ equipment and pro audio systems to guitar amps, mixers, speakers, and electronic hardware.</p>
                    <p>What sets us apart is a focus on precision, reliability, and manufacturer-approved processes. Every repair is carried out by experienced technicians using the correct parts and procedures, ensuring your equipment is returned fully tested, safe, and ready for use.</p>
                    <p>Whether you’re a touring DJ, a venue technician, or a musician who relies on your gear night after night, Real Electronics is a repair partner you can trust.</p>
                    <br>
                    <?php // get_template_part('template-parts/components/button', '', array('link' => '#', 'text' => 'Read More', 'icon' => 'next')); ?>
                </div>
            </div>
        </div>
    </div>
</div> -->

<div style="padding-top: var(--wp--preset--spacing--xl); padding-bottom: var(--wp--preset--spacing--xl); background-color: var(--wp--preset--color--black);">

    <div class="container container--wide">

        <div class="d-md-flex gap-32">
            <div class="w-md-33" data-aos="fade-up" data-aos-duration="1000">
                <h2 style="color: var(--wp--preset--color--white); padding-bottom: var(--wp--preset--spacing--sm);">What we repair</h2>
                <p style="color: var(--wp--preset--color--white);">No job is too small or too large for our specialised team who are experts in solid-state, valve and digital technologies.</p>
                <p style="color: var(--wp--preset--color--white);">We cover all types of audio repairs from guitar amps, mixers to pro audio equipment.</p>
                <p style="color: var(--wp--preset--color--white);">If you have any questions for our amplifier repair team, or would like a quote for a single repair or details on supplying support for multiple site repairs, please get in touch.</p>
            </div>
            <div class="w-md-66">
                <?php get_template_part('template-parts/blocks/repair-tabs/repair-tabs'); ?>
            </div>
        </div>

    </div>

</div>


<?php echo do_blocks('<!-- wp:real-electronics/reviews /-->'); ?>

<?php get_footer(); ?>
