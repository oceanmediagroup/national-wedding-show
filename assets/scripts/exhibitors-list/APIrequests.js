// const getExhibitorsList = () => {
//     return new Promise((resolve, reject) => {
//         const ajax_url = `https://exhibitor.nationalweddingshow.co.uk/api/brands`;
//
//         // const xhr = new XMLHttpRequest();
//         // xhr.open("GET", ajax_url, true);
//         // xhr.setRequestHeader('Content-Type', 'application/json; charset=utf-8');
//         // xhr.onload = () => {
//         //     if (xhr.status >= 200 && xhr.status < 300) {
//         //         resolve(xhr.response);
//         //     } else {
//         //         reject(xhr.statusText);
//         //     }
//         // };
//         // xhr.onerror = () => reject(xhr.statusText);
//         // xhr.send();
//
//         // $.ajax({
//         //     crossDomain: true,
//         //     contentType: "application/json; charset=utf-8",
//         //     type: "GET",
//         //     url: ajax_url,
//         //     dataType: 'json',
//         //     success: function (data, status, xhr) {
//         //         console.log(data);
//         //         resolve(data ? JSON.parse(data) : null);
//         //     },
//         //     complete: function (xhr, status, error) {
//         //         if (xhr.status != 200) {
//         //             console.log(xhr.getResponseHeader('Location'));
//         //         }
//         //     },
//         //     error: function () {
//         //         reject(console.log('something went wrong'));
//         //     }
//         // });
//
//     });
// };
// getExhibitorsList();

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
        // console.log("GETTING ALL EXHIBITORS");

        request({url: "https://exhibitor.nationalweddingshow.co.uk/api/brands"})
            .then(data => {
                let exhibitors = JSON.parse(data);
                // console.log(employees);

                resolve(exhibitors);
            })
            .catch(error => {
                console.log(error);
            });
    });
};

const getAllShows = () => {
    return new Promise((resolve, reject) => {
        // console.log("GETTING ALL SHOWS");

        request({url: "https://exhibitor.nationalweddingshow.co.uk/api/show"})
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
        // console.log("GETTING ALL categories");

        request({url: "https://exhibitor.nationalweddingshow.co.uk/api/brand-categories"})
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
        // console.log("GETTING single exhibitor");

        request({url: "https://exhibitor.nationalweddingshow.co.uk/api/brands", params: `id=${ID}`})
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
        request({url: "https://exhibitor.nationalweddingshow.co.uk/api/brands", params: `shows[]=${ID}`})
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