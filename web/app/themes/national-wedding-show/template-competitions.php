<?php
/**
 * Template name: Page template - Competitions
 */ ?>

<?php get_header(); ?>
<div class="page-competitions">

    <?php get_template_part('components/header-carousel-simple'); ?>

    <?php get_template_part('components/breadcrumbs') ?>

    <?php get_template_part('content/page-description-simple') ?>

    <?php get_template_part('components/big-main-competition') ?>

    <?php get_template_part('components/competition-cards') ?>

    <?php get_template_part('components/show-offers-banner') ?>

    <?php get_template_part('components/info-banner') ?>

    <?php get_template_part('components/inspiration') ?>

</div>
<?php get_footer(); ?>
