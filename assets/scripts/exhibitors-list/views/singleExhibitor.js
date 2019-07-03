import exhibitorHeader from './single-exhibitor/exhibitorHeader';
import exhibitorBreadcrumbs from './single-exhibitor/exhibitorBreadcrumbs';
import exhibitorDescription from './single-exhibitor/exhibitorDescription';
import exhibitorGallery from './single-exhibitor/exhibitorGallery';

const singleExhibitorLayout = (exhibitor) => {
    let html = '';

    html += exhibitorHeader(exhibitor);
    html += exhibitorBreadcrumbs(exhibitor);
    html += exhibitorDescription(exhibitor);
    html += exhibitorGallery(exhibitor);

    return html;
};

export default singleExhibitorLayout;