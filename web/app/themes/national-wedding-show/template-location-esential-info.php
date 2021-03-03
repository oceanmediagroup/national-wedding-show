<?php
/**
 * Template name: Page template - Location - esential info
 * User: Kamil
 * Date: 11/08/2018
 */ ?>

<?php get_header(); ?>

    <div class="page-location-esential">

        <?php get_template_part('components/video-header') ?>

        <?php get_template_part('components/breadcrumbs') ?>

        <?php get_template_part('content/page-description-essential') ?>

        <?php get_template_part('components/g-map') ?>

        <?php get_template_part('components/essential-info-banner') ?>

        <?php get_template_part('components/inspiration') ?>

    </div>

<?php get_footer(); ?>
