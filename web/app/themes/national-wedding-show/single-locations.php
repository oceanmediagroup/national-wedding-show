<?php
/**
 * Template name: Page template - Locations
 * User: Kamil
 * Date: 11/08/2018
 */ ?>

<?php get_header(); ?>

<?php get_template_part('components/video-header'); ?>

<div class="container-gold">

    <section class="breadcrumbs top-accent top-accent--white">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div typeof="BreadcrumbList" vocab="http://schema.org/">
                        <a href="/">Home</a>
                        >
                        <a href="">
                            <span class="post post-page current-item"><?php echo get_the_title() ?></span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>


      <?php  get_template_part('components/product-cards') ?>


</div>

<?php get_template_part('content/whats-featured') ?>

<?php get_template_part('components/competition-card-big') ?>

<?php get_template_part('components/info-banner') ?>

<?php get_template_part('components/instagram-feed') ?>

<?php get_footer(); ?>
