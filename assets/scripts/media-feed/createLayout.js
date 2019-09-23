import textCard from './views/text-card-view';
import postCard from './views/post-card-view';
import tutorialCard from './views/tutorial-card-view';
import twitterCard from './views/twitter-card-view';
import instagramCard from './views/instagram-card-view';

const createLayout = async (dataArray) => {
    const layout = await new Promise((resolve, reject) => {
        let $layoutData = $('');

        let index = 0;

        dataArray.forEach(function (postTypeElements) {
            postTypeElements.forEach(function (card) {
                $layoutData = $layoutData.add(createCard(card, index));
                index++;
            });
        });

        resolve($layoutData);
    });

    return new Promise((resolve) => {
        Promise.all([layout]).then(values => {
            resolve(values);
        });
    });
};

const createCard = (card, index) => {
    if (card['type']) {
        switch (card['type']) {
            case "post" :
                return postCard(card);
            case "instagram" :
                return instagramCard(card, index);
            case "text" :
                return textCard(card);
            case "tutorial" :
                return tutorialCard(card);
        }
    } else {
        return twitterCard(card);
    }

    return null;
};


export default createLayout;