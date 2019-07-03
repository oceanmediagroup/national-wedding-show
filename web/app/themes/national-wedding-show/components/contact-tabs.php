<section class="contact-tabs">
    <div class="container">
        <div class="row">

            <div class="col-12">
                <h2 class="contact-tabs__title">Contacts</h2>
            </div>

            <div class="col-4 contact-tabs__pills d-none d-md-block">
                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <?php
                    $tabs_counter = 0;
                    if (have_rows('tabs_repeater')):
                        while (have_rows('tabs_repeater')) : the_row(); ?>

                            <a class="nav-link<?php if ($tabs_counter == 0) {
                                echo ' active';
                            } ?>" id="v-pills-<?php echo
                            $tabs_counter; ?>-tab"
                               data-toggle="pill"
                               href="#v-pills-<?php echo $tabs_counter; ?>"
                               role="tab" aria-controls="v-pills-<?php echo $tabs_counter; ?>" aria-selected="true">
                                <?php the_sub_field('tabs_title'); ?>
                            </a>

                            <?php $tabs_counter++;
                        endwhile;
                    endif;
                    ?>
                </div>
            </div>

            <div class="col-8 contact-tabs__content d-none d-md-block">
                <div class="tab-content" id="v-pills-tabContent">
                    <?php
                    $tabs_counter = 0;
                    if (have_rows('tabs_repeater')):
                        while (have_rows('tabs_repeater')) : the_row(); ?>

                            <div class="tab-pane fade<?php if ($tabs_counter == 0) {
                                echo ' show active';
                            } ?>" id="v-pills-<?php echo $tabs_counter; ?>" role="tabpanel"
                                 aria-labelledby="v-pills-<?php echo $tabs_counter; ?>-tab">
                                <?php the_sub_field('tabs_description'); ?>
                            </div>

                            <?php $tabs_counter++;
                        endwhile;
                    endif;
                    ?>
                </div>
            </div>
        </div>


        <div class="d-block d-md-none">

            <div class="accordion" id="accordionExample">
                <?php
                $tabs_counter = 0;
                if (have_rows('tabs_repeater')):
                    while (have_rows('tabs_repeater')) : the_row(); ?>
                        <div class="card">
                            <div class="card-header" id="heading<?php echo $tabs_counter; ?>">
                                <h5 class="mb-0">
                                    <button class="btn btn-link collapsed"
                                            type="button" data-toggle="collapse"
                                            data-target="#collapse<?php echo $tabs_counter; ?>"
                                            aria-expanded="false"
                                            aria-controls="collapse<?php echo $tabs_counter; ?>">
                                        <?php the_sub_field('tabs_title'); ?><span class="accordion__arrow">❯</span>
                                    </button>
                                </h5>
                            </div>

                            <div id="collapse<?php echo $tabs_counter; ?>"
                                 class="collapse"
                                 aria-labelledby="heading<?php echo $tabs_counter; ?>"
                                 data-parent="#accordionExample">
                                <div class="card-body">
                                    <?php the_sub_field('tabs_description'); ?>
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
</section>