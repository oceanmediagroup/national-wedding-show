<?php
/**
 * Created by PhpStorm.
 * User: Dominika
 * Date: 06/08/2018
 * Time: 13:10
 */ ?>

<section class="inspiration-cards">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col col-md-auto">
                <div class="button-group featured-pages__filters d-none d-md-block" id="filters">
                    <button data-filter="*" class="featured-pages__filter is-checked">Show all</button>
                    <a href="/blog/" class="featured-pages__filter">Latest News</a>
                    <button data-filter=".at-the-show" class="featured-pages__filter">At the Show</button>
                    <button data-filter=".tutorial" class="featured-pages__filter">Videos</button>
                    <button data-filter=".twitter, .instagram" class="featured-pages__filter last">Get Social</button>
                </div>

                <div class="col col-md-auto d-block d-md-none filters-mobile">
                    <span class="filters-mobile__title">Filter</span>
                    <div class="select-style">
                        <select class="filter-group filters-select-dropdown" id="filtersMobile">
                            <option value="*">Show All</option>
                            <option value=".news" type="link" page="/blog/">Latest News</option>
                            <option value=".at-the-show">At the Show</option>
                            <option value=".tutorial">Videos</option>
                            <option value=".twitter, .instagram">Get Social</option>
                        </select>
                    </div>
                </div>

            </div>
        </div>

        <div class="inspirationCards grid" id="inspirationCards">
            <div class="grid-sizer"></div>
        </div>


        <div class="loading-gif">
<!--            <img src="/assets/img/S&T_Logo_penrose.svg" alt="" class="loading-gif__logo"/>-->
        </div>

        <div id="tutorialSingleModal"></div>

        <div class="row justify-content-center mt-4 mb-4">
            <button id="loadMoreMedia" class="button--light-coral button--light-solid exhibitor__link mt-4">SHOW MORE
            </button>
        </div>
    </div>
</section>

<script defer src="https://unpkg.com/isotope-layout@3/dist/isotope.pkgd.min.js"></script>