<?php get_header(); ?>

<?php get_template_part('components/image-header') ?>

<section class="breadcrumbs">
    <div class="container">
        <div class="row">
            <div class="col">
                <div typeof="BreadcrumbList" vocab="http://schema.org/">
                    <a href="/">Home</a>
                    >
                    <a href="/inspiration/">Inspiration</a>
                    >
                    <a href="/blog/">Latest News</a>
                    >
                    <a href="">
                        <span class="post post-page current-item"><?php echo get_the_title() ?></span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
<?php if (have_posts()): while (have_posts()) : the_post(); ?>

<?php setPostViews(get_the_ID()); ?>

<section class="single-post-content">
    <div class="container">
        <div class="row mt-5 mb-5">

            <div class="col-lg-8 news-content">
                <span class="post-card__category mt-2 d-inline-block d-md-none"><?php $category_name = get_the_category();
                    echo $category_name[0]->name; ?></span>
                <h1 class="title"><?php the_title(); ?></h1>
                <span class="post-date mt-2"><?php $post_date = get_the_date('F d, Y');
                    echo $post_date; ?></span>
                <span class="post-card__category mt-2 d-none d-md-inline-block"><?php $category_name = get_the_category();
                    echo $category_name[0]->name; ?></span>

                <div class="wrapper mb-5 single-post__content">
                    <?php the_content(); ?>
                </div>

                <div class="social">
                    <span>SHARE THIS PAGE</span>
                    <div class="social-media">
                        <div class="social-share__icons">
                            <a href="http://twitter.com/share?url=<?php echo get_permalink() ?>"
                               class="social-media__icon mr-1">
                                <i class="fab fa-twitter"></i>
                            </a>

                            <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo get_permalink() ?>"
                               class="social-media__icon mr-1">
                                <i class="fab fa-facebook-f"></i>
                            </a>

                            <a href="https://pinterest.com/pin/create/button/?url=<?php echo get_permalink() ?>&media=<?php echo  get_the_post_thumbnail_url()?>"
                               class="social-media__icon mr-1">
                                <i class="fab fa-pinterest-p"></i>
                            </a>

                            <a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo get_permalink() ?>"
                               class="social-media__icon mr-1">
                                <i class="fab fa-linkedin"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <a href="/inspiration" class="cta-link d-inline-block mt-3">BACK TO BROWSE</a>
            </div>

            <?php get_template_part('components/filter-section') ?>
        </div>
    </div>

        <?php get_template_part('news/competition-card-big') ?>
</section>

<?php endwhile;
endif; ?>

<?php get_template_part('news/info-banner') ?>

<?php get_template_part('components/inspiration') ?>

<?php get_sidebar(); ?>

<?php get_footer(); ?>


