/**
 * 상품상세 상품 리뷰&문의 페이징
 * @param type qa or review
 * @param queryStirng
 */

$(document).ready(function () {
    $('body').delegate('.js_btn_report', 'click', function () {
        var bdId = $(this).data('bdid');
        var bdSno = $(this).data('bdsno');
        var memoSno = $(this).data('memosno');
        gd_open_report_popup(bdId, bdSno,memoSno);
    });
});
function viewGoodsBoard(bdId,sno,auth,goodsNo,notice) {
    if (auth == 'n') {
        $(this).closest("li").removeClass("selected");
        alert(__('권한이 없습니다.'));
        return;
    }
    else if (auth == 'c') {
        passwordLayer.show();
        passwordLayer.btnEl.unbind('click').bind('click', function () {
            $.ajax({
                method: "get",
                url: "goods_board_view.php",
                data: {sno: sno, bdId: bdId, writerPw: passwordLayer.value(), goodsNo: goodsNo},
                dataType: 'text',
                cache: false,
                async: true,
            }).success(function (data) {
                passwordLayer.close();
                commentAreaEl.element(bdId, sno, notice).html(data).promise().done(function(){
                    $(this).find('.js-comment-area').attr('data-notice', notice);
                    $(this).find('.js-comment-area').find('.js-data-comment-row').attr('data-notice', notice);
                });
                var commentAreaElReverse = commentAreaEl.elementReverse(bdId, sno, notice);
                if(commentAreaElReverse.length > 0) {
                    if ($.trim(commentAreaElReverse.html()).length > 0) {
                        commentAreaElReverse.html(data).promise().done(function(){
                            $(this).find('.js-comment-area').attr('data-notice', noticeReverse(notice));
                            $(this).find('.js-comment-area').find('.js-data-comment-row').attr('data-notice', noticeReverse(notice));
                        });
                    }
                }
            }).error(function (e) {
                alert('fail');
                if(e.responseText)
                    alert(e.responseText);
            });
        });
    }  else if (auth == 'y') {

        $.ajax({
            method: "GET",
            url: "../goods/goods_board_view.php",
            data: {sno: sno, bdId: bdId, gboard: 'y', goodsNo: goodsNo},
            dataType: 'text',
            cache: false,
            async: true,
        }).success(function (data) {
            commentAreaEl.element(bdId, sno, notice).html(data).promise().done(function(){
                $(this).find('.js-comment-area').attr('data-notice', notice);
                $(this).find('.js-comment-area').find('.js-data-comment-row').attr('data-notice', notice);
            });
            var commentAreaElReverse = commentAreaEl.elementReverse(bdId, sno, notice);
            if(commentAreaElReverse.length > 0) {
                if ($.trim(commentAreaElReverse.html()).length > 0) {
                    commentAreaElReverse.html(data).promise().done(function(){
                        $(this).find('.js-comment-area').attr('data-notice', noticeReverse(notice));
                        $(this).find('.js-comment-area').find('.js-data-comment-row').attr('data-notice', noticeReverse(notice));
                    });
                }
            }
        }).error(function (e) {
            alert('fail');
            if(e.responseText)
                alert(e.responseText);
        });
    }

}

//패스워드입력 레이어 창
var passwordLayer = {
    element: $('.js-password-layer'),
    btnEl: $('.js-password-layer').find('.js-submit'),
    inputEl : $('.js-password-layer').find('input[name=writerPw]'),
    value: function () {
        return $('.js-password-layer').find('input[name=writerPw]').val();
    },
    show: function () {
        this.element.removeClass('hidden');
        $('html').addClass('oh-space');
    },
    close: function () {
        $('.js-password-layer').addClass('hidden');
    }
}
var commentAreaEl = {
    element: function(bdId, sno, notice){
        if($.trim(notice) === ''){
            return $('.js-'+bdId+'-' + sno);
        }
        else {
            return $('.js-'+bdId+'-' + sno + '[data-notice=' + notice + ']');
        }
    },
    elementReverse:  function(bdId, sno, notice){
        if($.trim(notice) === ''){
            return '';
        }
        else {
            return $('.js-'+bdId+'-' + sno + '[data-notice=' + noticeReverse(notice) + ']');
        }
    }
}

var noticeReverse = function (notice) {
    var reverseArray = {'y':'n', 'n':'y'};

    if($.trim(notice) === ''){
        return '';
    }
    else {
        return reverseArray[notice];
    }
}

//페이징
function goGoodsAjaxPage(bdId, queryStirng) {
    var ajaxDataEl = '';
    var page = getQueryVariable(queryStirng, 'page');
    var goodsNo = getQueryVariable(queryStirng, 'goodsNo');
    if (bdId == 'goodsreview') {
        ajaxDataEl = $('#ajax-goods-review-list');
    }
    else if (bdId == 'goodsreview') {
        ajaxDataEl = $('#ajax-goods-qa-list');
    }
    else {
        alert('error illgal board id');
        return;
    }
    $.ajax({
        method: "GET",
        cache: false,
        url: "./goods_board_list.php",
        data: {bdId: bdId, goodsNo: goodsNo, page: page , gboard : 'y'},
        dataType: 'text'
    }).success(function (data) {
        ajaxDataEl.hide();
        ajaxDataEl.fadeIn('fast');
        ajaxDataEl.html(data);
    }).error(function (e) {
        if(e.responseText)
            alert(e.responseText);
    });
}

function getParameterByName(name) {
    name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
    var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
        results = regex.exec(location.search);
    return results === null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
}

function gd_btn_report(bdId, bdSno, memoSno, goodsNo) {
    if (_.isUndefined(memoSno)) {
        memoSno = 0;
    }
    if (_.isUndefined(goodsNo)) {
        goodsNo = 0;
    }
    var history_back = location.href.split('#')[0];
    var url = "../board/report.php?mode=report&bdId=" + bdId + "&bdSno=" + bdSno + "&memoSno=" + memoSno + "&goodsNo=" + goodsNo + '&returnUrl=' + encodeURIComponent(history_back);
    location.href = url;
}
