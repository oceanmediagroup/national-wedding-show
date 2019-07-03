<?php
/**
 * Created by PhpStorm.
 * User: Dominika
 * Date: 29/06/2018
 * Time: 09:33
 */ ?>

<?php
$title = get_field('brands_section_title');

if (have_rows('official_partners_carousel') || $title || have_rows('other_partners_carousel')): ?>
<section class="brands-partners">
    <div class="container">
        <div class="row">
            <div class="col">
                <h2 class="page-description__title"><?php echo $title ?></h2>
            </div>
        </div>
    </div>

    <div class="brands-partners-carousel images-carousel">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12">
                    <div class="images-carousel">
                        <div class="owl-carousel owl-theme owl-official-partners">
                            <?php
                            if (have_rows('official_partners_carousel')):
                                while (have_rows('official_partners_carousel')) : the_row(); ?>

                                    <div class="item brand">
                                        <a href="<?php echo get_sub_field('partner_link') ?>" target="_blank">
                                            <p class="brand__name"><?php echo get_sub_field('partner_title') ?></p>
                                            <img src="<?php echo get_sub_field('partner_logo')['url']; ?>"
                                                 alt="wedding-brand"
                                                 class="image">
                                        </a>
                                    </div>

                                <?php endwhile;
                            endif; ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="other-partners-carousel images-carousel">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12">
                    <div class="images-carousel">
                        <div class="owl-carousel owl-theme owl-other-partners">
                            <?php
                            if (have_rows('other_partners_carousel')):
                                while (have_rows('other_partners_carousel')) : the_row(); ?>
                                    <a href="<?php echo get_sub_field('partner_link') ?>" target="_blank">
                                        <div class="item">
                                            <img src="<?php echo get_sub_field('partner_logo')['url']; ?>"
                                                 alt="wedding-brand"
                                                 class="image">

                                        </div>
                                    </a>

                                <?php endwhile;
                            endif; ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>