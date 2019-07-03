<div id="mainMenu" class="main-menu">
    <div class="header__menu-toggler">
        <div class="header__toggler-bar header__toggler-bar--top"></div>
        <div class="header__toggler-bar header__toggler-bar--middle"></div>
        <div class="header__toggler-bar header__toggler-bar--bottom"></div>
    </div>

    <div class="container">
        <nav class="main-menu__nav">

            <div class="row">
                <div class="col">
                    <div class="main-menu__header">
                        <a href="/"><img src="/assets/img/NWS_logo-01.svg" alt="The National Wedding Show Logo" class="main-menu__logo"></a>
                    </div>
                </div>
            </div>

            <div class="row main-menu__content">
                <div class="col-12 col-md-7 col-lg-3">
                    <?php main_menu_nav( array( 'theme_location' => 'main-menu') ); ?>
                    <?php main_menu_nav_mobile( array( 'theme_location' => 'main-menu-mobile') ); ?>
                    <div class="main-menu__social">
                        <?php get_template_part('template-parts/social-media-icons') ?>
                    </div>
                    <a href="https://weddingshow.seetickets.com" class="button button--light-coral button--book">Book tickets</a>
                </div>

                <div class="col-9 main-menu__cards-wrapper">
                    <div class="row">
                    <?php
                        if( have_rows('main-menu_cards', 'option') ):
                            while ( have_rows('main-menu_cards', 'option') ) : the_row();
                            ?>
                            <div class="main-menu__card-wrapper">
                                <div class="main-menu__card" style="background-image: url('<?php the_sub_field('image'); ?>')">
                                    <a href="<?php the_sub_field('link'); ?>" class="main-menu__card-link"></a>
                                    <p><?php the_sub_field('title'); ?></p>
                                </div>
                            </div>
                            <?php endwhile;
                        else :
                            // no rows found
                        endif;
                        ?>
                    </div>
                </div>
            </div>


            <div class="info-bar info-bar--mobile">
                <?php get_template_part('components/info-bar') ?>
            </div>

            <?php //main_menu_nav(); ?>
        </nav>
    </div>
    <div class="info-bar info-bar--desktop">
        <?php get_template_part('components/info-bar') ?>
     </div>

</div>
