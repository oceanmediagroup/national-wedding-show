const exhibitorCard = (exhibitor) => {
    //console.log(exhibitor);

    let categories = '';
    if (exhibitor.categories.length) {
        categories += `<h6 class="card-category">CATEGORY</h6>
                                            <ul class="card-category-list">`;
        exhibitor.categories.forEach(category => {
            categories += `<li>${category.name}</li>`;
        });

        categories += `</ul>`;
    }

    let logo = '/assets/img/exhibitor-logo-default.png';
    if (exhibitor.logo) {
        logo = `https://exhibitor.nationalweddingshow.co.uk${exhibitor.logo.url}`;
    }

    return `<div class="card">
                <div class="card-header" id="heading-${exhibitor.id}">
                    <h5 class="mb-0">
                        <button class="btn btn-link collapsed" type="button" data-toggle="collapse"
                                data-target="#collapse-${exhibitor.id}" aria-expanded="false"
                                aria-controls="collapse-${exhibitor.id}">
                                <div>
                                    ${exhibitor.name.toString() !== '' ? exhibitor.name : '-'}
                                </div>
                            <i class="fas fa-chevron-down"></i>
                        </button>
                    </h5>
                </div>

                <div id="collapse-${exhibitor.id}" class="collapse" aria-labelledby="heading-${exhibitor.id}" data-parent="#accordionA">
                    <div class="card-body row align-items-center">
                    <div class="row">
                        <div class="col-md-4">
                            <img src="${logo}" alt="${exhibitor.name} logo" class="card-image" />
                        </div>
                        
                        <div class="col-md-8">
                                <p class="card-description">${exhibitor.description ? exhibitor.description : ''}</p>
                                ${categories}
                        </div>
                        <div class="col-7 col-md-12 text-right card-button">
                            <a href="/exhibitor-list/${exhibitor.id}/${exhibitor.name.toString().split(' ').filter(n => n).join('-').toLowerCase()}/" class="button--light-coral">VIEW PROFILE</a>
                        </div>
                        </div>
                    </div>
                </div>
            </div>`;
};


export default exhibitorCard;