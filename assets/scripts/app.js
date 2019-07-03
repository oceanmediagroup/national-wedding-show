window.$ = window.jQuery = require('jquery');
$.support.cors = true;
import 'babel-polyfill';

let Popper = require('../../node_modules/popper.js/dist/umd/popper.js');
require('../../node_modules/bootstrap/dist/js/bootstrap.js');

require('./menu');
require('./carousels');
require('./featured-pages');
require('./video-resize');

if ($('.inspiration-cards').length) {
    require('../../node_modules/imagesloaded/imagesloaded.pkgd');
    require('./media-feed/loadFeedItems');
}

$(document).ready(function () {
    $('.toogle-button').on('click', function (e) {
        e.preventDefault();
        $(this).toggleClass('open');
        $(this).parent().find('ul').fadeToggle();
    });

    if ($('#exhibitorsList').length) {
        require('./exhibitors-list/exhibitorsList');
    }

    if ($('#singleExhibitor').length) {
        require('./exhibitors-list/singleExhibitor');
    }

    if ($('#singleLocationExhibitors').length) {
        require('./exhibitors-list/locationExhibitorsList');
    }
});

require('./media-feed/loadFeedItems');

$(window).on('load', function () {
    if ($("#ytplayer").length) {
        $(".tutorial-modal").on("hidden.bs.modal", function () {
            stopVideo(this);
        });
    }
});

function stopVideo(element) {
    let iframe = element.querySelector('iframe');
    let video = element.querySelector('video');
    if (iframe !== null) {
        let iframeSrc = iframe.src;
        iframe.src = iframeSrc;
    }

    if (video !== null) {
        video.pause();
    }
};
