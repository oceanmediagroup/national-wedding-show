<?php
/**
* A Simple Category Template
*/

get_header();
// default: sort by most recent
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
<section class="blog">
	<div class="container">
		<div class="row">
			<?php
			$year = get_query_var('year');
			$monthnum = get_query_var('monthnum');

			$args = array(
				'year' => $year,
				'monthnum' => $monthnum,
				'meta_key' => $meta_key,
				'orderby' => $orderby,
				'order' => $order
			);
			$query = new WP_Query($args);
			if ( $query->have_posts() ) : ?>

			<div class="col-lg-8 mt-5">
				<h2 class="title"><?php the_archive_title(); ?></h2>
			</div>

			<div class="col-lg-8 news-content">
				<div class="row">
					<?php
					    while ( $query->have_posts() ) : $query->the_post(); ?>

						<div class="grid-item news post post-card col-lg-6 mb-4">
			                <div class="post-card__wrapper">
			                    <div class="post-card__img-wrapper" style="background-image: url('<?php echo get_the_post_thumbnail_url(get_the_ID(),'gallery'); ?>')">
			                        <span class="post-card__category"><?php $category_name = get_the_category(); echo $category_name[0]->name; ?></span>
			                    </div>
			                    <div class="post-card__body">
			                        <h5 class="post-card__title"><?php the_title(); ?></h5>
			                    </div>
			                    <div class="post-card__footer d-flex justify-content-between">
			                        <span class="post-card__date"><?php $post_date = get_the_date( 'd M Y' ); echo $post_date; ?></span>
			                        <a href="<?php the_permalink(); ?>" class="post-card__link">read more</a>
			                    </div>
			                </div>
			            </div>

					    <?php endwhile;
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