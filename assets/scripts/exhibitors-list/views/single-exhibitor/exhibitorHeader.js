const exhibitorHeader = (data) => {
    const exhibitor = data[0];
    let image = '';
    let url_image = '/assets/img/exhibitor-cover.jpg';

    if (typeof exhibitor['0'].image !== 'undefined' && exhibitor['0'].image !== null) {
        console.log('e', exhibitor['0'])
        url_image = window.apiAssetUrl + exhibitor['0'].image.url;
    }

    image += `<div class="owl-carousel owl-theme owl-header-simple">
                <div class="image item" style="background-image: url('${url_image}')"></div>
            </div>`;

    return `
        <div class="header-carousel-simple">
            ${image}

            <h1 class="header-carousel-simple__title">
                    ${exhibitor['0'].name}
            </h1>
        </div>
    `;
};

export default exhibitorHeader;