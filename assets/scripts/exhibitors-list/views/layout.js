import exhibitorCard from './exhibitorCard';
import locationFilter from './locationFilter';
import locationsFilterAccordion from './locationsFilterAccordion';

import categoryFilter from './categoryFilter';
import categoriesFilterAccordion from './categoriesFilterAccordion';

import filterExhibitors from './../filterExhibitors';

const createLayout = (exhibitorsList) => {
    let sortedExhibitors = exhibitorsList.getSortedExhibitors();
    let html = '';

    let filteredExhibitorsArray = [];

    // go through filtered array and check which exhibitors match:
    // a. letter
    // b. show
    // c. category

    // console.log("GET SORTED EXHIBITORS");
    // console.log(sortedExhibitors);

    if (exhibitorsList.searchParameters.letters || exhibitorsList.searchParameters.shows || exhibitorsList.searchParameters.cats) {
        filteredExhibitorsArray = filterExhibitors(exhibitorsList, sortedExhibitors);
    }

    if (!filteredExhibitorsArray.length > 0) {
        filteredExhibitorsArray = sortedExhibitors;
    }

    let layoutParams = exhibitorsList.filters;

    if (exhibitorsList.searchParameters.letters) {
        layoutParams = exhibitorsList.searchParameters;
    }

    let arrayLength = layoutParams.letters.length;

    for (let i = 0; i < arrayLength; i++) {
        let letter = layoutParams.letters[i];

        let itemsLength = filteredExhibitorsArray[letter].length;

        if (itemsLength) {
            html += `<h3 class="exhibitor-list__letter">${letter}</h3>
                    <div class="accordion" id="accordion${letter}">`;

            for (let j = 0; j < itemsLength; j++) {
                html += exhibitorCard(filteredExhibitorsArray[letter][j]);
            }

            html += `</div>`;
        }
    }

    document.getElementById("exhibitors").innerHTML = html;
};

const redrawLayout = (exhibitorsList, letter) => {
    let html = '';

    html += `<h3 class="exhibitor-list__letter">${letter}</h3>
                    <div class="accordion" id="accordion${letter}">`;

    let itemsLength = exhibitorsList.length;
    for (let j = 0; j < itemsLength; j++) {
        html += exhibitorCard(exhibitorsList[j]);
    }

    html += `</div>`;

    document.getElementById("exhibitors").innerHTML = html;
};

const createLocationsSidebar = (exhibitorsList) => {
    let shows = exhibitorsList.getShowsList();
    let html = '';

    html += `<ul class="d-none d-md-block">`;
    for (let i = 0; i < shows.length; i++) {
        html += locationFilter(shows[i]);
    }
    html += `</ul>`;

    html += locationsFilterAccordion(shows);

    document.getElementById("locationFilters").innerHTML = html;
};

const createCategoriesSidebar = (exhibitorsList) => {
    let categories = exhibitorsList.getCategoriesList();
    let html = '';

    html += `<ul class="d-none d-md-block">`;
    for (let i = 0; i < categories.length; i++) {
        html += categoryFilter(categories[i]);
    }
    html += `</ul>`;

    html += categoriesFilterAccordion(categories);

    document.getElementById("categoriesFilters").innerHTML = html;
};

const checkFilters = (exhibitorsList) => {
    let searchParams = exhibitorsList.getSearchParameters();

    if (searchParams['letters'] !== null && searchParams['letters'].length) {
        $("#alphabetFilters .alphabet-filter__item").removeClass('active');

        for (let i = 0; i < searchParams['letters'].length; i++) {
            $(`.alphabet-filter__item[value='${searchParams['letters'][i]}']`).addClass('active');
        }
    }

    if (searchParams['shows'] !== null && searchParams['shows'].length) {
        $("#locationFilters .filter-checkbox").prop("checked", false);

        for (let i = 0; i < searchParams['shows'].length; i++) {
            $("#locationFilters input[value=" + searchParams['shows'][i] + "]")[0].checked = true;
        }
    }

    if (searchParams['cats'] !== null && searchParams['cats'].length) {
        $("#categoriesFilters .filter-checkbox").prop("checked", false);

        for (let i = 0; i < searchParams['cats'].length; i++) {
            $("#categoriesFilters input[value=" + searchParams['cats'][i] + "]")[0].checked = true;
        }
    }
};

const cleanFilters = () => {
    $("#alphabetFilters .alphabet-filter__item").removeClass('active');

    $("#alphabetFilters .alphabet-filter__item[value='*']").addClass('active');

    $("#locationFilters .filter-checkbox").prop("checked", false);
    $("#categoriesFilters .filter-checkbox").prop("checked", false);
};


module.exports = {
    createLayout: createLayout,
    redrawLayout: redrawLayout,
    createLocationsSidebar: createLocationsSidebar,
    createCategoriesSidebar: createCategoriesSidebar,
    checkFilters: checkFilters,
    cleanFilters: cleanFilters
};