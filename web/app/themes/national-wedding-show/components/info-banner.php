<?php
/**
 * Created by PhpStorm.
 * User: Dominika
 * Date: 29/06/2018
 * Time: 15:38
 */ ?>

<section class="info-banner" style="background-color: #C87169">
    <img data-src="/assets/img/section-accents/confetti.png" class="lazy confetti-accent" alt="" />
    <div class="container">
        <div class="row justify-content-between align-items-center">
            <div class="col-12 col-md col-xl">

                <?php if (is_front_page()): ?>
                <h1 class="info-banner__text">
                    <?php echo get_field('cta_main_text'); ?>
                </h1>
                <?php else: ?>
                <h3 class="info-banner__text">
                    <?php echo get_field('cta_main_text'); ?>
                </h3>
                <?php endif; ?>

            </div>
            <div class="col-12 col-md-3 col-xl-2">
                <?php
                $button = get_field('cta_button'); ?>

                <a href="<?php echo $button['external_link_checkbox'] ? $button['cta_link_external'] : $button['cta_link_internal']; ?>"
                    class="info-banner__button button--circle"
                    <?php if ($button['link_in_new_tab']) echo "target='_blank'" ?>>
                    <?php echo $button['cta_title'] ?>
                </a>
            </div>
        </div>
    </div>
</section>