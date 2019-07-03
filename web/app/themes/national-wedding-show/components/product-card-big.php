<?php
/**
 * Created by PhpStorm.
 * User: Dominika
 * Date: 29/06/2018
 * Time: 11:37
 */ ?>

<section class="product-card-big">
    <?php
    $img = get_field('product_card')['product_card_image'];
    $title = get_field('product_card')['product_card_title'];
    $subtitle = get_field('product_card')['product_card_subtitle'];
    $button = get_field('product_card_homepage')['cta_button'];
    ?>

    <div class="container">
        <div class="product-card-big__wrapper">
            <div class="row h-100">
                <div class="col-12 col-md">
                    <div class="product-card-big__image-wrapper" style="background-image: url('<?php echo $img['url'] ?>') ">
                    </div>
                </div>
                <div class="col-12 col-md align-self-center">
                    <div class="product-card-big__content">
                        <h3 class="product-card-big__title">
                            <?php echo $title; ?>
                        </h3>
                        <?php if ($subtitle): ?>
                            <span class="text--coral product-card-big__subtitle d-block">
                               <?php echo $subtitle ?>
                            </span>
                        <?php endif; ?>

                        <a href="<?php echo $button['external_link_checkbox'] ? $button['cta_link_external'] : $button['cta_link_internal']; ?>"
                           class="button--light-coral"
                            <?php if ($button['link_in_new_tab']) echo "target='_blank'" ?>>
                            <?php echo $button['cta_title'] ?>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>