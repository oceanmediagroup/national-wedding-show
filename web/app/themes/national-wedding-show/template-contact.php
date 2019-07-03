<?php

/* Template Name: Page Template - Contact */

get_header(); ?>

    <section class="contact">

        <?php get_template_part('components/header-carousel-simple'); ?>

        <?php get_template_part('components/breadcrumbs') ?>

        <?php get_template_part('content/page-description-big'); ?>

        <?php get_template_part('components/contact-form') ?>

        <?php get_template_part('components/contact-tabs') ?>

        <?php get_template_part('components/inspiration') ?>

    </section>



<?php get_footer(); ?>
