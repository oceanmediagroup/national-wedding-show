const exhibitorHeader = (data) => {
    const exhibitor = data[0];
    let image = '';
    let url_image = '/assets/img/exhibitor-cover.jpg';

    if (typeof exhibitor.image !== 'undefined') {
        url_image = "https://exhibitor.nationalweddingshow.co.uk/" + exhibitor.image.url;
    }

    image += `<div class="owl-carousel owl-theme owl-header-simple">
                <div class="image item" style="background-image: url('${url_image}')"></div>
            </div>`;

    return `
        <div class="header-carousel-simple">
            ${image}
        
            <h1 class="header-carousel-simple__title">
                    ${exhibitor.name}
            </h1>
        </div>
    `;
};

export default exhibitorHeader;