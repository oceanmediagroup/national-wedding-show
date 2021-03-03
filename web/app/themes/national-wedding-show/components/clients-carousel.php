<?php
/**
 * Created by PhpStorm.
 * User: Dominika
 * Date: 29/06/2018
 * Time: 09:33
 */ ?>

<section class="clients-carousel images-carousel top-accent top-accent--powder">
    <img data-src="/assets/img/section-accents/leaf-accent.png" class="lazy leaf-accent" alt="" />
    <div class="container">
        <div class="row align-items-center">
            <div class="col-12 text-center">
                <h2 class="clients-carousel__title t-section-heading"><span
                        class="t-underline-stone--alpha"><?php echo get_field('clients_carousel_title') ?></span></h2>
            </div>

            <div class="col-12 images-carousel__col">
                <div class="images-carousel">
                    <div class="owl-carousel owl-theme owl-clients">
                        <?php
                        $args = array('post_type' => 'clients', 'posts_per_page' => 10,
                            'orderby' => 'menu_order');
                        $carousel = new WP_Query($args);
                        while ($carousel->have_posts()) : $carousel->the_post(); ?>

                        <?php if (get_field('client_carousel_url')) : ?>

                        <a href="<?php the_field('client_carousel_url'); ?>" class="image item">

                            <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="wedding-brand">

                        </a>

                        <?php else : ?>

                        <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="wedding-brand" class="image item">

                        <?php endif; ?>

                        <?php
                        endwhile;
                        ?>
                    </div>

                    <div id="clientsOutsideNav" class="clients-carousel__nav"></div>
                </div>
            </div>
        </div>
    </div>
</section>