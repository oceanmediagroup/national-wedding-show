<?php
/**
 * Created by PhpStorm.
 * User: Dominika
 * Date: 29/06/2018
 * Time: 15:18
 */ ?>

<section class="ad-banners">
    <div class="container">
        <div class="row">
            <div class="owl-carousel owl-theme owl-adverts">
                <?php if (have_rows('adverts')):
                    while (have_rows('adverts')) : the_row(); ?>

                        <?php
                        $link = get_sub_field('advert_link');
                        $img = get_sub_field('advert_image');
                        ?>

                        <div class="item ad-banner">
                            <a href="<?php echo $link; ?>"
                                <?php echo get_sub_field('opens_in_a_new_tab') ? 'target=\'_blank\'' : '' ?>
                            >
                                <img src="<?php echo $img['url'] ?>" alt="<?php echo $img['alt'] ?>"
                                     class="ad-banner__img">
                            </a>
                        </div>

                    <?php endwhile;
                endif; ?>
            </div>
        </div>
    </div>
</section>
