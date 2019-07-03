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

    if (typeof exhibitor.logo !== 'undefined' && typeof exhibitor.logo.url !== 'undefined') {
        logo_img = 'https://exhibitor.nationalweddingshow.co.uk/' + exhibitor.logo.url;
    }

    let logo = `
                <div class="exhibitor-single__image-wrapper">
                    <img src='${logo_img}' alt="Exhibitor logo" class="card-image" />
                </div>
            `;

    let description = '';

    if (typeof exhibitor.description !== 'undefined') {
        description = exhibitor.description;
    }

    let categories = '';
    if (exhibitor.categories.length) {
        categories += ` <h3>Category:</h3>
                                            <p>`;
        exhibitor.categories.forEach(category => {
            categories += `${category.name}, `;
        });

        categories = categories.slice(0, -2);

        categories += `</p>`;
    }

    let website = '';
    if (typeof exhibitor.website !== 'undefined') {
        website += ` <h3>Website:</h3>
                    <a href="${exhibitor.website}" target="_blank">${exhibitor.website}</a>
        `;
    }

    let phone = '';
    if (typeof exhibitor.telephone !== 'undefined') {
        phone += ` <div class="phone-wrapper"><span class="phone">Tel:</span>
                    <a href="tel:${exhibitor.telephone}">${exhibitor.telephone}</a></div>
        `;
    }

    let exhibitingAt = '';
    if (typeof exhibitor.stands !== 'undefined'  && typeof exhibitor.stands[0] !== 'undefined') {
        exhibitingAt += '<h3>Exhibiting at</h3>';

        exhibitor.stands.forEach(stand => {
            exhibitingAt += `<p>${stand.show.name} - Stand: ${stand.number}</p>`;
        });
    }

    let offers = '';
    if (typeof exhibitor.offers !== 'undefined' && typeof exhibitor.offers[0] !== 'undefined') {
        offers += '<h3>Show offers and competitions</h3>';
        exhibitor.offers.forEach(offer => {
            offers += `<p>${offer.name} - ${offer.description}</p>`;
        });
    }

    let socialLinks = '';
    socialLinks += '<div class="exhibitor-single__social-media">';
    if (typeof exhibitor.social_media_links !== 'undefined') {
        for (let i in exhibitor.social_media_links){
            socialLinks += `<a href="${exhibitor.social_media_links[i].url}" target="_blank"><i class="${socialMediaIcons[exhibitor.social_media_links[i].type]}"></i></a>`;
        }
    }

    if (typeof exhibitor.secondary_email !== 'undefined' && exhibitor.secondary_email !== '') {
        socialLinks += `<a href="mailto:${exhibitor.secondary_email}"><i class="fas fa-envelope"></i></a>`;
    }

    socialLinks += '</div>';

    let brochure = '';

    if (typeof exhibitor.brochure_url !== 'undefined') {
        brochure += `<a href="${exhibitor.brochure_url}" class="button--light-coral" download>DOWNLOAD OUR BROCHURE</a>`;
    }

    return `
        <section class="exhibitor-single__wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-4 text-center">
                    ${logo}
                </div>
                <div class="col-md-8">
                    <h2 class="exhibitor-single__title">${exhibitor.name}</h2>
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