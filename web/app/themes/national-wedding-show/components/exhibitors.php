<section class="container exhibitors" id="singleLocationExhibitors">

    <?php
    $location_id = get_the_ID();

    $locations = [
        164 => 1, // London Olympia
        165 => 4, // Birmingham NEC
        166 => 3, // Manchester Central,
        167 => 2, // London Excel
        901 => 5, // Newcastle
    ];
    ?>


    <div class="row exhibitors__title-row">
        <span class="exhibitors__title">Exhibitors</span>
    </div>
    <div class="row exhibitors__cards-row" id="locationExhibitorsList" location-id="<?php echo $location_id; ?>">

    </div>

    <div class="owl-carousel owl-theme owl-exhibitors" id="locationExhibitorsListMobile"
         location-id="<?php echo $location_id; ?>">

    </div>
    <div class="row justify-content-center exhibitors__button-row">
        <div class="col text-center">
            <a href="/exhibitor-list/?shows=<?php echo $locations[$location_id] ?>"
               class="button--light-coral exhibitors__view-all">VIEW ALL EXHIBITORS
                AT <?php echo get_the_title() ?></a>
        </div>
    </div>
</section>