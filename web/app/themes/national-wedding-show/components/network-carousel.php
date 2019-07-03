<?php
/**
 * Created by PhpStorm.
 * User: Dominika
 * Date: 27/07/2018
 * Time: 14:04
 */

?>
<section class="clients-carousel images-carousel">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-12 col-md-2 pr-0">
                <span class="clients-carousel__title"><?php echo get_field('sponsors_carousel_title', 85) ?></span>
            </div>

            <div class="col-12 col-md-10">
                <div class="images-carousel">
                    <div class="owl-carousel owl-theme owl-clients">
                    <?php
                        $args = array( 'post_type' => 'html5-blank', 'posts_per_page' => 10, 'orderby' => 'menu_order' );
                        $carousel = new WP_Query( $args );
                        while ( $carousel->have_posts() ) : $carousel->the_post(); ?>
                            <?php
                            $button = get_field('link_cta_button', $post->ID);
                            ?>
                                <a href="<?php echo $button['external_link_checkbox'] ? $button['cta_link_external'] : $button['cta_link_internal']; ?>"
                                    <?php if ($button['link_in_new_tab']) echo "target='_blank'" ?>>

                                    <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="wedding-brand" class="image item">

                                </a>
                        <?php
                        endwhile;
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>