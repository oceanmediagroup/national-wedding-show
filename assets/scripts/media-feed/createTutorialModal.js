import tutorialModal from './views/tutorial-modal-view';

const createTutorialModal = async () => {
    const id = await getIDFromUrl();
    if (!id) return;


    if (!$('#tutorial-'+id).length) {
        const data = await getTutorialModal(id);

        let html = '';
        data.forEach(function (card) {
            html += tutorialModal(card);
        });

        document.getElementById("tutorialSingleModal").innerHTML = html;

    }
    
    $('#tutorial-'+id).modal('show');
};

function getTutorialModal(id) {
    return new Promise((resolve, reject) => {

        const wpajax_url = `${document.location.protocol}//${document.location.host}/wp-admin/admin-ajax.php?action=getSingleTutorial&id=${id}`;

        $.ajax({
            'method': 'get',
            'url': wpajax_url,
            'datatype': 'json',
            'cache': false,
            'success': function (data) {
                resolve(data ? JSON.parse(data) : null);
            },
            'error': function () {
                reject(console.log('something went wrong'));
            }
        });
    });
}


const getIDFromUrl = () => {
    return new Promise((resolve) => {
        const url = window.location.href;
        let regex = new RegExp('[?&]' + 'id' + '(=([^&]*)|&|$)'),
            results = regex.exec(url);

        if (!results) return null;

        if (!results[2]) return null;

        resolve(decodeURIComponent(results[2].replace(/\+/g, ' ')).split(','));
    });
};

export default createTutorialModal;