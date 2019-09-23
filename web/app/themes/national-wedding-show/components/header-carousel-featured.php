<?php
/**
 * Created by PhpStorm.
 * User: Dominika
 * Date: 30/07/2018
 * Time: 13:31
 */ ?>
<div class="header-carousel-simple">
    <div class="owl-carousel owl-theme owl-header-simple">
        <?php
        if (have_rows('slides')):
            while (have_rows('slides')) : the_row(); ?>

                <?php if (get_sub_field('slide_type') == 'image'): ?>
                    <div class="image item lazy"
                         data-bg="url('<?php echo get_sub_field('background_image')['url'] ?>')"></div>
                <?php endif; ?>

                <?php if (get_sub_field('slide_type') == 'video'): ?>
                    <div class="video item custom-video video-container color-overlay-wrapper lazy"
                         data-bg="url('<?php echo get_sub_field('background_image')['url'] ?>')">
                        <div class="video-wrapper">
                            <?php if (!wp_is_mobile()): ?>
                                <iframe
                                        class="lazy"
                                        width="560" height="315"
                                        data-src="<?php echo get_sub_field('video_link') ?>?background=1"
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

    <h1 class="header-carousel-simple__title">
        <?php echo get_the_title() ?>
    </h1>

    <?php if (!is_front_page()) : ?>
        <?php
            $button = get_field('cta_button', $post->ID);
        ?>
        <?php if ($button['cta_title']): ?>
            <a href="<?php echo $button['external_link_checkbox'] ? $button['cta_link_external'] : $button['cta_link_internal']; ?>"
                class="button--bg-coral button--bg-coral-bold video-header__cta"
                <?php if ($button['link_in_new_tab']) echo "target='_blank'" ?>>
                <?php echo $button['cta_title'] ?>
            </a>
        <?php endif; ?>
    <?php endif; ?>

    <?php $posts = get_field('featured_at_shows');
    if ($posts): ?>
        <div class="featured-at">
            <ul>
                <span>Featured at: </span>
                <?php foreach ($posts as $post): // variable must be called $post (IMPORTANT) ?>
                    <?php setup_postdata($post); ?>
                    <li>
                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a> <span>❯</span>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
        <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
    <?php endif; ?>
</div>
