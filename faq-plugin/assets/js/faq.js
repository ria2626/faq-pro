jQuery(document).ready(function ($) {
    const style = faq_toggle_style_vars.style || 'slide';

    $('.faq-answer').hide();
    $('.faq-question').on('click', function () {
        const answer = $(this).next('.faq-answer');
        if (style === 'fade') {
            answer.fadeToggle();
        } else {
            answer.slideToggle();
        }
    });
});
