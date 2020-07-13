<?php
/**
 * Created by PhpStorm.
 * User: Dominika
 * Date: 28/06/2018
 * Time: 15:11
 */
?>

<section class="page-hero">
    <?php get_template_part('components/header-carousel-simple') ?>

    <div class="locations">
        <div class="container container-fluid-mobile">
            <div class="row row-wider">


                <?php
                if (have_rows('locations_tabs')):
                    while (have_rows('locations_tabs')) : the_row(); ?>

                <?php
                        $id = get_sub_field('location');
                        $url = get_the_permalink($id);
                        $title = get_the_title($id);
                        ?>


                <div class="col-12 col-md-6 col-lg-4">
                    <a class="locations__card" href="<?php echo $url ?>">
                        <div class="locations____content-wrapper ">

                            <span class="locations__name"><?php echo $title ?></span>
                            <span class="locations__date">

                                <?php if (get_field('show_already_happened', $id)): ?>
                                <?php echo get_field('show_replacement_text', $id) ?>
                                <?php else: ?>
                                <?php echo get_field('show_dates', $id) ?>
                                <?php endif; ?>
                            </span>
                        </div>

                        <span class="locations__arrow">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24.7 44.27">
                                <g>
                                    <g>
                                        <path class="cls-1"
                                            d="M2.56,44.27A2.56,2.56,0,0,1,.75,39.9L18.52,22.14.75,4.37A2.56,2.56,0,0,1,4.37.75L24,20.33A2.56,2.56,0,0,1,24,24L4.37,43.52A2.54,2.54,0,0,1,2.56,44.27Z" />
                                    </g>
                                </g>
                            </svg>
                        </span>
                    </a>
                </div>

                <?php endwhile;
                endif; ?>

                <div class="col-12 col-md-6 col-lg-4">
                    <?php $button = get_field('highlighted_tab')['tab_link_cta_button']; ?>

                    <a class="locations__card locations__card--highlighted"
                        href="<?php echo $button['external_link_checkbox'] ? $button['cta_link_external'] : $button['cta_link_internal']; ?>"
                        <?php if ($button['link_in_new_tab']) echo "target='_blank'" ?>>
                        <div class="locations____content-wrapper ">
                            <span
                                class="locations__name"><?php echo get_field('highlighted_tab')['tab_title']; ?></span>
                            <span class="locations__date">
                                <span class="link">
                                    <?php echo $button['cta_title'] ?></span>
                            </span>
                        </div>
                        <span class="locations__arrow">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24.7 44.27">
                                <g>
                                    <g>
                                        <path class="cls-1"
                                            d="M2.56,44.27A2.56,2.56,0,0,1,.75,39.9L18.52,22.14.75,4.37A2.56,2.56,0,0,1,4.37.75L24,20.33A2.56,2.56,0,0,1,24,24L4.37,43.52A2.54,2.54,0,0,1,2.56,44.27Z" />
                                    </g>
                                </g>
                            </svg>
                        </span>
                    </a>
                </div>


            </div>
        </div>
    </div>

</section>