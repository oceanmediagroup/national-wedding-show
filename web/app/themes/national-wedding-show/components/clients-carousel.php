<?php
/**
 * Created by PhpStorm.
 * User: Dominika
 * Date: 29/06/2018
 * Time: 09:33
 */ ?>

<section class="clients-carousel images-carousel">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-12 col-md-2 pr-0">
                <span class="clients-carousel__title"><?php echo get_field('clients_carousel_title') ?></span>
            </div>

            <div class="col-12 col-md-10">
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