<?php
/**
 * Template name: Page template - Feature
 * Created by PhpStorm.
 * User: Dominika
 * Date: 02/07/2018
 * Time: 16:15
 */ ?>

<?php get_header(); ?>
<div class="page-whats-on page-single-features">

    <?php get_template_part('components/header-carousel-featured'); ?>

    <section class="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div typeof="BreadcrumbList" vocab="http://schema.org/">
                        <a href="/">Home</a>
                        >
                        <a href="/whats-on/">What's On</a>
                        >
                        <a href="">
                            <span class="post post-page current-item"><?php echo get_the_title() ?></span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php get_template_part('content/page-description-feature') ?>

    <?php if(have_rows('calendar') || have_rows('gallery_repeater')){ ?>
    <div class="container-gray">

        <?php if (have_rows('calendar')): ?>
            <?php get_template_part('content/shows-calendar') ?>
        <?php endif; ?>

        <?php
        $title = get_field('brands_section_title');

        if (have_rows('gallery_repeater')): ?>
            <section class="gallery">
                <div class="container">
                    <?php echo do_shortcode('[ajax_load_more css_classes="row" preloaded="true" preloaded_amount="6" posts_per_page="6" pause="false" pause_override="true" scroll="false" button_label="SHOW ALL" button_loading_label="Loading..." acf="true" acf_field_type="repeater" acf_field_name="gallery_repeater" container_type="div" css_classes="alm-acf-team-example" transition="fade"]') ?>
                </div>
            </section>
        <?php endif; ?>
    </div>
    <?php } ?>

    <?php get_template_part('components/brands-partners') ?>


    <?php get_template_part('components/info-banner') ?>


    <div class="container-fluid container-gold locations">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h2 class="page-description__title">See what else is on at</h2>
                </div>
            </div>

            <div class="row align-items-between">
                <?php $posts = get_field('featured_at_shows');
                if ($posts): ?>
                    <?php foreach ($posts as $post): // variable must be called $post (IMPORTANT) ?>
                        <?php setup_postdata($post); ?>
                        <div class="col-12 col-md-4">
                            <a class="location-card location-card--simple" href="<?php echo get_the_permalink() ?>">
                                <div class="location-card__wrapper">
                                    <span class="location-card__name"><?php echo get_the_title() ?></span>
                                    <span class="location-card__date">

                                        <?php if (get_field('show_already_happened', $id)): ?>
                                            <?php echo get_field('show_replacement_text', $id) ?>
                                        <?php else: ?>
                                            <?php echo get_field('show_dates', $id) ?>
                                        <?php endif; ?>

                                        <span class="location-card__arrow">&#x276f;</span>
                                    </span>
                                </div>
                            </a>
                        </div>
                    <?php endforeach; ?>
                    <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>

                    <div class="col-12 col-md-4">
                        <a class="location-card location-card--highlighted" href="/exhibitor-list/">
                            <div class="location-card__wrapper">
                                <span class="location-card__name">View all our exhibitors</span>
                                <span class="location-card__date">
                                    <u>View all</u><span class="location-card__arrow">&#x276f;</span>
                                </span>
                            </div>
                        </a>
                    </div>

                <?php endif; ?>
            </div>
        </div>

        <img src="/assets/img/patterns/shows-dots-bottom.png" alt=""
             class="container-gold__confetti container-gold__confetti--top">
        <img src="/assets/img/patterns/shows-dots-top.png" alt=""
             class="container-gold__confetti container-gold__confetti--bottom">
    </div>

    <?php get_template_part('components/inspiration') ?>

</div>
<?php get_footer(); ?>
