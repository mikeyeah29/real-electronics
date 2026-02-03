<?php get_header(); ?>

<section style="padding-top: var(--wp--preset--spacing--xl); padding-bottom: var(--wp--preset--spacing--xl); background: var(--wp--preset--color--black); color: var(--wp--preset--color--white);">
    <div class="container container--wide pt-lg">
        <div class="d-md-flex align-items-center gap-32 pt-md" style="padding: clamp(2rem, 4vw, 4rem); border-radius: var(--wp--preset--radius--md);">
            <div class="w-md-50">
                <p style="color: var(--wp--preset--color--primary); font-weight: 600; margin-bottom: var(--wp--preset--spacing--xs);">404</p>
                <h1 style="color: var(--wp--preset--color--white);" class="pb-md">We can’t find that page.</h1>
                <p style="color: var(--wp--preset--color--white);">The link might be broken or the page may have moved. Try heading back home or searching the site.</p>
                <div class="d-flex flex-wrap gap-16" style="margin-top: var(--wp--preset--spacing--md);">
                    <?php get_template_part('template-parts/components/button', '', [
                        'link' => home_url('/'),
                        'text' => 'Back to Home',
                        'icon' => 'next',
                        'solid' => true,
                        'color_slug' => 'primary',
                    ]); ?>
                </div>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>
