<div class="header-menu w-100" id="headerMenu">
<div class="container-fluid">
        <div class="row">
            <div class="info-bar">
                <?php get_template_part('components/info-bar') ?>
            </div>
        </div>
    </div>
    <div class="container-fluid h-100">
        <nav class="nav header-menu__nav">
            <div class="row h-100 w-100 align-items-center header-menu__mobile">
                <div class="header__menu-toggler">
                    <div class="header__toggler-bar header__toggler-bar--top"></div>
                    <div class="header__toggler-bar header__toggler-bar--middle"></div>
                    <div class="header__toggler-bar header__toggler-bar--bottom"></div>
                </div>
                <a href="<?php echo get_home_url(); ?>" class="header-menu__link header-menu__link--home">HOME</a>
                <a href="https://weddingshow.seetickets.com"
                   class="button button--black button--book header-menu__book-mobile">BUY TICKETS</a>
            </div>

            <div class="row w-100 h-100 align-items-center header-menu__nav-wrapper">
            <!---
                <div class="header__menu-toggler">
                    <div class="header__toggler-bar header__toggler-bar--top"></div>
                    <div class="header__toggler-bar header__toggler-bar--middle"></div>
                    <div class="header__toggler-bar header__toggler-bar--bottom"></div>
                </div>--->
                <div class="col col-3 col--left h-100">
                    <div class="left-col-wrapper h-100">
                    <a href="<?php echo get_home_url(); ?>" class="header-menu__link header-menu__link--home">HOME</a>
                        
                    </div>
                </div>

               

                <div class="col col--right">
                    
                        <a data-toggle="collapse" id="locationsMenuDropdown" data-target="#locationsCollapse"
                            class="header-menu__link header-menu__link--dropdown">Locations</a>
                            <a href="<?php the_field('header_whats', 'option'); ?>" class="header-menu__link">What's
                                On</a>
                    <a href="<?php the_field('header_exhibit', 'option'); ?>" class="header-menu__link">Exhibitors</a>
                    <a href="<?php the_field('header_exhibit', 'option'); ?>" class="header-menu__link">Competitions</a>
                    <a href="<?php the_field('header_exhibit', 'option'); ?>" class="header-menu__link">Exhibit</a>
                  
                    <a href="https://weddingshow.seetickets.com" class="button--new-primary  header-menu__link">BOOK 
                            TICKETS</a>
                    <div class="btn-group">
                        
                            <!---
                        <a class="dropdown-toggle header-menu__link header-menu__link-dropdown" data-toggle="modal"
                                data-target="#socialModal">
                            Follow us
                        </a>--->
                    </div>
                </div>
            </div>

        </nav>
    </div>

    <?php get_template_part('template-parts/menu/locations-cards') ?>

    


    <!--    --><?php
    //    wp_nav_menu([
    //        'menu'            => 'header-menu',
    //        'theme_location'  => 'header-menu',
    //        'container'       => 'nav',
    //        'container_id'    => false,
    //        'container_class' => 'nav header-menu__menu',
    //        'menu_id'         => false,
    //        'menu_class'      => 'header-menu__links',
    //        'depth'           => 2,
    //        'fallback_cb'     => 'headerMenuWalker::fallback',
    //        'walker'          => new headerMenuWalker()
    //    ]);
    //    ?>

</div>

<div class="modal fade dropdown-menu dropdown-menu-right header-menu__social-panel" tabindex="-1" role="dialog"
     id="socialModal" aria-labelledby="socialModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <?php get_template_part('template-parts/header-social-media') ?>
            </div>
        </div>
    </div>
</div>