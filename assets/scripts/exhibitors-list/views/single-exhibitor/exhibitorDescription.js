const exhibitorDescription = (data) => {
    const exhibitor = data[0];

    const socialMediaIcons = {
        'twiter': 'fab fa-twitter',
        'facebook': 'fab fa-facebook-f',
        'pinterest': 'fab fa-pinterest-p',
        'instagram': 'fab fa-instagram',
        'youtube': 'fab fa-youtube',
        'vimeo': 'fab fa-vimeo-v',
        'soundcloud' : 'fab fa-soundcloud',
    };

    let logo_img = '/assets/img/exhibitor-logo-default.png';

    if (exhibitor['0'].logo !== null && exhibitor['0'].logo.url !== null) {
        logo_img = window.apiAssetUrl + exhibitor['0'].logo.url;
    }

    let logo = `
                <div class="exhibitor-single__image-wrapper">
                    <img src='${logo_img}' alt="Exhibitor logo" class="card-image" />
                </div>
            `;

    let description = '';

    if (exhibitor['0'].description !== null) {
        description = exhibitor['0'].description;
    }

    let categories = '';
    if (exhibitor['0'].categories.length) {
        categories += ` <h3>Category:</h3>
                                            <p>`;
        exhibitor['0'].categories.forEach(category => {
            categories += `${category.name}, `;
        });

        categories = categories.slice(0, -2);

        categories += `</p>`;
    }

    let website = '';
    if (exhibitor['0'].website !== null) {
        website += ` <h3>Website:</h3>
                    <a href="${exhibitor['0'].website}" target="_blank">${exhibitor['0'].website}</a>
        `;
    }

    let phone = '';
    if (exhibitor['0'].telephone !== null) {
        phone += ` <div class="phone-wrapper"><span class="phone">Tel:</span>
                    <a href="tel:${exhibitor['0'].telephone}">${exhibitor['0'].telephone}</a></div>
        `;
    }

    let exhibitingAt = '';
    if (exhibitor['0'].stands.length > 0 && exhibitor['0'].stands[0] !== null) {
        exhibitingAt += '<h3>Exhibiting at</h3>';

        exhibitor['0'].stands.forEach(stand => {
            exhibitingAt += `<p>${stand.show.name} - Stand: ${stand.number}</p>`;
        });
    }

    let offers = '';
    if (exhibitor['0'].offers.length > 0 && exhibitor['0'].offers[0] !== null) {
        offers += '<h3>Show offers and competitions</h3>';
        exhibitor['0'].offers.forEach(offer => {
            offers += `<p>${offer.name} - ${offer.description}</p>`;
        });
    }

    let socialLinks = '';
    socialLinks += '<div class="exhibitor-single__social-media">';
    if (exhibitor['0'].social_media_links.length > 0 && exhibitor['0'].social_media_links[0] !== null) {
        for (let i in exhibitor['0'].social_media_links){
            socialLinks += `<a href="${exhibitor['0'].social_media_links[i].url}" target="_blank"><i class="${socialMediaIcons[exhibitor['0'].social_media_links[i].type]}"></i></a>`;
        }
    }

    if (exhibitor['0'].secondary_email !== null) {
        socialLinks += `<a href="mailto:${exhibitor['0'].secondary_email}"><i class="fas fa-envelope"></i></a>`;
    }

    socialLinks += '</div>';

    let brochure = '';

    if (exhibitor['0'].brochure_url !== null) {
        brochure += `<a href="${exhibitor['0'].brochure_url}" class="button--light-coral" download>DOWNLOAD OUR BROCHURE</a>`;
    }

    return `
        <section class="exhibitor-single__wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-4 text-center">
                    ${logo}
                </div>
                <div class="col-md-8">
                    <h2 class="exhibitor-single__title">${exhibitor['0'].name}</h2>
                    <p>
                        ${description}
                    </p>

                    ${categories}

                    ${website}

                    ${phone}

                    ${exhibitingAt}

                    ${offers}

                    ${socialLinks}

                    <div class="exhibitor-single__buttons">
                        ${brochure}
                        <a href="/exhibitor-list/" class="button--light-coral">BACK TO EXHIBITORS LIST</a>
                    </div>

                </div>
            </div>
        </div>
    </section>
    `;
};

export default exhibitorDescription;