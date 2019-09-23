const textCard = (card) => {
    let gridItem = `<div class="grid-item post text-card at-the-show">
                <div class="text-card__wrapper">
                    <h5 class="text-card__title">${card['title']}</h5>
                    <div class="text-card__content">
                        ${card['content']}
                    </div>
                    <a href="${card['url']}" class="text-card__link">read more</a>
                </div>
            </div>`;

    return $($.parseHTML(gridItem));
};

export default textCard;