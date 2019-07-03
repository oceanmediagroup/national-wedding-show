<div id="map" class="map__container"></div>


<script async defer
        src="https://maps.googleapis.com/maps/api/js?key=<?php the_field('maps_api_key', 'option'); ?>&callback=initMap">
</script>

<script>

    // This example displays a marker at the center of Australia.
    // When the user clicks the marker, an info window opens.

    function initMap() {

        var uluru = {lat: <?php the_field('map-lat'); ?>, lng: <?php the_field('map-lng'); ?>};
        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: <?php the_field('map-zoom'); ?>,
            center: uluru
        });

        var contentString = '<div class="map__address">' +
            '<span class="map__address-line"><?php the_field('text-line-1'); ?></span>' +
            '<span class="map__address-line"><?php the_field('text-line-2'); ?></span>' +
            '<span class="map__address-line"><?php the_field('text-line-3'); ?></span>' +
            '<span class="map__address-line"><?php the_field('text-line-4'); ?></span>' +
            '</div>';

        var infowindow = new google.maps.InfoWindow({
            content: contentString,
            position: uluru,
        });

        var marker = new google.maps.Marker({
            position: uluru,
            map: map,
            title: 'Uluru (Ayers Rock)'
        });

        infowindow.open(map, marker);


    }
</script>