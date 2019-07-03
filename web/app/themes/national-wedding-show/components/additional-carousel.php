<?php
/**
 * Created by PhpStorm.
 * User: Dominika
 * Date: 27/07/2018
 * Time: 14:04
 */

?>
<?php if (have_rows('custom_sponsors_logos')) : ?>
    <section class="clients-carousel images-carousel additional-carousel">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12 col-md-2 pr-0">
                    <span class="clients-carousel__title"><?php echo get_field('custom_sponsors_carousel_title') ?></span>
                </div>
                <div class="col-12 col-md-10">
                    <div class="images-carousel">
                        <div class="owl-carousel owl-theme owl-sponsors-additional">
                            <?php if (have_rows('custom_sponsors_logos')) : ?>
                                <?php while ( have_rows('custom_sponsors_logos') ) : the_row(); ?>
                                    <a href="<?php the_sub_field('link'); ?>" target="_blank">
                                        <img src="<?php the_sub_field('logo'); ?>" alt="<?php the_sub_field('title'); ?>" class="image item">
                                    </a>
                                <?php endwhile; ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>
