<?php get_header() ?>
<div class="front-page">

    <?php get_template_part('homepage/hero') ?>

    <?php get_template_part('components/product-cards') ?>

    <?php get_template_part('components/ad-banners') ?>

    <?php get_template_part('components/info-banner') ?>

    <div class="container-gray">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-6">
                    <?php get_template_part('components/testimonials-carousel') ?>
                </div>

                <div class="col-12 col-lg-6">
                    <?php get_template_part('components/competition-card-small') ?>
                </div>
            </div>
        </div>
    </div>

    <?php get_template_part('components/exhibitor-of-the-week') ?>

    <?php get_template_part('components/clients-carousel') ?>

    <?php get_template_part('components/inspiration') ?>

</div>
<?php get_footer() ?>
