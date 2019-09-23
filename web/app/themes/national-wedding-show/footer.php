
</main>
<!-- /main -->
<?php echo get_template_part('components/newsletter-modal') ?>
<!-- footer -->
<footer class="footer">

    <?php get_template_part('components/network-carousel') ?>

    <div class="container footer__links">
        <div class="row align-items-center justify-content-between">
            <div class="col footer__link-container">
                <?php
                wp_nav_menu($menuParameters = array(
                    'theme_location' => 'footer-menu',
                    'container' => false,
                    'echo' => false,
                    'items_wrap' => '%3$s',
                    'depth' => 0,
                )
                );
                echo strip_tags(wp_nav_menu($menuParameters), '<a>');
                ?>
            </div>

            <div class="col-xs-12 col-lg-2 exhibitor-login-wrapper">
                <?php $link = get_field('footer_exhibitor_login_button', 'option'); ?>
                <?php
                $target = '';
                if ($link['target']) {
                    $target = "target='" . $link['target'] . "'";
                } ?>
                <?php if ($link['url']): ?>
                    <a href="<?php echo $link['url']; ?>"
                        <?php echo $target ?>
                       class="button button--black button--login">Exhibitor login</a>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row footer__social align-items-center justify-content-between">
            <div class="col-12 col-md-8 footer__logo-div">
                <a href="/"><img data-src="/assets/img/NWS_logo-01.svg" alt="The National Wedding Show Logo" class="footer__logo lazy"></a>
                <span class="footer__copyright">© The National Wedding Show | Ocean Media Group. All Rights Reserved.</span>
            </div>
            <div class="col-12 col-md-auto">
                <span class="footer__social-text">Follow us</span>
                <div class="footer__social-links">
                    <?php get_template_part('template-parts/social-media-icons') ?>
                </div>
            </div>
        </div>
    </div>

</footer>
<!-- /footer -->

<script src="https://player.vimeo.com/api/player.js"></script>

<script src="/assets/script/app.js"></script>

<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="https://oceanmediaemail.co.uk/inc/cal.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.min.js.map"></script>
<script>
    $(document).on("click", '[data-toggle="lightbox"]', function (event) {
        event.preventDefault();
        $(this).ekkoLightbox({
            alwaysShowClose: true,
            rightArrow: '<img src="https://nationalweddingshow.co.uk/assets/img/rarr.png">',
            leftArrow: '<img src="https://nationalweddingshow.co.uk/assets/img/larr.png">',
            onShow: function() {
                $('body').addClass('exhibit-lightbox-opened');
                $('.ekko-lightbox').find('.close').find('span').html('<img src="https://nationalweddingshow.co.uk/assets/img/close.png" />');
            },
        });
    });
</script>

<script type="text/javascript">
    function onloadCallback () {
        jQuery('.g-recaptcha').each(function (index, el) {
            grecaptcha.render(el, {
                'sitekey': '6LfTGX0UAAAAAP7lO9Y8_BqGB86_-9XFXzbAkxmK',
                'callback': jQuery(el).attr('data-callback'),
                'expired-callback': jQuery(el).attr('data-expired-callback'),
                'error-callback': jQuery(el).attr('data-error-callback')
            })
        })
    }
</script>

<script type="text/javascript" defer>
    WebFontConfig = {
        google: {families: ['Source+Sans+Pro:400']}
    };

    document.addEventListener("DOMContentLoaded", function () {
        var wf = document.createElement('script');
        wf.src = 'https://ajax.googleapis.com/ajax/libs/webfont/1/webfont.js';
        wf.type = 'text/javascript';
        wf.async = 'true';
        var s = document.getElementsByTagName('script')[0];
        s.parentNode.insertBefore(wf, s);

    });

</script>

<?php wp_footer(); ?>

</body>
</html>
