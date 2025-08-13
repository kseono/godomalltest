$(function(){
    if ($('#scroll_right, #scroll_left').length > 0) {
        $('#scroll_right, #scroll_left').gb_quick_menu({
            //HEADER_ID: '#header_warp'
        });
    }
    // top으로 이동
    $('.btn_scroll_top a').click(
        function() {
            $('html, body').stop().animate({scrollTop: $('body').offset().top}, 300);
            return false;
        }
    );
});

$(function(){
    /* 상단 메뉴 */
    $('.layer_type .sub_depth0 li').on({
        'mouseover':function(){
            $(this).find('> ul').stop(true,true).fadeIn('fast');
            $(this).find('> a').addClass('active');
            //console.log('open');
        },
        'mouseleave':function(){
            $(this).find('> ul').stop(true,true).fadeOut('fast');
            $(this).find('> a').removeClass('active');
            //console.log('hide');
        }
    });

    /* 우측 메뉴 버튼 */
    $('.gnb_right').on({
        'click':function(){
            var total = $('.depth0').size() - 1;
            $('.depth0').hide();
            $('.depth0').next().show();
            if($('.depth0').next().index() == total){
                $(this).find('a').addClass('active');
                $('.gnb_left').find('a').removeClass('active');
            }
        }
    });
    /* 좌측 메뉴 버튼 */
    $('.gnb_left').on({
        'click':function(){
            $('.depth0').hide();
            $('.depth0').prev().show();
            if($('.depth0').prev().index() == 0){
                $(this).find('a').addClass('active');
                $('.gnb_right').find('a').removeClass('active');
            }
        }
    });

    /* 해외몰 홈아이콘 타입 선택형(국기) */
    $('.top_country_list1 .country_tit').on({
        'click':function(){
            if($(this).parent().find('ul').css('display') =='none'){
                $(this).addClass('active');
                $(this).parent().find('ul').slideDown('fast');
            }else{
                $(this).parent().find('ul').slideUp('fast');
                $(this).removeClass('active');
            }
        }
    });

    /* 해외몰 홈아이콘 타입 선택형(국기,언어) */
    $('.top_country_list2 .country_tit').on({
        'click':function(){
            if($(this).parent().find('ul').css('display') =='none'){
                $(this).addClass('active');
                $(this).parent().find('ul').slideDown('fast');
            }else{
                $(this).parent().find('ul').slideUp('fast');
                $(this).removeClass('active');
            }
        }
    });

    /* location 경로 */
    $('.location_select').on({
        'mouseenter':function() {
            if ($(this).find('ul').css('display') == 'none') {
                $(this).find('.location_tit').addClass('active');
                $(this).find('ul').slideDown('fast');
            }
        },
        'mouseleave':function() {
            $(this).find('ul').slideUp('fast');
            $(this).find('.location_tit').removeClass('active');
        }
    });

    /* 상단 마이페이지 레이어 */
    $('.top_mypage_cont').on({
        'mouseenter':function(){
            if($(this).find('ul').css('display') =='none'){
                $(this).find('.top_mypage_tit').addClass('active');
                $(this).find('ul').show();
            }
        },
        'mouseleave':function(){
            $(this).find('ul').hide();
            $(this).find('.top_mypage_tit').removeClass('active');
        }
    });

    /* 상단 검색 */
    $('.top_search_cont input[name="keyword"]').on({
        'focus':function(){
            var sc_height = $(this).parents().find('.search_cont').innerHeight();
            $('.side_cont').css('padding-bottom', sc_height + 50 + 'px');
            $(this).parents().find('.search_cont').show();
        },
        'blur':function(){
            $('body').click(function(e){
                if (!$('.search_cont').has(e.target).length && e.target.name != 'keyword') {
                    $(this).parents().find('.search_cont').hide();
                    $('.side_cont').css('padding-bottom', '50px');
                }
            });
            $('.btn_top_search_close').click(function(){
                $(this).parents().find('.search_cont').hide();
                $('.side_cont').css('padding-bottom', '50px');
            });
        }
    });

    /* 레이어, 추가 내용 */
    $('.btn_common_box, .btn_layer').find('a').on({
        'click':function(e){
            var tg = $(this).attr('href');
            if(tg.substr(0, 1) == '#'){
                e.preventDefault();
                if($(tg).css('display') == 'none'){
                    $(tg).show();
                    $(tg).find('.ly_close').attr('href',tg);
                }else{
                    $(tg).hide();
                }
            }
        }
    });
    $('.ly_close').on({
        click:function(){
            var tg = $(this).attr('href');
            if (tg.substr(0, 1) == '#') {
                $(tg).hide();
            }

            if ($(this).parents('.js_password_layer').length) {
                $('.js_password_layer').find('input[name="writerPw"]').val('');
            }
        }
    });
});

$(document).ready(function() {
    /* 퀵검색 */
    var qs_id = $('#quick_search');
    var cname = qs_id.attr('class');
    var position, position_m;

    if(cname == 'q_left'){
        position = qs_id.innerWidth();
        qs_id.css('left','-'+position+'px');
    }else if(cname == 'q_right'){
        position = qs_id.innerWidth();
        qs_id.css('right','-'+position+'px');
    }else{
        $(window).load(function(){
            position = qs_id.innerHeight();
            qs_id.css('top','-'+position+'px');
        });
    }
    position_m = position;

    function gd_quick_motion(){
        if(cname == 'q_left'){
            if(qs_id.css('left') == '0px') position_m = '-'+ position;
            else position_m = 0;

            qs_id.animate({
                left : position_m
            }, 500, function(){
                //console.log(position_m);
            });
        }else if(cname =='q_right'){
            if(qs_id.css('right') == '0px') position_m = '-'+ position;
            else position_m = 0;

            qs_id.animate({
                right : position_m
            }, 500, function(){
                //console.log(position_m);
            });
        } else {
            if(qs_id.css('top') == '0px') position_m = '-'+ position;
            else position_m = 0;

            qs_id.animate({
                top : position_m
            }, 500, function(){
                //console.log(position_m);
            });

        }
        if(position_m == 0) $('.quick_search_cont').addClass('on');
        else $('.quick_search_cont').removeClass('on');
    }
    $('#quick_search .btn_quick_search_open, #quick_search .btn_quick_search_close').on({
        'click':function(){
            gd_quick_motion();
        }
    });

    /* 퀵검색 컬러 & 혜택조건 */
    $('.color_box span label, .benefit_box span label').on({
        'click':function(){
            if(!$(this).parent().find('input').is(':checked')) $(this).addClass('active');
            else $(this).removeClass('active');
        }
    });

    //스크롤 이동시 팝업 해제영역이 따라다니도록 이동
    $('.layer_pop .layer_layout_box').scroll(function(){
        var layer_top = $(this).scrollTop();
        var layer_content = $('.layer_content').innerHeight();
        var layer_bg_position =  layer_content - (layer_content - layer_top);
        $('.layer_layout_box .bg').css('top',layer_bg_position);
    });

    // 클릭 이벤트
    $('.layer_pop .bg, .layer_pop .btn_x').on('click',gd_layer_pop_open_close);

    // 전체보기
    $('.btn_all_menu_open').on('click',function(){
        gd_btn_all_menu_open_left();
    });


});

// 레이어박스 센터정렬 플러그인 (최상단)
jQuery.fn.center = function() {
    var top = ($(window).height() - this.outerHeight()) / 2;
    var left = ($(window).width() - this.outerWidth()) / 2;

    this.css({
        position:'absolute',
        margin:0,
        top: (top > 0 ? top : 0) + 'px',
        left: (left > 0 ? left : 0) + 'px'
    });

    return this;
};

// 레이어박스 센터정렬 플러그인 (현재위치)
jQuery.fn.currentCenter = function() {
    this.css({
        'position': 'fixed',
        'left': '50%',
        'top': '50%'
    });

    this.css({
        'margin-left': -this.outerWidth() / 2 + 'px',
        'margin-top': -this.outerHeight() / 2 + 'px'
    });

    return this;
};
/* 스크롤배너(오른쪽) */
(function (){
    $.fn.gb_quick_menu = function(options){
        //초기값
        var defaults = {
            HEADER_ID: '.scroll_wrap',
            FIXED_CLS: 'ban_fixed',
            FIXED_SIZE :1520,
            HEADER_WIDTH :1200,
            LEFT_QUICK_ID : '#scroll_left',
        };
        //초기값 옵션 배열 저장
        var options = $.extend({}, defaults, options);
        var el = $(this);
        var scqTop = 0;
        var scqLeft = 0;
        var quickTop = $(options.HEADER_ID).offset().top;
        //console.log(quickTop);
        $(window).on('resize scroll',function(){
            var h_height = $(options.HEADER_ID).height(); //헤더 높이
            scqTop = $(this).scrollTop();
            //console.log(scqTop);
            scqLeft = $(this).scrollLeft();
            if(scqTop <= quickTop){
                //상단에 붙어있을때 absolute
                el.removeClass(options.FIXED_CLS).removeAttr('style');
            }else{
                //상단에 떨어져있을때 fixed
                el.addClass(options.FIXED_CLS);
                left_scroll();
                right_scroll();
            }
        }),
            left_scroll = function(){
                var w_width = $(window).width();
                var manman = w_width - options.FIXED_SIZE;
                if(w_width <= options.FIXED_SIZE) $('#scroll_left').css({'left' : (-scqLeft+15) , 'margin-left' : 5}); //브라우져 창이 1450보다 작은 경우
                //if(w_width <= options.FIXED_SIZE) $('#scroll_left').left_animate($(options.LEFT_QUICK_ID).css('left')); //브라우져 창이 1450보다 작은 경우
                else $('#scroll_left').removeAttr('style'); //브라우져 창이 1450보다 큰 경우
            },
            right_scroll = function(){
                var w_width = $(window).width();
                var manman = w_width - options.FIXED_SIZE;
                if(w_width <= options.FIXED_SIZE){
                    $('#scroll_right').removeClass(options.FIXED_CLS).css({'top' : (scqTop-quickTop+20) });
                }else{
                    $('#scroll_right').css('top','');
                };

            }
    };
})(jQuery);


// 레이어 팝업
var gd_layer_pop_open_close = function(){
    if($('.layer_pop').css('display') == 'none') {
        $('.layer_pop').show();
        $('body').css('overflow','hidden');
        $('.layer_pop .layer_layout_box .bg').css('opacity','0.01');
        $('.layer_pop .layer_layout_box').scrollTop(0);
        gd_layer_position();
        gd_layer_pop_ajax();
    }else{
        $('.layer_pop').hide();
        $('body').css('overflow','');
    }
}
var gd_layer_pop_ajax = function(){
    //아작스 내용
}
// window 창 사이즈보다 작을시 위치값 계산
var gd_layer_position = function(){
    var layer_content_height = $('.layer_pop .layer_content').innerHeight();
    var layer_content_width = $('.layer_pop .layer_content').innerWidth();
    var layer_pop_height = $(window).innerHeight();
    var layer_pop_content_top, layer_pop_content_margin;
    if(layer_content_height < layer_pop_height) {
        layer_pop_content_top = '50%';
        layer_pop_content_margin = layer_content_height/2;
        $('.layer_pop .layer_content_box').css('padding','0');
    } else {
        layer_pop_content_top = '0';
        layer_pop_content_margin = '0';
        $('.layer_pop .layer_content_box').css('padding','100px 0');
    }
    $('.layer_pop .layer_container_box').css({
        'top': layer_pop_content_top,
        'marginTop': '-'+layer_pop_content_margin+'px',
        'marginLeft':'-'+(layer_content_width/2)+'px'
    });
}
//리사이즈시 해당 함수 호출
$(window).resize(gd_layer_position);


// 체크박스 처리 로직 초기화
function gd_init_checkbox_ui() {
    $(document).on('click', 'input[type=radio]', function(e){
        $(this).parents('form:first').find("input[name='" + $(this).prop("name") + "']").each(function() {
            if ($(this).prop("checked")) {
                $("label[for=" + $(this).attr("id") + "]").addClass("on");
            } else {
                $("label[for=" + $(this).attr("id") + "]").removeClass("on");
            }
        });
    });

    $(document).on('click', 'input[type=checkbox]', function(e){
        if($(this).prop('readonly') === false) {
            if($(this).prop("checked")) {
                $("label[for="+$(this).attr("id")+"]").addClass("on");
            } else {
                $("label[for="+$(this).attr("id")+"]").removeClass("on");
            }
        } else {
            e.preventDefault();
        }
    });
}

// 라디오박스,체크박스 이미지화 스크립트
function gd_trigger_checkbox_ui() {
    var $input = $('input[type=radio], input[type=checkbox]');
    // 템플릿에서 check 처리한 경우 예외처리 추가
    if(!$input.find('label.on')){
        $input.each(function(){
            var $item = $("label[for="+$(this).attr("id")+"]");
            if($(this).prop("checked")) {
                $item.addClass("on");
            } else {
                $item.removeClass("on");
            }
        });
    }
}

// 체크박스 전체 선택
function gd_checkbox_all() {
    // 체크박스 전체 선택 이벤트
    if ($(':checkbox.gd_checkbox_all').length > 0) {
        // 이벤트 중복 실행을 막아준다.
        $(':checkbox.gd_checkbox_all').off('click');
        $(':checkbox.gd_checkbox_all').click(function (e) {
            var $target = $(e.target);
            var targetName = $target.data('target-name');
            var targetId = $target.data('target-id');
            var targetFormName = $target.data('target-form');
            if (typeof targetFormName == 'undefined') targetFormName = "";
            if (_.isUndefined(targetId)) {
                $(targetFormName + ' :checkbox[name="' + targetName + '"]').prop('checked', !$target.prop('checked')).trigger('click');
            } else {
                $(targetFormName + ' :checkbox[id*="' + targetId + '"]').prop('checked', !$target.prop('checked')).trigger('click');
            }
        });
    }
}

// 레이어 박스 이벤트
function gd_center_layer(){
    //$('.btn_open_layer').off('click');
    $(document).on('click', '.btn_open_layer', function() {
        // @qnibus 레이어 안에 레이어가 있는 경우 종속된 보이지 않는 레이어가 이미 떠있는 레이어 기준으로 center 처리 되어 보여져 레이아웃이 깨짐
        $('.layer_wrap').removeAttr('style');
        $('body').css('overflow','hidden');
        var target = $(this).attr('href');
        $(target).removeClass('dn');
        $('#layerDim').removeClass('dn');
        $(target).find('> div').center();

        return false;
    });

    $(document).on('click', '.layer_wrap .layer_close, .btn_box .btn_cancel', function(){
        $(this).closest('.layer_wrap').addClass('dn');
        // 창이 2개 이상 떠있는 경우 Dim처리 안되게
        if (!$('.layer_wrap').is(':visible')) {
            $('#layerDim').addClass('dn');
            $('body').removeAttr('style');
        }
        return false;
    });
}

// 레이어 박스 창닫기 (현재 열려 있는 창만 닫는다)
function gd_close_layer() {
    if ($('.layer_wrap').is(':visible') || $('#layerDim').is(':visible')) {
        if ($('.layer_wrap .layer_close, .btn_box .btn_cancel').length > 0) {
            $('.layer_wrap .layer_close, .btn_box .btn_cancel').trigger('click');
        } else {
            // 딤만 떠있는 경우
            $('.layer_wrap').addClass('dn');
            $('#layerDim').addClass('dn');
        }
    }
}

// chosen 셀렉트 박스
function gd_select_remodeling(){
    var selector = '.chosen-select';
    var config = {
        disable_search_threshold: 10,
        no_results_text: __('검색결과가 없습니다.')
    };

    if ($(selector).length > 0) $(selector).chosen(config);
}

// 카트탭 레이어
function gd_carttab_layer() {
    $('.cart_tab_list li > a').on({
        'click':function() {
            if ($(this).hasClass('btn_alert_login') == false) {
                $('.btn_shop_cart_box .btn_shop_cart_close').show();
                $(this).parent().addClass('on').siblings().removeClass('on');
                $('#shop_cart_wrap .shop_cart_cont > .cart_tab_box').eq($(this).index()).fadeIn('fast').siblings().removeClass('on').hide();
                $('.shop_cart_cont').slideDown('fast');
                gd_cart_tab_action($(this).attr('href'));
            }
        }
    });

    $('.btn_shop_cart_box .btn_shop_cart_open, .btn_shop_cart_box .btn_shop_cart_close').on({
        'click':function() {
            if ($('.shop_cart_cont').css('display') != 'none') {
                $('.shop_cart_cont').slideUp('fast');
                $('.btn_shop_cart_box .btn_shop_cart_close').hide();
                $('.btn_shop_cart_box .btn_shop_cart_open').show();
                $('.cart_tab_list li').removeClass('on');
            } else {
                $('.cart_tab_list li').eq(0).addClass('on');
                $('.cart_tab_box').eq(0).addClass('on');
                $('.shop_cart_cont').slideDown('fast');
                $('.btn_shop_cart_box .btn_shop_cart_close').show();
                $('.btn_shop_cart_box .btn_shop_cart_open').hide();
                $('#shop_cart_wrap .shop_cart_cont > .cart_tab_box').hide().eq(0).fadeIn('fast');
                gd_cart_tab_action('#cart_tab_today');
            }

            $('.chart_view_horizontal ul').slick('reinit');
        }
    });
}

// 파일첨부 꾸미기
function gd_file_attach() {
    $(document).on('change', '.file_upload_sec .file', function(){
        var i = $(this).val();
        $('label[for=' + $(this).attr('id') + ']').find('.file_text').val(i);
    });
}

/*
 카테고리/브랜드 카테고리 마우스 오버
 */
function gd_menu_over() {

    $(document).on('mouseenter mouseleave', 'img.gd_menu_over', function (event) {
        $(this).attr({
            src: $(this).attr('data-other-src')
            , 'data-other-src': $(this).attr('src')
        });

    });

    $(document).on('mouseenter', 'span.gd_menu_over', function (event) {
        var width = $(this).closest("strong").width();
        var height = $(this).closest("strong").height() - 7;
        $(this).html("<img src='" + $(this).data('other-src') + "' style='max-width:" + width + "px;max-height:" + height + "px'>");

    });

    $(document).on('mouseleave', 'span.gd_menu_over', function (event) {
        $(this).html($(this).data('other-text'));
    });
}

function gd_btn_all_menu_open_left(){

    <!--{ ? !gGlobal.isFront }-->
    url = "/goods/goods_ps.php"
    <!--{ : }-->
    url = "../goods/goods_ps.php"
    <!--{ / }-->

    $.ajax({
        method: "POST",
        cache: false,
        url: url,
        data: "mode=get_all_category",
        success: function(data) {
            var getData = $.parseJSON(data);
            if(data =='false') {
                $(".gnb_allmenu_box").html('');
            }else{
                var addHtml = '<div id="layer_pop" class="layer_pop"><div class="layer_layout_box"><div class="bg"></div><div class="layer_container_box"><div class="layer_content_box"><div class="layer_content">';
                addHtml += '<div class="gnb_allmenu" style="display:none;"><div class="gnb_allmenu_box">'
                addHtml += '<ul>';
                $.each(getData, function (categoryKey, categoryVal) {
                    $.each(categoryVal, function (key, val) {
                        addHtml += '<li style="width:20%;"><div class="all_menu_cont"><a href="../goods/goods_list.php?cateCd='+val.cateCd+'">'+val.cateNm+'</a>';
                        if(val.children) {
                            addHtml += '<ul class="all_depth1">';
                            $.each(val.children, function (key1, val1) {
                                addHtml += '<li><a href="../goods/goods_list.php?cateCd='+val1.cateCd+'">'+val1.cateNm+'</a>';
                                if(val1.children) {
                                    addHtml += '<ul class="all_depth2">';
                                    $.each(val1.children, function (key2, val2) {
                                        addHtml += '<li><a href="../goods/goods_list.php?cateCd='+val2.cateCd+'">'+val2.cateNm+'</a>';
                                        if(val2.children) {
                                            addHtml += '<ul class="all_depth3">';
                                            $.each(val2.children, function (key3, val3) {
                                                addHtml += '<li><a href="../goods/goods_list.php?cateCd='+val3.cateCd+'">'+val3.cateNm+'</a></li>';
                                            });
                                            addHtml += '</ul>';
                                        }
                                        addHtml += '</li>';
                                    });
                                    addHtml += '</ul>';
                                }
                                addHtml += '</li>';
                            });
                            addHtml += '</ul>';
                        }
                        addHtml += '</div></li>';
                    });
                });
                addHtml += '</ul>';
                addHtml += '</div></div><span class="btn_all_menu_close" onClick="gd_layer_pop_open_close();">전체메뉴닫기</span></div></div></div></div></div>'
                $(".gnb_allmenu_wrap").html(addHtml);
                $('.gnb_allmenu').stop(true,true).slideDown('fast');

                setTimeout("gd_layer_pop_open_close()", 500);

            }
        },
        error: function (data) {
            alert(data.message);
        }
    });

}

// 함수 호출
$(document).ready(function() {
    gd_init_checkbox_ui();
    gd_trigger_checkbox_ui();
    gd_checkbox_all();
    gd_center_layer();
    gd_carttab_layer();
    gd_select_remodeling();
    gd_file_attach();
    gd_menu_over();
});
