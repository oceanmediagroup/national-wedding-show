const exhibitorDescription = (data) => {
    const exhibitor = data[0];

    // console.log(exhibitor);

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

    if (typeof exhibitor['0'].logo !== 'undefined' && typeof exhibitor['0'].logo.url !== 'undefined') {
        logo_img = window.baseUrl + exhibitor['0'].logo.url;
    }

    let logo = `
                <div class="exhibitor-single__image-wrapper">
                    <img src='${logo_img}' alt="Exhibitor logo" class="card-image" />
                </div>
            `;

    let description = '';

    if (typeof exhibitor['0'].description !== 'undefined') {
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
    if (typeof exhibitor['0'].website !== 'undefined') {
        website += ` <h3>Website:</h3>
                    <a href="${exhibitor['0'].website}" target="_blank">${exhibitor['0'].website}</a>
        `;
    }

    let phone = '';
    if (typeof exhibitor['0'].telephone !== 'undefined') {
        phone += ` <div class="phone-wrapper"><span class="phone">Tel:</span>
                    <a href="tel:${exhibitor['0'].telephone}">${exhibitor['0'].telephone}</a></div>
        `;
    }

    let exhibitingAt = '';
    if (typeof exhibitor['0'].stands !== 'undefined'  && typeof exhibitor['0'].stands[0] !== 'undefined') {
        exhibitingAt += '<h3>Exhibiting at</h3>';

        exhibitor['0'].stands.forEach(stand => {
            exhibitingAt += `<p>${stand.show.name} - Stand: ${stand.number}</p>`;
        });
    }

    let offers = '';
    if (typeof exhibitor['0'].offers !== 'undefined' && typeof exhibitor['0'].offers[0] !== 'undefined') {
        offers += '<h3>Show offers and competitions</h3>';
        exhibitor['0'].offers.forEach(offer => {
            offers += `<p>${offer.name} - ${offer.description}</p>`;
        });
    }

    let socialLinks = '';
    socialLinks += '<div class="exhibitor-single__social-media">';
    if (typeof exhibitor['0'].social_media_links !== 'undefined') {
        for (let i in exhibitor['0'].social_media_links){
            socialLinks += `<a href="${exhibitor['0'].social_media_links[i].url}" target="_blank"><i class="${socialMediaIcons[exhibitor['0'].social_media_links[i].type]}"></i></a>`;
        }
    }

    if (typeof exhibitor['0'].secondary_email !== 'undefined' && exhibitor['0'].secondary_email !== '') {
        socialLinks += `<a href="mailto:${exhibitor['0'].secondary_email}"><i class="fas fa-envelope"></i></a>`;
    }

    socialLinks += '</div>';

    let brochure = '';

    if (typeof exhibitor['0'].brochure_url !== 'undefined') {
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