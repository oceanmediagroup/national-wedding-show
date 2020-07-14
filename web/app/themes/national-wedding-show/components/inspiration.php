<?php /* <section class="inspiration-section">

    <div class="container">
        <h2 class="inspiration-section__title">Inspiration</h2>


        <div class=" card-deck owl-carousel owl-theme owl-inpiration-cards">
            <div class="item card">
                <?php
                $args = array(
                    'post_type' => 'post',
                    'post_status' => 'publish',
                    'posts_per_page' => 1,
                );
                $the_query = new WP_Query($args);

                if ($the_query->have_posts()) {
                    while ($the_query->have_posts()) {
                        $the_query->the_post(); ?>

                        <a href="<?php echo get_the_permalink() ?>">
                            <div
                                class="image-wrapper lazy"
                                data-bg="url(<?php echo get_the_post_thumbnail_url(); ?>)"
                                >
                            </div>
                            <div class="card-body">
                                <h5 class="card-title"><?php the_title(); ?></h5>
                            </div>
                        </a>
                    <?php }
                }
                wp_reset_postdata(); ?>
            </div>
            <div class="item card">
                <?php
                $args = array(
                    'post_type' => 'tutorials',
                    'post_status' => 'publish',
                    'posts_per_page' => 1,
                );
                $the_query = new WP_Query($args);

                if ($the_query->have_posts()) {
                    while ($the_query->have_posts()) {
                        $the_query->the_post(); ?>
                        <div data-url="/?type=tutorial&id=tutorial-<?php echo get_the_ID() ?>" data-toggle="modal"
                             data-target="#tutorial-<?php echo get_the_ID() ?>">

                            <div class="image-wrapper tutorial">
                                <iframe id="ytplayer" type="text/html" width="640" height="360"
                                        class="lazy"
                                        data-src="<?php echo get_field('tutorial_video_link'); ?>"
                                        frameborder="0" class="card-img-top"
                                        allowfullscreen="allowfullscreen"
                                        mozallowfullscreen="mozallowfullscreen"
                                        msallowfullscreen="msallowfullscreen"
                                        oallowfullscreen="oallowfullscreen"
                                        webkitallowfullscreen="webkitallowfullscreen"></iframe>
                            </div>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title"><?php the_title(); ?></h5>
                        </div>
                    <?php }
                }
                wp_reset_postdata(); ?>
            </div>

            <?php $instagram = getInstagramPosts(); ?>
            <div class="item card">
                <a href="/inspiration/" class="h-100 w-100">
                    <div class="image-wrapper inspire">
                        <?php if ( array_key_exists('thumbnail', $instagram) ) : ?>
                            <img class="card-img-top" src="<?php echo $instagram['thumbnail'] ?>" alt="Card image cap">
                        <?php else : ?>
                            <img class="card-img-top" src="<?php echo $instagram['image'] ?>" alt="Card image cap">
                        <?php endif; ?>
                    </div>
                </a>
            </div>

        </div>

        <?php
        $args = array(
            'post_type' => 'tutorials',
            'post_status' => 'publish',
            'posts_per_page' => 1,
        );
        $the_query = new WP_Query($args);

        if ($the_query->have_posts()) {
            while ($the_query->have_posts()) {
                $the_query->the_post(); ?>
                <div class="modal fade tutorial-modal" id="tutorial-<?php echo get_the_ID() ?>"
                     tabindex="-1"
                     role="dialog"
                     aria-labelledby="tutorial-<?php echo get_the_ID() ?>Label"
                     aria-hidden="true">
                    <div class="modal-dialog tutorial-modal__wrapper" role="document">
                        <div class="modal-content tutorial-modal__content">
                            <div class="modal-header tutorial-modal__header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <iframe id="ytplayer" type="text/html" width="640" height="360"
                                        src="<?php echo get_field('tutorial_video_link'); ?>"
                                        frameborder="0" class="tutorial-modal__video"
                                        allowfullscreen="allowfullscreen"
                                        mozallowfullscreen="mozallowfullscreen"
                                        msallowfullscreen="msallowfullscreen"
                                        oallowfullscreen="oallowfullscreen"
                                        webkitallowfullscreen="webkitallowfullscreen"></iframe>
                                <div class="text-wrapper">
                                    <div class="modal-text">
                                        <p class="modal-title"><?php the_title(); ?></p>
                                        <p><?php echo get_the_content(); ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php }
        }
        wp_reset_postdata(); ?>

        <div class="row justify-content-center mt-4">
            <a href="/inspiration/" class="button--light-coral button--light-solid inspiration-section__link
            mt-4">VIEW
                ALL</a>
        </div>

    </div>
</section>
*?>