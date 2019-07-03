<?php
/**
 * Created by PhpStorm.
 * User: Dominika
 * Date: 29/06/2018
 * Time: 16:02
 */ ?>

<section class="competition h-100">
    <div class="row h-100">
        <div class="col">
            <div class="competition__img-wrapper">
                <img src="<?php echo get_field('competition_image')['url'] ?>"
                     alt="<?php echo get_field('competition_image')['alt'] ?>" class="competition__img"/>
            </div>

            <div class="competition__content">
                <div class="competition__category">
                    <span>
                        <?php echo get_field('competition_name'); ?>
                    </span>
                </div>
                <div class="w-100"></div>
                <div class="competition__text">
                    <p>
                        <?php echo get_field('competition_text'); ?>
                    </p>

                    <a href="<?php echo get_field('competition_link')['url']; ?>" class="competition__link text--coral">
                        <?php echo get_field('competition_link')['link_name']; ?>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>