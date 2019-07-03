<?php get_header(); ?>

<?php get_template_part('components/image-header') ?>

<section class="breadcrumbs">
    <div class="container">
        <div class="row">
            <div class="col">
                <div typeof="BreadcrumbList" vocab="http://schema.org/">
                    <a href="/">Home</a>
                    >
                    <a href="/competitions/">Competitions</a>
                    >
                    <a href="">
                        <span class="post post-page current-item"><?php echo get_the_title() ?></span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="page-description-big">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="page-description-big__title">
                    <?php if (get_field('page_title_h1')):
                        echo get_field('page_title_h1');
                    else:
                        the_title();
                    endif; ?>
                </h1>
            </div>
            <div class="col-md-8">
                <h3 class="page-description-big__excerpt"><?php echo get_the_excerpt(); ?></h3>
            </div>
        </div>
    </div>
</section>

<section class="single-competition-content">
    <div class="container">
        <div class="row">

            <?php if (have_posts()): while (have_posts()) : the_post(); ?>
                <article class="w-100" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <div class="col-12">
                        <div class="row align-items-center single-competition-content__enter">
                            <div class="col-md-10">
                                <h5 class="single-competition-content__data">
                                    <?php echo get_field('cta_text') ?>
                                    <?php the_field('closes_date'); ?></h5>
                            </div>
                            <div class="col-md-2 text-right">
                                <?php $link = get_field('button_competition')['button_link']; ?>
                                <?php if ($link): ?>
                                    <a href="<?php echo $link['url']; ?>"
                                       class="button--light-coral float-right"
                                       target="<?php echo $link['target']; ?>">
                                        <?php echo get_field('button_competition')['button_text'] ?>
                                    </a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 single-competition-content__text">
                        <?php the_content(); ?>
                    </div>
                </article>

            <?php endwhile;
            endif; ?>

        </div>
    </div>
</section>


<?php if (get_the_ID() !== 282): ?>

    <?php if (get_field('form_shortcode')): ?>
        <section class="single-competition-form contact-form" id="contact-form">
            <div class="container">
                <?php if (get_field('title_above_form')): ?>
                    <h4 class="contact-form__title small"><?php echo get_field('title_above_form') ?></h4>
                <?php endif; ?>
                <p class="contact-form__description">Register your details below:</p>

                <div class="row">

                    <?php $form = get_field('form_shortcode'); ?>
                    <?php echo do_shortcode($form); ?>

                </div>

            </div>
        </section>

    <?php endif; ?>
<?php else: ?>

    <section class="single-competition-form contact-form" id="contact-form">
        <div class="container">

            <div class="newsletter-modal">
                <div class="row">
                    <h5 class="modal-title text-center" id="newsletterTitle">
                        Sign up to our newsletter and be in with a chance of winning a £3,000 shopping spree at the
                        shows!
                        Plus get access to exclusive show news and offers! Register your details below:
                    </h5>

                    <?php get_template_part('components/dotmailer-form-old') ?>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>

<section class="back-button pb-4">
    <div class="container text-right mt-4 mb-4">
        <a href="/competitions/" class="button--light-coral">BACK TO COMPETITIONS</a>
    </div>
</section>

<?php get_template_part('components/inspiration') ?>


<?php get_sidebar(); ?>

<?php get_footer(); ?>
