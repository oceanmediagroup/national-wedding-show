<?php
/**
 * User: Oleh
 */ ?>

<?php $count_rows_offer = count(get_field('tabs_repeater-offers')); ?>

<section class="tabs-offer">
    <div class="container">
        <div class="row d-none d-md-block">
            <div class="col-lg-12">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <?php if( have_rows('tabs_repeater-offers') ): ?>
                        <?php $counter_offer1; ?>
                        <?php while( have_rows('tabs_repeater-offers') ): the_row();
                            $name_offer = get_sub_field('tab_name'); ?>

                            <li class="nav-item" style="width: calc(100% / <?php echo $count_rows_offer; ?>);">
                                <a class="nav-link <?php if ($counter_offer1 == 0) echo 'active'; ?>"
                                    id="<?php echo str_replace(' ', '', $name_offer); ?>-tab"
                                    data-toggle="tab"
                                    href="#tab<?php echo $counter_offer1; ?>"
                                    role="tab"
                                    aria-controls="<?php echo str_replace(' ', '', $name_offer); ?>"
                                    aria-selected="<?php if ($counter_offer1 == 0) { echo 'true'; } else { echo 'false'; } ?>">
                                        <?php echo $name_offer; ?>
                                </a>
                            </li>
                            <?php $counter_offer1++; ?>
                        <?php endwhile; ?>
                    <?php endif; ?>
                </ul>

                <div class="tab-content" id="myTabContent">
                    <?php if( have_rows('tabs_repeater-offers') ): ?>
                        <?php $counter_offer2; ?>
                        <?php while( have_rows('tabs_repeater-offers') ): the_row();
                            $name = get_sub_field('tab_name');
                            $title = get_sub_field('title');
                            $text = get_sub_field('text');
                            $text2 = get_sub_field('text_down');
                            $cards = get_sub_field('offer_cards'); ?>

                            <div class="row tab-pane fade <?php if ($counter_offer2 == 0) echo 'show active'; ?>"
                                id="tab<?php echo $counter_offer2; ?>"
                                role="tabpanel"
                                aria-labelledby="<?php echo str_replace(' ', '', $name); ?>-tab">
                                <div class="col-12">
                                    <div class="title">
                                        <?php echo $title; ?>
                                    </div>
                                    <div class="content">
                                        <?php echo $text; ?>
                                    </div>
                                </div>
                                <div class="row tabs-offer__card-wrapper">
                                <?php
                                    // check if the repeater field has rows of data
                                    if( have_rows('offer_cards') ):
                                        // loop through the rows of data
                                        while ( have_rows('offer_cards') ) : the_row();
                                        ?>
                                            <div class="col-xs-12 col-md-4 tabs-offer__card">
                                                <div class="tabs-offer__card-img-wrapper" style="background-image: url('<?php the_sub_field('image'); ?>')">
                                                    <img src="<?php the_sub_field('logo'); ?>" class="tabs-offer__card-logo" alt="exhibitor logo">
                                                </div>
                                                <div class="d-flex tabs-offer__card-content">
                                                    <span class="tabs-offer__card-title">
                                                        <?php the_sub_field('description'); ?>
                                                    </span>
                                                    <a href="<?php the_sub_field('exhibitor_link'); ?>" class="button--light-coral tabs-offer__card-btn">VIEW PROFILE</a>
                                                </div>
                                            </div>
                                        <?php endwhile;
                                    else :
                                        // no rows found
                                    endif;
                                    ?>
                                </div>
                                <div class="row show-offers mt-4 w-100">
                                    <div class="col show-offers__text-wrapper">
                                        <?php echo $text2; ?>
                                    </div>
                                </div>
                            </div>
                            <?php $counter_offer2++; ?>
                        <?php endwhile; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <div class="row d-block d-md-none">

            <div class="col-lg-12">

                <div class="accordion" id="accordionExample">
                    <?php
                    $tabs_counter = 0;
                    if (have_rows('tabs_repeater-offers')):
                        while (have_rows('tabs_repeater-offers')) : the_row(); ?>

                            <?php
                            $name_offer = get_sub_field('tab_name');
                            $title = get_sub_field('title');
                            $text = get_sub_field('text');
                            $text2 = get_sub_field('text_down');
                            $cards = get_sub_field('offer_cards');
                            ?>

                            <div class="card">
                                <div class="card-header" id="heading<?php echo $tabs_counter; ?>">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link collapsed"
                                                type="button" data-toggle="collapse"
                                                data-target="#collapse<?php echo $tabs_counter; ?>"
                                                aria-expanded="<?php echo $expanded ?>"
                                                aria-controls="collapse<?php echo $tabs_counter; ?>">
                                            <?php echo $name_offer; ?> <span class="accordion__arrow">❯</span>
                                        </button>
                                    </h5>
                                </div>

                                <div id="collapse<?php echo $tabs_counter; ?>"
                                     class="collapse"
                                     aria-labelledby="heading<?php echo $tabs_counter; ?>"
                                     data-parent="#accordionExample">
                                    <div class="card-body">

                                        <div class="title">
                                            <?php echo $title; ?>
                                        </div>
                                        <div class="content">
                                            <?php echo $text; ?>
                                        </div>

                                        <div class="row tabs-offer__card-wrapper">
                                            <?php
                                            // check if the repeater field has rows of data
                                            if( have_rows('offer_cards') ):
                                                // loop through the rows of data
                                                while ( have_rows('offer_cards') ) : the_row();
                                                    ?>
                                                    <div class="col-12 tabs-offer__card">
                                                        <div class="tabs-offer__card-img-wrapper" style="background-image: url('<?php the_sub_field('image'); ?>')">
                                                            <img src="<?php the_sub_field('logo'); ?>" class="tabs-offer__card-logo" alt="exhibitor logo">
                                                        </div>
                                                        <div class="d-flex tabs-offer__card-content">
                                                    <span class="tabs-offer__card-title">
                                                        <?php the_sub_field('description'); ?>
                                                    </span>
                                                            <a href="<?php the_sub_field('exhibitor_link'); ?>" class="button--light-coral tabs-offer__card-btn">VIEW PROFILE</a>
                                                        </div>
                                                    </div>
                                                <?php endwhile;
                                            else :
                                                // no rows found
                                            endif;
                                            ?>
                                        </div>

                                        <div class="row show-offers mt-4 w-100">
                                            <div class="col show-offers__text-wrapper">
                                                <?php echo $text2; ?>
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
    </div>
</section>

