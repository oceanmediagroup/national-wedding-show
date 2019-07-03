<?php
/**
 * Created by PhpStorm.
 * User: Dominika
 * Date: 30/07/2018
 * Time: 13:31
 */ ?>
<div class="header-carousel-simple color-overlay-wrapper">
    <div class="owl-carousel owl-theme owl-header-simple ">
        <?php
        if (have_rows('slides')):
            while (have_rows('slides')) : the_row(); ?>

                <?php if (get_sub_field('slide_type') == 'image'): ?>
                    <div class="image item"
                         style="background-image: url('<?php echo get_sub_field('background_image')['url'] ?>')"></div>
                <?php endif; ?>

                <?php if (get_sub_field('slide_type') == 'video'): ?>
                    <div class="video item custom-video video-container color-overlay-wrapper"
                         style="background-image: url('<?php echo get_sub_field('background_image')['url'] ?>')">
                        <div class="video-wrapper">
                            <?php if (!wp_is_mobile()): ?>
                                <iframe width="560" height="315"
                                        src="<?php echo get_sub_field('video_link') ?>?background=1"
                                        webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
                            <?php endif; ?>
                        </div>
                        <div class="video-overlay"></div>

                        <span class="color-overlay--light"></span>
                    </div>
                <?php endif; ?>

            <?php endwhile;
        endif; ?>
    </div>

    <?php if (!is_front_page()): ?>
        <h1 class="header-carousel-simple__title">
            <?php echo get_the_title() ?>
        </h1>
    <?php endif; ?>
    <?php if (is_front_page() && get_field('header_title')): ?>
        <h1 class="header-carousel-simple__title">
            <?php echo get_field('header_title') ?>
        </h1>
    <?php endif; ?>
</div>
