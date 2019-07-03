<?php
/**
 * Created by PhpStorm.
 * User: Dominika
 * Date: 02/07/2018
 * Time: 16:53
 */ ?>

<section class="page-description page-description--simple">
    <div class="container">
        <div class="row">
            <div class="col">
                <h2 class="page-description__title text-left"><?php echo get_field('page_description_title'); ?></h2>
            </div>
        </div>
        <div class="row">
            <div class="col page-description__text page-description__text--one-column">
                <?php echo get_field('page_description_description'); ?>
            </div>
        </div>
    </div>
</section>
