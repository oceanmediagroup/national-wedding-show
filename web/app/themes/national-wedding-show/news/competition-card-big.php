<?php
/**
 * Created by PhpStorm.
 * User: Dominika
 * Date: 29/06/2018
 * Time: 16:02
 */ ?>

<section class="competition-card-big">
    <div class="container">
        <div class="competition-card-big__wrapper">
            <div class="row h-100">
                <div class="col-12 col-md">
                    <div class="competition-card-big__image-wrapper"
                         style="background-image: url('<?php echo get_field('competition_image', 428)['url'] ?>') ">
                    </div>
                </div>
                <div class="col-12 col-md align-self-center">
                    <div class="competition-card-big__content">
                        <span class="competition-card-big__subtitle">Competition</span>
                        <h3 class="competition-card-big__title"><?php echo get_field('competition_name', 428); ?></h3>
                        <span class="competition-card-big__text"><?php echo get_field('competition_text', 428); ?></span>
                        <a href="<?php echo get_field('competition_link', 428)['url']; ?>" class="button--light-coral competition-card-big__link"><?php echo get_field('competition_link', 428)['link_name']; ?></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>