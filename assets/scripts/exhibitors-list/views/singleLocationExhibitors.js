const exhibitorCard = (exhibitor) => {
    let image = '';
    let url_image = '/assets/img/exhibitor-cover.jpg';

    if (typeof exhibitor.image !== 'undefined') {
        url_image = "https://exhibitor.nationalweddingshow.co.uk/" + exhibitor.image.url;
    }

    image += `style="background-image: url('${url_image}')"`;

    return `
        <div class="col-6 col-lg-3 exhibitors__img-wrapper">
            <a class="" href="/exhibitor-list/${exhibitor.id}/${exhibitor.name.toString().split(' ').filter(n => n).join('-').toLowerCase()}/">
                <div class="exhibitors__img color-overlay-wrapper" ${image}">
                    <div class="exhibitors__title-wrapper">
                        <p>${exhibitor.name}</p>
                    </div>
                <span class="color-overlay"></span>
                </div>
            </a>
        </div>
    `;
};


const singleLocationExhibitors = (exhibitors) => {
    let html = '';

    for (let i = 0; i < 8; i++) {
        html += exhibitorCard(exhibitors[i]);
    }

    return html;
};

export default singleLocationExhibitors;