// THIS CODE NEEDS REWRITING

const getData = async (mediaFeed) => {
    const pattern = ["post", "twitter", "post", "tutorial", "instagram", "twitter", "text", "text", "tutorial", "twitter", "post", "instagram", "tutorial", "tutorial", "tutorial", "tutorial"];

    const posts1 = getPosts(mediaFeed, "getPosts", 1);
    const tweets1 = getPosts(mediaFeed, "getTwitterPosts", 1);
    const posts2 = getPosts(mediaFeed, "getPosts", 1);
    const tutorials1 = getPosts(mediaFeed, "getTutorials", 1);
    const instagrams1 = getPosts(mediaFeed, "getInstagramPosts", 1);
    const tweets2 = getPosts(mediaFeed, "getTwitterPosts", 1);
    const texts1 = getPosts(mediaFeed, "getTextPosts", 1);
    const instagrams2 = getPosts(mediaFeed, "getInstagramPosts", 1);
    const tutorials2 = getPosts(mediaFeed, "getTutorials", 1);
    const tweets3 = getPosts(mediaFeed, "getTwitterPosts", 1);
    const posts3 = getPosts(mediaFeed, "getPosts", 1);
    const instagrams3 = getPosts(mediaFeed, "getInstagramPosts", 1);
    const tutorials3 = getPosts(mediaFeed, "getTutorials", 1);
    const tutorials4 = getPosts(mediaFeed, "getTutorials", 1);
    const tutorials5 = getPosts(mediaFeed, "getTutorials", 1);
    const tutorials6 = getPosts(mediaFeed, "getTutorials", 1);

    return new Promise((resolve, reject) => {
        Promise.all([posts1, tweets1, posts2, tutorials1, instagrams1, tweets2, texts1, instagrams2, tutorials2, tweets3, posts3, instagrams3, tutorials3, tutorials4, tutorials5, tutorials6]).then(values => {
            values = values.filter(n => n);

            values.length ? resolve(values) : resolve(null);
        }).catch(function (err) {
            // console.log("źle poszło");
            console.log(err);
        });
    });
};


function getPosts(mediaFeed, actionType, howMany) {
    return new Promise((resolve, reject) => {

        let itemsRetrieved = mediaFeed.getItemsRetrieved(actionType);

        // console.log("Getting posts after " + itemsRetrieved + " post type: " + postType);

        const wpajax_url = `${document.location.protocol}//${document.location.host}/wp/wp-admin/admin-ajax.php?action=${actionType}&itemsRetrieved=${itemsRetrieved}&how_many=${howMany}`;

        mediaFeed.increaseItemsRetrieved(actionType);

        $.ajax({
            'method': 'post',
            'url': wpajax_url,
            'datatype': 'json',
            'cache': false,
            'success': function (data) {
                // console.log("data from " + actionType + " = " + data);
                resolve(data ? JSON.parse(data) : null);
            },
            'error': function () {
                reject(console.log('something went wrong'));
            }
        });
    });
}

export default getData;