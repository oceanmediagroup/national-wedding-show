export default class MediaFeed {
    constructor() {
        this.retrievedBlogs = 0;
        this.retrievedTexts = 0;
        this.retrievedTutorials = 0;
        this.retrievedTwitters = 0;
        this.retrievedInstagrams = 0;
    }

    increaseItemsRetrieved(type) {
        switch (type) {
            case "getPosts":
                this.retrievedBlogs++;
                break;
            case "getTextPosts":
                this.retrievedTexts++;
                break;
            case "getTutorials":
                this.retrievedTutorials++;
                break;
            case "getTwitterPosts":
                this.retrievedTwitters++;
                break;
            case "getInstagramPosts":
                this.retrievedInstagrams++;
                break;
        }
    }

    getItemsRetrieved(type) {
        switch (type) {
            case "getPosts":
                return this.retrievedBlogs;
            case "getTextPosts":
                return this.retrievedTexts;
            case "getTutorials":
                return this.retrievedTutorials;
            case "getTwitterPosts":
                return this.retrievedTwitters;
            case "getInstagramPosts":
                return this.retrievedInstagrams;
        }

        return this.timesRetrieved;
    }

    initializeIsotope($mediaFeedGrid) {
        if ($mediaFeedGrid.length) { // if 'length' is non zero. Enter block...
            $mediaFeedGrid.isotope({
                itemSelector: '.grid-item',
                percentPosition: true,
                masonry: {
                    // set to the element
                    columnWidth: '.grid-sizer'
                }
            });

            $('#filters').on('click', 'button', function () {
                const filterValue = $(this).attr('data-filter');
                $mediaFeedGrid.isotope({filter: filterValue});
            });

            $('.button-group').each(function (i, buttonGroup) {
                const $buttonGroup = $(buttonGroup);
                $buttonGroup.on('click', 'button', function () {
                    $buttonGroup.find('.is-checked').removeClass('is-checked');
                    $(this).addClass('is-checked');
                });
            });

            $('#filtersMobile').change(function () {
                const option = $(this).find('option:selected');
                const type = option.attr('type');

                if (type === 'link') {
                    window.location.href = option.attr('page');
                    return;
                }

                const filterValue = $(this).val();
                $mediaFeedGrid.isotope({filter: filterValue});
            });
        }
    }

    addGridItems(layout, $mediaFeedGrid) {
        $mediaFeedGrid.append(layout)
            .isotope('appended', layout);
        $mediaFeedGrid.imagesLoaded().progress(function () {
            $mediaFeedGrid.isotope('layout');
        });

        $mediaFeedGrid.isotope('layout');
    }
}