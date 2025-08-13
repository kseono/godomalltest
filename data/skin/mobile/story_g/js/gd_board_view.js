/**
 * Created by LeeNamJu on 2015-11-03.
 */

$(document).ready(function () {
    $('img.js-smart-img').each(function(){
        $(this).css('max-width','100%');
    });
    var dom = function (bdId, sno, notice) {
        if($.trim(notice) === ''){
            var formWrite = $('.js-form-write');
        }
        else {
            var formWrite = $(".js-comment-area[data-bdid=" + bdId + "][data-sno=" + sno + "][data-notice=" + notice + "]").find('.js-form-write');
        }

        return {
            //  dataRow: $(".js-data-row[data-bdid=" + bdId + "][data-sno=" + sno + "]"),
            detail: $('.js-comment-area'),
            commentRow: function (memoSno, notice) {
                if($.trim(notice) === ''){
                    return this.detail.find('.js-data-comment-row[data-memosno=' + memoSno + ']');
                }
                else {
                    return this.detail.find('.js-data-comment-row[data-memosno=' + memoSno + '][data-notice=' + notice + ']');
                }
            },
            commentFormWrite: {
                element: formWrite,
                writerNm: formWrite.find('input[name=writerNm]'),
                password: formWrite.find('input[name=password]'),
                memo: formWrite.find('[name=memo]'),
                isSecret: formWrite.find('input[name=isSecretReply]'),
                captchaKey: formWrite.find('input[name=captchaKey]'),
            },
            commentFormAction: function (memoSno, notice) {
                return {
                    element: this.commentRow(memoSno, notice).find('.js-action-form'),
                    writerNm: this.commentRow(memoSno, notice).find('input[name=writerNm]'),
                    password: this.commentRow(memoSno, notice).find('input[name=password]'),
                    memo: this.commentRow(memoSno, notice).find('[name=memo]'),
                    btn: this.commentRow(memoSno, notice).find('.js-comment-btn-action'),
                    isSecret: this.commentRow(memoSno).find('input[name=isSecretReply]'),
                    captchaKey: this.commentRow(memoSno).find('input[name=captchaKey]'),
                    secretReply: this.commentRow(memoSno).find('input[name=secretReply]'),
                    init: function () {
                        this.writerNm.val(null);
                        this.password.val(null);
                        this.memo.val(null);
                    },
                }
            }
        }
    }

    var getData = function (id, target) {
        id = id.toLowerCase();
        switch (id) {
            case 'bdid' :
            case 'sno' :
            case 'notice' :
                return $(target).closest('.js-comment-area').data(id);
                break;
            case 'memosno' :
            case 'memoauth' :
                return $(target).closest('.js-data-comment-row').data(id);
        }
    }

    var isValidForm = function (elObj) {
        var writerNmEl = elObj.find('input[name=writerNm]');
        var passwordEl = elObj.find('input[name=password]');
        var memoEl = elObj.find('[name=memo]');
        if (writerNmEl.length > 0) {
            if (writerNmEl.val() == '') {
                alert(__('이름을 입력해주세요.'));
                writerNmEl.focus();
                return false;
            }
        }

        if (passwordEl.length > 0) {
            if (passwordEl.val() == '') {
                alert(__('비밀번호를 입력해주세요.'));
                passwordEl.focus();
                return false;
            }
        }

        if (memoEl.length > 0) {
            if (memoEl.val() == '') {
                alert(__('댓글 내용을 입력해주세요.'));
                memoEl.focus();
                return false;
            }
        }

        return true;
    }

    /**
     * 댓글작성
     */
    $('body').on( 'click','.js-comment-btn-write', function (e) {
        var bdId = getData('bdId', this);
        var sno = getData('sno', this);
        var notice = getData('notice', this);
        var domRoot = dom(bdId, sno, notice);
        var isSecret = 'n';

        var agreeElement = $(this).closest('.js-form-write').find('#info-collection-agree-write');
        if (agreeElement.length > 0) {
            if(agreeElement.is(':checked') == false) {
                alert(__('개인정보 수집항목에 동의해주세요.'));
                return;
            }
        }

        if (! isValidForm(domRoot.commentFormWrite.element)){
            return false;
        }

        if (domRoot.commentFormWrite.isSecret.is(':checked') || domRoot.commentFormWrite.isSecret.val() === 'y' ) {
            isSecret = 'y';
        }

        $.ajax({
            method: "POST",
            url: "../board/memo_ps.php",
            data: {
                mode: 'write',
                bdSno: sno,
                bdId: bdId,
                memo: domRoot.commentFormWrite.memo.val(),
                writerNm: domRoot.commentFormWrite.writerNm.val(),
                writerPw: domRoot.commentFormWrite.password.val(),
                isSecret: isSecret,
                captchaKey: domRoot.commentFormWrite.captchaKey.val(),
            },
            dataType: 'json'
        }).success(function (data) {
            if (data['result'] == 'ok') {
                if($('body').find('.js-board-'+bdId+'-view').length) {
                    var viewLink = getDetailArea(bdId, sno, notice);

                    viewGoodsBoard($(viewLink).data('bdid'),$(viewLink).data('sno'),$(viewLink).data('auth'),$(viewLink).data('goodsno'),notice);
                } else {
                    location.reload();
                }
            }
            else {
                alert(data['msg']);
                return;
            }
        }).error(function (e) {
            alert(e.responseText);
        });
    });


    /**
     * 댓글 수정
     */
    $('body').delegate('.js-comment-btn-modify', 'click', function () {
        var mode = 'modify'
        var bdId = getData('bdId', this);
        var sno = getData('sno', this);
        var notice = getData('notice', this);
        var memoSno = getData('memosno', this);
        var auth = getData('memoauth', this);
        var commentFormAction = dom(bdId, sno, notice).commentFormAction(memoSno, notice);
        //$('.js-action-form').show();
        // commentFormAction.init();

        if (auth === 'c' && commentFormAction.secretReply.val() === 'y') {
            passwordLayer.show();
            passwordLayer.btnEl.unbind('click').bind('click', function () {
                checkReplyPassWord();
            });
        } else {
            showModifyArea();
        }

        function checkReplyPassWord() {
            $.ajax({
                method: "POST",
                url: "../board/memo_ps.php",
                data: {
                    mode: 'checkPassWord',
                    bdSno: sno,
                    sno: memoSno,
                    bdId: bdId,
                    writerPw: passwordLayer.value(),
                },
                dataType: 'json'
            }).success(function (data) {
                if (data['result'] === 'ok') {
                    writerPw = passwordLayer.value();
                    passwordLayer.close();
                    showModifyArea(writerPw);
                }
                else {
                    alert(data['msg']);
                    return;
                }
            }).error(function (e) {
                alert(e.responseText);
            });
        }

        function showModifyArea(writerPw) {
            commentFormAction.element.show();
            commentFormAction.writerNm.prop('readonly', true);

            $.ajax({
                method: "POST",
                url: "../board/memo_ps.php",
                data: {
                    mode: 'getMemo',
                    bdId: bdId,
                    bdSno: sno,
                    sno: memoSno,
                    writerPw: writerPw,
                },
                dataType: 'json'
            }).success(function (data) {
                if (data['result'] == 'ok') {
                    commentFormAction.writerNm.val(data.writerNm);
                    commentFormAction.memo.val(data.memo);
                }
                else {
                    alert(data['msg']);
                    return;
                }
            });
        }

        commentFormAction.btn.unbind('click').bind('click', function () {
            var isSecret = 'n';

            if (commentFormAction.element.find('#info-collection-agree-action'+memoSno).length > 0) {
                if(commentFormAction.element.find('#info-collection-agree-action'+memoSno).is(':checked') == false) {
                    alert(__('개인정보 수집항목에 동의해주세요.'));
                    return;
                }
            }

            if (! isValidForm(commentFormAction.element)) {
                return false;
            }

            if (commentFormAction.isSecret.is(':checked') || commentFormAction.isSecret.val() === 'y') {
                isSecret = 'y';
            }

            $.ajax({
                method: "POST",
                url: "../board/memo_ps.php",
                data: {
                    mode: mode,
                    bdSno: sno,
                    sno: memoSno,
                    bdId: bdId,
                    writerNm: commentFormAction.writerNm.val(),
                    writerPw: commentFormAction.password.val(),
                    memo: commentFormAction.memo.val(),
                    isSecret: isSecret,
                    captchaKey: commentFormAction.captchaKey.val(),
                },
                dataType: 'json'
            }).success(function (data) {
                if (data['result'] == 'ok') {
                    alert(data['msg']);
                    if($('body').find('.js-board-'+bdId+'-view').length) {
                        var viewLink = getDetailArea(bdId, sno, notice);

                        viewGoodsBoard($(viewLink).data('bdid'),$(viewLink).data('sno'),$(viewLink).data('auth'),$(viewLink).data('goodsno'),notice);
                    } else {
                        location.reload();
                    }
                }
                else {
                    alert(data['msg']);
                    return;
                }
            }).error(function (e) {
                alert(e.responseText);
            });
        });
    });

    /**
     * 댓글답변
     */
    $('body').delegate('.js-comment-btn-reply', 'click', function () {
        var mode = 'reply'
        var bdId = getData('bdId', this);
        var sno = getData('sno', this);
        var notice = getData('notice', this);
        var isSecret = 'n';
        var memoSno = getData('memosno', this);
        var commentFormAction = dom(bdId, sno, notice).commentFormAction(memoSno, notice);
        commentFormAction.init();
        commentFormAction.element.show();
        commentFormAction.writerNm.prop('readonly', false);
        commentFormAction.btn.unbind('click').bind('click', function () {
            if (commentFormAction.element.find('#info-collection-agree-action'+memoSno).length > 0) {
                if(commentFormAction.element.find('#info-collection-agree-action'+memoSno).is(':checked') == false) {
                    alert(__('개인정보 수집항목에 동의해주세요.'));
                    return;
                }
            }

            if (! isValidForm(commentFormAction.element)) {
                return false;
            }

            if (commentFormAction.isSecret.is(':checked') || commentFormAction.isSecret.val() === 'y') {
                isSecret = 'y';
            }

            $.ajax({
                method: "POST",
                url: "../board/memo_ps.php",
                data: {
                    mode: mode,
                    bdId: bdId,
                    bdSno: sno,
                    sno: memoSno,
                    writerNm: commentFormAction.writerNm.val(),
                    writerPw: commentFormAction.password.val(),
                    memo: commentFormAction.memo.val(),
                    isSecret: isSecret,
                    captchaKey: commentFormAction.captchaKey.val(),
                },
                dataType: 'json'
            }).success(function (data) {
                if (data['result'] == 'ok') {
                    alert(data['msg']);
                    if($('body').find('.js-board-'+bdId+'-view').length) {
                        var viewLink = getDetailArea(bdId, sno, notice);
                        viewGoodsBoard($(viewLink).data('bdid'),$(viewLink).data('sno'),$(viewLink).data('auth'),$(viewLink).data('goodsno'),notice);
                    } else {
                        location.reload();
                    }
                }
                else {
                    alert(data['msg']);
                    return;
                }
            }).error(function (e) {
                alert(e.responseText);
            });
        });
    });


    /**
     * 댓글삭제
     */
    $('body').delegate('.js-comment-btn-delete', 'click', function () {
        var bdId = getData('bdId', this);
        var sno = getData('sno', this);
        var notice = getData('notice', this);
        var memoSno = getData('memosno', this);
        var auth = getData('memoauth', this);

        if (auth == 'c') {
            passwordLayer.show();
            passwordLayer.btnEl.unbind('click').bind('click', function () {
                memoDeleteAjaxProcess();
            });
            return;
        }
        if (!confirm(__('정말 삭제하시겠습니까?'))) {
            return false;
        }

        memoDeleteAjaxProcess(memoSno);

        function memoDeleteAjaxProcess() {
            $.ajax({
                method: "POST",
                url: "../board/memo_ps.php",
                data: {
                    mode: 'delete',
                    bdSno: sno,
                    sno: memoSno,
                    bdId: bdId,
                    writerPw: passwordLayer.value(),
                },
                dataType: 'json'
            }).success(function (data) {
                if (data['result'] == 'ok') {
                    alert(data['msg']);
                    if($('body').find('.js-board-'+bdId+'-view').length) {
                        var viewLink = getDetailArea(bdId, sno, notice);

                        viewGoodsBoard($(viewLink).data('bdid'),$(viewLink).data('sno'),$(viewLink).data('auth'),$(viewLink).data('goodsno'),notice);
                        passwordLayer.close();
                    } else {
                        location.reload();
                    }
                }
                else {
                    alert(data['msg']);
                    return;
                }
            }).error(function (e) {
                alert(e.responseText);
            });
        }
    });

    /**
     * 비밀댓글확인
     */
    $('body').delegate('.js-comment-btn-secret', 'click', function () {
        var bdId = getData('bdId', this);
        var sno = getData('sno', this);
        var memoSno = getData('memosno', this);
        var auth = getData('memoauth', this);

        var commentContent = dom(bdId, sno);

        if (auth == 'c') {
            passwordLayer.show();
            passwordLayer.btnEl.unbind('click').bind('click', function () {
                viewSecretMemoAjaxProcess();
            });
            return;
        }

        function viewSecretMemoAjaxProcess() {
            $.ajax({
                method: "POST",
                url: "../board/memo_ps.php",
                data: {
                    mode: 'getSecretMemo',
                    bdSno: sno,
                    sno: memoSno,
                    bdId: bdId,
                    writerPw: passwordLayer.value(),
                },
                dataType: 'json'
            }).success(function (data) {
                if (data['result'] == 'ok') {
                    commentContent.commentRow(memoSno).find('em').text(data['memo']);
                    passwordLayer.close();
                }else {
                    alert(data['msg']);
                    return;
                }
            }).error(function (e) {
                alert(e.message);
            });
        }
    });

    // 게시글 신고
    $('body').delegate('.js_btn_report', 'click', function () {
        var bdId = $(this).data('bdid');
        var bdSno = $(this).data('bdsno');
        var memoSno = $(this).data('memosno');
        var goodsNo = $(this).data('goodsno');
        gd_open_report_popup(bdId, bdSno,memoSno,goodsNo);
    });

});


//패스워드입력 레이어 창
var passwordLayer = {
    element: $('.js-password-layer'),
    btnEl: $('.js-password-layer').find('.js-submit'),
    inputEl : $('.js-password-layer').find('input[name=writerPw]'),
    value: function () {
        return $('.js-password-layer').find('input[name=writerPw]').val();
    },
    show: function () {
        this.element.removeClass('dn');
        $('#layerDim').removeClass('dn');
        $('#scroll-left, #scroll-right').addClass('dim');
        $('html').addClass('oh-space');
    },
    close: function () {
        $('.cite-layer .close').trigger('click');
    }
}

function btnModifyWrite(bdId, sno, auth) {
    switch (auth) {
        case 'n' :
            alert('권한이 없습니다.');
            break;
        case 'y' :
            //location.href = boardData.modifyUrl.format(bdId, sno);

            var params = {
                bdId: bdId,
                mode: 'modify',
                sno: sno,
                gboard: 'r',
            };

            $('#popup-board').modal({
                remote: '../board/write.php',
                cache: false,
                type : 'get',
                params: params,
                show: true
            });

            break;
        case 'c' :
            passwordLayer.show();
            passwordLayer.btnEl.unbind('click').bind('click', function () {
                $.ajax({
                    method: "POST",
                    url: "../board/board_ps.php",
                    data: {mode: 'modifyCheck', sno: sno, bdId: bdId, writerPw: passwordLayer.value(), gboard: 'r'},
                    dataType: 'json'
                }).success(function (data) {
                    if (data['result'] == 'ok') {
                        var params = {
                            oldPassword:passwordLayer.value()
                        };

                        $('#popup-board').modal({
                            remote: '/board/write.php?bdId='+bdId+"&mode=modify&sno="+sno,
                            cache: false,
                            type : 'post',
                            params: params,
                            show: true
                        });
                    }
                    else {
                        alert(data['msg']);
                        return;
                    }
                    passwordLayer.close();
                }).error(function (e) {
                    alert(e.responseText);
                });
            });
            break;
    }
}

function getDetailArea(bdId, sno, notice){
    if($.trim(notice) === ''){
        return $('.js-board-'+bdId+'-view').find('.js-'+bdId+'-detail-'+sno);
    }
    else {
        return $('.js-board-'+bdId+'-view').find('.js-'+bdId+'-detail-'+sno+'[data-notice='+notice+']');
    }
}

function gd_open_report_popup(bdId, bdSno, memoSno, goodsNo) {
    if(_.isUndefined(memoSno)){
        memoSno = 0;
    }
    if (_.isUndefined(goodsNo)) {
        goodsNo = 0;
    }
    var history_back = location.href.split('#')[0];
    var url = "../board/report.php?mode=report&bdId=" + bdId + "&bdSno=" + bdSno + "&memoSno=" + memoSno + "&goodsNo=" + goodsNo + '&returnUrl=' + encodeURIComponent(history_back);
    location.href = url;
}

function gd_reload_reply_captcha() {
    $('.captchaImg').removeAttr('src');
    setTimeout(() => {
        $('.captchaImg').attr('src', '../board/captcha.php?ch=' + new Date().getTime());
    }, 1);
}
