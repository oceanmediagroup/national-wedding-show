<?php
/**
 * User: Oleh
 */ ?>

<section class="exhibitors-video" style="background-image: url('<?php $bg_img = get_field('block_background_image'); echo $bg_img['url']; ?>'); ">
	<div class="container">
		<div class="row">
			<div class="col-12 col-lg-10 video-col m-auto">
				<h3><?php the_field('title'); ?></h3>
				<div class="embed-responsive embed-responsive-21by9">
				  <iframe class="embed-responsive-item" src="<?php the_field('video_link'); ?>?rel=0" allowfullscreen></iframe>
				</div>
				<a href="<?php the_field('cta_link'); ?>"><?php the_field('cta_text'); ?></a>
			</div>
		</div>
	</div>
</section>