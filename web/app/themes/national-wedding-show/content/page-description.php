<?php
$button = get_field('cta_button');
?>

<section class="page-description">
    <div class="container">
        <div class="row">
            <div class="col">
                <h2 class="page-description__title"><?php echo get_field('page_description_title'); ?></h2>
            </div>
        </div>
        <div class="row">
            <div class="col page-description__text">
                <?php echo get_field('page_description_description'); ?>
            </div>
        </div>

        <div class="row">
            <?php if ($button['cta_title'] || $button['cta_link_external'] || $button['cta_link_internal']) { ?>
                <a href="<?php echo $button['external_link_checkbox'] ? $button['cta_link_external'] : $button['cta_link_internal']; ?>"
                   class="page-description__button-link button--light-coral"> <?php echo $button['cta_title'] ?></a>
            <?php } ?>
        </div>
    </div>
</section>
