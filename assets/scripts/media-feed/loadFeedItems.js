import getData from './feedData';
import createLayout from './createLayout';
import createTutorialModal from './createTutorialModal';
import MediaFeed from './MediaFeed';

const loadFeedItems = async (mediaFeed, $mediaFeedGrid) => {
    toggleLoadingGif();
    const data = await getData(mediaFeed);

    // Check if any data was returned
    if (data === null) {
        $("#loadMoreMedia").hide();
        return;
    }

    const layout = await createLayout(data);

    // $("#mediaFeedCards").append(layout);
    mediaFeed.addGridItems(layout[0], $mediaFeedGrid);

    $(".tutorial-modal").on("hidden.bs.modal", function () {
        stopVideo(this);
        // console.log("hiding modal");
        clearUrl();
    });

    $(".twitter-modal").on("hidden.bs.modal", function () {
        stopVideo(this);
    });

    $(".instagram-modal").on("hidden.bs.modal", function () {
        stopVideo(this);
    });

    $(".tutorial-modal").on("shown.bs.modal", function () {
        const data = $(this).attr('data-url-link');
        writeUrl(data);
    });

    toggleLoadingGif();
};

const toggleLoadingGif = () => {
    $('.loading-gif').toggleClass('show');
};

function stopVideo(element) {
    console.log("pausing videos");
    let iframe = element.querySelector('iframe');
    let video = element.querySelector('video');
    if (iframe !== null) {
        let iframeSrc = iframe.src;
        iframe.src = iframeSrc;
    }

    if (video !== null) {
        video.pause();
    }
}

const writeUrl = (newSearch) => {
    if (history.pushState) {

        const newurl = window.location.protocol + "//" + window.location.host + window.location.pathname + newSearch;
        window.history.pushState({path: newurl}, '', newurl);
    }
};

const clearUrl = () => {
    if (history.pushState) {
        const newurl = window.location.protocol + "//" + window.location.host + window.location.pathname;
        window.history.pushState({path: newurl}, '', newurl);
    }
};


const main = async () => {
    const mediaFeed = new MediaFeed();

    const $mediaFeedGrid = $("#inspirationCards");

    mediaFeed.initializeIsotope($mediaFeedGrid);

    await loadFeedItems(mediaFeed, $mediaFeedGrid);

    const $loadMoreButton = $("#loadMoreMedia");

    $loadMoreButton.on('click', function () {
        loadFeedItems(mediaFeed, $mediaFeedGrid);
    });

};

$(document).ready(function () {
    if ($('#inspirationCards').length) {
        main();
    }
});

$(window).on('load', async function () {
    if ($('#inspirationCards').length) {
        createTutorialModal();
    }
});
