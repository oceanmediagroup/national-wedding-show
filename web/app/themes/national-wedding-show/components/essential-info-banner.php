<?php
/**
 * Created by PhpStorm.
 * User: Dominika
 * Date: 29/06/2018
 * Time: 15:38
 */ ?>

<section class="info-banner" style="background-color: <?php echo get_field('ribbon_color'); ?>">
    <div class="container">
        <div class="row justify-content-between align-items-center">
            <div class="col-12 col-md col-xl">
                <h3 class="info-banner__text">
                    <?php echo get_field('essential_cta_ribbon_cta_main_text'); ?>
                </h3>
            </div>
            <div class="col-12 col-md-3 col-xl-2">
                <?php
                $button = get_field('essential_cta_ribbon_cta_button'); ?>

                <a href="<?php echo $button['external_link_checkbox'] ? $button['cta_link_external'] : $button['cta_link_internal']; ?>"
                   class="info-banner__button button--light-gold button--white-mobile w-100"
                    <?php if ($button['link_in_new_tab']) echo "target='_blank'" ?>>
                    <?php echo $button['cta_title'] ?>
                </a>

            </div>
        </div>
    </div>
</section>
