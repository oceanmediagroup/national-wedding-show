<?php
/**
 * Created by PhpStorm.
 * User: Dominika
 * Date: 29/06/2018
 * Time: 15:38
 */ ?>
<?php
$exhibit_page_id = '33';
?>

<section class="info-banner" style="background-color: <?php echo get_field('ribbon_color', $exhibit_page_id); ?>">
  <img data-src="/assets/img/section-accents/confetti.png" class="lazy confetti-accent" alt="" />
    <div class="container">
        <div class="row justify-content-between align-items-center">
            <div class="col-12 col-md col-xl">
                <h3 class="info-banner__text">
                    <?php echo get_field('cta_main_text', $exhibit_page_id); ?>
                </h3>
            </div>
            <div class="col-12 col-md-3 col-xl-2">
                <?php
                $button = get_field('cta_button', $exhibit_page_id); ?>
                <a href="<?php echo $button['external_link_checkbox'] ? $button['cta_link_external'] : $button['cta_link_internal']; ?>"
                    class="info-banner__button button--circle"
                    <?php if ($button['link_in_new_tab']) echo "target='_blank'" ?>>
                    <?php echo $button['cta_title'] ?>
                </a>
            </div>
        </div>
    </div>
</section>
