<?php /* Template_ 2.2.7 2025/05/22 10:03:57 /www/newmanjoo14_godomall_com/data/mail/body_ADMINSECURITY.php 000003657 */ ?>
<div style="margin: auto; width: 600px; color: rgb(85, 85, 85); padding-right: 20px; padding-left: 20px; font-family: Malgun Gothic; font-size: 13px; background-color: rgb(255, 255, 255);">
    <div style="height: 46px; text-align: right; color: rgb(68, 68, 68); font-size: 13px; margin-top: 46px; margin-bottom: 50px; border-bottom-color: rgb(102, 102, 102); border-bottom-width: 2px; border-bottom-style: solid;">
        <b><?php echo $TPL_VAR["rc_mallNm"]?> 보안 인증번호를 안내해드립니다.</b>
    </div>
    <div style="margin-bottom: 50px;">
        <div style="color: rgb(68, 68, 68); letter-spacing: -2px; font-size: 32px;">
            <b>보안 인증번호</b>를<br> 안내해 드립니다. <img style="margin-top: -40px; margin-right: 10px; float: right;" alt="wake code top image" src="/data/mail/img/mailimg_sleep-code.png">
        </div>
        <div style="line-height: 22px; font-size: 13px; margin-top: 30px;"> 안녕하세요.
            <span style="color: rgb(34, 34, 34); font-size: 13px;">
                <strong><?php echo $TPL_VAR["rc_mallNm"]?></strong>
            </span>
            입니다. <br> 요청하신 보안 인증번호를 안내해드립니다. <br> 아래 번호를 인증번호 입력란에 입력하시면
            <span style="color: rgb(34, 34, 34); font-size: 13px;">
                <strong>보안인증이 완료</strong>
            </span>
            됩니다.
        </div>
    </div>
    <table class="__se_tbl_ext" style="width: inherit; border-top-color: rgb(186, 186, 186); border-top-width: 1px; border-top-style: solid; border-collapse: collapse;">
        <tbody>
        <tr>
            <td style="width: 120px; height: 87px; color: rgb(136, 136, 136); padding-right: 20px; padding-left: 20px; font-size: 13px; border-bottom-color: rgb(229, 229, 229); border-bottom-width: 1px; border-bottom-style: solid; background-color: rgb(247, 247, 247);">보안인증번호</td>
            <td style="width: 80%; height: 58px; color: rgb(17, 126, 249); padding-left: 20px; font-size: 18px; font-weight: bold; border-bottom-color: rgb(229, 229, 229); border-bottom-width: 1px; border-bottom-style: solid;">
                <b><?php echo $TPL_VAR["rc_certificationCode"]?></b></td>
        </tr>
        </tbody>
    </table>
    <div style="line-height: 22px; margin-top: 40px;"> 인증번호는 <b>3분동안 유효하며,</b> 3분 경과 시 인증번호를 재발급 받으셔야 합니다. <br> 감사합니다.</div>
    <div style="color: rgb(218, 218, 218); margin-top: 80px; margin-bottom: 20px; border-bottom-color: currentColor; border-bottom-width: 1px; border-bottom-style: solid;"></div>
    <div style="margin-bottom: 20px;"><?php if((is_array($TPL_R1=gd_get_footer_logo_tag())&&!empty($TPL_R1)) || (is_object($TPL_R1) && in_array("Countable", class_implements($TPL_R1)) && $TPL_R1->count() > 0)) {foreach($TPL_R1 as $TPL_V1){?><?php echo $TPL_V1["tag"]?><?php }}?> </div>
    <div style="color: rgb(102, 102, 102); font-size: 13px; margin-bottom: 25px;">
        <p>본 메일은 발신 전용으로 회신되지 않습니다. 추가 문의는 <a style="color: rgb(68, 68, 68); font-size: 12px; font-weight: bold;" href="#">[고객센터]</a>를 이용해주시기 바랍니다.
        </p>
        <p style="color: rgb(153, 153, 153); font-size: 11px;">Copyright(C) <b style="color: rgb(153, 153, 153); font-size: 11px;"><?php echo $TPL_VAR["rc_mallNm"]?></b> All right reserved.</p>
    </div>

</div>