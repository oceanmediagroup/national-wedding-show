<?php get_header(); ?>

<section class="page-404">

    <div class="container-fluid container-gold">
        <!-- article -->
        <article id="post-404">
            <div class="container">
                <div class="row mb-lg-4 align-items-end content-wrapper">
                    <div class="col-12 col-md-5">
                        <h1>404</h1>
                    </div>
                    <div class="col-12 col-lg-auto">
                        <p class="text-header">We couldn’t find<br> this page.</p>
                    </div>
                    <img src="/assets/img/bouquet.jpg" alt="Wedding bouquet">
                </div>
                <div class="row">
                    <span class="text-description">
                        Maybe it’s out there, somewhere…
                        <br> You can always find out what’s on at The National Wedding Show in the mean time by visiting our <a
                                href="/whats-on/">what’s on</a> page.
                    </span>
                </div>
                <div class="row">
                    <a href="<?php echo home_url(); ?>" class="button--light-coral">BACK TO HOME</a>
                </div>
            </div>
        </article>
        <!-- /article -->
    </div>
</section>


<?php get_template_part('components/inspiration') ?>

<?php get_footer(); ?>
