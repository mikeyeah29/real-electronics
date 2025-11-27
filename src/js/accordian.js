
jQuery(document).ready(function ($) {
    $('.rwd-accordion-heading').on('click', function () {
        const $item = $(this).parent();

        if ($item.hasClass('active')) {
            // collapse current
            $item.removeClass('active').find('.content').slideUp(300);
        } else {
            // close all others
            $('.rwd-accordion-item.active')
                .removeClass('active')
                .find('.content')
                .slideUp(300);

            // open clicked one
            $item.addClass('active').find('.content').slideDown(300);
        }
    });
});