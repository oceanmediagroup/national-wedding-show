$(document).ready(function () {
    $('body').on('submit', '.js-dotmailer-form', e => {
        const $form = $(e.currentTarget);
        const $captchaField = $form.find('.js-recaptcha-response');
        if ($captchaField.val().length > 1) {
            $form.removeClass('js-form-captcha-fail');
            $form.addClass('js-form-sent');
        } else {
            e.preventDefault();
            $form.addClass('js-form-captcha-fail');
        }
    });
});
