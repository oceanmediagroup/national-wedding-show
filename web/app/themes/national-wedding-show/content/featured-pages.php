<?php
/**
 * Created by PhpStorm.
 * User: Dominika
 * Date: 03/07/2018
 * Time: 11:06
 */ ?>

<section class="featured-pages">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col col-md-auto d-none d-md-block">
                <div class="button-group featured-pages__filters" id="filters">
                    <button data-filter="*" class="featured-pages__filter is-checked">Show all</button>
                    <?php
                        if( have_rows('post_grid_filters') ):
                            while ( have_rows('post_grid_filters') ) : the_row();
                                $filterName = get_sub_field('filter_name');
                                $filter = str_replace(" ", "-", str_replace(" & ", "-", strtolower($filterName)));
                                echo "<button class='featured-pages__filter' data-filter='.". $filter ."' class=''>". $filterName ."</button>";
                            endwhile;
                        endif;
                    ?>
                </div>
            </div>

            <div class="col col-md-auto d-block d-md-none filters-mobile">
                <span class="filters-mobile__title">Filter</span>
                <div class="select-style">
                    <select class="filter-group filters-select-dropdown" id="filtersSelect">
                        <option value="*">All</option>
                        <?php
                            if( have_rows('post_grid_filters') ):
                                while ( have_rows('post_grid_filters') ) : the_row();
                                    $filterName = get_sub_field('filter_name');
                                    $filter = str_replace(" ", "-", str_replace(" & ", "-", strtolower($filterName)));
                                    echo "<option value='.". $filter ."' class=''>". $filterName ."</option>";
                                endwhile;
                            endif;
                        ?>
                    </select>
                </div>
            </div>
        </div>

        <div class="featured-pages__cards grid justify-content-between" id="featuredPagesGrid">
            <div class="grid-sizer"></div>

            <?php
                if( have_rows('post_grid_posts') ):
                    while ( have_rows('post_grid_posts') ) : the_row();

                        $postID = get_sub_field('post');
                        $postQueryFilter = get_sub_field('query_post_by');
                        $postFilter = str_replace(" ", "-", str_replace(" & ", "-", strtolower($postQueryFilter)));

                        ?>
                        <div class="grid-item color-overlay-wrapper featured-pages__card <?php echo $postFilter ?>">
                            <a href="<?php echo get_the_permalink($postID) ?>">
                                <div class="featured-pages__card-img-wrapper lazy"
                                        data-bg="url('<?php echo get_the_post_thumbnail_url($postID, 'medium') ?>')">
                                    <span class="read-more">Read More</span>
                                    <span class="color-overlay"></span>
                                </div>
                                <h3 class="featured-pages__card-title coral">
                                    <?php echo get_the_title($postID) ?>
                                </h3>
                            </a>
                        </div>

                        <?php
                    endwhile;
                endif;
            ?>

        </div>
    </div>
</section>


<script defer src="https://unpkg.com/isotope-layout@3/dist/isotope.pkgd.min.js"></script>