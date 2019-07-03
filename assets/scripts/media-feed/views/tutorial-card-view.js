const tutorialCard = (card) => {
    let gridItem = `<div class="grid-item tutorial">
                        <div class="modal-data" data-toggle="modal" data-target="#tutorial-${card['id']}">
                            <div class="tutorial-card">
                                <iframe id="ytplayer" type="text/html" width="640" height="360"
                                        src="${card['video']}"
                                        frameborder="0" class="tutorial-card__video"></iframe>
                                <div class="tutorial-card__title">
                                    ${card['title']}
                                </div>
                            </div>
                        </div>
                        
        
                        <div class="modal fade tutorial-modal" id="tutorial-${card['id']}" tabindex="-1" role="dialog"
                             aria-labelledby="tutorial-${card['id']}Label"
                             aria-hidden="true"
                             data-url-link="?type=tutorial&id=${card['id']}">
                            <div class="modal-dialog tutorial-modal__wrapper" role="document">
                                <div class="modal-content tutorial-modal__content">
                                    <div class="modal-header tutorial-modal__header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <iframe id="ytplayer" type="text/html" width="640" height="360"
                                                src="${card['video']}"
                                                frameborder="0" class="tutorial-modal__video"
                                                allowfullscreen="allowfullscreen"
        mozallowfullscreen="mozallowfullscreen" 
        msallowfullscreen="msallowfullscreen" 
        oallowfullscreen="oallowfullscreen" 
        webkitallowfullscreen="webkitallowfullscreen"></iframe>
                                        <div class="text-wrapper">
                                            <div class="modal-text">
                                                <p>${card['title']}</p>
                                                <p>${card['text']}</p> 
                                            </div>   
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>`;

    return $($.parseHTML(gridItem));
};

export default tutorialCard;