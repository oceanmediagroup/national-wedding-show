const categoriesFilterAccordion = (categories) => {
    let html = '';


    html += `<div class="accordion d-block d-md-none filters-accordion" id="accordion-categories">`;

    html += `<div class="card">
                <div class="card-header" id="heading-categories">
                    <h5 class="mb-0">
                        <button class="btn btn-link collapsed exhibitor-list__title-top" type="button" data-toggle="collapse"
                                data-target="#collapse-categories" aria-expanded="false"
                                aria-controls="collapse-categories">
                                Categories
                        </button>
                    </h5>
                </div>

                <div id="collapse-categories" class="collapse" aria-labelledby="heading-categories" data-parent="#accordion-categories">
                    <div class="card-body row align-items-center">
<ul>`;
    for (let i = 0; i < categories.length; i++) {
        html += `<li class="filter"><label><input type="checkbox" name="checkbox" class="filter-checkbox" value="${categories[i].id}">${categories[i].name}</label></li>`;
    }
    html += ` </ul> </div>
                </div>
            </div>`;

    html += `</div>`;

    return html;
};

export default categoriesFilterAccordion;