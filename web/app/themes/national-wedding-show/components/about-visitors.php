<?php
/**
 * Created by Atom.
 * User: Vinnie
 * Date: 26/11/2020
 * Time: 21:50
 */
    $circleLogo = '';
    $circleImg = '';
    if(get_field('exhibitor_logo_circle')){
        $circleLogo = 'exhibitor__logo-circle';
    }
    if(get_field('image_make_circle')){
        $circleImg = 'about__img-circle';
    }

?>



<div class="container-secondary exibitors-about-visitors top-accent top-accent--secondary">
  <div class="container info-block">
    <div class="row pt-4 pb-4">
      <div class="col-lg-6 d-flex flex-column justify-content-center">
        <h3 class="t-section-heading">
          <span class="t-underline-powder--alpha"><?php the_field('about_visitors_title'); ?></span>
        </h3>
        <?php the_field('about_visitors_content'); ?>
        <a class="button button--new-primary-dark cta-link"
          href="<?php the_field('about_visitors_cta_link'); ?>"><?php the_field('about_visitors_cta_text'); ?></a>
      </div>
      <div class="col-lg-6 col-img">
        <div class="about__image-wrapper <?php echo $circleImg ?>">
            <img class="img-fluid lazy"
              data-src="<?php echo get_field('about_visitors_image')['url'] ?>"
              alt="">
        </div>
      </div>
    </div>
  </div>
</div>
