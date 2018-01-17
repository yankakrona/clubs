$(document).ready(function()
{
    $('[data-icheck]').iCheck({
        checkboxClass: 'icheckbox_flat-blue',
        radioClass: 'iradio_flat-blue',
        // increaseArea: '20%' // optional
    });
    var $contentWrapper = $('.content-wrapper');
    var $sidebars = $('.left-sidebar');
    var $window = $(window);
    var onWindowResize = function()
    {
        var navbarIsCollapsed = $(window).outerWidth() < 769;
        calculatedMinHeight = $(window).height() - 56;
        calculatedSidebarMinHeight = $contentWrapper.height() + (navbarIsCollapsed ? 112 : 56);
        $contentWrapper.css({minHeight: calculatedMinHeight + 'px'});
        $sidebars.css({minHeight: calculatedSidebarMinHeight + 'px'});
    };
    onWindowResize();

    $('.faqs-question-text').click(function()
    {
        $(this).siblings('.faqs-question-answer').fadeToggle(350);
        $(this).parent('.faqs-question').toggleClass('open');
    });

    $('#login-hidden').fadeIn(1150);

    $(window).resize(onWindowResize);
    $('[data-toggle-sidebar]').click(function()
    {
        if ($(window).width() < 769) {
            $('body').toggleClass('sidebar-open-sm');
        } else {
            $('body').toggleClass('sidebar-closed-md');
        }
    });
    $('[data-subnav-toggle]').click(function()
    {
        $(this).parent().toggleClass('open');
    });
});
