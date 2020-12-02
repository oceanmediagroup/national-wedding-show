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

   <?php get_template_part('components/about-visitors') ?>

	<?php get_template_part('components/exhibitor-of-the-week-no-logo') ?>

	<section class="upcoming-shows lazy"
		data-bg="url('<?php $bg_image = get_field('us_background_image'); echo $bg_image['url']; ?>')">
		<div class="container">
			<div class="row">
				<div class="col-lg-6"></div>
				<div class="col-lg-6 content-block">
					<h2 class="t-section-heading text-center">
						<span class="t-underline-powder--alpha"><?php the_field('us_title'); ?></span>
					</h2>
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
					<a class="cta-link button button--new-primary-dark"
						href="<?php the_field('us_cta_link'); ?>"><?php the_field('us_cta_text'); ?></a>
				</div>
			</div>
		</div>
	</section>
</div>
<?php get_footer(); ?>
