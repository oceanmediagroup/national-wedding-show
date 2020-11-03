<?php
/**
 * Template name: Page template - Exhibitors List
 */ ?>

<?php get_header(); ?>

<div class="exhibitors-list exhibitors-list-page" id="exhibitorsList">

    <?php get_template_part('components/header-carousel-simple'); ?>

    <?php get_template_part('components/breadcrumbs'); ?>

    <?php get_template_part('content/page-description') ?>

    <?php get_template_part('components/alphabet-filter'); ?>

    <?php get_template_part('components/exhibitors-list'); ?>

    <?php get_template_part('components/info-banner') ?>

    <?php get_template_part('components/inspiration') ?>

</div>
<?php get_footer(); ?>
