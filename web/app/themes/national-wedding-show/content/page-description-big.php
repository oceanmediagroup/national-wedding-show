<section class="page-description-big">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <?php if (get_post_type() !== "competitions"): ?>
                    <h2 class="page-description-big__title">
                      <span class="t-underline-powder--alpha"><?php echo get_field('page_description_title'); ?></span></h2>
                <?php else: ?>
                    <h1 class="page-description-big__title">
                      <span class="t-underline-powder--alpha"><?php echo get_field('page_description_title'); ?></span></h1>
                <?php endif; ?>
            </div>
            <div class="col-md-12">
                <h3 class="page-description-big__excerpt">
                    <?php echo get_field('page_description_description'); ?>
                </h3>
            </div>
        </div>
    </div>
</section>
