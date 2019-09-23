const locationsFilterAccordion = (shows) => {
    let html = '';


    html += `<div class="accordion d-block d-md-none filters-accordion" id="accordion-locations">`;

    html += `<div class="card">
                <div class="card-header" id="heading-locations">
                    <h5 class="mb-0">
                        <button class="btn btn-link collapsed exhibitor-list__title-top" type="button" data-toggle="collapse"
                                data-target="#collapse-locations" aria-expanded="false"
                                aria-controls="collapse-locations">
                                Location
                        </button>
                    </h5>
                </div>


                <div id="collapse-locations" class="collapse" aria-labelledby="heading-locations" data-parent="#accordion-locations">
                    <div class="card-body row align-items-center">
<ul>`;
    for (let i = 0; i < shows.length; i++) {
        html += `<li class="filter"><label><input type="checkbox" name="checkbox" class="filter-checkbox" value="${shows[i].id}">${shows[i].name}</label></li>`;
    }
    html += ` </ul> </div>
                </div>
            </div>`;

    html += `</div>`;

    return html;
};

export default locationsFilterAccordion;