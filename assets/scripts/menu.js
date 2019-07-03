$(document).ready(function () {

    $('.header__menu-toggler').click(function () {
        $('.header__menu-toggler').toggleClass('opened');
        $('#mainMenu').toggleClass('main-menu--visible');
        $('header').toggleClass('menu-visible');

        console.log("toggling");
    });
    
    
    $('#locationsMenuDropdown').mouseenter(function () {
        $('#locationsCollapse').collapse('toggle');
    });

    $('.header-menu').mouseleave(function () {
        if ($('#locationsCollapse').hasClass('show')) {
            $('#locationsCollapse').collapse('toggle');
        }
    })


    /* $('#locationLink').click(function () {
        $('.header-menu__locations-tab').toggleClass('visible');
    });
 */
    /* $('#locationLink').mouseleave(function () {
        $('.header-menu__locations-tab').toggleClass('visible');
    }); */

});

function toggle() {
    $('.header__menu-toggler').toggleClass('opened');
    $('#mainMenu').toggleClass('main-menu--visible');
    $('header').toggleClass('menu-visible');
}

$(document).mouseup(function (e) {
    var container = $("#mainMenu");

    // if the target of the click isn't the container nor a descendant of the container
    if (!container.is(e.target) && container.has(e.target).length === 0 && $("#mainMenu.main-menu--visible").length) {
        toggle();

        console.log("was already visible");
    }
});


//adding class to <a> element in footer nav

var links = document.querySelectorAll('.footer__link-container a');
[].forEach.call(links, function (item) {
    item.classList.add('footer__link');
});

var subMenu = document.querySelectorAll('.main-menu__link ul');
[].forEach.call(subMenu, function (item) {
    item.classList.add('main-menu__secondary-links');
});


