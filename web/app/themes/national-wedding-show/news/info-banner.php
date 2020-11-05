<?php
/**
 * Created by PhpStorm.
 * User: Dominika
 * Date: 29/06/2018
 * Time: 15:38
 */ ?>

<section class="info-banner" style="margin: 131px 0px 121px; background-color: <?php echo get_field('ribbon_color'); ?>">
  <img data-src="/assets/img/section-accents/confetti.png" class="lazy confetti-accent" alt="" />
    <div class="container">
        <div class="row justify-content-between align-items-center">
            <div class="col-12 col-md col-xl">
                <h3 class="info-banner__text">
                    <?php echo get_field('cta_main_text', 33); ?>
                </h3>
            </div>
            <div class="col-12 col-md-3 col-xl-2">
                <?php
                $button = get_field('cta_button'); ?>

                <a href="<?php echo $button['external_link_checkbox'] ? $button['cta_link_external'] : $button['cta_link_internal']; ?>"
                   class="info-banner__button button--circle">
                    <?php echo $button['cta_title']; ?>
                </a>

            </div>
        </div>
    </div>
</section>
