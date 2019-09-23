<?php
/**
 * Template name: Page template - Exhibit
 * User: Oleh
 */ ?>

<?php get_header(); ?>
    <div class="page-exhibit">

        <?php get_template_part('components/header-carousel-simple') ?>

        <?php get_template_part('components/breadcrumbs') ?>

		<?php get_template_part('components/tabs-component'); ?>

		<?php get_template_part('components/additional-carousel'); ?>

		<?php get_template_part('components/exhibitors-video'); ?>

		<div class="container-dotted-bg testimonials-carousel-container">
			<div class="container">
	            <div class="row">
	                <div class="col-12">
	                    <?php get_template_part('components/testimonials-carousel-exhibit') ?>
	                </div>
	            </div>
	        </div>
		</div>

		<div class="container-gray">
			<div class="container info-block">
				<div class="row pt-4 pb-4">
					<div class="col-lg-6 d-flex flex-column justify-content-center">
						<h3 class="title"><?php the_field('about_visitors_title'); ?></h3>
						<?php the_field('about_visitors_content'); ?>
						<a class="cta-link" href="<?php the_field('about_visitors_cta_link'); ?>"><?php the_field('about_visitors_cta_text'); ?></a>
					</div>
					<div class="col-lg-6 col-img">
						<img class="img-fluid lazy" data-src="<?php $image = get_field('about_visitors_image'); echo $image['sizes']['medium_large']; ?>" alt="">
					</div>
				</div>
			</div>
		</div>

		<?php get_template_part('components/info-card-big'); ?>

		<section class="upcoming-shows lazy" data-bg="url('<?php $bg_image = get_field('us_background_image'); echo $bg_image['url']; ?>')">
			<div class="container">
				<div class="row">
					<div class="col-lg-6"></div>
					<div class="col-lg-6 content-block">
						<h2 class="title text-center"><?php the_field('us_title'); ?></h2>
						<div class="row">
							<?php if( have_rows('us_dates_repeater') ): ?>
		                        <?php while( have_rows('us_dates_repeater') ): the_row();
		                            $subtitle = get_sub_field('us_subtitle');
		                            $content = get_sub_field('us_content'); ?>

		                        	<div class="col-lg-6">
		                        		<h4><?php echo $subtitle; ?></h4>
		                        		<?php echo $content; ?>
		                        	</div>

		                        <?php endwhile; ?>
		                    <?php endif; ?>
						</div>
						<a class="cta-link" href="<?php the_field('us_cta_link'); ?>"><?php the_field('us_cta_text'); ?></a>
					</div>
				</div>
			</div>
		</section>

		<section class="gallery">
			<div class="container">
				<div class="row justify-content-center">
				    <div class="col-md-12">
				    	<h2 class="title text-center mb-5"><?php the_field('gallery_title'); ?></h2>
				        <div class="row justify-content-center">
				        	<?php if( have_rows('gallery_repeater') ): ?>
		                        <?php while( have_rows('gallery_repeater') ): the_row();
		                            $image = get_sub_field('single_image'); ?>

                                    <div class="col-6 col-lg-4">
										<a
											href="<?php echo $image['url']; ?>"
											data-toggle="exhibit-lightbox"
                                           	data-gallery="exhibit-gallery"
                                           	data-title="<?php if (get_sub_field('single_image_title')) { the_sub_field('single_image_title'); } else { echo ' '; } ?>"
											>
                                            <div class="image-wrapper">
                                                <div class="image-gallery-inside lazy" data-bg="url(<?php echo $image['sizes']['medium_large']; ?>)"></div>
                                            </div>
                                        </a>
                                    </div>

		                        <?php endwhile; ?>
		                    <?php endif; ?>
				        </div>
				    </div>
				</div>
			</div>
		</section>

		<?php get_template_part('components/inspiration') ?>

    </div>
<?php get_footer(); ?>