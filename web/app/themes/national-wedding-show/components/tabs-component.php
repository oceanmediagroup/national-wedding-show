<?php
/**
 * User: Oleh
 */ ?>

<?php $count_rows = count(get_field('tabs_repeater')); ?>

<section class="tabs-component">
    <div class="container">

        <div class="row d-block d-md-none">
            <div class="col-lg-12">
                <div class="accordion" id="accordionExample">
                    <?php
                    $tabs_counter = 0;
                    if (have_rows('tabs_repeater')):
                        while (have_rows('tabs_repeater')) : the_row(); ?>

                    <?php
                            $name = get_sub_field('tab_name');
                            $title = get_sub_field('title');
                            $text = get_sub_field('content');
                            $image = get_sub_field('image');
                            ?>

                    <div class="card">
                        <div class="card-header" id="heading<?php echo $tabs_counter; ?>">
                            <h5 class="mb-0">
                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse"
                                    data-target="#collapse<?php echo $tabs_counter; ?>" aria-expanded="false"
                                    aria-controls="collapse<?php echo $tabs_counter; ?>">
                                    <?php echo $name; ?> <span class="accordion__arrow">❯</span>
                                </button>
                            </h5>
                        </div>

                        <div id="collapse<?php echo $tabs_counter; ?>" class="collapse"
                            aria-labelledby="heading<?php echo $tabs_counter; ?>" data-target="#accordionExample">
                            <div class="card-body">

                                <div class="title">
                                    <?php echo $title; ?>
                                </div>
                                <div class="content">
                                    <?php echo $text; ?>
                                </div>

                                <div class="row tabs-offer__card-wrapper">
                                    <div class="col-12 tabs-offer__card">
                                        <?php if ($image): ?>
                                        <img class="lazy" data-src="<?php echo $image['url']; ?>"
                                            alt="<?php echo $image['alt']; ?>" />
                                        <?php endif; ?>
                                        <div class="cta-wrapper">
                                            <?php if (have_rows('cta_repeater')): ?>
                                            <?php while (have_rows('cta_repeater')): the_row();
                                                            $text = get_sub_field('cta_text');
                                                            $link = get_sub_field('cta_link'); ?>
                                            <a href="<?php echo $link; ?>">
                                                <?php echo $text; ?>
                                            </a>
                                            <?php endwhile; ?>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php $tabs_counter++;
                        endwhile;
                    endif;
                    ?>
                </div>
            </div>
        </div>


        <div class="row d-none d-md-block">
            <div class="col-lg-12">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <?php if (have_rows('tabs_repeater')): ?>
                    <?php $counter1 = 0; ?>
                    <?php while (have_rows('tabs_repeater')): the_row();
                            $name = get_sub_field('tab_name'); ?>

                    <li class="nav-item" style="width: calc(100% / <?php echo $count_rows; ?>);">
                        <a class="nav-link <?php if ($counter1 == 0) echo 'active'; ?>"
                            id="<?php echo str_replace(' ', '', $name); ?>-tab" data-toggle="tab"
                            href="#tab<?php echo $counter1; ?>" role="tab"
                            aria-controls="<?php echo str_replace(' ', '', $name); ?>" aria-selected="<?php if ($counter1 == 0) {
                                       echo 'true';
                                   } else {
                                       echo 'false';
                                   } ?>">
                            <?php echo $name; ?>
                        </a>
                    </li>
                    <?php $counter1++; ?>
                    <?php endwhile; ?>
                    <?php endif; ?>
                </ul>

                <div class="tab-content" id="myTabContent">
                    <?php if (have_rows('tabs_repeater')): ?>
                    <?php $counter2 = 0; ?>
                    <?php while (have_rows('tabs_repeater')): the_row();
                            $name = get_sub_field('tab_name');
                            $title = get_sub_field('title');
                            $content = get_sub_field('content');
                            $image = get_sub_field('image'); ?>

                    <div class="row tab-pane fade <?php if ($counter2 == 0) echo 'show active'; ?>"
                        id="tab<?php echo $counter2; ?>" role="tabpanel"
                        aria-labelledby="<?php echo str_replace(' ', '', $name); ?>-tab">
                        <div class="col-lg-6">
                            <div class="title t-section-heading">
                                <span class="t-underline-secondary--alpha">
                                    <?php echo $title; ?>

                                </span>
                            </div>
                            <div class="content">
                                <?php echo $content; ?>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <?php if ($image): ?>
                            <img class="lazy" data-src="<?php echo $image['url']; ?>"
                                alt="<?php echo $image['alt']; ?>" />
                            <?php endif; ?>
                            <div class="cta-wrapper">
                                <?php if (have_rows('cta_repeater')): ?>
                                <?php while (have_rows('cta_repeater')): the_row();
                                                $text = get_sub_field('cta_text');
                                                $link = get_sub_field('cta_link'); ?>
                                <a class="button button--new-primary-dark" href="<?php echo $link; ?>">
                                    <?php echo $text; ?>
                                </a>
                                <?php endwhile; ?>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <?php $counter2++; ?>
                    <?php endwhile; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>