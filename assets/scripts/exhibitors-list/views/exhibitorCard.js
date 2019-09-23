const exhibitorCard = (exhibitor, itsCopy, getLetter) => {
    //console.log(exhibitor);

    let categories = '';
    if (exhibitor['0'].categories.length) {
        categories += `<h6 class="card-category">CATEGORY</h6>
                                            <ul class="card-category-list">`;
        exhibitor['0'].categories.forEach(category => {
            categories += `<li>${category.name}</li>`;
        });

        categories += `</ul>`;
    }

    let exhibitedAt = '';
    if (exhibitor['0'].stands.length) {
        exhibitedAt += `<h6 class="card-category">EXHIBITING AT</h6>
                                            <ul class="card-stand-list">`;
        exhibitor['0'].stands.forEach(stand => {
            exhibitedAt += `<li>${stand.show.name} - Stand: ${stand.number}</li>`;
        });

        exhibitedAt += `</ul>`;
    }

    let logo = '/assets/img/exhibitor-logo-default.png';
    if (exhibitor['0'].logo) {
        logo = `${window.baseUrl}${exhibitor['0'].logo.url}`;
    }

    let featuredInShows = exhibitor['0'].featured_in_shows.map(elem => {
        return elem.name
    }).join(', ');
    let featuredInCategories = exhibitor['0'].featured_in_categories.map(elem => {
        return elem.name
    }).join(', ');

    const getFirstLetter = function() {
        const firstLetter = exhibitor['0'].name.substring(0,1)
        const firstLetterToLower = firstLetter.toLowerCase()
        if (/^[a-zA-Z()]+$/.test(firstLetterToLower)) {
            return firstLetter
        } else {
            return
        }
    }

    let filteredLetterX = getFirstLetter()

    return `<div class="card" ${exhibitor.is_live == '1' ? 'data-is-live' : 'data-not-live' }>
                <div class="card-header" id="heading-${exhibitor['0'].id}">
                    <h5 class="mb-0">
                        <button class="btn btn-link collapsed" type="button" data-toggle="collapse"
                                data-target="#collapse-${itsCopy ? exhibitor['0'].id+1000 : exhibitor['0'].id}" aria-expanded="false"
                                aria-controls="collapse-${itsCopy ? exhibitor['0'].id+1000 : exhibitor['0'].id}">
                                <div>
                                    ${exhibitor['0'].name.toString() !== '' ? exhibitor['0'].name : '-'}
                                </div>
                            <i class="fas fa-chevron-down"></i>
                            ${featuredInShows || featuredInCategories ? '<div class="card-header card-header--featured">FEATURED EXHIBITOR</div>' : ''}
                        </button>
                    </h5>
                </div>

                <div
                    id="collapse-${itsCopy ? exhibitor['0'].id+1000 : exhibitor['0'].id}"
                    class="collapse"
                    aria-labelledby="heading-${exhibitor['0'].id}"
                    data-parent="#accordion${filteredLetterX ? filteredLetterX : 'A'}">

                    <div class="card-body row align-items-center">
                    <div class="row" style="width: 100%">
                        <div class="col-md-4">
                            <img src="${logo}" alt="${exhibitor['0'].name} logo" class="card-image" />
                        </div>

                        <div class="col-md-8">
                                <p class="card-description">${exhibitor['0'].description ? exhibitor['0'].description : ''}</p>
                                ${categories}
                                ${exhibitedAt}
                        </div>
                        <div class="col-7 col-md-12 text-right card-button">
                            <a href="/exhibitor-list/${exhibitor['0'].id}/${exhibitor['0'].name.toString().split(' ').filter(n => n).join('-').toLowerCase()}/" class="button--light-coral">VIEW PROFILE</a>
                        </div>
                        </div>
                    </div>
                </div>
            </div>`;
};


export default exhibitorCard;