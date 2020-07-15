<?php
/**
 * Created by PhpStorm.
 * User: Dominika
 * Date: 23/08/2018
 * Time: 15:41
 */ ?>


<section class="product-card-big info-card-big top-accent top-accent--white">
    <?php
    $img = get_field('extensive_mark_image');
    $title = get_field('extensive_mark_title');
    $content = get_field('extensive_mark_content');
    $button_link = get_field('extensive_mark_cta_link')['url'];
    $button_text = get_field('extensive_mark_cta_text');
    ?>

    <div class="container">
        <div class="product-card-big__wrapper">
            <div class="row h-100">
                <div class="col-12 col-md">
                    <div class="product-card-big__image-wrapper lazy"
                        data-bg="url('<?php echo $img['sizes']['medium_large'] ?>') ">
                    </div>
                </div>
                <div class="col-12 col-md align-self-center">
                    <div class="product-card-big__content">
                        <h3 class="product-card-big__title t-section-heading">
                            <span class="t-underline-secondary--alpha"><?php echo $title; ?></span>
                        </h3>
                        <div class="product-card-big__text">
                            <?php echo $content ?>
                        </div>
                        <a href="<?php echo $button_link ?>" class="button button--new-primary-dark">
                            <?php echo $button_text ?>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>