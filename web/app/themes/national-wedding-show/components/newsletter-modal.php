<?php
/**
 * Created by PhpStorm.
 * User: Dominika
 * Date: 05/09/2018
 * Time: 14:52
 */ ?>

<div class="modal fade newsletter-modal newsletter-modal--popup" id="newsletter" tabindex="-1" role="dialog" aria-labelledby="newsletterTitle"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">X</span>
                </button>
            </div>
            <div class="modal-body">

                <h5 class="modal-title text-center" id="newsletterTitle">
                    Sign up to our newsletter and be in with a chance of winning a £3,000 shopping spree at the shows! Plus get access to exclusive show news and offers!
                </h5>

                <?php get_template_part('components/dotmailer-form'); ?>

            </div>
        </div>
    </div>
</div>
