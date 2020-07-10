
</main>
<!-- /main -->
<?php echo get_template_part('components/newsletter-modal') ?>
<!-- footer -->
<footer class="footer">

    <?php get_template_part('components/network-carousel') ?>

    <div class="container ">
        <div class="row align-items-center" >
            <div class="col-lg-3 col-sm-6">
                <a href="<?php echo get_home_url(); ?>" ><img data-src="/assets/img/nws-logo-black.png" alt="The National Wedding Show Instagram" class="first lazy footer-logo"></a>
            </div>
            <div class="col-lg-3 col-sm-6">
                <a href="<?php echo get_home_url(null, '/contact/', null); ?>" class="footer-link">CONTACT</a>
                <a href="<?php echo get_home_url(null, '/insurance/', null); ?>" class="footer-link">WEDDING INSURANCE</a>
                <a href="<?php echo get_home_url(null, '/cookie-policy/', null); ?>" class="footer-link">COOKIE POLICY</a>
                <a href="<?php echo get_home_url(null, '/privacy/', null); ?>" class="footer-link">PRIVACY</a>
                <a href="https://www.oceanmedia.co.uk/terms-and-conditions" target="blank" class="footer-link">TERMS & CONDITIONS</a>
                <a href="<?php echo get_home_url(null, '/blog/', null); ?>" class="footer-link">BLOG</a>
            </div>
            <div class="col-lg-3 col-sm-6 follow">
                <h6 class="footer-link">FOLLOW US</h6>
                <a href="https://www.instagram.com/thenationalweddingshow/" target="blank" class="header-menu__link--img"><img data-src="/assets/img/1.png" alt="The National Wedding Show Instagram" class="first lazy"></a>
                    <a href="https://www.facebook.com/nationalweddingshow" target="blank" class="header-menu__link--img"> <img data-src="/assets/img/2.png" alt="The National Wedding Show Facebook" class="lazy"></a>
            </div>
            <div class="col-lg-3 col-sm-6">
            <a href="https://exhibitor.nationalweddingshow.co.uk/login" target="blank" class="button--new-primary-dark ex-button">EXHIBITOR LOGIN</a>
            </div>
        </div>
    </div>

    
    <div class="container">
        <div class="row footer__social align-items-center justify-content">
            <div class="col-12">
                <p class="footer__copyright">© The National Wedding Show | Ocean Media Group. All Rights Reserved.</p>
            </div>
            
        </div>
    </div>

</footer>
<!-- /footer -->

<script src="https://player.vimeo.com/api/player.js"></script>

<script src="/assets/script/app.js?<?php echo rand(); ?>"></script>

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
