// Find all videos
const $allVideos = $("iframe");

const fitVideosToContainer = ($allVideos) => {
    // Resize all videos according to their own aspect ratio
    $allVideos.each(function () {

        const $el = $(this);
        const containerHeight = $el.closest(".video-container").height();
        const containerWidth = $el.closest(".video-container").width();
        let newWidth = containerWidth;
        let newHeight = newWidth * $el.data('aspectRatioVertical');

        let percent = ((newHeight - containerHeight) / newHeight) * 100 / 2;

        // If the video height is smaller than the container
        if (newHeight < containerHeight) {
            newHeight = containerHeight;
            newWidth = newHeight * $el.data('aspectRatioHorizontal');
            percent = ((newWidth - containerWidth) / newWidth) * 100 / 2;
            $el.css("transform", `translateX(-${percent}%)`);
        } else {
            $el.css("transform", `translateY(-${percent}%)`);
        }

        $el
            .width(newWidth)
            .height(newHeight);
    });
};

$(document).ready(function () {
// Figure out and save aspect ratio for each video
    $allVideos.each(function () {
        $(this)
            .data('aspectRatioVertical', this.height / this.width)
            .data('aspectRatioHorizontal', this.width / this.height)

            // and remove the hard coded width/height
            .removeAttr('height')
            .removeAttr('width');
    });

    fitVideosToContainer($allVideos);
});

// When the window is resized
$(window).resize(function () {
    fitVideosToContainer($allVideos);
// Kick off one resize to fix all videos on page load
}).resize();