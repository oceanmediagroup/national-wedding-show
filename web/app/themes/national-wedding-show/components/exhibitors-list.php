<section class="exhibitor-list">
    <div class="container">
        <div class="row exhibitor-list__wrapper">

            <!-- LEFT COLUMN -->
            <div class="col-md-4">

                <h3 class="exhibitor-list__title exhibitor-list__title-top"
                    data-toggle="collapse"
                    data-target="#collapse-locations"
                    >
                    <span class="exhibitor-list__title-top__toggleall"
                        data-toggle="collapse"
                        data-target="#collapse-categories"
                        >Filter
                    </span>
                </h3>

                <h4 class="exhibitor-list__title d-none d-md-block">Location</h4>
                <div class="exhibitors-list__filter" id="locationFilters">
                </div>

                <h4 class="exhibitor-list__title d-none d-md-block">Categories</h4>
                <div class="exhibitors-list__filter" id="categoriesFilters">
                </div>

                <div class="button--light-rose light-weight" id="resetFilters">RESET OPTIONS</div>

            </div>

            <!-- RIGHT COLUMN -->
            <div class="col-md-8">

                <div id="exhibitors"></div>

            </div>
        </div>
    </div>
</section>
