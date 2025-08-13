/**
 * This is commercial software, only users who have purchased a valid license
 * and accept to the terms of the License Agreement can install and use this
 * program.
 *
 * Do not edit or add to this file if you wish to upgrade Godomall5 to newer
 * versions in the future.
 *
 * 공용 스크립트 및 프로토타입 정의
 *
 * @copyright ⓒ 2016, NHN godo: Corp.
 * @link http://www.godo.co.kr
 */
// 멀티상점 변수 기본처리
if (typeof gdCurrencyDecimalFormat === 'undefined') {
    gdCurrencyDecimal = 0;
    gdCurrencyDecimalFormat = 0;
}

// IE9에서 console 객체가 없어 console 객체가 없는 경우 log로 사용하도록 처리
if (!window.console) console = {log: function() {}};

// IE8 이하에서 Array.indexOf 지원하지 않는 경우에 대한 대응
if (typeof Array.prototype.indexOf !== 'function') {
    Array.prototype.indexOf = function (ele) {
        return $.inArray(ele, this);
    };
}

// IE8 이하에서 String.trim 지원하지 않는 경우에 대한 대응
if (typeof String.prototype.trim !== 'function') {
    String.prototype.trim = function(){
        return $.trim(this);
    };
}

// @qnibus bugfix. toFixed 사용시 무조건 반올림 처리하는 부분으로 인해 고도몰5의 정책과 맞지 않아서 toFixed 대신 사용해야 함
if (typeof Number.prototype.toRealFixed !== 'function') {
    Number.prototype.toRealFixed = function (digits, format) {
        if (typeof digits === 'undefined') {
            digits = gdCurrencyDecimal;
        }
        if (typeof format === 'undefined') {
            format = gdCurrencyDecimalFormat;
        }

        _value = this.valueOf();
        if(/[9]{9}/g.test(_value)) _value = _value.toFixed(9);
        return numeral(Math.floor( _value * Math.pow(10, digits)) / Math.pow(10, digits)).format('0,' + format);
    };
}

/**
 * DOM 로드
 */
$(document).ready(function () {
    // ios에서만 제공되는 비표준 이벤트로 ios10에서 viewport가 작동되지 않는 버그 픽스 (메인만 적용 처리)
    $(document).on('gesturestart', function (event) {
        if (window.location.pathname == '/' || window.location.pathname == '/main/index.php') {
            event.preventDefault();
        }
    });

    // jQuery Validator 기본값 설정
    $.validator.setDefaults({
        onfocusout: false,
        onclick: false,
        onkeyup: false,
        errorPlacement: function (error, element) {
            // do nothing
        },
        invalidHandler: function (form, validator) {
            var errors = validator.numberOfInvalids();
            if (errors) {
                alert(validator.errorList[0].message);
                validator.errorList[0].element.focus();
            }
        },
        submitHandler: function (form) {
            form.submit();
        }
    });

    // 배송추적
    $(document).on('click', '.btn-delivery-trace', function(e) {
        e.preventDefault();
        make_layer_popup('../share/delivery_trace.php?invoiceCompanySno=' + $(this).data('invoice-company-sno') + '&invoiceNo=' + $(this).data('invoice-no'), __('배송추적'));
    });

    // 체크박스 전체 선택 이벤트
    if ($(':checkbox.gd_checkbox_all').length > 0) {
        $(':checkbox.gd_checkbox_all').click(function (e) {
            var $target = $(e.target);
            var targetName = $target.data('target-name');
            $(':checkbox[name="' + targetName + '"]').prop('checked', !$target.prop('checked')).trigger('click');
        });
    }

    // 체크박스 선택 시 라벨 클래스Add/Remove
    if ($(':checkbox.checkbox').length > 0) {
        $(':checkbox.checkbox').click(function (e) {
            var $target = $(e.target);
            var $label = $target.closest('p').find('label');
            if ($target.prop('checked')) {
                $label.addClass('on');
            } else {
                $label.removeClass('on');
            }
        });
    }

    if ($('button.btn-prev').length > 0) {
        $('button.btn-prev').click(function (e) {
            e.preventDefault();
            history.go(-1);
        });
    }

    if ($('a.btn-link-prev').length > 0) {
        $('a.btn-link-prev').click(function (e) {
            e.preventDefault();
            history.go(-1);
        });
    }

    if ($('.toggle-item').length > 0) {
        toggleItem();
    } // privacy toggle

    // Numeral 언어 정의
    // 랭귀지 폴더에서 스크립트 호출해서 로드 시켜야 함
    //numeral.language('fr', {
    //    delimiters: {
    //        thousands: ' ',
    //        decimal: ','
    //    },
    //    abbreviations: {
    //        thousand: 'k',
    //        million: 'm',
    //        billion: 'b',
    //        trillion: 't'
    //    },
    //    ordinal : function (number) {
    //        return number === 1 ? 'er' : 'ème';
    //    },
    //    currency: {
    //        symbol: '€'
    //    }
    //});
    //numeral.language('fr');

    /*
    $('img.gd_menu_over').bind('mouseenter mouseleave', function () {
        $(this).attr({
            src: $(this).attr('data-other-src')
            , 'data-other-src': $(this).attr('src')
        })
    }); */

    // sticky tab nav
    if ($('.sticky-tab-nav,.anchor').length) sticky_tab_nav();

    // hamburger button menu
    if ($('.hamburger-button').length) hamburger_button();
    if ($('.hamburger-gnb').length) hamburger_gnb();


    //사이드 메뉴
    $("ul.category li a.sub-icon").click(function (e) {
        var state = $(this).next('ul').is(':hidden');
        if ($(this).data('depth') == '1') $("ul.category ul").css('display', 'none');

        if($(this).next('ul').eq(0).is(':hidden'))  {
            if(state) $(this).next('ul').show();
        } else {
            $(this).next('ul').hide();
        }
    });

    $("ul.category li button").click(function (e) {
        if ($(this).data('key')) location.href = "../goods/goods_list.php?cateCd=" + $(this).data('key');
    });

    //브랜드 메뉴
    $("ul.brand li a.sub-icon").click(function (e) {
        var state = $(this).next('ul').is(':hidden');
        if ($(this).data('depth') == '1') $("ul.brandv ul").css('display', 'none');

        if($(this).next('ul').eq(0).is(':hidden'))  {
            if(state) $(this).next('ul').show();
        } else {
            $(this).next('ul').hide();
        }
    });

    $("ul.brand li button").click(function (e) {
        if ($(this).data('key')) location.href = "../goods/goods_list.php?brandCd=" + $(this).data('key');
    });

    // 탭 실행
    if ($('.tab-contents').length) {
        tab_contents();
    }

    // 복사 기능
    // https://github.com/zeroclipboard/zeroclipboard/blob/master/docs/api/ZeroClipboard.md
    if ($('.gd_clipboard').length) {
        var clipboard = new Clipboard('.gd_clipboard');
        clipboard.on('success', function (e) {
            var title = $(e.trigger).attr('title') == undefined ? '' : $(e.trigger).attr('title');
            alert(__('[%1$s] 정보를 클립보드에 복사했습니다.%2$sCtrl+V를 이용해서 사용하세요.', [title, '\n']));
            e.clearSelection();
        });
        clipboard.on('error', function (e) {
            console.error('Action:', e.action);
            console.error('Trigger:', e.trigger);
        });
    }

    //검색어
    $("#frmSearchTop").validate({
        submitHandler: function (form) {
            if ($("#frmSearchTop input[name='adUrl']").val() && $("#frmSearchTop input[name='keyword']").val() == '') document.location.href = $("#frmSearchTop input[name='adUrl']").val();
            else form.submit();
        },
        rules: {
            keyword: {
                required: function () {

                    if ($("#frmSearchTop input[name='adUrl']").val()) {
                        return false;
                    }
                    else {
                        return true;
                    }
                }
            }
        },
        messages: {
            keyword: {
                required: __('검색어를 입력하세요.')
            }
        }
    });

    // 최근 검색어
    $('.search_bx').click(function(){
        var index = $(this).index('.search_bx_area .search_bx');

        $('.search_bx').removeClass('on');
        $(this).addClass('on');

        $('.srlst_bx_area').addClass('dn');
        $('.srlst_bx_area:eq(' + index + ')').removeClass('dn');
    });

    // 즐겨찾기 (안드로이드 계열인 경우만 즐겨찾기 보이고 나머지 제거)
    if ($('.js-add-favorite').length > 0) {
        if (/Android/i.test(navigator.userAgent) === true) {
            $('.js-add-favorite').show();
            // 데이터 타이틀에 클릭 엘리먼트에 data-title="{=gMall.companyNm}" 이걸 넣어줄 것
            $('.js-add-favorite').click(function(e) {
                e.preventDefault();
                addFavoriteLauncher($(this).data('title'));
            });
        } else {
            $('.js-add-favorite').remove();
        }
    }


    // 미확인 입금자 팝업
    $('#ghostDepositorBanner').click(function (e) {
        var url = '/service/ghost_depositor.php';
        $('#popupGhostDepositor').modal({
            remote: url,
            cache: false,
            type : 'GET',
            show: true
        });
    });
});

/**
 * 동적 스크립트 바인딩 (스크립트 로딩 후 메서드 실행되도록 처리)
 *
 * @author Jong-tae Ahn
 * @param number
 * @param places
 * @param symbol
 * @param thousand
 * @param decimal
 * @returns {string}
 */
function add_script(url, callback) {
    var done = false; // 스크립트 로딩 여부
    var head = document.getElementsByTagName("head")[0] || document.documentElement;
    var script = document.createElement("script");

    script.charset = 'UTF-8';
    script.src = url;
    script.onload = script.onreadystatechange = function () {
        if (!done && (!this.readyState || this.readyState === "loaded" || this.readyState === "complete")) {
            done = true;
            callback();

            // IE에서 메모리 누수 방지를 위한 처리
            script.onload = script.onreadystatechange = null;
            if (head && script.parentNode) {
                head.removeChild(script);
            }
        }
    };

    // Use insertBefore instead of appendChild  to circumvent an IE6 bug.
    // This arises when a base node is used (#2709 and #4378).
    head.insertBefore(script, head.firstChild);
}

/**
 *
 */
function tab_contents() {
    var tabW = '.tab-section',
        tabB = '.tab-btns',
        tabC = '.tab-content1';

    $(tabB + ' a').on('click', function (e) {
        e.preventDefault();
        tab_hash($(this).attr('href'));

        $(this).parents(tabW).find('.active').removeClass('active');
        $(this).parent().addClass('active');
    });

    function tab_hash(h) {
        var $myTab = $(h);
        if ($myTab.length != 0) {
            $(tabC).removeClass('show');
            $myTab.addClass('show');
        }
    }

    $(tabB).find('.tab-btn:eq(0) a').trigger('click');
}

/**
 * 테스트 진행중
 *
 * @author Jong-tae Ahn
 * @param number
 * @param places
 * @param symbol
 * @param thousand
 * @param decimal
 * @returns {string}
 */
function money_format(number, places, symbol, thousand, decimal) {
    number = number || 0;
    places = !isNaN(places = Math.abs(places)) ? places : 2;
    symbol = symbol !== undefined ? symbol : "$";
    thousand = thousand || ",";
    decimal = decimal || ".";
    var negative = number < 0 ? "-" : "",
        i = parseInt(number = Math.abs(+number || 0).toFixed(places), 10) + "",
        j = (j = i.length) > 3 ? j % 3 : 0;
    return symbol + negative + (j ? i.substr(0, j) + thousand : "") + i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + thousand) + (places ? decimal + Math.abs(number - i).toFixed(places).slice(2) : "");
}

/**
 * 메일 도메인 선택
 */
function select_email_domain(name,select) {
    if (typeof select === 'undefined') {
        select = 'emailDomain';
    }
    var $email = $(':text[name=' + name + ']');
    var $emailDomain = $('select[id='+select+']');
    $emailDomain.on('change', function (e) {
        var emailValue = $email.val();
        var indexOf = emailValue.indexOf('@');
        if (indexOf == -1) {
            if ($emailDomain.val() === 'self') {
                $email.val(emailValue + '@');
            } else {
                $email.val(emailValue + '@' + $emailDomain.val());
            }
            $email.trigger('focusout');
        } else {
            if ($emailDomain.val() == 'self') {
                $email.val(emailValue.substring(0, indexOf + 1));
                $email.focus();
            } else {
                $email.val(emailValue.substring(0, indexOf + 1) + $emailDomain.val());
                $email.trigger('focusout');
            }
        }
    });
}

/**
 * 팝업창 Cookie 컨트롤
 * @param string name 팝업창 이름 (코드_창종류)
 * @param object elemnt elemnt
 * @return
 */
function popup_cookie(name, elemnt) {
    if (elemnt.checked === true) {
        $.cookie(name, 'true', {path: '/', expires: 1});
        var popupKind = name.split('_');
        if (popupKind[1] == 'window') {
            setTimeout('self.close()');
        } else {
            setTimeout("$('#" + name + "').hide()");
        }
    } else {
        $.cookie(name, null);
    }
    return;
}

/**
 * 윈도우팝업 호출
 * @param array options 창정보
 * @return object Window 개체
 */
function popup(options) {
    if (!options.width) options.width = 500;
    if (!options.height) options.height = 415;
    var status = new Array();
    $.each(options, function (i, v) {
        if ($.inArray(i, ['url', 'target']) == '-1') {
            status.push(i + '=' + v);
        }
    });
    var status = status.join(',');
    var win = window.open(options.url, options.target, status);
    return win;
}

/**
 * 통신판매사업자 상세조회창
 * @param string businessNo 사업자 번호
 * @return
 */
function popup_bizInfo(businessNo) {
    var url = 'http://www.ftc.go.kr/info/bizinfo/communicationViewPopup.jsp?wrkr_no=' + businessNo;
    var win = popup({
        url: url
        , target: 'communicationViewPopup'
        , width: 750
        , height: 700
        , resizable: 'no'
        , scrollbars: 'no'
    });
    win.focus();
    return win;
}

/**
 * 메일 보내기
 * @param string toMail 메일대상자
 * @param string subject 메일 제목
 * @return
 */
function popup_email(toMail, subject) {
    if (typeof toMail === 'undefined') {
        return;
    }

    if (typeof subject === 'undefined') {
        subject = __('문의드립니다.');
    }

    location.href = 'mailto:' + toMail + '?subject=' + subject;
}

/**
 * 도로명 주소 찾기 (팝업)
 *
 * @author artherot
 * @param string zoneCodeID zonecode input ID
 * @param string addrID address input ID
 * @param string zipCodeID zipcode input ID
 */
function postcode_search(zoneCodeID, addrID, zipCodeID) {
    var url = '../share/postcode_search.php?zoneCodeID=' + zoneCodeID + '&addrID=' + addrID + '&zipCodeID=' + zipCodeID + '&top=' + $(window).scrollTop();
    make_layer_popup(url, '');
}

/**
 * 모달창 안에서 별도의 모달을 띄우는 경우 사용해야 하며
 * 본창에서 모달을 띄우는 경우 modalEffect.js를 이용해서 처리해야 합니다.
 *
 * @param url
 * @param title
 */
function make_layer_popup(url, title){
    var checkedVal = url.indexOf('cpid=kcp_'); // kcp 본인인증창인지 확인하기 위한 값
    var height = $('body').prop('scrollHeight');
    var fontSize = url ? 20 : 28;
    var _height = url ? 42 : 50;
    var margin = url ? 0 : '10px 0 0 0';
    var padding = 0;
    if (title) {
        padding = '42px 0 0 0';
    }
    if (!$('#layerSearch').length) {
        $('<div>', {
            css: {
                position: 'absolute',
                top: '0',
                left: '0',
                width: '100%',
                zIndex: '1001'
            },
            id: 'layerSearch'
        }).appendTo('body');
    }
    $('<div>', {
        css: {
            position: 'absolute',
            top: '0',
            left: '0',
            width: '100%',
            height: height + 'px',
            background: '#fff'
        },
        id: 'layerSearchArea'
    }).appendTo('#layerSearch');

    $('<div>', {
        css: {
            width: '100%',
            height: '100%',
            background: '#fff'
        },
        id: 'layerSearchInner'
    }).appendTo('#layerSearchArea')

    $('<iframe>', {
        css: {
            width: '100%',
            overflow: 'scroll',
            background: '#fff',
            padding: padding,
            height: '100%'
        },
        id: 'layerSearchFrame',
        name: 'layerSearchFrame',
        src: url,
        frameborder: 0
    }).appendTo('#layerSearchInner');
    if (title) {
        $('<div>', {
            class: 'ly_head',
            css: {
                height: _height + 'px',
            }
        }).appendTo('#layerSearch');

        $('<h1>', {
            html: title,
            class: 'h_tit elp',
            css: {
                'font-size': fontSize + 'px',
                'margin': margin
            }
        }).appendTo('#layerSearch .ly_head');

        if (checkedVal == -1) {
            $('<button>', {
                type: 'button',
                html: '<span class="sp">' + __('닫기') + '</span>',
                css: {
                    position: 'absolute',
                    top: 0,
                    right: 0,
                    padding: '14px 9px 13px 20px'
                },
                class: 'bn_cls v2 lys_btn_close',
                onclick: 'layerSearchClose()'
            }).appendTo('#layerSearch .ly_head');
        } else {
            $('<button>', {
                type: 'button',
                html: '<span class="sp">' + __('닫기') + '</span>',
                css: {
                    position: 'absolute',
                    top: 0,
                    right: 0,
                    padding: '14px 9px 13px 20px'
                },
                class: 'bn_cls v2 lys_btn_close',
                onclick: 'layerCancelConfirm()'
            }).appendTo('#layerSearch .ly_head');
        }
    }

    $('html, body').scrollTop(0);
}

function layerSearchClose()
{
    $("meta[name='viewport']").attr({"content":"user-scalable=yes, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, width=device-width"});
    $('#layerSearch').remove();

    // 마이앱 추가
    if ($("input[name='isMyapp']").val() && $(".adult-wrap").css('display') == 'none') {
        parent.location.reload();
    }
}

function layerCancelConfirm()
{
    if ( !confirm("인증을 취소하시겠습니까?") ) {
        return false;
    } else {
        $("meta[name='viewport']").attr({"content":"user-scalable=yes, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, width=device-width"});
        $('#layerSearch').remove();

        // 마이앱 추가
        if ($("input[name='isMyapp']").val() && $(".adult-wrap").css('display') == 'none') {
            parent.location.reload();
        }
    }
}

function frameCheck(){
    return $('#layerSearchFrame').length;
}

/**
 * 배송추적
 *
 * @author artherot
 * @param string invoiceCompanySno 택배사 코드
 * @param string invoiceNo 송장번호
 */
function delivery_trace(invoiceCompanySno, invoiceNo)
{
    win = popup({
        url: '../share/delivery_trace.php?invoiceCompanySno=' + invoiceCompanySno + '&invoiceNo=' + invoiceNo,
        target: 'trace',
        width: 650,
        height: 660,
        resizable: 'yes',
        scrollbars: 'yes'
    });
    win.focus();
    return win;
}

/**
 * 쿼리스트링값 찾기
 * @param query
 * @param variable
 * @returns {string}
 */
function getQueryVariable(query, variable) {
    var vars = query.split('&');
    for (var i = 0; i < vars.length; i++) {
        var pair = vars[i].split('=');
        if (decodeURIComponent(pair[0]) == variable) {
            return decodeURIComponent(pair[1]);
        }
    }
    console.log('Query variable %s not found', variable);
}

/**
 * 스트링 치환 메소드
 * @returns {String}
 */
String.prototype.format = function () {
    var formatted = this;
    for (var arg in arguments) {
        formatted = formatted.replace("{" + arg + "}", arguments[arg]);
    }
    return formatted;
};

function resize_frame(obj) {
    var iframeHeight =
        (obj).contentWindow.document.body.clientHeight;
    (obj).height = iframeHeight + 80;

}

function sticky_tab_nav() { // view page sticky button
    var gnbH = $('.gnb').height();
    var stickNav = $('.sticky-tab-nav,.anchor');
    $(window).scroll(function () {
        if ($(window).scrollTop() < gnbH) {
            stickNav.fadeOut('fast', function () {
                $('.sticky-top').removeClass('on')
            });
        } else {
            stickNav.fadeIn('fast');
        }
    })
    stickNav.find('a').bind('click', function (event) {
        event.preventDefault();
        if ($(this).closest('div').attr('class').indexOf('sticky') >= 0) {
            var tabTop = $('.tab-area').offset().top;
            // var buyTop = $('.buyaction').offset().top;
        }
        var jsclass = $(this).attr('href');
        switch (jsclass) {
            case '#top' :
                tabTop = 0;
                break;
            // case '#buy' : tabTop = buyTop;
            case '#buy' :
                return false;
                break;
            default :
                break;
        }
        $('.sticky-top').addClass('on');
        $('body').animate({
            scrollTop: tabTop
        }, 150);
    });
}

function hamburger_button() {
    function e() {
        var e = false;
        (function (t) {
            if (
                /(android|ipad|playbook|silk|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i.test(t) ||
                /1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(t.substr(0, 4))) e = true
        })(navigator.userAgent || navigator.vendor ||
            window.opera);
        return e
    }

    // i = e() ? "touchend" : "click";
    // $('.js-navtoggle').bind(i,function(){
    $('.js-nav-toggle').bind('click', function () {
        if (navigator.userAgent.match(/Android/i)) {
            window.scrollTo(0, 1);
        }
        var gnb = $('.hamburger-contents');
        var gnbbg = $('.hamburger-bg');
        var gnbclosebtn = $('.hamburger-close');
        // gnb.css('min-height',$(document).height()+'px');
        // $('.hamburger-contents, .hamburger-bg').css('min-height',$(document).height()+'px');
        if ($('body').is('.hamburger-open')) {
            $('body').removeClass('hamburger-open');
            // $(document).bind('touchmove',function(e){
            // 	e.preventDefault();
            // });
            $('.hamburger-contents').bind('touchmove', function (e) {
                e.stopPropagation();
            });
            // $('html,body').css('overflow','hidden');
        } else {

            $('body').addClass('hamburger-open');
            // $('html,body').css('overflow','auto');
            // $(document).unbind('touchmove');
        }
    });
}

function hamburger_gnb() {
    showCateMenu($('#category-menu'), '');

    var dep1length = $('.dep1>li').length;
    var onoffbtn = '<button type="button" class="btn-reset gnb-arr" ><span class="icon-arr2"></span></button>';

    for (var i = 0; i < dep1length - 1; i++) {
        var self = $('.dep1>li').eq(i);
        var selfDep2 = self.find('.dep2');
        if (selfDep2.length > 0) {
            self.prepend(onoffbtn);
        }
    }

    $('.hamburger-gnb .dep1.wideNav>li').bind('click', function () {
        $('.wideNav').toggleClass('wideNavHide');
    });

    $('.hamburger-gnb .gnb-arr , #brand-menu,#category-menu,.hamburger-gnb .dep1 .board-nav a, .hamburger-gnb .dep1 .board-nav button').bind('click', function (e) {
        var currentItem = $(this.parentNode);
        var self = $(this);
        togglenav(self, currentItem);
    });

    function onoffclass(state, self) {
        self.parent().siblings('li').find('> button,.open').removeClass('block');
        self[0].tagName == 'A' ? self.prev().addClass(state) : self.addClass(state); // a태그 일 때는 this.parent , 아니면 본인 (button)
        // self[0].tagName == 'A' ? alert(1) : alert(2);
        if (self.parent('.on').length == 0) {
            self.parent().find('> button,.open').removeClass('block');
        }
    }
}

function showCateMenu(aTag, now_cate) {
    var menuBox = $(aTag).parent();
    var self = $(aTag);
    if (menuBox.find('ul').length <= 0) {
        var depth = (now_cate.length / 3 + 1);
        var data_param;
        data_param = "mode=get_category";
        data_param += "&now_cate=" + now_cate;
        /*
         try {
         $.ajax({
         type: "post",
         url: "/proc/mAjaxAction.php",
         cache:false,
         async:false,
         data: data_param,
         success: function (res) {
         if (res.child_res != null) {
         if (res.child_res.length > 0) {
         makeCateList2(res.child_res, menuBox, depth, self);
         }
         }
         },
         dataType:'json'
         });
         }
         catch(e) {
         alert(e);
         }
         */
    }
    togglenav(self, menuBox);
}

function togglenav(self, currentItem) {
    if (self.siblings('ul').length > 0) {
        if (self.parent('.on').length > 0) { // 열린 상태(자신)
            currentItem.find('>ul').hide();
            currentItem.find('>button').removeClass('block');
            currentItem.removeClass('on');
            currentItem.find('>a .icon-plus1').removeClass('open');
        } else { // 닫힌 상태(자신+이외)
            currentItem.siblings('li').find('>ul').hide();
            currentItem.siblings('li').find('> button,.open').removeClass('block');
            currentItem.siblings('li').find('>a .icon-plus1').removeClass('open');
            currentItem.siblings('li').removeClass('on');
            currentItem.find('>a .icon-plus1').addClass('open');
            currentItem.find('>ul').show();
            currentItem.find('>button').addClass('block');
            currentItem.addClass('on');
        }
        //event.preventDefault();
    }
}

/*
 * 회원 가입 약관 이벤트
 */
function toggleItem() {
    $('.privacy-item.toggle-item').addClass('toggle-open');
    $('.toggle-item .toggle-switch').on('click', function () {
        if ($(this).parent().parent().parent().is('.toggle-open')) {
            $(this).parent().parent().parent().removeClass('toggle-open');
            $(this).text(__('내용닫기') + ' ▲');
        } else {
            $(this).parent().parent().parent().addClass('toggle-open');
            $(this).text(__('내용보기') + ' ▼');
        }
    });
}

/**
 * 네이버앱을 이용한 안드로이드 전용
 * 바탕화면 즐겨찾기 추가하기
 *
 * @see 211 line
 * @param title 즐겨찾기 제목
 * @author Jong-tae Ahn <qnibus@godo.co.kr>
 * @document https://developers.naver.com/docs/utils/mobileapp
 */
function addFavoriteLauncher(title) {
    // 안드로이드가 아닌 경우 실행하지 않는다.
    if (!/Android/i.test(navigator.userAgent)) {
        return false;
    }

    // 홈버튼 추가에 필요한 설정 초기화
    var favoriteData = {
        iframe: $('#ifrmAddFavoriteLauncher'),
        defaultIconName: 'defaultShopIcon.png',
        title: encodeURI(title),
        code: 'nstore',
        icon: '',
    };

    // link의 아이폰 아이콘 url 가져오기
    $('link').each(function(idx){
        if ($(this).prop('rel') === 'apple-touch-icon-precomposed') {
            // prop으로 href를 가져오는 경우 fullurl을 가져오며 https인 경우 http로 전환시킨다.
            favoriteData.icon = $(this).prop('href').replace('https', 'http');
            return false;
        }
    });

    // 아이콘이 없는 경우 네이버앱에서 메시지 없이 오류가 발생하기 때문에 반드시 아이콘 URL을 넣어 처리해야 한다.
    if (favoriteData.icon !== '') {
        // 앱설치 페이지 혹은 바탕화면 추가하기 (기획에 요청해서 메시지 변경하기)
        alert(__('%1$s을(를) 홈화면에 추가합니다.%2$s네이버앱이 없는 고객님께서는 네이버앱 설치페이지로 이동됩니다.', [decodeURI(favoriteData.title), '\n\n']));

        // 네이버앱 연결 url scheme (Intent로 하지 않는 경우 네이버 앱이 없을때 자동으로 이동하지 않는다)
        // var scheme = 'naversearchapp://addshortcut?url=' + encodeURI(document.domain) + '&icon=' + favoriteData.icon + '&title=' + favoriteData.title + '&serviceCode=' + favoriteData.code + '&version=7';
        var scheme = 'intent://addshortcut?url=' + encodeURI(gdGlobalHomeUri) + '&icon=' + favoriteData.icon + '&title=' + favoriteData.title + '&serviceCode=' + favoriteData.code + '&version=7#Intent;scheme=naversearchapp;action=android.intent.action.VIEW;category=android.intent.category.BROWSABLE;package=com.nhn.android.search;end';

        if (favoriteData.iframe.length > 0) {
            favoriteData.iframe.attr('src', scheme);
        } else {
            location.href = scheme;
        }
    }
}

/**
 회원 가입 생일/결혼기념일 날짜 설정
 */
$.fn.initSelectDateFormat = function () {
    var years, months, days, yearsHtml, monthsHtml, daysHtml;
    years = this;
    months = this.next('select');
    days = months.next('select');

    yearsHtml = [];
    if (years.length < 1) {
        return;
    }
    var fullYear = new Date().getFullYear();
    for (var y = 1900; y <= fullYear; y++) {
        yearsHtml[y] = '<option value="' + y + '">' + y + '</option>';
    }
    years.append(yearsHtml.join(''));
    if (months.length > 0) {
        monthsHtml = [];
        for (var m = 1; m < 13; m++) {
            monthsHtml[m] = '<option value="' + m + '">' + m + '</option>';
        }
        months.append(monthsHtml.join(''));
    }

    if (days.length > 0) {
        $(years, 'body').change(function () {
            updateNumberOfDays();
        }).trigger('change');
        $(months, 'body').change(function () {
            updateNumberOfDays();
        }).trigger('change');
    }

    function updateNumberOfDays() {
        days.html('');
        var daysDate = new Date(years.val(), months.val(), 0).getDate();
        daysHtml = [];
        for (var d = 1; d < daysDate + 1; d++) {
            daysHtml[d] = '<option value="' + d + '">' + d + '</option>';
        }
        days.append(daysHtml.join(''));
    }
};

/**
 * PG 관련 영수증 보기
 *
 * @param modeStr string 카드, 현금 영수증 종류 (card, bank, vbank, cash)
 * @param orderNo string 주문 번호
 */
function pg_receipt_view(modeStr, orderNo) {
    let preWidth = 300, preHeight = 500, prePopupData = {
        url: 'about:blank',
        target: 'show_receipt',
        width: preWidth,
        height: preHeight
    }, show_receipt = pg_receipt_popup(prePopupData);

    // 각 PG별 영수증 팝업창
    $.post('../share/show_receipt.php', {
        mode: modeStr,
        orderNo: orderNo
    }, function (data) {
        const infoData = data;
        if (typeof infoData.error == 'undefined') {
            show_receipt.location.href = infoData.url;
        } else {
            alert(infoData.error);
            show_receipt.close();
        }
    }, 'json');
}

/**
 * PG 영수증 팝업
 * @param options 팝업 노출 정보
 */
function pg_receipt_popup(options) {
    if (!options.width) options.width = 500;
    if (!options.height) options.height = 415;
    let status = [];
    $.each(options, function (i, v) {
        if ($.inArray(i, ['url', 'target']) === -1) {
            status.push(i + '=' + v);
        }
    });
    status = status.join(',');
    return window.open(options.url, options.target, status);
}

/**
 * 회원다운로드 쿠폰 링크 다운 받기
 *
 * @param couponNo
 */
function couponLinkDown(couponNo) {
    var params = {
        mode: "couponDownLink",
        couponCode: couponNo
    };
    $.ajax({
        method: "POST",
        async: false,
        cache: false,
        url: "../mypage/coupon_link_down.php",
        data: params,
        success: function (data) {
            result = JSON.parse(data);
            alert(result['msg']);
            if (result['code'] == '0') {
                document.location.href = "/member/login.php";
            }
        },
        error: function (data) {
            alert(result['msg']);
        }
    });
}

/**
 * 비회원 개인정보 수집항목 동의 링크
 */
function redirectCollectionAgree(){
    window.open('../service/private.php');
}

/*** 스토리지 지원 여부 ***/
function supports_html5_storage() {
    try {
        return 'localStorage' in window && window['localStorage'] !== null;
    } catch (e) {
        return false;
    }
}

/*** 세션 스토리지 저장 ***/
function saveSession(control_key, control_value) {
    if (!supports_html5_storage()) {
        createCookie(control_key, control_value, 7);
    } else {
        sessionStorage[control_key] = control_value;
    }
};

/*** 세션 스토리지 로드 ***/
function loadSession(control_key) {
    var control_value;
    if (!supports_html5_storage()) {
        control_value = readCookie(control_key);
    } else {
        control_value = sessionStorage[control_key];
    }
    return control_value;
};

/*** 로컬 스토리지 저장 ***/
function saveVal(control_key, control_value) {
    if (!supports_html5_storage()) {
        createCookie(control_key, control_value, 7);
    } else {
        localStorage.setItem(control_key, control_value);
    }
};

/*** 로컬 스토리지 로드 ***/
function loadVal(control_key) {
    var control_value;
    if (!supports_html5_storage()) {
        control_value = readCookie(control_key);
    } else {
        control_value = localStorage.getItem(control_key);
    }
    return control_value;
};

/*** 쿠키 생성 ***/
function createCookie(name, value, days) {
    if (days) {
        var date = new Date();
        date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
        var expires = "; expires=" + date.toGMTString();
    } else
        var expires = "";
    document.cookie = name + "=" + value  + "; path=/; expires=" + expires + ";";
};

/*** 쿠키 호출 ***/
function readCookie(name) {
    var result = "";
    var nameEQ = name + "=";
    var ca = document.cookie.split(';');
    for (var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') c = c.substring(1, c.length);
        if (c.indexOf(nameEQ) == 0) {
            result = c.substring(nameEQ.length, c.length);
        }
    }
    return result;
}

var gdAjaxUpload = {
    isSuccess : false,
    upload : function(data) {
        var formData = new FormData();
        for (var k in data.params){
            if (data.params.hasOwnProperty(k)) {
                formData.append(k, data.params[k]);
            }
        }
        if(data.onbeforeunload){
            window.onbeforeunload = data.onbeforeunload;
            data.formObj.on("submit", function () {
                window.onbeforeunload = null;
            });
        }

        if(data.formObj.find('[name=uploadType][value=ajax]').length < 1) {
            data.formObj.append('<input type="hidden"  name="uploadType" value="ajax" >');
        }
        var index = data.thisObj.closest('form').find('input:file').index(data.thisObj);
        formData.append('uploadFile', data.thisObj[0].files[0]);

        $.ajax({
            url: data.actionUrl,
            type: 'POST',
            data: formData,
            async: false,
            cache: false,
            contentType: false,
            processData: false,
            dataType: 'json',
            success: function (returnData) {
                returnData['index'] = index;
                if(returnData.result == 'ok') {
                    gdAjaxUpload.isSuccess = true;
                    if ($('input[name="uploadFileNm[' + index + ']"]').length == 0) {
                        data.formObj.append("<input type='hidden' name='uploadFileNm[" + index + "]' value='" + returnData.uploadFileNm + "'>");
                        data.formObj.append("<input type='hidden' name='saveFileNm[" + index + "]' value='" + returnData.saveFileNm + "'>");
                    }
                    else if(returnData.result == 'cancel'){
                        if ($("input[name='uploadFileNm[" + index + "]']").length >0) {
                            $("input[name='uploadFileNm[" + index + "]']").remove();
                            $("input[name='saveFileNm[" + index + "]']").remove();
                        }
                    }
                    else {
                        $("input[name='uploadFileNm[" + index + "]']").val(returnData.uploadFileNm);
                        $("input[name='saveFileNm[" + index + "]']").val(returnData.saveFileNm);
                    }
                    if(typeof data.successAfter == 'function') {
                        data.successAfter(returnData);
                    }
                }
                else {
                    gdAjaxUpload.isSuccess = false;
                    if (returnData.errorMsg) {
                        alert(returnData.errorMsg);
                    }
                    if(typeof data.failAfter == 'function') {
                        data.failAfter(returnData);
                    }
                }
            }
        });
    }
}

/**
 * 기준화폐 환율변환
 *
 * @param price 금액
 * @param isFormat 포맷여부
 * @returns {*}
 */
function gd_money_format(price, isFormat) {
    var convertPrice = fx.convert(price).toRealFixed();
    if (typeof isFormat !== 'undefined') {
        if (isFormat) {
            return numeral().unformat(convertPrice);
        }
    }

    return convertPrice;
}

/**
 * 추가화폐 환율변환
 *
 * @param price 금액
 * @param isFormat 포맷여부
 * @returns {*}
 */
function gd_add_money_format(price, isFormat) {
    var convertPrice = fx.convert(price, {to: gdCurrencyAddCode}).toRealFixed(gdCurrencyAddDecimal, gdCurrencyAddDecimalFormat);
    if (typeof isFormat !== 'undefined') {
        if (isFormat) {
            return numeral().unformat(convertPrice);
        }
    }

    return convertPrice;
}

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

// 함수 호출
$(document).ready(function() {
    gd_init_checkbox_ui();
});
