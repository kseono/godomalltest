var page = 0;
var ele = $('<div />').attr('class', 'app_bandpush');

$(document).ready(function() {
    function swingUp() {
        var useFl = getBandwagonPushData();
        if (useFl === false) {
            return;
        }

        var _height =  '0';
        if($('.js-goods-view-buy-btn, .sticky-tab-nav').is(":visible")) {
            _height =  '75px';
        }

        $('.app_bandpush').animate({'bottom':_height},1000, swingDown).delay(5000);
    }
    function swingDown() {
        var _height = $('.app_bandpush').innerHeight() + 10;
        _height = '-'+_height;

        $('.app_bandpush').animate({'bottom':_height},1000,swingUp).delay(5000);
    }
    swingUp();

    setInterval(function(){
        pushPoint();
    },600);

    function pushPoint() {
        if($('.bandpush_text .bandpush_count .bandpush_point').hasClass('on')) {
            $('.bandpush_text .bandpush_count .bandpush_point').removeClass('on');
        }else{
            $('.bandpush_text .bandpush_count .bandpush_point').addClass('on');
        }
    }
});

var getBandwagonPushData = function(){
    var flag = true;
    $.ajax({
        type: 'POST',
        url: '../goods/bandwagon_push.php',
        data: {'mode': 'getData', 'page': page, 'goodsNo': $.urlParam('goodsNo')},
        async: false
    }).done(function(data) {
        ele.empty().append(data);
        ele.appendTo('body');
        page = $('input[name="bandwagon_push_page"]').val();
        if (!page) {
            flag = false;
        }
    });
    return flag;
};

$.urlParam = function(name){
    var results = new RegExp('[\?&]' + name + '=([^&#]*)').exec(window.location.href);
    if (results==null){
        return null;
    }
    else{
        return decodeURI(results[1]) || 0;
    }
}
