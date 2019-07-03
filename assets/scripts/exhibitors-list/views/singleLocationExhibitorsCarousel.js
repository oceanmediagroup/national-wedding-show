const exhibitorCard = (exhibitor) => {
    let image = '';

    let url_image = '/assets/img/exhibitor-cover.jpg';

    if (typeof exhibitor.image !== 'undefined') {
        url_image = "https://exhibitor.nationalweddingshow.co.uk/" + exhibitor.image.url;
    }

    image += `style="background-image: url('${url_image}')"`;

    return `
        <div class="item exhibitor-card">
            <div class="exhibitors__img-wrapper">
                <a href="/exhibitor-list/${exhibitor.id}/${exhibitor.name.toString().split(' ').filter(n => n).join('-').toLowerCase()}/">
                    <div class="exhibitors__img" ${image}">
                        <div class="exhibitors__title-wrapper">
                            <p>${exhibitor.name}</p>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    `;
};


const singleLocationExhibitorsCarousel = (exhibitors) => {
    let html = '';

    for (let i = 0; i < 8; i++) {
        html += exhibitorCard(exhibitors[i]);
    }

    return html;
};

export default singleLocationExhibitorsCarousel;