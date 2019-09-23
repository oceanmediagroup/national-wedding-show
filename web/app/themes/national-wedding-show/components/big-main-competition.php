<section class="big-main-competition">
    <div class="container-fluid">
        <div class="row big-main-competition__wrapper lazy" data-bg="url('<?php echo get_field('competition_image')['url'] ?>');">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 offset-md-2">
                        <div class="competition">
                            <div class="competition-card-big__content">
                                <span class="competition-card-big__subtitle">Competition</span>
                                <h3 class="competition-card-big__title"><?php echo get_field('competition_name'); ?></h3>
                                <span class="competition-card-big__text"><?php echo get_field('competition_text'); ?></span>
                                <a href="<?php echo get_field('competition_link')['url']; ?>" class="button--light-coral competition-card-big__link"><?php echo get_field('competition_link')['link_name']; ?></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>