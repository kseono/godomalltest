<div style="margin: auto; width: 600px; color: rgb(85, 85, 85); padding-right: 20px; padding-left: 20px; font-family: Malgun Gothic; font-size: 13px; background-color: rgb(255, 255, 255);">
    <div style="height: 46px; text-align: right; margin-top: 20px; margin-bottom: 50px; border-bottom-color: rgb(102, 102, 102); border-bottom-width: 2px; border-bottom-style: solid;">
        <a style="color: rgb(68, 68, 68); font-weight: bold; text-decoration: none; cursor: pointer;" href="#" target="_blank">{rc_mallDomain}</a>
    </div>
    <div style="margin-bottom: 50px;">
        <div style="color: rgb(68, 68, 68); letter-spacing: -2px; font-size: 32px;">
            <b>마일리지가</b><br><b>지급</b>되었습니다. <img style="margin-top: -40px; margin-right: 10px; float: right;" alt="mileage-plus top image" src="/data/mail/img/mailimg_mileage-plus.png">
        </div>
        <div style="line-height: 22px; margin-top: 30px;">
            안녕하세요. <b>{rc_mallNm}</b>입니다. {rc_memNm}님께 감사의 의미로 마일리지를 지급해드렸습니다. 적립하신 마일리지는 {rc_mallNm}에서 상품 결제 시 사용하실 수 있습니다. 소멸된 마일리지는 복구되지 않으니 유효기간 내에 사용하시기 바랍니다.
        </div>
    </div>
    <div style="color: rgb(68, 68, 68); font-size: 15px; font-weight: bold; margin-bottom: 10px;">지급내역</div>
    <table class="__se_tbl_ext" style="width: inherit; border-top-color: rgb(186, 186, 186); border-top-width: 1px; border-top-style: solid; border-collapse: collapse;">
        <tbody>
        <tr>
            <td style="height: 43px; color: rgb(136, 136, 136); padding-right: 20px; padding-left: 20px; font-size: 13px; border-bottom-color: rgb(229, 229, 229); border-bottom-width: 1px; border-bottom-style: solid; background-color: rgb(243, 243, 243);">대상아이디</td>
            <td style="width: 70%; height: 43px; color: rgb(51, 51, 51); padding-left: 20px; font-size: 13px; border-bottom-color: rgb(229, 229, 229); border-bottom-width: 1px; border-bottom-style: solid;">{rc_memId}</td>
        </tr>
        <tr>
            <td style="height: 43px; color: rgb(136, 136, 136); padding-right: 20px; padding-left: 20px; font-size: 13px; border-bottom-color: rgb(229, 229, 229); border-bottom-width: 1px; border-bottom-style: solid; background-color: rgb(243, 243, 243);">지급 마일리지</td>
            <td style="width: 70%; height: 43px; color: rgb(51, 51, 51); padding-left: 20px; font-size: 13px; border-bottom-color: rgb(229, 229, 229); border-bottom-width: 1px; border-bottom-style: solid;">{rc_mileage}</td>
        </tr>
        <tr>
            <td style="height: 43px; color: rgb(136, 136, 136); padding-right: 20px; padding-left: 20px; font-size: 13px; border-bottom-color: rgb(229, 229, 229); border-bottom-width: 1px; border-bottom-style: solid; background-color: rgb(243, 243, 243);">지급 후 보유마일리지</td>
            <td style="width: 70%; height: 43px; color: rgb(51, 51, 51); padding-left: 20px; font-size: 13px; border-bottom-color: rgb(229, 229, 229); border-bottom-width: 1px; border-bottom-style: solid;">{rc_totalMileage}</td>
        </tr>
        <tr>
            <td style="height: 43px; color: rgb(136, 136, 136); padding-right: 20px; padding-left: 20px; font-size: 13px; border-bottom-color: rgb(229, 229, 229); border-bottom-width: 1px; border-bottom-style: solid; background-color: rgb(243, 243, 243);">소멸예정일시</td>
            <td style="width: 70%; height: 43px; color: rgb(51, 51, 51); padding-left: 20px; font-size: 13px; border-bottom-color: rgb(229, 229, 229); border-bottom-width: 1px; border-bottom-style: solid;">{rc_deleteScheduleDt}</td>
        </tr>
        </tbody>
    </table>
    <div style="padding-top: 20px;">
        <p style="color: rgb(102, 102, 102); line-height: 20px; font-size: 12px;">- 기타문의사항이 있으시면 고객센터로 연락주시기 바랍니다.<br>&nbsp;&nbsp;감사합니다.</p>
    </div>
    <div style="color: rgb(229, 229, 229); margin-top: 70px; margin-bottom: 20px; border-bottom-color: currentColor; border-bottom-width: 1px; border-bottom-style: solid;"></div>
    <div style="margin-bottom: 20px;"><!--{ @ gd_get_footer_logo_tag() }-->{=.tag}<!--{ / }--> </div>
    <div style="color: rgb(102, 102, 102); font-size: 13px; margin-bottom: 25px;">
        <p>본 메일은 발신 전용으로 회신되지 않습니다. 추가 문의는 <a style="color: rgb(68, 68, 68); font-size: 12px; font-weight: bold;" href="#">[고객센터]</a>를 이용해주시기 바랍니다.
        </p>
        <p style="color: rgb(153, 153, 153); font-size: 11px;">Copyright(C) <b style="color: rgb(153, 153, 153); font-size: 11px;">{rc_mallNm}</b> All right reserved.</p>
    </div>
</div>