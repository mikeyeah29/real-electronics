<?php
    $testimonials = [
        [
            'author' => 'Neil Belfitt',
            'content' => '“My Quad had dodgy EQ Pot, I took it into Real Electronics who diagnosed the problem and sent me the report same day. Very reasonable prices and quality service. Had the Quad back fully repaired, tested and cleaned within 3 days.<br><br> Highly Recommended”',
            'rating' => 5
        ],
        [
            'author' => 'Mike Aistrop',
            'content' => '“I had tried to have my Pioneer Flx4 fixed a few times and it wasn\'t until I sent it to real electronics that the problem was finally resolved. The communication and support was fantastic.<br><br> Highly recommend for all Pioneer owners”',
            'rating' => 5
        ],
        [
            'author' => 'Chris Duckenfield',
            'content' => '“Genuinely outstanding service.<br><br>Technics 1210 decks well over 30 yrs old, brought back to life and working perfectly.<br><br>Would highly recommend Real Electronics !”',
            'rating' => 5
        ],
        [
            'author' => 'Russell Hall',
            'content' => '“Excellent quick service. Easy to deal with throughout the booking, repair and collection process. Great communication and quick repair. Would definitley use again.”',
            'rating' => 5
        ],
        [
            'author' => 'Stuart Jenson',
            'content' => '“This was a great experience as I contacted them about a product that I had recently purchased and was damaged without warranty.<br><br>However they arranged postage to and from their Sheffield depot and they were in touch all the way through from the beginning and very informative, Lauren a lovely young lady very intelligent, polite and very well spoken and very understanding.<br><br>Lauren emailed me checking with me what I wanted and talking to me through the whole process and Lauren then arranged next day delivery for my property to be returned to me all came back as it left but repaired I am so grateful to Real Electronics and to Lauren for being so helpful and so understanding absolutely brilliant.!”',
            'rating' => 5
        ],
        [
            'author' => 'Anthony Mudrak',
            'content' => '“Excellent, professional service and in my case a very swift turn-around from diagnosis to repair. Thoroughly recommend this company.”',
            'rating' => 5
        ]
    ];
?>

<div class="testimonials-slider">
    <div class="blaze-slider">

        <div class="d-flex justify-content-between align-items-center">

            <div data-aos="fade-up" data-aos-duration="1000">
                <h2 class="mb-0 pb-0">What Our Customers Say</h2>
                <p class="mb-0 pb-0 pt-xs">View all reviews on <a href="https://www.google.com/search?q=real+electronics+sheffield" target="_blank">Google ></a></p>
            </div>

            <div class="d-flex gap-32 pioneer-search" data-aos="fade-up" data-aos-duration="1000">
                <!-- Controls -->
                <!-- <button class="blaze-prev pioneer-button" aria-label="Previous">
                    <?php // get_template_part('template-parts/svg/rewind'); ?>
                </button>
                <button class="blaze-next pioneer-button rotate-180" aria-label="Next">
                    <?php // get_template_part('template-parts/svg/rewind'); ?>
                </button> -->
                <button class="blaze-prev" aria-label="Previous" style="color: var(--wp--preset--color--white);">
                    <?php get_template_part('template-parts/svg/rewind'); ?>
                </button>
                <button class="blaze-next" aria-label="Next" style="color: var(--wp--preset--color--white);">
                    <?php get_template_part('template-parts/svg/next'); ?>
                </button>
            </div>

        </div>

        <div class="blaze-container pt-lg" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="400">
            <div class="blaze-track-container">
                <div class="blaze-track">

                    <?php foreach($testimonials as $testimonial) { ?>
                        <div class="blaze-slide">
                            <?php get_template_part('template-parts/blocks/testimonial-slider/slide', null, $testimonial); ?>
                        </div>
                    <?php } ?>

                </div>
            </div>
        </div>

        
    </div>
</div>