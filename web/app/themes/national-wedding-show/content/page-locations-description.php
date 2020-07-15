<section class="page-locations-desc">
    <div class="container">
        <div class="row">
            <div class="col-12 page-locations-desc__text-wrapper text-center">
                <div class="row">
                    <div class="col-12">
                        <h2 class="page-locations-desc__title t-section-heading">
                            <span
                                class="t-underline-secondary--alpha"><?php the_field('locations_description-title'); ?></span>
                        </h2>
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
                        <a href="<?php echo $link['url']; ?>" <?php echo $target ?>
                            class="page-locations-desc__button-link button button--new-primary-dark"><?php the_field('locations_description-cta-label'); ?></a>
                        <?php endif; ?>

                        <?php if (get_field('locations_description-cta-label-sec') && get_field('locations_description-cta-link-sec')): ?>
                        <?php $link = get_field('locations_description-cta-link-sec'); ?>
                        <?php
                            $target = '';
                            if ($link['target']) {
                                $target = "target='" . $link['target'] . "'";
                            } ?>
                        <a href="<?php echo $link['url']; ?>" <?php echo $target ?>
                            class="page-locations-desc__button-link button button--new-primary-dark"><?php the_field('locations_description-cta-label-sec'); ?></a>
                        <?php endif; ?>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>