$(document).ready(function () {
    if ($('#featuredPagesGrid').length) {
        const $featuredPagesGrid = $('#featuredPagesGrid');
        let gutterWidth = 16;

        if ($(window).width() >= 992) {
            gutterWidth = 30;
        }
        $featuredPagesGrid.isotope({
            itemSelector: '.grid-item',
            percentPosition: true,
            masonry: {
                // set to the element
                columnWidth: '.grid-sizer',
                gutter: gutterWidth
            }
        });

        // $featuredPagesGrid.layout();

        $('#filters').on('click', 'button', function () {
            const filterValue = $(this).attr('data-filter');
            $featuredPagesGrid.isotope({filter: filterValue});
        });


        $('#filtersSelect').change(function () {
            const filterValue = $(this).val();
            $featuredPagesGrid.isotope({filter: filterValue});
        });


        $('.button-group').each(function (i, buttonGroup) {
            const $buttonGroup = $(buttonGroup);
            $buttonGroup.on('click', 'button', function () {
                $buttonGroup.find('.is-checked').removeClass('is-checked');
                $(this).addClass('is-checked');
            });
        });
    }

    if ($('#whatsOnPage').length) {
        let hash = window.location.hash;
        if (hash) {
            hash = hash.slice(1, hash.length);
            $('html, body').animate({
                scrollTop: ($('#featuredPagesGrid').offset().top - 240)
            }, 500);

            $('#filters button').removeClass('is-checked');
            $('#filters button[data-filter=".' + hash + '"]').toggleClass('is-checked');

            $('#filtersSelect option[value=".' + hash + '"]').prop('selected', true);

            $('#featuredPagesGrid').isotope({filter: "." + hash});
        }
    }


});