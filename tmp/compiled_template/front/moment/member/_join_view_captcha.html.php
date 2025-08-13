<?php /* Template_ 2.2.7 2025/05/22 10:03:57 /www/newmanjoo14_godomall_com/data/skin/front/moment/member/_join_view_captcha.html 000002041 */ ?>
<?php if($TPL_VAR["joinField"]["captcha"]["use"]=='y'){?>
<div class="addition_info_box">
    <h3><?php echo __('자동등록방지')?></h3>
    <div class="addition_info_sec">
        <table border="0" cellpadding="0" cellspacing="0">
            <colgroup>
                <col width="25%">
                <col width="75%">
            </colgroup>
            <tbody>
            <tr>
                <th><span><?php echo __('자동등록방지')?></span></th>
                <td>
                    <div class="member_warning">
                        <div class="capcha">
                            <div class="capcha_img">
                                <img src="./captcha.php" align="absmiddle" id="captchaImg" alt="<?php echo __('자동등록방지 이미지')?>"/>
                            </div>
                            <div class="capcha_txt">
                                <p><?php echo __('보이는 순서대로 %s숫자 및 문자를 모두 입력해 주세요.','<br/>')?></p>
                                <input type="text" class="text captcha" name="captchaKey" maxlength="5" onKeyUp="javascript:this.value=this.value.toUpperCase();" onfocus="this.select()" label="<?php echo __('자동등록방지문자')?>"/>
                                <span class="btn_gray_list">
                                    <button type="button" class="btn_gray_small" id="reload_captcha">
                                        <span><img src="/data/skin/front/moment/img/etc/icon_reset.png" alt="<?php echo __('이미지 새로고침')?>"> <?php echo __('이미지 새로고침')?></span>
                                    </button>
                                </span>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</div>
<?php }?>