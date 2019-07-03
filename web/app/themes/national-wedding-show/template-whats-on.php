<?php
/**
 * Template name: Page template - What's On
 * Created by PhpStorm.
 * User: Dominika
 * Date: 02/07/2018
 * Time: 16:15
 */ ?>

<?php get_header(); ?>
<div class="page-whats-on" id="whatsOnPage">

    <?php get_template_part('components/header-carousel-simple'); ?>

    <?php get_template_part('components/breadcrumbs') ?>

    <?php get_template_part('content/page-description') ?>

    <?php get_template_part('content/featured-pages') ?>

    <?php get_template_part('components/competition-card-big') ?>

    <?php get_template_part('components/info-banner') ?>

    <?php get_template_part('components/inspiration') ?>

</div>
<?php get_footer(); ?>
