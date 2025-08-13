/**
 * Created by LeeNamJu on 2015-11-03.
 */
var passwordListLayer = {
    element: $('.js-list-password-layer'),
    btnEl: $('.js-list-password-layer').find('.js-submit'),
    inputEl: $('.js-list-password-layer').find('input[name=writerPw]'),
    show: function () {
        this.element.removeClass('dn');
        $('#layerDim').removeClass('dn');
        $('html').addClass('oh-space');
        $('#scroll-left, #scroll-right').addClass('dim');
        $('.cite-layer .wrap div .text').focus();
    },
    close: function () {
        $('.cite-layer .close').trigger('click');
    }
}
