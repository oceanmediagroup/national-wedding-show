<?php
/**
 * Created by PhpStorm.
 * User: Dominika
 * Date: 27/07/2018
 * Time: 14:04
 */

?>
<?php if (have_rows('custom_sponsors_logos')) : ?>
<section class="clients-carousel images-carousel additional-carousel top-accent top-accent--powder">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-12 text-center">
                <h2 class="clients-carousel__title t-section-heading"><span
                        class="t-underline-white--alpha"><?php echo get_field('custom_sponsors_carousel_title') ?></span>
                </h2>
            </div>
            <div class="col-12 images-carousel__col">
                <div class="images-carousel">
                    <div class="owl-carousel owl-theme owl-sponsors-additional">
                        <?php if (have_rows('custom_sponsors_logos')) : ?>
                        <?php while ( have_rows('custom_sponsors_logos') ) : the_row(); ?>
                        <a href="<?php the_sub_field('link'); ?>" target="_blank">
                            <img src="<?php the_sub_field('logo'); ?>" alt="<?php the_sub_field('title'); ?>"
                                class="image item">
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