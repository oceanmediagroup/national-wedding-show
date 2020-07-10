<?php
/**
 * Created by PhpStorm.
 * User: Dominika
 * Date: 29/06/2018
 * Time: 13:59
 */ ?>

<section class="pages-cards frontpage-cards top-accent top-accent--secondary">
    <img data-src="/assets/img/section-accents/confetti.png" class="lazy confetti-accent" alt="" />
    <div class="container">
        <div class="row">
            <div class="owl-carousel owl-theme owl-pages-cards">

                <?php if (have_rows('pages_cards')):
                    $color = 0;  
                    
                    while (have_rows('pages_cards')) : the_row(); ?>

                <?php
         
                        $colors = array('blush', 'powder', 'coral');

                        $img = get_sub_field('card_image', $post->ID);
                        $title = get_sub_field('card_title', $post->ID);
                        $button = get_sub_field('cta_button', $post->ID);

                        ?>

                <div class="item card-item card-item--<?php echo $colors[$color] ?>">

                    <picture class="card-img-top lazy">
                        <source media="(min-width: 769px)" data-srcset="<?php echo $img['sizes']['medium'] ?>">
                        <img alt="<?php echo $img['alt'] ?>" class="lazy"
                            data-src="<?php echo $img['sizes']['medium'] ?>">
                    </picture>

                    <div class="card-body">
                        <h5 class="card-title">
                            <span class="t-underline">
                                <?php echo $title ?>
                            </span>
                        </h5>
                        <a href="<?php echo $button['external_link_checkbox'] ? $button['cta_link_external'] : $button['cta_link_internal']; ?>"
                            class="button card-button t-black button--<?php echo $colors[$color]?>"
                            <?php if ($button['link_in_new_tab']) echo "target='_blank'" ?>>
                            <?php echo $button['cta_title'] ?>
                        </a>
                    </div>
                </div>
                <?php $color++?>
                <?php endwhile;
                endif; ?>

            </div>
        </div>
    </div>
</section>