<section class="repairs-tabs" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="400">
    <div class="repairs-tabs__controls" role="tablist" aria-label="Repair categories">

        <div class="repairs-tabs__control repairs-tabs__control--blue">
            <input class="repairs-tabs__input" type="radio" name="repair-tabs" id="tab-amps" data-panel="amps" checked>
            <label class="repairs-tabs__label" for="tab-amps">
                <?php get_template_part('template-parts/svg/amp'); ?>
                <span>Amps</span>
            </label>
        </div>

        <div class="repairs-tabs__control repairs-tabs__control--green">
            <input class="repairs-tabs__input" type="radio" name="repair-tabs" id="tab-mixers" data-panel="mixers">
            <label class="repairs-tabs__label" for="tab-mixers">
                <?php get_template_part('template-parts/svg/mixer'); ?>
                <span>Mixers</span>
            </label>
        </div>

        <div class="repairs-tabs__control repairs-tabs__control--purple">
            <input class="repairs-tabs__input" type="radio" name="repair-tabs" id="tab-speakers" data-panel="speakers">
            <label class="repairs-tabs__label" for="tab-speakers">
                <?php get_template_part('template-parts/svg/speaker'); ?>
                <span>Speakers</span>
            </label>
        </div>

        <div class="repairs-tabs__control repairs-tabs__control--orange">
            <input class="repairs-tabs__input" type="radio" name="repair-tabs" id="tab-dj" data-panel="dj">
            <label class="repairs-tabs__label" for="tab-dj">
                <?php get_template_part('template-parts/svg/laptop'); ?>
                <span>Laptops</span>
            </label>
        </div>

        <div class="repairs-tabs__control repairs-tabs__control--cyan">
            <input class="repairs-tabs__input" type="radio" name="repair-tabs" id="tab-pro" data-panel="pro">
            <label class="repairs-tabs__label" for="tab-pro">
                <?php get_template_part('template-parts/svg/pro'); ?>
                <span>Pro Audio</span>
            </label>
        </div>
    </div>

    <div class="repairs-tabs__content">
        <div class="repairs-tabs__panel" data-panel="amps">
            <?php get_template_part('template-parts/blocks/repair-tabs/repair-content', null, [
                'title' => 'Amplifier Repairs',
            ]); ?>
        </div>

        <div class="repairs-tabs__panel" data-panel="mixers">
            <?php get_template_part('template-parts/blocks/repair-tabs/repair-content', null, [
                'title' => 'Mixer Repairs',
            ]); ?>
        </div>

        <div class="repairs-tabs__panel" data-panel="speakers">
            <?php get_template_part('template-parts/blocks/repair-tabs/repair-content', null, [
                'title' => 'Speaker Repairs',
            ]); ?>
        </div>

        <div class="repairs-tabs__panel" data-panel="dj">
            <?php get_template_part('template-parts/blocks/repair-tabs/repair-content', null, [
                'title' => 'DJ Equipment',
            ]); ?>
        </div>

        <div class="repairs-tabs__panel" data-panel="pro">
            <?php get_template_part('template-parts/blocks/repair-tabs/repair-content', null, [
                'title' => 'Pro Audio',
            ]); ?>
        </div>
    </div>
</section>
