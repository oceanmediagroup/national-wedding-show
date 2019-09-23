<section class="show-offers-banner">
    <div class="container-fluid">
        <div class="row show-offers-banner__wrapper lazy" data-bg="url('/assets/img/big-show-offers-bg.jpg')">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 offset-md-3 show-offers-banner__inner">
                        <h4 class="show-offers-banner__title"><?php echo get_field('show_offers_title'); ?></h4>
                        <p class="show-offers-banner__description">
                            <?php echo strip_tags(get_field('show_offers_description')); ?>
                        </p>
                        <a href="<?php echo get_field('show_offers_link')['url']; ?>" class="button--light-coral
                        show-offers-banner__link">VIEW ALL</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>