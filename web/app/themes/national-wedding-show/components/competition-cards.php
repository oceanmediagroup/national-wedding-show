<section class="competition-cards">
    <div class="container">
        <div class="row cards-list">
            <?php
            query_posts(array(
                'post_type' => 'competitions',
                'showposts' => -1,
                'orderby'=>'date',
                'order'=>'DESC'
            ) );
            ?>
            <?php while (have_posts()) : the_post(); ?>

            <div class="col-md-4">
                <div class="item card">
                    <div class="card-img-top lazy" data-bg="url(<?php echo get_the_post_thumbnail_url(); ?>)"></div>

                    <div class="card-body">
                        <h5 class="card-title"><?php the_title(); ?></h5>
                    </div>
                    <div class="card-footer">
                        <a href="<?php the_permalink() ?>" class="button--light-coral">ENTER NOW</a>
                    </div>
                </div>
            </div>

            <?php endwhile;
            wp_reset_query();  ?>

        </div>
    </div>
</section>