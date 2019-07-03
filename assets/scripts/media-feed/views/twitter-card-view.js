const twitterCard = (card) => {
    let url = 'https://twitter.com/NationalWeddingShow';

    try {
        if (typeof(card['entities']['urls'][0]['url']) !== undefined) {
            url = card['entities']['urls'][0]['url'];
        }
    } catch (e) {
    }

    try {
        if (typeof(card['entities']['media'][0]['url']) !== undefined) {
            url = card['entities']['media'][0]['url'];
        }
    } catch (e) {
    }

    try {
        if (typeof(card['entities']['url']['urls'][0]['url']) !== undefined) {
            url = card['entities']['url']['urls'][0]['url'];
        }
    } catch (e) {
    }

    let mediaUrl = '';
    try {
        if (typeof(card['extended_entities']['media'][0]) !== undefined) {
            mediaUrl = card['extended_entities']['media'][0]['media_url_https'];
        }
    } catch (e) {
    }

    let videoUrl = null;
    let videoFeatures = '';
    try {
        if (typeof(card['extended_entities']['media'][0]) !== undefined && typeof(card['extended_entities']['media'][0]['video_info']) !== undefined) {

            if (card['extended_entities']['media'][0]['video_info']['variants'].length >= 3) {
                videoUrl = card['extended_entities']['media'][0]['video_info']['variants'][2]['url'];
            } else {
                videoUrl = card['extended_entities']['media'][0]['video_info']['variants'][0]['url'];
            }

            videoFeatures += ` width="${card['extended_entities']['media'][0]['sizes']['medium']['w']}" height="${card['extended_entities']['media'][0]['sizes']['medium']['h']}"`;
            let videoType = ' controls';
            if (card['extended_entities']['media'][0]['type'] === "animated_gif") {
                videoType = ' autoplay loop';
            }

            videoFeatures += videoType;
        }
    } catch (e) {
    }

    try {
        if (typeof(card['retweeted_status']) !== undefined) {

            if (card['retweeted_status']['extended_entities']['media'][0]['video_info']['variants'].length >= 4) {
                videoUrl = card['retweeted_status']['extended_entities']['media'][0]['video_info']['variants'][3]['url'];
            } else {
                videoUrl = card['retweeted_status']['extended_entities']['media'][0]['video_info']['variants'][0]['url'];
            }

            videoFeatures += ` width="${card['retweeted_status']['extended_entities']['media'][0]['sizes']['medium']['w']}" height="${card['retweeted_status']['extended_entities']['media'][0]['sizes']['medium']['h']}"`;
            let videoType = ' controls';

            if (typeof (card['retweeted_status']['extended_entities']['media'][0]['type']) !== undefined && card['retweeted_status']['extended_entities']['media'][0]['type'] === "animated_gif") {
                videoType = ' autoplay loop';
            }

            videoFeatures += videoType;
        }
    } catch (e) {
    }

    let imageVideoContent = '';
    if (videoUrl !== null) {
        imageVideoContent = `<video ${videoFeatures}>
                          <source src="${videoUrl}" type="video/mp4">
                        Your browser does not support the video tag.
                        </video>`;
    } else if (mediaUrl) {
        imageVideoContent = `<img src="${mediaUrl}" />`;
    }

    let gridItem = `
            <div class="grid-item twitter">
                <div data-url="/?type=twitter&id=${card['id']}" data-toggle="modal" data-target="#twitter-${card['id']}">
                    <div class="card-body">
                        <span class="card-text">
                            ${card['full_text']}
                        </span>
                        <i class="fab fa-twitter"></i>
                    </div>
                </div>


                <div class="modal fade twitter-modal" id="twitter-${card['id']}" tabindex="-1" role="dialog" aria-labelledby="twitter-${card['id']}Label"
                     aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            
                            
                            <div class="modal-body">
                                ${imageVideoContent}
                                <div class="text-wrapper">
                                    <div class="heading">
                                       <img src="https://pbs.twimg.com/profile_images/1018856656548003840/XVdkgYjO.jpg" alt="National Wedding Show logo" />
                                       <h5>The National Wedding Show
                                       <span>@nationalwedding</span></h5>
                                      
                                       <i class="fab fa-twitter"></i>
                                       
                                    </div>
                                    <div class="modal-text">
                                        <p>${card['full_text']}</p>
                                       
                                        <p class="data"></p>
                                        <a href="https://twitter.com/intent/retweet?tweet_id=${card['id_str']}" target="_blank">Share on Twitter</a>
                                        <a href="https://twitter.com/nationalwedding"  target="_blank">View our tweets</a>                                    
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
`;

    return $($.parseHTML(gridItem));
};


export default twitterCard;