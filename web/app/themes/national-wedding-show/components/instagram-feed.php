<?php 
    $is_home = (is_front_page() ? ' top-accent top-accent--white' : '');
?>

<section class="instagram<?php echo $is_home?>">

    <div class="container">
        <a href="https://www.instagram.com/explore/tags/nationalweddingshow/"
            class="instagram__circle-button button--circle-alt"><span class="t-stroked t-stroked--black">#NWS
            </span></a>
        <div class="row">
            <div class="col instagram__header-col text-center">
                <h2 class="instagram__title t-section-heading "><span class="t-underline-coral--alpha">Follow us</span>
                </h2>
                <a href="https://www.instagram.com/thenationalweddingshow/?hl=en"
                    class="instagram__profile-link t-black">@nationalweddingshow</a>
            </div>


        </div>

        <div class="row instagram__feed-row">
            <div class="col-md-4 mb-5"><img class="w-100" src="https://via.placeholder.com/300" alt=""></div>
            <div class="col-md-4 mb-5"><img class="w-100" src="https://via.placeholder.com/300" alt=""></div>
            <div class="col-md-4 mb-5"><img class="w-100" src="https://via.placeholder.com/300" alt=""></div>

        </div>
    </div>
</section>