const exhibitorGallery = (data) => {
    const exhibitor = data[0];
    let gallery = '';

    if (typeof exhibitor.products !== 'undefined') {
        exhibitor.products.forEach(product => {
            const url_image = "https://exhibitor.nationalweddingshow.co.uk/" + product.image.url;

            gallery += `<div class="col-sm-4 gallery-simple__item">
                            <div class="gallery-simple__wrapper">
                                <div class="gallery-simple__image" style="background-image: url('${url_image}')"></div>
                            </div>
                        </div>`;
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