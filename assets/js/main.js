jQuery('document').ready(function($) {
    $('.menu-toggle').click(function() {
        $('.mobile-menu-sidebar').toggleClass('show');
    });

    $('.close-mobile-menu').click(function() {
        $('.mobile-menu-sidebar').removeClass('show');
    }); 
});