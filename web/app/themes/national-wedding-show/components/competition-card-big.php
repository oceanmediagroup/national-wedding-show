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
                         style="background-image: url('<?php echo get_field('competition_image')['url'] ?>') ">
                    </div>
                </div>
                <div class="col-12 col-md align-self-center">
                    <div class="competition-card-big__content">
                        <span class="competition-card-big__subtitle">Competition</span>
                        <h3 class="competition-card-big__title"><?php echo get_field('competition_name'); ?></h3>
                        <span class="competition-card-big__text"><?php echo get_field('competition_text'); ?></span>
                        <a href="<?php echo get_field('competition_link')['url']; ?>"
                           class="button--light-coral competition-card-big__link"><?php echo get_field('competition_link')['link_name']; ?></a>
                    </div>
                </div>
            </div>
        </div>

        <?php if ($post->post_type === "locations"): ?>
            <div class="row align-items-center mt-3 d-none d-md-flex">
                <div class="col-auto mx-auto mt-4">
                    <a href="/competitions/" class="button--light-coral button--light-solid mx-auto">VIEW ALL COMPETITIONS</a>
                </div>
            </div>
        <?php endif; ?>
    </div>

</section>
