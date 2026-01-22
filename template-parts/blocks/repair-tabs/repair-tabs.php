<section class="repairs-tabs" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="400">
    <div class="tabs">

        <!-- Tab controls -->

        <div class="tabs-controls d-flex justify-content-evenly">

            <div class="tab-control">
                <input type="radio" name="repair-tabs" id="tab-amps" checked>
                <label for="tab-amps" class="d-flex align-items-center justify-content-center">
                    <?php get_template_part('template-parts/svg/amp'); ?>
                    <span>Amps</span>
                </label>
            </div>

            <div class="tab-control">
                <input type="radio" name="repair-tabs" id="tab-mixers">
                <label for="tab-mixers" class="d-flex align-items-center justify-content-center">
                    <?php get_template_part('template-parts/svg/mixer'); ?>
                    <span>Mixers</span>
                </label>
            </div>

            <div class="tab-control">
                <input type="radio" name="repair-tabs" id="tab-speakers">
                <label for="tab-speakers" class="d-flex align-items-center justify-content-center">
                    <?php get_template_part('template-parts/svg/speaker'); ?>
                    <span>Speakers</span>
                </label>
            </div>

            <div class="tab-control">
                <input type="radio" name="repair-tabs" id="tab-dj">
                <label for="tab-dj" class="d-flex align-items-center justify-content-center">
                    <?php get_template_part('template-parts/svg/laptop'); ?>
                    <span>Laptops</span>
                </label>
            </div>

            <div class="tab-control">
                <input type="radio" name="repair-tabs" id="tab-pro">
                <label for="tab-pro" class="d-flex align-items-center justify-content-center">
                    <?php get_template_part('template-parts/svg/pro'); ?>
                    <span>Pro Audio</span>
                </label>
            </div>
        </div>

        <!-- Tab panels -->
        <div class="tab-content">

            <div class="panel amps">

                <?php get_template_part('template-parts/blocks/repair-tabs/repair-content', null, [
                    'title' => 'Amplifier Repairs',
                ]); ?>
                
            </div>

            <div class="panel mixers">
            
                <?php get_template_part('template-parts/blocks/repair-tabs/repair-content', null, [
                    'title' => 'Mixer Repairs',
                ]); ?>

            </div>

            <div class="panel speakers">
            
                <?php get_template_part('template-parts/blocks/repair-tabs/repair-content', null, [
                    'title' => 'Speaker Repairs',
                ]); ?>
            </div>

            <div class="panel dj">
            
                <?php get_template_part('template-parts/blocks/repair-tabs/repair-content', null, [
                    'title' => 'DJ Equipment',
                ]); ?>
            </div>

            <div class="panel pro">
            
                <?php get_template_part('template-parts/blocks/repair-tabs/repair-content', null, [
                    'title' => 'Pro Audio',
                ]); ?>
            </div>

        </div>
    </div>
</section>