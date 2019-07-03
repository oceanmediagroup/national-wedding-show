<div class="container-fluid container-gold page-locations-desc">
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-6 page-locations-desc__text-wrapper">
                <div class="row">
                    <div class="col-12">
                        <h2 class="page-locations-desc__title"><?php the_field('loc-esen-title'); ?></h2>
                    </div>
                    <div class="col-12 page-locations-desc__text">
                        <?php the_field('loc-esen-left-text'); ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <?php
                        $button = get_field('button_1')['cta_button'];
                        $button2 = get_field('button_2')['cta_button'];
                        ?>
                        <a href="<?php echo $button['external_link_checkbox'] ? $button['cta_link_external'] : $button['cta_link_internal']; ?>"
                           class="col-12 col-md-5 page-locations-desc__button-link button--light-coral">
                            <?php echo $button['cta_title'] ?>
                        </a>

                        <a href="<?php echo $button2['external_link_checkbox'] ? $button2['cta_link_external'] : $button2['cta_link_internal']; ?>"
                           class="col-12 col-md-5 page-locations-desc__button-link button--light-coral">
                            <?php echo $button2['cta_title'] ?>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-6 page-locations-desc__text-wrapper">
                <div class="row">
                    <div class="col-12 page-locations-desc__text">
                        <?php
                        // check if the repeater field has rows of data
                        if (have_rows('loc-esen-right-col')):

                            // loop through the rows of data
                            while (have_rows('loc-esen-right-col')) : the_row(); ?>

                                <span class="page-locations-desc__color-title">
                                    <?php the_sub_field('loc-esen-right-title'); ?>
                                </span>
                                <?php the_sub_field('titleloc-esen-right-desc'); ?>

                            <?php endwhile;

                        else :

                            // no rows found

                        endif;

                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <img src="/assets/img/patterns/contact-right-top-points.png" alt=""
         class="container-gold__confetti container-gold__confetti--top">
    <img src="/assets/img/patterns/contact-left-bottom-points.png" alt=""
         class="container-gold__confetti container-gold__confetti--bottom">
</div>