<?php
/**
 * Created by PhpStorm.
 * User: Kamil
 */ ?>

<div class="video-header">
    <div class="owl-carousel owl-theme owl-header-simple">

        <?php
        if (have_rows('locations_slide')):
            while (have_rows('locations_slide')) : the_row(); ?>

        <?php if (get_sub_field('locations_slide-type') == 'image'): ?>
        <div class="image item"
            style="background-image: url('<?php echo get_sub_field('locations_slide-image')['url'] ?>')">
            <h1 class="video-header__title">
                <?php echo get_sub_field('locations_slide-title') ?>
            </h1>
            <h3 class="video-header__date">
                <?php echo get_sub_field('locations_slide-date') ?>
            </h3>

            <?php
                        $button = get_sub_field('cta_button', $post->ID);
                        ?>
            <?php if ($button['cta_title']): ?>
            <a href="<?php echo $button['external_link_checkbox'] ? $button['cta_link_external'] : $button['cta_link_internal']; ?>"
                class="button--bg-coral button--bg-coral-bold video-header__cta"
                <?php if ($button['link_in_new_tab']) echo "target='_blank'" ?>>
                <?php echo $button['cta_title'] ?>
            </a>
            <?php endif; ?>
        </div>
        <?php endif; ?>

        <?php if (get_sub_field('locations_slide-type') == 'video'): ?>
        <div class="video item custom-video video-container color-overlay-wrapper lazy"
            data-bg="url('<?php echo get_sub_field('locations_slide-image')['url'] ?>')">
            <div class="video-wrapper">

                <?php if (!wp_is_mobile()): ?>
                <iframe width="560" height="315" class="lazy"
                    data-src="<?php echo get_sub_field('locations_slide-link') ?>?background=1" webkitallowfullscreen
                    mozallowfullscreen allowfullscreen></iframe>
                <?php endif; ?>
                <h1 class="video-header__title">
                    <?php echo get_sub_field('locations_slide-title') ?>
                </h1>
                <h3 class="video-header__date">
                    <?php echo get_sub_field('locations_slide-date') ?>
                </h3>

                <?php
                            $button = get_sub_field('cta_button', $post->ID);
                            ?>
                <?php if ($button['cta_title']): ?>
                <a href="<?php echo $button['external_link_checkbox'] ? $button['cta_link_external'] : $button['cta_link_internal']; ?>"
                    class="button button--new-primary-dark video-header__cta"
                    <?php if ($button['link_in_new_tab']) echo "target='_blank'" ?>>
                    <?php echo $button['cta_title'] ?>
                </a>
                <?php endif; ?>
            </div>
            <div class="video-overlay"></div>
            <span class="color-overlay--light"></span>

        </div>
        <?php endif; ?>

        <?php endwhile;
        endif; ?>

    </div>


</div>