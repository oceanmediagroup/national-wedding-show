<?php
/**
 * A Simple Category Template
 */

get_header(); ?>

<?php
    $category_id = get_queried_object_id();
    $meta_key = '';
    $orderby = '';
    $order = '';
    $sort_by = $_GET['sort_by'];
    if ($sort_by === 'views') {
        $meta_key = 'post_views_count';
        $orderby = 'meta_value_num';
        $order = 'DESC';
    }
?>

    <section class="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div typeof="BreadcrumbList" vocab="http://schema.org/">
                        <a href="/">Home</a>
                        >
                        <a href="/inspiration/">Inspiration</a>
                        >
                        <a href="">
                            <span class="post post-page current-item"><?php echo get_the_title() ?></span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="blog">
        <div class="container">
            <div class="row">
                <?php
                if (have_posts()) : ?>

                    <div class="col-lg-8 mt-5">
                        <h1 class="title"><?php single_cat_title(); ?></h1>
                    </div>

                    <div class="col-lg-8 news-content">
                        <div class="row">
                            <?php
                            $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                            $loop = new WP_Query(
                                array(
                                    'post_type' => 'post',
                                    'cat' => $category_id,
                                    'posts_per_page' => 12,
                                    'paged' => $paged,
                                    'meta_key' => $meta_key,
                                    'orderby' => $orderby,
                                    'order' => $order
                                )
                            );
                            if ($loop->have_posts()):
                                while ($loop->have_posts()) : $loop->the_post(); ?>

                                    <div class="grid-item news post post-card col-lg-6 mb-4">
                                        <a href="<?php the_permalink(); ?>">
                                            <div class="post-card__wrapper">
                                                <div class="post-card__img-wrapper"
                                                     style="background-image: url('<?php echo get_the_post_thumbnail_url(get_the_ID(), 'gallery'); ?>')">
                                                    <span class="post-card__category"><?php $category_name = get_the_category();
                                                        echo $category_name[0]->name; ?></span>
                                                </div>
                                                <div class="post-card__body">
                                                    <h5 class="post-card__title"><?php the_title(); ?></h5>
                                                </div>
                                                <div class="post-card__footer d-flex justify-content-between">
                                                    <span class="post-card__date"><?php $post_date = get_the_date('d M Y');
                                                        echo $post_date; ?></span>
                                                    <span class="post-card__link">read
                                                        more</span>
                                                </div>
                                            </div>
                                        </a>
                                    </div>

                                <?php endwhile; ?>
                                <nav class="pagination col-lg-12 mt-1 mb-1">
                                    <?php pagination_bar($loop); ?>
                                </nav>
                                <?php wp_reset_postdata();
                            endif;
                            ?>
                        </div>
                    </div>

                    <?php get_template_part('components/filter-section') ?>

                <?php endif; ?>
            </div>
        </div>
    </section>


<?php get_sidebar(); ?>
<?php get_footer(); ?>