/**
 * Created by LeeNamJu on 2015-11-03.
 */

$(document).ready(function () {
    var layerPassword = $('#layerPassword input[name=password]');
    var comment_write_div = $(".comment-write");

    /**
     * 삭제
     */
    $('#btnDelete').bind('click', function () {
        $('#btnPasswordInput').unbind('click');

        if (bdDeleteAuth == 'c') {
            checkPasswordLayer();
            $('#btnPasswordInput').bind('click', function () {
                deleteAjaxProcess();
            });
            return;
        }

        deleteAjaxProcess();
    });

    /**
     * 수정
     */
    $('#btnModify').bind('click', function () {
            $('#btnPasswordInput').unbind('click');
            if (is_mem == 'y') {
                location.href = bdModifyUrl;
                return;
            }
            if (bdModifyAuth == 'c') {
                checkPasswordLayer();
                $('#btnPasswordInput').bind('click', function () {
                    $.ajax({
                        method: "POST",
                        url: "./board_ps.php",
                        data: {mode: 'modifyCheck', sno: bdSno, bdId: bdId, writerPw: layerPassword.val()},
                        dataType: 'json'
                    }).success(function (data) {
                        if (data['result'] == 'ok') {
                            $('#frmView').attr('action', bdModifyUrl);
                            $('#frmView').append('<input type="hidden" name="oldPassword" value="' + layerPassword.val() + '"  />');
                            $('#frmView').submit();
                        }
                        else {
                            alert(data['msg']);
                            return;
                        }
                    }).error(function (e) {
                        if(e.responseText)
                            alert(e.responseText);
                    });

                });
                return;
            }
        }
    );

    /**
     * 추천
     */
    $('#btnRecommend').bind('click', function () {
        $.get('board_ps.php', {
            'mode': 'recommend',
            'bdId': bdId,
            'sno': sno
        }, function (data, status) {
            if (status == 'success') {
                alert(data['message']);
                $('#recommendCount').find('strong').html(data['recommendCount']);
            }
            else {
                alert('request fail. ajax status (' + status + ')');
            }
        }, 'json');
    });

    /**
     * 댓글저장
     */
    $('#btnCommentWrite').bind('click', function () {
        $.ajax({
            method: "POST",
            url: "./memo_ps.php",
            data: {
                mode: 'write',
                bdSno: bdSno,
                sno: sno,
                bdId: bdId,
                memo: comment_write_div.find('input[name=memo]').val(),
                writerNm: comment_write_div.find('input[name=writerNm]').val(),
                writerPw: comment_write_div.find('input[name=password]').val()
            },
            dataType: 'json'
        }).success(function (data) {
            if (data['result'] == 'ok') {
                alert(data['msg']);
                location.reload();
            }
            else {
                alert(data['msg']);
                return;
            }
        }).error(function (e) {
            if(e.responseText)
                alert(e.responseText);
        });
    });

    /**
     * 댓글수정
     */
    $('.board-view-comment .modify').bind('click', function () {
        var memoSno = $(this).closest('li').attr('data-sno');
        var auth = $(this).closest('li').attr('data-auth');
        var comment_box_id_div = $("#comment_box_" + memoSno);

        if (comment_box_id_div.is(':visible')) {
            $('.comment-write').show();
            $('.comment-reply').hide();
            return;
        }

        $('.comment-write').hide();
        $('.comment-reply').hide();
        comment_box_id_div.show();

        //수정초기화
        comment_box_id_div.find('label').text('');
        comment_box_id_div.find('input[name=writerNm]').attr('readonly', 'true');
        comment_box_id_div.find('.btn_reply_modify').unbind('click');

        comment_box_id_div.find('.btn_reply_modify').bind('click', function () {
            $.ajax({
                method: "POST",
                url: "./memo_ps.php",
                data: {
                    mode: 'modify',
                    bdSno: sno,
                    sno: memoSno,
                    bdId: bdId,
                    writerPw: comment_box_id_div.find('input[name=password]').val(),
                    memo: comment_box_id_div.find('input[name=memo]').val()
                },
                dataType: 'json'
            }).success(function (data) {
                if (data['result'] == 'ok') {
                    alert(data['msg']);
                    location.reload();
                }
                else {
                    alert(data['msg']);
                    return;
                }
            }).error(function (e) {
                if(e.responseText)
                    alert(e.responseText);
            });
        });
    });

    /**
     * 답변달기
     */
    $('.board-view-comment .reply').bind('click', function () {
        var memoSno = $(this).closest('li').attr('data-sno');
        var auth = $(this).closest('li').attr('data-auth');
        var comment_box_id_div = $("#comment_box_" + memoSno);

        if (comment_box_id_div.is(':visible')) {
            $('.comment-write').show();
            $('.comment-reply').hide();
            return;
        }

        $('.comment-write').hide();
        $('.comment-reply').hide();
        comment_box_id_div.show();

        //수정초기화
        comment_box_id_div.find('input[name=writerNm]').removeAttr('readonly');
        comment_box_id_div.find('input[name=writerNm]').val('');
        comment_box_id_div.find('input[name=memo]').val('');

        comment_box_id_div.find('.btn_reply_modify').unbind('click');
        comment_box_id_div.find('.btn_reply_modify').bind('click', function () {
            $.ajax({
                method: "POST",
                url: "./memo_ps.php",
                data: {
                    mode: 'reply',
                    bdSno: sno,
                    sno: memoSno,
                    bdId: bdId,
                    writerNm: comment_box_id_div.find('input[name=writerNm]').val(),
                    writerPw: comment_box_id_div.find('input[name=password]').val(),
                    memo: comment_box_id_div.find('input[name=memo]').val()
                },
                dataType: 'json'
            }).success(function (data) {
                if (data['result'] == 'ok') {
                    alert(data['msg']);
                    location.reload();
                }
                else {
                    alert(data['msg']);
                    return;
                }
            }).error(function (e) {
                if(e.responseText)
                    alert(e.responseText);
            });
        });

    });

    /**
     * 댓글삭제
     */
    $('.board-view-comment .del').bind('click', function () {
        var memoSno = $(this).closest('li').attr('data-sno');
        var auth = $(this).closest('li').attr('data-auth');
        var comment_box_id_div = $("#comment_box_" + memoSno);

        if (auth == 'c') {
            checkPasswordLayer();
            $('#btnPasswordInput').unbind('click');
            $('#btnPasswordInput').bind('click', function () {
                memoDeleteAjaxProcess(memoSno);
            });
            return;
        }
        if (!confirm(__('정말 삭제하시겠습니까?'))) {
            return false;
        }
        memoDeleteAjaxProcess(memoSno);
    });

    /**
     * 댓글submit
     */
    $('#commentFrm').validate({
        submitHandler: function (form) {
            form.submit();
        },
        rules: {
            memo: 'required',
        }
    });
})
;


function memoDeleteAjaxProcess(memoSno) {
    $.ajax({
        method: "POST",
        url: "./memo_ps.php",
        data: {
            mode: 'delete',
            bdSno: sno,
            sno: memoSno,
            bdId: bdId,
            writerPw: $('#layerPassword input[name=password]').val(),
        },
        dataType: 'json'
    }).success(function (data) {
        if (data['result'] == 'ok') {
            alert(data['msg']);
            location.reload();
        }
        else {
            alert(data['msg']);
            return;
        }
    }).error(function (e) {
        if(e.responseText)
            alert(e.responseText);
    });
}

function deleteAjaxProcess() {
    var password = $('#layerPassword input[name=password]').val();
    $.ajax({
        method: "POST",
        url: "./board_ps.php",
        data: {mode: 'delete', sno: sno, bdId: bdId, writerPw: password},
        dataType: 'json'
    }).success(function (data) {
        if (data['result'] == 'ok') {
            alert(data['msg']);
            location.href = './list.php?bdId=' + bdId;
        }
        else if (data['result'] == 'confirmPassword') {
            checkPasswordLayer();
        }
        else {
            alert(data['msg']);
            return;
        }
    }).error(function (e) {
        if(e.responseText)
            alert(e.responseText);
    });
}

function checkPasswordLayer() {
    $('.cite-layer').removeClass('dn');
    $('#layerDim').removeClass('dn');
    // $('html').addClass('oh-space');
    // $('#scroll-left, #scroll-right').addClass('dim');
    $('.cite-layer .wrap div .text').focus();
}

