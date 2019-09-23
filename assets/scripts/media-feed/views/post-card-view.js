const postCard = (card) => {

    let gridItem = `<div class="grid-item news post post-card">
                <a href="${card['url']}">
                    <div class="post-card__wrapper">
                        <div class="post-card__img-wrapper" style="background-image: url(${card['image']})">
                            <span class="post-card__category">${card['category'][0]['name']}</span>
                        </div>
                        <div class="post-card__body">
                            <h5 class="post-card__title">${card['title']}</h5>
                        </div>
                        <div class="post-card__footer d-flex justify-content-between">
                            <span class="post-card__date">${card['date']}</span>
                            <span class="post-card__link">read more</span>
                        </div>
                    </div>
                </a>
            </div>`;

    return $($.parseHTML(gridItem));
};


export default postCard;