<?php   $image = get_sub_field('single_image'); ?>
<div class="col-6 col-lg-4">
    <a href="<?php echo $image['url']; ?>" data-toggle="lightbox"
                                       data-gallery="example-gallery"
                                       data-title="<?php the_field('gallery_title'); ?>">
                <div class="image-wrapper">
                <div class="image-gallery-inside" style="background-image: url(<?php echo $image['url']; ?>);"></div>
        </div>
        </a>
</div>
