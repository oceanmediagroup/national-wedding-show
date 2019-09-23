// XMLHttpRequest wrapper using callbacks

const request = obj => {
    return new Promise((resolve, reject) => {
        let xhr = new XMLHttpRequest();
        if (obj.params) {
            xhr.open(obj.method || "GET", obj.url + '?' + obj.params);
        } else {
            xhr.open(obj.method || "GET", obj.url);
        }

        if (obj.headers) {
            Object.keys(obj.headers).forEach(key => {
                xhr.setRequestHeader(key, obj.headers[key]);
            });
        }
        xhr.onload = () => {
            if (xhr.status >= 200 && xhr.status < 300) {
                resolve(xhr.response);
            } else {
                reject(xhr.statusText);
            }
        };
        xhr.onerror = () => reject(xhr.statusText);
        xhr.send(obj.body);
    });
};

const getAllExhibitors = () => {
    return new Promise((resolve, reject) => {
        request({url: window.baseUrl + 'brands'})
            .then(data => {
                let exhibitors = JSON.parse(data);
                resolve(exhibitors);
            })
            .catch(error => {
                console.log(error);
            });
    });
};

const getAllShows = () => {
    return new Promise((resolve, reject) => {
        request({url: window.baseUrl + 'show'})
            .then(data => {
                let shows = JSON.parse(data);
                resolve(shows);
            })
            .catch(error => {
                console.log(error);
            });
    });
};

const getAllCategories = () => {
    return new Promise((resolve, reject) => {
        request({url: window.baseUrl + 'brand-categories'})
            .then(data => {
                let categories = JSON.parse(data);
                resolve(categories);
            })
            .catch(error => {
                console.log(error);
            });
    });
};


const getSingleExhibitor = (ID) => {
    return new Promise((resolve, reject) => {
        request({url: window.baseUrl + 'brands', params: `id=${ID}`})
            .then(data => {
                let exhibitor = JSON.parse(data);
                resolve(exhibitor);
            })
            .catch(error => {
                console.log(error);
            });
    });
};


const getLocationExhibitors = (ID) => {
    return new Promise((resolve, reject) => {
        request({url: window.baseUrl + 'brands', params: `shows[]=${ID}`})
            .then(data => {
                let exhibitors = JSON.parse(data);
                resolve(exhibitors);
            })
            .catch(error => {
                console.log(error);
            });
    });
};

module.exports = {
    getAllExhibitors: getAllExhibitors,
    getAllShows: getAllShows,
    getAllCategories: getAllCategories,
    getSingleExhibitor: getSingleExhibitor,
    getLocationExhibitors: getLocationExhibitors
};
