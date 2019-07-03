<section class="contact-form">
    <div class="container">
        <h4 class="contact-form__title"><?php the_field('contact_form_title'); ?></h4>
        <p class="contact-form__description"><?php echo strip_tags( get_field('contact_form_description') ); ?></p>

        <div class="row">
            <?php echo do_shortcode('[contact-form-7 id="298" title="Contact Us"]'); ?>
        </div>
        <p class="contact-form__info">Fields marked with an * are mandatory.</p>
    </div>
</section>