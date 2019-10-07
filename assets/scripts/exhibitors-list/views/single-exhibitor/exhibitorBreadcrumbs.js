const exhibitorBreadcrumbs = (exhibitor) => {

    return `
        <section class="breadcrumbs">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div typeof="BreadcrumbList" vocab="http://schema.org/">
                            <a href="/">Home</a>
                            >
                            <a href="/exhibitor-list/">Exhibitor List</a>
                            >
                            <a href="">
                                <span class="post post-page current-item">${exhibitor[0][0].name}</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    `;
};

export default exhibitorBreadcrumbs;