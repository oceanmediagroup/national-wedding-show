<?php
/**
 * Template name: Page template - Gallery
 * User: Oleh
 */ ?>

<?php get_header(); ?>
    <div class="page-exhibit">

        <?php get_template_part('components/header-carousel-simple') ?>

        <?php get_template_part('components/breadcrumbs') ?>

		<section class="gallery">
			<div class="container">
				<div class="row justify-content-center">
				    <div class="col-md-12">
				    	<h2 class="title text-center mb-5"><?php the_field('gallery_title'); ?></h2>
				        <div class="row justify-content-center">
				        	<?php if( have_rows('gallery_repeater') ): ?>
		                        <?php while( have_rows('gallery_repeater') ): the_row();
		                            $image = get_sub_field('single_image'); ?>

		                        	<a href="<?php echo $image['sizes']['gallery']; ?>" data-toggle="lightbox" data-gallery="example-gallery" class="col-6 col-sm-4" data-title="<?php the_field('gallery_title'); ?>">
						                <img src="<?php echo $image['sizes']['gallery']; ?>" class="img-fluid">
						            </a>

		                        <?php endwhile; ?>
		                    <?php endif; ?>
				        </div>
				    </div>
				</div>
			</div>
		</section>

    </div>
<?php get_footer(); ?>