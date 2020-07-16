<?php
/**
 * Created by PhpStorm.
 * User: Dominika
 * Date: 02/07/2018
 * Time: 15:09
 */ 
    $circle = '';
    if(get_field('exhibitor_logo_circle')){
        $circle = 'exhibitor__logo-circle';
    }

?>




<section class="exhibitor-of-the-week top-accent top-accent--secondary">
    <img data-src="/assets/img/section-accents/dots-accent.png" class="lazy dots-accent" alt="" />
    <img data-src="/assets/img/section-accents/confetti.png" class="lazy confetti-accent" alt="" />
    <div class="container">
        <div class="exhibitor__wrapper">
            <div class="row h-100">
                <div class="col-12 col-md">
                    <div class="exhibitor__image-wrapper">
                        <div class="exhibitor__logo-wrapper">

                            <img src="<?php echo get_field('exhibitor_logo')['url'] ?>"
                                alt="<?php echo get_field('exhibitor_logo')['alt'] ?>"
                                class="exhibitor__logo <?php echo $circle ?>">
                        </div>

                        <img data-src="<?php echo get_field('exhibitor_image')['url'] ?>"
                            alt="<?php echo get_field('exhibitor_image')['alt'] ?>" class="exhibitor__image lazy">




                        <span class="exhibitor__circle-button button--circle-alt">
                            <span>
                                In the <br><span class="t-stroked t-stroked--black">Spotlight</span>
                            </span>
                        </span>
                    </div>
                </div>
                <div class="col-12 col-md">
                    <div class="exhibitor__content">
                        <h3 class="exhibitor__title t-section-heading">
                            <span class="t-underline-coral--alpha"><?php echo get_field('exhibitor_title') ?></span>
                        </h3>
                        <span class="exhibitor__text t-paragraph d-block">
                            <?php echo get_field('exhibitor_text') ?>
                        </span>
                        <?php
                        $button = get_field('exhibitor_cta_button_cta_button'); ?>
                        <a href="<?php echo $button['external_link_checkbox'] ? $button['cta_link_external'] : $button['cta_link_internal']; ?>"
                            class="button button--new-primary-dark exhibitor__link"
                            <?php if ($button['link_in_new_tab']) echo "target='_blank'" ?>>
                            <?php echo $button['cta_title'] ?>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>