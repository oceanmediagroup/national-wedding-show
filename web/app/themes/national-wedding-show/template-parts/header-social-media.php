<?php
/**
 * Created by PhpStorm.
 * User: Kamil
 * Date: 27/06/2018
 * Time: 14:19
 */
?>
<div class="row social-media header-social-media d-flex align-items-center justify-content-between">
    <a href="<?php the_field('instagram_link', 'option'); ?>" class="social-media__icon header-social-media__icon"
       target="_blank"><i class="fab fa-instagram"></i></a>
    <a href="<?php the_field('twiter_link', 'option'); ?>" class="social-media__icon header-social-media__icon"
       target="_blank"><i class="fab fa-twitter"></i></a>
    <a href="<?php the_field('facebook_link', 'option'); ?>" class="social-media__icon header-social-media__icon"
       target="_blank"><i class="fab fa-facebook-f"></i></a>
    <a href="<?php the_field('youtube_link', 'option'); ?>" class="social-media__icon header-social-media__icon"
       target="_blank"><i class="fab fa-youtube"></i></a>
    <a href="<?php the_field('pinterest_link', 'option'); ?>" class="social-media__icon header-social-media__icon"
       target="_blank"><i class="fab fa-pinterest-p"></i></a>
    <button class="button button--light-coral button--newsletter" data-toggle="modal" data-target="#newsletter">
        Newsletter sign up
    </button>
</div>