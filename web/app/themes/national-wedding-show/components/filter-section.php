<?php
$sort_by = '';
if ($_GET['sort_by'] == 'views') {
    $sort_by = $_GET['sort_by'];
}
?>

<div class="col-lg-4 filter-section">
    <?php if (!is_single()) : ?>
        <div class="blog-sort select-block">
            <p>Sort by <span class="select-wrapper">
                    <select name="sort_by" onchange="window.location.href=this.value">
                        <?php if($sort_by == 'views') : ?>
                            <option value="?sort_by=views">Most Viewed</option>
                            <option value="?sort_by=recent">Most Recent</option>
                        <?php else : ?>
                            <option value="?sort_by=recent">Most Recent</option>
                            <option value="?sort_by=views">Most Viewed</option>
                        <?php endif; ?>
                    </select>
                </span>
            </p>
        </div>
    <?php endif; ?>

    <div class="select-block select-archives">
        <a href="" class="toogle-button mb-3">Category</a>
        <ul>
            <?php
            $cat_args = array(
                'orderby' => 'name',
                'order' => 'ASC'
            );

            $categories = get_categories($cat_args);
            foreach ($categories as $category) {
                $args = array(
                    'category__in' => array($category->term_id),
                    'caller_get_posts' => 1
                );
                $cat_boolean = '';
                $cat_name = single_term_title('', false);
                if ($cat_name == $category->name) $cat_boolean = 'active-category';
                $posts = get_posts($args);
                if ($posts) {
                    echo '<li>
			        		<a class="'. $cat_boolean .'" href="/news/category/' . $category->slug . '" title="' . sprintf(__("View all posts in %s"), $category->name) . '" ' . '><input type="checkbox">' . $category->name . '</a>
			        	  </li>';
                }
            }
            ?>
        </ul>
    </div>
    <?php $arch_args = array(
        'type' => 'monthly',
        'limit' => '',
        'format' => 'html',
        'before' => '',
        'after' => '',
        'show_post_count' => false,
        'echo' => 1,
        'order' => 'DESC',
        'post_type' => 'post'
    ); ?>
    <div class="select-block select-archives">
        <a href="" class="toogle-button mb-3">Archive</a>
        <ul>
            <?php wp_get_archives($arch_args); ?>
        </ul>
    </div>

    <?php if (is_single()) : ?>
        <?php
        $next_post = get_next_post(false, (string)get_the_ID());
        $next_post_id = $next_post->ID;
        ?>
        <div class="grid-item news post post-card col-lg-12 p-0 mb-3">
            <a href="<?php echo esc_url(get_permalink($next_post_id)); ?>">
                <div class="post-card__wrapper">
                    <div class="highlight">UP NEXT</div>
                    <div class="post-card__img-wrapper"
                         style="background-image: url('<?php echo get_the_post_thumbnail_url($next_post_id, 'gallery'); ?>')">
                    <span class="post-card__category"><?php $category_name = get_the_category($next_post_id);
                        echo $category_name[0]->name; ?></span>
                    </div>
                    <div class="post-card__body">
                        <h5 class="post-card__title"><?php echo get_the_title($next_post_id); ?></h5>
                    </div>
                    <div class="post-card__footer d-flex justify-content-between">
                    <span class="post-card__date"><?php $post_date = get_the_date('d M Y', $next_post_id);
                        echo $post_date; ?></span>
                        <span class="post-card__link">read more</span>
                    </div>
                </div>
            </a>
        </div>
    <?php endif; ?>
</div>