<section class="image-header">
    <div class="container-fluid">
        <div class="row image-header__wrapper" style="background-image: url('<?php echo get_the_post_thumbnail_url(); ?>');">
            <?php
                $button = get_field('hero_cta_comp_btn');
            ?>
            <?php if ($button['cta_title']): ?>
                <a href="<?php echo $button['external_link_checkbox'] ? $button['link_external'] : $button['link_internal']; ?>"
                    class="button--bg-coral button--bg-coral-bold video-header__cta"
                    <?php if ($button['open_in_new_tab']) echo "target='_blank'" ?>>
                    <?php echo $button['cta_title'] ?>
                </a>
            <?php endif; ?>
        </div>
    </div>
</section>
