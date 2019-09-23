import * as API from './APIrequests';

import singleLocationExhibitors from './views/singleLocationExhibitors';
import singleLocationExhibitorsCarousel from './views/singleLocationExhibitorsCarousel';

const locations = {
    164: 1, // London Olympia
    165: 4, // Birmingham NEC
    166: 3, // Manchester Central
    167: 2, // London Excel
    901: 5 // Newcastle
};

function sortByName(a, b) {
    const nameA = a[0].name.toUpperCase(); // ignore upper and lowercase
    const nameB = b[0].name.toUpperCase(); // ignore upper and lowercase
    if (nameA < nameB) {
        return -1;
    }
    if (nameA > nameB) {
        return 1;
    }

    return 0;
}

function getAllFeatured(id, exhibitorsList) {

    const list = {
        "featured": [],
        "normal": []
    };

    exhibitorsList.forEach((exhibitor) => {
        let isFeatured = false;

        if (typeof exhibitor['0'].featured_in_shows !== undefined) {
            for (let i = 0; i < exhibitor['0'].featured_in_shows.length; i++) {

                if (exhibitor['0'].featured_in_shows[i].id === id) {
                    isFeatured = true;

                    list["featured"].push(exhibitor);
                }
            }
        }

        if (!isFeatured) {
            list["normal"].push(exhibitor);
        }
    });

    if (list['featured'].length >= 2) {
        list["featured"].sort(function (a, b) {
            return sortByName(a, b);
        })
    }

    if (list['normal'].length >= 2) {
        list["normal"].sort(function (a, b) {
            return sortByName(a, b);
        })
    }

    const finalList = list["featured"].concat(list["normal"]);

    return finalList;
}

const retrieveIdFromDiv = () => {
    return new Promise((resolve) => {
            resolve($("#singleLocationExhibitors #locationExhibitorsList").attr("location-id"));
        }
    );
};


const main = async () => {
    const ID = await retrieveIdFromDiv();

    await API.getLocationExhibitors(locations[ID]).then(data => {

        const exhibitors = getAllFeatured(locations[ID], data);

        if (typeof exhibitors !== 'undefined') {
            document.getElementById("locationExhibitorsList").innerHTML = singleLocationExhibitors(exhibitors);
            document.getElementById("locationExhibitorsListMobile").innerHTML = singleLocationExhibitorsCarousel(exhibitors);
        }
    });

    if ($('.owl-exhibitors').length) {
        const $carousel = $('.owl-exhibitors');

        $carousel.owlCarousel({
            loop: true,
            margin: 0,
            dots: true,
            nav: false,
            autoplay: true,
            autoplayTimeout: 5000,
            autoplayHoverPause: true,
            responsive: {
                0: {
                    items: 2
                }
            }
        })
    }
};

main();