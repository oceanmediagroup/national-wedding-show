import * as API from './APIrequests';
import singleExhibitorLayout from './views/singleExhibitor';

const retrieveIdFromUrl = () => {
    return new Promise((resolve) => {
            resolve(window.document.location.pathname.split('/').filter(n => n)[1]);

        }
    );
};

const main = async () => {
    const ID = await retrieveIdFromUrl();

    await API.getSingleExhibitor(ID).then(data => {

        document.getElementById("exhibitorLayout").innerHTML = singleExhibitorLayout(data);
    });
};

main();