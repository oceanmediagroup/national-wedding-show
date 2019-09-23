const filterByLetter = (letters, sortedExhibitors) => {
    let filteredExhibitors = sortedExhibitors;

    for (const letter of Object.keys(sortedExhibitors)) {
        if (sortedExhibitors[letter].length > 0) {
            filteredExhibitors[letter] = sortedExhibitors[letter];
        }
    }

    return filteredExhibitors;
};


const filterByShow = (shows, sortedExhibitors) => {
    let filteredExhibitors = sortedExhibitors;

    for (const letter of Object.keys(sortedExhibitors)) {
        if (sortedExhibitors[letter].length > 0) {
            filteredExhibitors[letter] = sortedExhibitors[letter].filter(exhibitor => {
                let isInShows = false;

                exhibitor['0'].stands.forEach((stand) => {
                    if (shows.includes(stand.show.id.toString())) {
                        isInShows = true;
                    }
                });


                return isInShows;
            });
        }

    }

    return filteredExhibitors;
};

const filterByCategory = (categories, sortedExhibitors) => {
    let filteredExhibitors = sortedExhibitors;

    for (const letter of Object.keys(sortedExhibitors)) {
        filteredExhibitors[letter] = sortedExhibitors[letter].filter(exhibitor => {
            let isInCategory = false;

            exhibitor['0'].categories.forEach((category) => {
                // console.log("category id is");

                // console.log(category.id);

                // console.log("mamy do wyboru");
                // console.log(categories);

                if (categories.includes(category.id.toString())) {
                    // console.log("jest w searchu kategorii!");
                    isInCategory = true;
                }
            });


            return isInCategory;
        });
    }

    return filteredExhibitors;
};

const filterExhibitors = (exhibitorsList, sortedExhibitors) => {
    // console.log("+++++++++++++++");
    // console.log(exhibitorsList.searchParameters.letters);
    // console.log("-----------------");
    //
    // console.log("SORTED EXHIBITORS PASSED TO FILTERING");
    // console.log(sortedExhibitors);

    // sort by letter
    if (exhibitorsList.searchParameters.letters !== null && exhibitorsList.searchParameters.letters.length > 0 && exhibitorsList.searchParameters.letters) {
        sortedExhibitors = filterByLetter(exhibitorsList.searchParameters.letters, sortedExhibitors);
        // console.log("FILTERED BY LETTER");
    }

    // console.log("After filtering by letter: ");
    // console.log(sortedExhibitors);

    // filter by shows
    if (exhibitorsList.searchParameters.shows) {
        // console.log(exhibitorsList.searchParameters.shows);
        sortedExhibitors = filterByShow(exhibitorsList.searchParameters.shows, sortedExhibitors);
    }

    // console.log(sortedExhibitors);

    // filter by categories
    if (exhibitorsList.searchParameters.cats) {
        // console.log(exhibitorsList.searchParameters.cats);
        sortedExhibitors = filterByCategory(exhibitorsList.searchParameters.cats, sortedExhibitors);
    }

    return sortedExhibitors;
};

export default filterExhibitors;