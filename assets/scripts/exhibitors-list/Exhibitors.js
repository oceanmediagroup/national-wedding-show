function sortByName(a, b) {
    const nameA = a.name.toUpperCase(); // ignore upper and lowercase
    const nameB = b.name.toUpperCase(); // ignore upper and lowercase
    if (nameA < nameB) {
        return -1;
    }
    if (nameA > nameB) {
        return 1;
    }

    return 0;
}

export default class Exhibitors {
    constructor() {
        this.allExhibitorsList = {};
        this.filters = {
            letters: ['#', 'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z'],
            shows: {},
            cats: {}
        };
        this.searchParameters = {
            letters: [],
            shows: [],
            cats: []
        };
        this.exhibitorsByLetter = {};
        this.showsList = {};
        this.categoriesList = {};
    }

    setAllExhibitorsList(exhibitors) {
        this.allExhibitorsList = exhibitors;
    }

    getAllExhibitorsList() {
        return this.allExhibitorsList;
    }

    getExhibitorsFromLetter(letter) {
        return this.exhibitorsByLetter[letter];
    }

    getSortedExhibitors() {
        return this.exhibitorsByLetter;
    }

    setShowsList(shows) {
        this.showsList = shows;
        this.showsList.sort(function (a, b) {
            return sortByName(a, b);
        });
        this.setLocationFilters();
    }

    getShowsList() {
        return this.showsList;
    }

    setLocationFilters() {
        this.showsList.forEach((location) => {
            this.filters.shows[location.id.toString()] = location.id;
        });
    }

    setCategoriesList(categories) {
        this.categoriesList = categories;
        this.categoriesList.sort(function (a, b) {
            return sortByName(a, b);
        });
        this.setCategoriesFilters();
    }

    getCategoriesList() {
        return this.categoriesList;
    }

    setCategoriesFilters() {
        this.categoriesList.forEach((category) => {
            this.filters.cats[category.id.toString()] = category;
        });
    }

    getSearchParameters() {
        return this.searchParameters;
    }

    getSearchParameter(name) {
        return this.searchParameters[name];
    }

    setSearchParameter(name, params) {
        this.searchParameters[name] = params;
    }

    sortExhibitorsByLetter = () => {
        const exhibitors = this.getAllExhibitorsList();

        this.filters.letters.forEach((letter) => {
            const filtered = exhibitors.filter(exhibitor => exhibitor.name.charAt(0).toUpperCase() === letter);
            this.exhibitorsByLetter[letter.toString()] = filtered;
        });

        this.exhibitorsByLetter['#'] = exhibitors.filter(exhibitor =>
            exhibitor.name.charAt(0).match(/[^a-z]/i));

        this.exhibitorsByLetter['*'] = exhibitors;
    };

    writeUrlParameters = (key, newParam) => {
        return new Promise((resolve) => {
                if (this.searchParameters[key] === null || this.searchParameters[key].length === 0 || !this.searchParameters[key] || this.searchParameters[key] === "*") {
                    this.searchParameters[key] = [];
                }

                if (key === "letters") {
                    if (this.searchParameters[key] && this.searchParameters[key].includes(newParam.toString())) {
                        this.searchParameters[key].splice(this.searchParameters[key].indexOf(newParam.toString()), 1);
                    } else {
                        this.searchParameters[key] = [];
                        this.searchParameters[key].push(newParam);
                    }

                    if (newParam === "*") {
                        this.searchParameters[key] = [];
                    }
                } else {
                    if (this.searchParameters[key] && this.searchParameters[key].includes(newParam.toString())) {
                        this.searchParameters[key].splice(this.searchParameters[key].indexOf(newParam.toString()), 1);
                    } else {
                        this.searchParameters[key].push(newParam);
                    }
                }

                let newSearch = "";
                let firstParam = true;
                for (const key of Object.keys(this.searchParameters)) {
                    if (this.searchParameters[key] !== null && this.searchParameters[key].length !== 0 && this.searchParameters[key]) {
                        newSearch += firstParam ? '?' : '&';
                        newSearch += `${key}=` + this.searchParameters[key].join(',').toString();

                        firstParam = firstParam ? false : firstParam;
                    }
                }

                if (history.pushState) {
                    const newurl = window.location.protocol + "//" + window.location.host + window.location.pathname + newSearch;
                    window.history.pushState({path: newurl}, '', newurl);
                }

                resolve(true);
            }
        );
    };

    retrieveUrlParameters = () => {
        return new Promise((resolve) => {
            for (const key of Object.keys(this.searchParameters)) {
                this.searchParameters[key] = Exhibitors.getParametersByName(key);
            }

            resolve(true);
        });

    };


    resetUrlParameters = () => {
        return new Promise((resolve) => {
                for (const key of Object.keys(this.searchParameters)) {
                    this.searchParameters[key] = [];
                }

                if (history.pushState) {
                    const newurl = window.location.protocol + "//" + window.location.host + window.location.pathname;
                    window.history.pushState({path: newurl}, '', newurl);
                }

                resolve(true);
            }
        );
    };

    static getParametersByName(name, url) {
        if (!url) url = window.location.href;
        name = name.replace(/[\[\]]/g, '\\$&');
        let regex = new RegExp('[?&]' + name + '(=([^&]*)|&|$)'),
            results = regex.exec(url);

        if (!results) return null;

        if (!results[2]) return null;

        return decodeURIComponent(results[2].replace(/\+/g, ' ')).split(',');
    }
}