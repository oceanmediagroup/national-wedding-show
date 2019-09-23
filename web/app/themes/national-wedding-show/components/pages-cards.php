<?php
/**
 * Created by PhpStorm.
 * User: Dominika
 * Date: 29/06/2018
 * Time: 13:59
 */ ?>

<section class="pages-cards frontpage-cards">
    <div class="container">
        <div class="row">
            <div class="owl-carousel owl-theme owl-pages-cards">
                <?php if (have_rows('pages_cards')):
                    while (have_rows('pages_cards')) : the_row(); ?>

                        <?php

                        $img = get_sub_field('card_image', $post->ID);
                        $category = get_sub_field('card_category');
                        $text = get_sub_field('card_text', $post->ID);
                        $button = get_sub_field('cta_button', $post->ID);

                        ?>

                        <div class="item card">

                            <picture class="card-img-top lazy">
                                <source media="(min-width: 769px)" data-srcset="<?php echo $img['sizes']['medium'] ?>">
                                <img alt="<?php echo $img['alt'] ?>" class="lazy" data-src="<?php echo $img['sizes']['thumbnail'] ?>">
                            </picture>

                            <div class="card-body">
                                <h5 class="card-title text--coral">
                                    <?php echo $category ?>
                                </h5>
                                <p class="card-text">
                                    <?php echo $text ?>
                                </p>

                                <a href="<?php echo $button['external_link_checkbox'] ? $button['cta_link_external'] : $button['cta_link_internal']; ?>"
                                   class="button--light-coral card-button"
                                    <?php if ($button['link_in_new_tab']) echo "target='_blank'" ?>>
                                    <?php echo $button['cta_title'] ?>
                                </a>
                            </div>
                        </div>

                    <?php endwhile;
                endif; ?>

            </div>
        </div>
    </div>
</section>
