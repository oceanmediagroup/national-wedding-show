<?php
/**
 * Created by PhpStorm.
 * User: Dominika
 * Date: 29/06/2018
 * Time: 16:10
 */ ?>


<section class="testimonials-carousel h-100">
    <div class="row h-100 align-items-center">
        <div class="col">
            <div class="owl-carousel owl-theme owl-testimonials">

                <?php
                $args = array(
                    'post_type' => 'testimonials',
                    'posts_per_page' => -1,
                    'orderby' => 'menu_order'
                );

                $query = new WP_Query($args);
                ?>

                <?php if ($query->have_posts()) :
                    while ($query->have_posts()) :
                        $query->the_post(); ?>

                        <div class="item testimonial">
                            <div
                                class="testimonial__img lazy"
                                data-bg="url('<?php the_post_thumbnail_url('thumbnail'); ?>')"
                                ></div>
                            <h4 class="testimonial__title">
                                <?php echo get_the_title(); ?>
                            </h4>
                            <p class="testimonial__text">
                                <?php echo get_the_content(); ?>
                            </p>
                            <span id="dotsContainer"></span>
                        </div>

                    <?php endwhile;
                endif;
                wp_reset_query(); ?>

            </div>
        </div>
    </div>
</section>
