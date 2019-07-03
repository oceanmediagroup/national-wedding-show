const instagramCard = (card, id) => {
    let imageVideoContent = `<div class="card-body-img" style="background-image: url('${card['image']}')"></div>`;
    let  videoFeatures = '';
    if (card['video_url'] !== null) {
        videoFeatures += ` width="${card['video_width']}" height="${card['video_height']}" `;

        imageVideoContent = `<video class="card-body-img"  ${videoFeatures} controls>
                          <source src="${card['video_url']}" type="video/mp4">
                        Your browser does not support the video tag.
                        </video>`;
    }

    let gridItem = `
            <div class="grid-item instagram">
                <div data-url="/?type=instagram&id=${card['id']}" data-toggle="modal" data-target="#instagram-${card['id']}">
                    <div class="card-body">
                        <div class="card-body-img" style="background-image: url('${card['image']}')"></div>
                        <i class="fab fa-instagram"></i>
                    </div>
                </div>

                <div class="modal fade instagram-modal" id="instagram-${card['id']}" tabindex="-1" role="dialog"
                     aria-labelledby="instagram-${card['id']}Label"
                     aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="modal-img-wrapper">
                                    
                                ${imageVideoContent}
                                </div>
                                <div class="text-wrapper">
                                    <div class="heading">
                                       <img src="${card['profile_picture']}" alt="National Wedding Show logo" />
                                       <h5>${card['full_name']}
                                       <span>@${card['username']}</span></h5>
                                    </div>
                                    <div class="modal-text">
                                        <p>${card['text']}</p>
                                        <a href="${card['url']}" target="_blank">Go to Instagram</a>      
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


export default instagramCard;