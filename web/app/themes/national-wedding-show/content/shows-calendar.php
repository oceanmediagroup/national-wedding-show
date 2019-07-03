<?php
/**
 * Created by PhpStorm.
 * User: Dominika
 * Date: 17/08/2018
 * Time: 22:31
 */
?>

<section class="shows-calendar">
    <div class="container d-block d-md-none">
        <div class="row">
            <div class="col">
                <div class="owl-carousel owl-theme owl-shows-calendar">
                    <?php if (have_rows('calendar')):
                        while (have_rows('calendar')) : the_row(); ?>

                            <?php
                            $name = get_sub_field('show_name');
                            $dates = get_sub_field('show_dates');
                            $hours = get_sub_field('hours');
                            ?>

                            <div class="item">
                                <h5 class="show__name">
                                    <?php echo $name ?>
                                </h5>
                                <p class="show__dates">
                                    <?php echo $dates ?>
                                </p>
                                <hr>
                                <div class="show__hours">
                                    <?php echo $hours ?>
                                </div>
                            </div>

                        <?php endwhile;
                    endif; ?>

                </div>
            </div>
        </div>
    </div>


    <div class="container d-none d-md-block">
        <div class="row no-gutters">
            <?php if (have_rows('calendar')):
                while (have_rows('calendar')) : the_row(); ?>

                    <?php
                    $name = get_sub_field('show_name');
                    $dates = get_sub_field('show_dates');
                    $hours = get_sub_field('hours');
                    ?>
                    <div class="col">
                        <div class="item">
                            <h5 class="show__name">
                                <?php echo $name ?>
                            </h5>
                            <p class="show__dates">
                                <?php echo $dates ?>
                            </p>
                            <hr>
                            <div class="show__hours">
                                <?php echo $hours ?>
                            </div>
                        </div>
                    </div>

                <?php endwhile;
            endif; ?>
        </div>
    </div>
</section>
