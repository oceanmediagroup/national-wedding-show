const exhibitorGallery = (data) => {
    const exhibitor = data[0];
    let gallery = '';

    if (typeof exhibitor['0'].products !== 'undefined') {
        exhibitor['0'].products.forEach(product => {

            if (product.image) {
                const imgUrl = product.image.url

                const url_image = window.baseUrl + imgUrl;
                console.log(url_image)
                gallery += `<div class="col-sm-4 gallery-simple__item">
                                <div class="gallery-simple__wrapper">
                                    <a href="${url_image}"
                                        data-toggle="exhibit-lightbox"
                                        data-gallery="exhibit-gallery"
                                        data-title="${product.description}">
                                            <div class="image-wrapper">
                                                <div class="gallery-simple__image" style="background-image: url('${url_image}')"></div>
                                            </div>
                                    </a>
                                </div>
                            </div>`;

            }
        });
    }


    return `
        <section class="gallery-simple">
            <div class="container">
                <div class="row justify-content-center">
                   ${gallery}
                </div>
            </div>
        </section>
    `;
};

export default exhibitorGallery;