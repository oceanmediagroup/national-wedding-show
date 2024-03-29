<?php
/**
 * Created by PhpStorm.
 * User: Dominika
 * Date: 29/06/2018
 * Time: 11:37
 */ ?>

<section class="product-card-big product-card-big--win">
    <?php
    $img = get_field('win_card_homepage')['product_card_image'];
    $title = get_field('win_card_homepage')['product_card_title'];
    $subtitle = get_field('win_card_homepage')['product_card_subtitle'];
    $button = get_field('win_card_homepage')['cta_button'];
    ?>

    <div class="container">
        <div class="product-card-big__wrapper">
            <div class="row h-100">
                <div class="col-12 col-md align-self-center">
                    <div class="product-card-big__content">
                        <h3 class="product-card-big__title t-section-heading">
                            <span class="t-underline-mauvepink--alpha">
                                <?php echo $title; ?>
                            </span>
                        </h3>
                        <?php if ($subtitle): ?>
                        <span class="product-card-big__subtitle t-paragraph d-block">
                            <?php echo $subtitle ?>
                        </span>
                        <?php endif; ?>

                        <a href="<?php echo $button['external_link_checkbox'] ? $button['cta_link_external'] : $button['cta_link_internal']; ?>"
                            class="button button--new-primary-dark "
                            <?php if ($button['link_in_new_tab']) echo "target='_blank'" ?>>
                            <?php echo $button['cta_title'] ?>
                        </a>
                    </div>
                </div>

                <div class="col-12 col-md">
                    <div class="product-card-big__image-wrapper lazy"
                        data-bg="url(<?php echo $img['sizes']['medium_large'] ?>)">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
