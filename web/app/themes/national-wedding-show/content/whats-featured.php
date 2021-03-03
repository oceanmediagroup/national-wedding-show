<section class="featured-pages sds">
    <div class="container">
        <div class="row whats-featured__title-row justify-content-center">
            <h4 class="whats-featured__title t-section-heading"><span class="t-underline-mossgreen--alpha">What's On</span>
            </h4>
        </div>
        <div class="featured-pages__cards grid justify-content-between" id="featuredPagesGrid">
            <div class="grid-sizer"></div>

            <div class="grid-item featured-pages__card inspiration-and-advice color-overlay-wrapper">
                <?php
                $page = get_field('essential_info_page');
                ?>
                <a href="<?php echo get_the_permalink($page->ID) ?>">
                    <div class="featured-pages__card-img-wrapper lazy"
                        data-bg="url(<?php echo get_the_post_thumbnail_url($page->ID); ?>)">
                        <span class="color-overlay"></span>
                    </div>
                    <h3 class="featured-pages__card-title">
                        <span class="t-underline-lightorange--alpha">
                            Essential Info
                        </span>
                    </h3>
                </a>
                <span class="read-more button t-black button--lightorange">Read More</span>
            </div>

            <div class="grid-item featured-pages__card inspiration-and-advice color-overlay-wrapper">
                <a href="/whats-on/show-offers-competitions/">
                    <div class="featured-pages__card-img-wrapper lazy"
                        data-bg="url('/assets/img/show-offers-and-competitions.jpg')">
                        <span class="color-overlay"></span>
                    </div>
                    <h3 class="featured-pages__card-title">
                        <span class="t-underline-lightorange--alpha">
                            Show Offers And Competitions
                        </span>
                    </h3>
                </a>
                <span class="read-more button t-black button--lightorange">Read More</span>
            </div>

            <?php
            $main_page_name = $post->post_name;
            $args = array(
                'post_type' => 'features',
                'post_status' => 'publish',
                'posts_per_page' => -1,
                'orderby' => 'date',
                'order' => 'DESC'
            );
            $the_query = new WP_Query($args);

            if ($the_query->have_posts()) {
                while ($the_query->have_posts()) {
                    $the_query->the_post(); ?>

            <?php $show_feature = false;
                    $posts2 = get_field('featured_at_shows');
                    if ($posts2): ?>
            <?php foreach ($posts2 as $post1): ?>
            <?php setup_postdata($post1); ?>
            <?php $featured_name = $post1->post_name?>
            <?php if($main_page_name == $featured_name){
                                $show_feature = true;
                            } ?>
            <?php endforeach; ?>
            <?php endif; ?>

            <?php if($show_feature): ?>
            <div class="grid-item featured-pages__card inspiration-and-advice color-overlay-wrapper">
                <a href="<?php echo get_the_permalink() ?>">
                    <div class="featured-pages__card-img-wrapper lazy"
                        data-bg="url(<?php the_post_thumbnail_url('medium'); ?>)">
                        <span class="color-overlay"></span>
                    </div>
                    <h3 class="featured-pages__card-title">
                        <span class="t-underline-lightorange--alpha"><?php the_title(); ?></span>
                    </h3>
                </a>
                <a href="<?php echo get_the_permalink() ?>" class="read-more button t-black button--lightorange">Read
                    More</a>
            </div>
            <?php endif; ?>

            <?php }

            }
            wp_reset_postdata(); ?>

        </div>
    </div>
</section>


<script defer src="https://unpkg.com/isotope-layout@3/dist/isotope.pkgd.min.js"></script>
