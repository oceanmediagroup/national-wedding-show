<?php
/**
 * Created by PhpStorm.
 * User: Dominika
 * Date: 20/08/2018
 * Time: 12:12
 */ ?>
<div id="locationsCollapse" class="container-fluid collapse locations__tab">
    <div class="row locations__tab-row">

        <?php
        if (have_rows('location-cards', 'option')):
            while (have_rows('location-cards', 'option')) : the_row(); ?>

                <?php
                $id = get_sub_field('show');
                $url = get_the_permalink($id);
                $title = get_the_title($id);
                ?>

                <div class="col-lg-4 locations__single-wrapper color-overlay-wrapper"
                     style="background-image: url('<?php echo get_sub_field('image'); ?>')">
                    <div class="locations__single-link">
                        <div class="row align-items-center w-100 h-100">
                            <div class="col align-self-center">
                                <a href="<?php echo $url ?>">
                                    <span class="locations__single-title">
                                        <?php echo $title ?>
                                    </span>
                                    <span class="locations__single-date">
                                        <?php if (get_field('show_already_happened', $id)): ?>
                                            <?php echo get_field('show_replacement_text', $id) ?>
                                        <?php else: ?>
                                            <?php echo get_field('show_dates', $id) ?>
                                        <?php endif; ?>
                                    </span>
                                </a>
                                <a href="<?php echo get_sub_field('link')['url']; ?>"
                                   class="button--bg-coral button--bg-coral-bold locations__single-buy">BUY TICKETS</a>
                            </div>
                        </div>
                        <span class="color-overlay"></span>
                    </div>
                </div>
            <?php endwhile;
        else :
            // no rows found
        endif;
        ?>
        <div class="col-lg-4 locations__single-wrapper locations__single-wrapper--highlighted color-overlay-wrapper">
            <?php $button = get_field('highlighted_card2', 'option')['link_cta_button']; ?>

            <a href="<?php echo $button['external_link_checkbox'] ? $button['cta_link_external'] : $button['cta_link_internal']; ?>"
               class="locations__single-link"
                <?php if ($button['link_in_new_tab']) echo "target='_blank'" ?>>
                <div class="row align-items-center w-100 h-100">
                    <div class="col align-self-center">
                        <span class="locations__single-title">
                            <?php echo get_field('highlighted_card2', 'option')['title'] ?>
                        </span>
                        <span class="locations__single-date">
                            <?php echo $button['cta_title'] ?>
                        </span>
                    </div>
                </div>
            </a>
        </div>
    </div>
</div>
