<section class="exhibitor-single__wrapper">
    <div class="container">
        <div class="row">
            <div class="col-md-4 text-center">
                <div class="exhibitor-single__image-wrapper">
                    <img src="/assets/img/exhibitor-logo-demo-b.png" alt="Exhibitor logo" class="card-image" />
                </div>
            </div>
            <div class="col-md-8">
                <h2 class="exhibitor-single__title"><?php the_title(); ?></h2>
                <h1>DEFAULT TEMPLATE FOR EXHIBITOR</h1>
                <p>Looking for London bus hire for an upcoming party?<br>Our classic double decker buses are available for exclusive hire. If you’re looking to host a fully catered, quintessentially British affair with a French twist, then there’s only one place that should come to mind – B Bakery vintage bus hire London.</p>
                <h3>Category:</h3>
                <p>Cakes, Caterers/Drinks</p>
                <h3>Website</h3>
                <a href="#">https://b-bakery.com</a>
                <h3>Exhibiting at</h3>
                <p>ExCel London - Stand: V2</p>
                <p>Olympia London - Stand: V13</p>
                <h3>Show offers and competitions</h3>
                <a href="#">Show offer one</a>
                <a href="#">Show offer two</a>
                <a href="#">Show offer three</a>

                <div class="exhibitor-single__social-media">
                    <a href=""><i class="fab fa-twitter"></i></a>
                    <a href=""><i class="fab fa-facebook-f"></i></a>
                    <a href=""><i class="fab fa-pinterest-p"></i></a>
                    <a href=""><i class="fab fa-instagram"></i></a>
                    <a href=""><i class="fab fa-youtube"></i></a>
                </div>

                <div class="exhibitor-single__buttons">
                    <a href="#" class="button--light-coral">DOWNLOAD OUR BROCHURE</a>
                    <a href="/exhibitors-list/" class="button--light-coral">BACK TO EXHIBITORS LIST</a>
                </div>

            </div>
        </div>
    </div>
</section>

<section class="gallery-simple">
    <div class="container">
        <div class="row justify-content-center">

            <?php for( $i = 0; $i < 6; $i++){ ?>

                <div class="col-sm-4 gallery-simple__item">
                    <div class="gallery-simple__wrapper">
                        <div class="gallery-simple__image" style="background-image: url('/assets/img/sample.png')"></div>
                    </div>
                </div>

            <?php } ?>

        </div>
    </div>
</section>