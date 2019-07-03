<?php

/* Template Name: Page Template - Insurance */

get_header(); ?>

    <section class="contact">

        <?php get_template_part('components/header-carousel-simple'); ?>

        <?php get_template_part('components/breadcrumbs') ?>

        <section class="columns-description">
            <div class="container">
                <div class="row">
                    <?php if(get_field('insurance_image')): ?>
                    <div class="col-md-6">
                    <?php else: ?>
                    <div class="col-md-12">
                    <?php endif; ?>
                        <h2 class="columns-description__title"><?php the_field('insurance_title'); ?></h2>
                        <div class="columns-description__description">

                            <?php the_field('insurance_description'); ?>

                        </div>
                    </div>

                    <?php if(get_field('insurance_image')): ?>
                        <div class="col-md-6">
                            <img src="<?php echo get_field('insurance_image')['url'] ?>" alt="image"
                             class="columns-description__image" />
                        </div>
                    <?php endif; ?>

                    <div class="col-md-11 columns-description__small-text">
                        <?php the_field('insurance_small_text'); ?>
                    </div>
                </div>
            </div>
        </section>

        <?php get_template_part('components/inspiration') ?>

    </section>

<?php get_footer(); ?>
