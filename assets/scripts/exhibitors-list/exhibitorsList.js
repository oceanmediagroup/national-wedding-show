import Exhibitors from './Exhibitors';

import * as API from './APIrequests';

import * as layout from './views/layout';

const registerFilters = () => {
    $('#alphabetFilters .filter').on('click', async function () {
        let letter = $(this).attr('value');

        window.history.pushState('obj', 'title', document.location);
        // console.log(document.location.search);

        await exhibitorsList.writeUrlParameters('letters', letter);

        await exhibitorsList.retrieveUrlParameters();

        await API.getAllExhibitors().then(data => {
            exhibitorsList.setAllExhibitorsList(data);
            exhibitorsList.sortExhibitorsByLetter();
        }).then(data => {
            $("#alphabetFilters .alphabet-filter__item").removeClass('active');
            $(this).addClass('active');
            layout.createLayout(exhibitorsList);
        });
    });

    $('#locationFilters .filter-checkbox').on('click', async function () {
        let showID = $(this).attr('value');

        window.history.pushState('obj', 'title', document.location);

        await exhibitorsList.writeUrlParameters('shows', showID);

        await exhibitorsList.retrieveUrlParameters();

        await API.getAllExhibitors().then(data => {
            exhibitorsList.setAllExhibitorsList(data);
            exhibitorsList.sortExhibitorsByLetter();
        }).then(data => {
            layout.createLayout(exhibitorsList);
        });

    });

    $('#categoriesFilters .filter-checkbox').on('click', async function () {
        let categoryID = $(this).attr('value');
        window.history.pushState('obj', 'title', document.location);

        await exhibitorsList.writeUrlParameters('cats', categoryID);

        await exhibitorsList.retrieveUrlParameters();

        await API.getAllExhibitors().then(data => {
            exhibitorsList.setAllExhibitorsList(data);
            exhibitorsList.sortExhibitorsByLetter();
        }).then(data => {
            layout.createLayout(exhibitorsList);
        });
    });

    $('#resetFilters').on('click', async function () {
        window.history.pushState('obj', 'title', document.location);

        await exhibitorsList.resetUrlParameters();

        await exhibitorsList.retrieveUrlParameters();

        await API.getAllExhibitors().then(data => {
            exhibitorsList.setAllExhibitorsList(data);
            exhibitorsList.sortExhibitorsByLetter();
        }).then(data => {
            layout.createLayout(exhibitorsList);
        });

        layout.cleanFilters();
    });
};


const exhibitorsList = new Exhibitors();

const main = async () => {
    await exhibitorsList.retrieveUrlParameters();

    await API.getAllExhibitors().then(data => {
        exhibitorsList.setAllExhibitorsList(data);
        exhibitorsList.sortExhibitorsByLetter();
    }).then(data => {
        layout.createLayout(exhibitorsList);
    });

    await API.getAllShows().then(data => {
        exhibitorsList.setShowsList(data);
        layout.createLocationsSidebar(exhibitorsList);
    });

    await API.getAllCategories().then(data => {
        exhibitorsList.setCategoriesList(data);
        layout.createCategoriesSidebar(exhibitorsList);
    });

    registerFilters();

    layout.checkFilters(exhibitorsList);
};

main();