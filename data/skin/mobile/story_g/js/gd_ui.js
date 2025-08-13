/**
 * This is commercial software, only users who have purchased a valid license
 * and accept to the terms of the License Agreement can install and use this
 * program.
 *
 * Do not edit or add to this file if you wish to upgrade Godomall5 to newer
 * versions in the future.
 *
 * @copyright ⓒ 2016, NHN godo: Corp.
 * @link      http://www.godo.co.kr
 * @history
 * 		20152127 신동규 | 최초작성
 */
function showSearchArea() {
    var searchArea = $(".search-area");
    searchArea.css('display')=='none' ? searchArea.slideDown(30) : searchArea.slideUp(30);
}

// IE9에서 console 객체가 없어 console 객체가 없는 경우 log로 사용하도록 처리
if (!window.console) console = {log: function() {}};

$(document).ready(function(){

    $("#search-btn").on('click', function(e){
        showSearchArea();
    });

    triggerCheckboxUi();
    initCheckboxUi();
    citeLayer();
    selectRemodeling();
});

// 라디오박스,체크박스 이미지화 스크립트
function triggerCheckboxUi() {
    $('input.radio[type=radio], input.checkbox[type=checkbox]').each(function(){
        if($(this).prop("checked")) {
            $("label[for="+$(this).attr("id")+"]").addClass("on");
        } else {
            $("label[for="+$(this).attr("id")+"]").removeClass("on");
        }
    });
}

// 꾸민 셀렉트
function selectRemodeling(){
    $("select.tune").chosen({
        disable_search_threshold: 10,
        no_results_text: __('검색결과가 없습니다.')
    });
}

// 체크박스 처리 로직 초기화
function initCheckboxUi() {
    $(document).on('click', 'input.radio[type=radio]', function(e){
        $(this).parents('form:first').find("input[name='" + $(this).prop("name") + "']").each(function() {
            if ($(this).prop("checked")) {
                $("label[for=" + $(this).attr("id") + "]").addClass("on");
            } else {
                $("label[for=" + $(this).attr("id") + "]").removeClass("on");
            }
        });
    });

    $(document).on('click', 'input.checkbox[type=checkbox]', function(e){
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

// 상품상세 비밀글 인증 레이어
function citeLayer(){
    $('.protection').click(
        function() {
            $('.cite-layer').removeClass('dn');
            $('#layerDim').removeClass('dn');
            $('html').addClass('oh-space');
            $('#scroll-left, #scroll-right').addClass('dim');
            $('.cite-layer .wrap div .text').focus();
            return false;
        }
    );
    $('.cite-layer .close').click(
        function() {
            $(this).parent().parent().addClass('dn');
            $('#layerDim').addClass('dn');
            $('html').removeClass('oh-space');
            $('#scroll-left, #scroll-right').removeClass('dim');
            return false;
        }
    );
}
