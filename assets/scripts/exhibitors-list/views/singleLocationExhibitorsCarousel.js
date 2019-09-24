const exhibitorCard = (exhibitor) => {
    let image = '';

    let url_image = '/assets/img/exhibitor-cover.jpg';

    if (typeof exhibitor[0].image !== 'undefined' && exhibitor[0].image !== null) {
        url_image = window.apiAssetUrl + exhibitor[0].image.url;
    }

    image += `style="background-image: url('${url_image}')"`;

    return `
        <div class="item exhibitor-card">
            <div class="exhibitors__img-wrapper">
                <a href="/exhibitor-list/${exhibitor[0].id}/${exhibitor[0].name.toString().split(' ').filter(n => n).join('-').toLowerCase()}/">
                    <div class="exhibitors__img" ${image}">
                        <div class="exhibitors__title-wrapper">
                            <p>${exhibitor[0].name}</p>
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