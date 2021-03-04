<?php
/**
 * User: Oleh
 */ ?>

<section class="exhibitors-video lazy"
	data-bg="url('<?php $bg_img = get_field('block_background_image'); echo $bg_img['url']; ?>')">
	<div class="container">
		<div class="row">
			<div class="col-12 col-lg-10 video-col m-auto">
				<h3 class="t-section-heading"><span
						class="t-underline-mossgreen--alpha"><?php the_field('title'); ?></span></h3>
				<div class="embed-responsive embed-responsive-21by9">
					<iframe class="embed-responsive-item lazy" data-src="<?php the_field('video_link'); ?>?rel=0"
						allowfullscreen></iframe>
				</div>
				<a class="button button--new-primary-dark"
					href="<?php the_field('cta_link'); ?>"><?php the_field('cta_text'); ?></a>
			</div>
		</div>
	</div>
</section>