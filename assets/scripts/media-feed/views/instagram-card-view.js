const instagramCard = (card, id) => {
    const cardBg = card['thumbnail_url'] !== null ? card['thumbnail_url'] : card['image'];
    const gridItem = `<div class="grid-item instagram">
        <a href="${card['url']}" target="_blank">
            <div data-url="/?type=instagram&id=${card['ig_id']}">
                <div class="card-body">
                    <div class="card-body-img" style="background-image: url('${cardBg}')"></div>
                    <i class="fab fa-instagram"></i>
                </div>
            </div>
        </a>`
    return $($.parseHTML(gridItem));
};


export default instagramCard;