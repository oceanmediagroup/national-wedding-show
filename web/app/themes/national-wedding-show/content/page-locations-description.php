<section class="page-locations-desc">
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-6 page-locations-desc__img-wrapper">
                <img class="page-locations-desc__img" src="<?php the_field('locations_description-image'); ?>" alt="">
            </div>
            <div class="col-12 col-lg-6 page-locations-desc__text-wrapper">
                <div class="row">
                    <div class="col-12">
                        <h2 class="page-locations-desc__title"><?php the_field('locations_description-title'); ?></h2>
                    </div>
                    <div class="col-12 page-locations-desc__text">
                        <?php the_field('locations_description-text'); ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <?php if (get_field('locations_description-cta-label') && get_field('locations_description-cta-link')): ?>
                            <?php $link = get_field('locations_description-cta-link'); ?>
                            <?php
                            $target = '';
                            if ($link['target']) {
                                $target = "target='" . $link['target'] . "'";
                            } ?>
                            <a href="<?php echo $link['url']; ?>"

                                <?php echo $target ?>
                               class="col-12 col-md-5 page-locations-desc__button-link button--light-coral"><?php the_field('locations_description-cta-label'); ?></a>
                        <?php endif; ?>

                        <?php if (get_field('locations_description-cta-label-sec') && get_field('locations_description-cta-link-sec')): ?>
                            <?php $link = get_field('locations_description-cta-link-sec'); ?>
                            <?php
                            $target = '';
                            if ($link['target']) {
                                $target = "target='" . $link['target'] . "'";
                            } ?>
                            <a href="<?php echo $link['url']; ?>"
                                <?php echo $target ?>
                               class="col-12 col-md-5 page-locations-desc__button-link button--light-coral"><?php the_field('locations_description-cta-label-sec'); ?></a>
                        <?php endif; ?></div>

                </div>
            </div>
        </div>
    </div>
</section>