<section class="image-header">
    <div class="container-fluid">
        <div class="row image-header__wrapper" style="background-image: url('<?php echo get_the_post_thumbnail_url(); ?>');">
            <?php
                $button = get_field('cta_button');
            ?>
            <?php if (get_field('cta_main_text')) : ?>
                <h1 class="video-header__title">
                    <?php the_field('cta_main_text'); ?>
                </h1>
            <?php endif; ?>
            <?php if ($button['cta_title']): ?>
                <a href="<?php echo $button['external_link_checkbox'] ? $button['cta_link_external'] : $button['cta_link_internal']; ?>"
                    class="button--bg-coral button--bg-coral-bold video-header__cta"
                    <?php if ($button['link_in_new_tab']) echo "target='_blank'" ?>>
                    <?php echo $button['cta_title'] ?>
                </a>
            <?php endif; ?>
        </div>
    </div>
</section>
