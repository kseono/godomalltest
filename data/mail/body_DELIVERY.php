<div style="margin: auto; width: 600px; color: rgb(85, 85, 85); padding-right: 20px; padding-left: 20px; font-family: Malgun Gothic; font-size: 13px; background-color: rgb(255, 255, 255);">
    <div style="height: 46px; text-align: right; margin-top: 20px; margin-bottom: 50px; border-bottom-color: rgb(102, 102, 102); border-bottom-width: 2px; border-bottom-style: solid;">
        <a style="color: rgb(68, 68, 68); font-weight: bold; text-decoration: none; cursor: pointer;" href="#" target="_blank">{rc_mallDomain}</a>
    </div>
    <div style="margin-bottom: 50px;">
        <div style="color: rgb(68, 68, 68); letter-spacing: -2px; font-size: 32px;">
            <b>주문하신 상품이</b><br><b>발송</b>되었습니다. <img style="margin-top: -40px; margin-right: 10px; float: right;" alt="mailimg_delivery top image" src="/data/mail/img/mailimg_delivery.png">
        </div>
        <div style="line-height: 22px; margin-top: 30px;">
            <strong>{rc_orderNm}</strong>
            님, 저희 쇼핑몰을 이용하여 주셔서 감사합니다. <br> {rc_orderNm} 님께서 주문하신 상품이 아래와 같이 발송되었습니다. <br> 고객님께 빠르고 정확하게 제품이 전달될 수 있도록 최선을 다하겠습니다.
        </div>
    </div>
    <div style="color: rgb(68, 68, 68); font-size: 15px; font-weight: bold; margin-bottom: 10px;">상품배송정보</div>
    <table class="__se_tbl_ext" style="width: inherit; border-top-color: rgb(181, 181, 181); border-top-width: 1px; border-top-style: solid; border-collapse: collapse;">
        <colgroup>
            <col width="20%">
            <col width="">
            <!--{ ? rc_receiverNmAdd }-->
            <col width="15%">
            <!--{ / }-->
            <col width="10%">
            <col width="">
        </colgroup>
        <thead>
        <tr>
            <th style="height: 43px; font-size: 13px; border-bottom-color: rgb(218, 218, 218); border-bottom-width: 1px; border-bottom-style: solid; background-color: rgb(247, 247, 247);">주문번호</th>
            <th style="height: 43px; font-size: 13px; border-bottom-color: rgb(218, 218, 218); border-bottom-width: 1px; border-bottom-style: solid; background-color: rgb(247, 247, 247);">상품명</th>
            <!--{ ? rc_receiverNmAdd }-->
            <th style="height: 43px; font-size: 13px; border-bottom-color: rgb(218, 218, 218); border-bottom-width: 1px; border-bottom-style: solid; background-color: rgb(247, 247, 247);">배송지</th>
            <!--{ / }-->
            <th style="height: 43px; font-size: 13px; border-bottom-color: rgb(218, 218, 218); border-bottom-width: 1px; border-bottom-style: solid; background-color: rgb(247, 247, 247);">수량</th>
            <th style="height: 43px; font-size: 13px; border-bottom-color: rgb(218, 218, 218); border-bottom-width: 1px; border-bottom-style: solid; background-color: rgb(247, 247, 247);">배송정보</th>
        </tr>
        </thead>
        <tbody>
        <!--{@ rc_goods}-->
        <tr>
            <!--{? .index_ == 0}-->
            <td style="height: 43px; text-align: center; padding-top: 15px; padding-bottom: 15px; padding-left: 20px; font-size: 13px; border-bottom-color: rgb(218, 218, 218); border-bottom-width: 1px; border-bottom-style: solid;" rowspan="{.size_}">{rc_orderNo}</td>
            <!--{/}-->
            <td style="height: 43px; text-align: left; padding-top: 15px; padding-bottom: 15px; padding-left: 20px; font-size: 13px; border-bottom-color: rgb(218, 218, 218); border-bottom-width: 1px; border-bottom-style: solid;">
                <!--{? .goodsType == 'addGoods'}-->
                <img style="vertical-align: middle;" alt="add goods icon" src="/data/mail/img/icon_plus.gif">
                <!--{/}-->{.goodsNm}
                <!--{? .optionInfo}-->
                <br>
                <span style="color: rgb(153, 153, 153); font-size: 12px;">
                    <!--{@ .optionInfo}-->{..optionName} : {..optionValue}
                    <!--{? (..size_ - 1 ) != ..index_}--> / <!--{/}-->
                    <!--{/}-->
                </span>
                <!--{/}-->
                <!--{@ .optionTextInfo}-->
                <br>
                <span style="color: rgb(153, 153, 153); font-size: 12px;">옵션 : {..optionValue}</span>
                <!--{/}-->
            </td>
            <!--{ ? rc_receiverNmAdd && .orderInfoTit }-->
            <td style="height: 43px; text-align: center; padding-top: 15px; padding-bottom: 15px; font-size: 13px; border-bottom-color: rgb(218, 218, 218); border-bottom-width: 1px; border-bottom-style: solid;">{.orderInfoTit}</td>
            <!--{ / }-->
            <td style="height: 43px; text-align: center; padding-top: 15px; padding-bottom: 15px; font-size: 13px; border-bottom-color: rgb(218, 218, 218); border-bottom-width: 1px; border-bottom-style: solid;">{.goodsCnt}</td>
            <td style="height: 43px; text-align: center; padding-top: 15px; padding-bottom: 15px; font-size: 13px; border-bottom-color: rgb(218, 218, 218); border-bottom-width: 1px; border-bottom-style: solid;">{.invoiceCompanyName}<br><a href="{.invoiceLink}" target="_blank">{.invoiceNo}</a></td>
        </tr>
        <!--{/}-->
        </tbody>
    </table>
    <div style="margin: 40px 0px 10px; color: rgb(68, 68, 68); font-size: 15px; font-weight: bold;">배송지정보</div>
    <!--{ ? rc_receiverNm }-->
    <table class="__se_tbl_ext" style="width: inherit; border-top-color: rgb(181, 181, 181); border-top-width: 1px; border-top-style: solid; border-collapse: collapse;">
        <tbody>
        <!--{ ? rc_receiverNmAdd }-->
        <tr>
            <td colspan="2" style="height: 43px; text-align: left; color: rgb(136, 136, 136); padding-right: 20px; padding-left: 20px; font-size: 13px; border-bottom-color: rgb(229, 229, 229); border-bottom-width: 1px; border-bottom-style: solid; background-color: rgb(247, 247, 247);">메인 배송지</td>
        </tr>
        <!--{ / }-->
        <tr>
            <td style="height: 43px; color: rgb(136, 136, 136); padding-right: 20px; padding-left: 20px; font-size: 13px; border-bottom-color: rgb(229, 229, 229); border-bottom-width: 1px; border-bottom-style: solid; background-color: rgb(247, 247, 247);">받는사람</td>
            <td style="width: 80%; height: 43px; color: rgb(51, 51, 51); padding-left: 20px; font-size: 13px; border-bottom-color: rgb(229, 229, 229); border-bottom-width: 1px; border-bottom-style: solid;">{rc_receiverNm}</td>
        </tr>
        <tr>
            <td style="height: 43px; color: rgb(136, 136, 136); padding-right: 20px; padding-left: 20px; font-size: 13px; border-bottom-color: rgb(229, 229, 229); border-bottom-width: 1px; border-bottom-style: solid; background-color: rgb(247, 247, 247);">주소</td>
            <td style="width: 80%; height: 43px; color: rgb(51, 51, 51); padding-left: 20px; font-size: 13px; border-bottom-color: rgb(229, 229, 229); border-bottom-width: 1px; border-bottom-style: solid;">{rc_receiverZonecode} {rc_receiverAddress} {rc_receiverAddressSub}</td>
        </tr>
        <tr>
            <td style="height: 43px; color: rgb(136, 136, 136); padding-right: 20px; padding-left: 20px; font-size: 13px; border-bottom-color: rgb(229, 229, 229); border-bottom-width: 1px; border-bottom-style: solid; background-color: rgb(247, 247, 247);">전화번호</td>
            <td style="width: 80%; height: 43px; color: rgb(51, 51, 51); padding-left: 20px; font-size: 13px; border-bottom-color: rgb(229, 229, 229); border-bottom-width: 1px; border-bottom-style: solid;">{rc_receiverPhone}</td>
        </tr>
        <tr>
            <td style="height: 43px; color: rgb(136, 136, 136); padding-right: 20px; padding-left: 20px; font-size: 13px; border-bottom-color: rgb(229, 229, 229); border-bottom-width: 1px; border-bottom-style: solid; background-color: rgb(247, 247, 247);">휴대폰번호</td>
            <td style="width: 80%; height: 43px; color: rgb(51, 51, 51); padding-left: 20px; font-size: 13px; border-bottom-color: rgb(229, 229, 229); border-bottom-width: 1px; border-bottom-style: solid;">{rc_receiverCellPhone}</td>
        </tr>
        <tr>
            <td style="height: 43px; color: rgb(136, 136, 136); padding-right: 20px; padding-left: 20px; font-size: 13px; border-bottom-color: rgb(229, 229, 229); border-bottom-width: 1px; border-bottom-style: solid; background-color: rgb(247, 247, 247);">배송메시지</td>
            <td style="width: 80%; height: 43px; color: rgb(51, 51, 51); padding-left: 20px; font-size: 13px; border-bottom-color: rgb(229, 229, 229); border-bottom-width: 1px; border-bottom-style: solid;">{rc_receiverMemo}</td>
        </tr>
        </tbody>
    </table>
    <!--{ / }-->
    <!--{ ? rc_receiverNmAdd }-->
    <!--{ @ rc_receiverNmAdd }-->
    <table class="__se_tbl_ext" style="width: inherit; border-top-color: rgb(181, 181, 181); border-top-width: 1px; border-top-style: solid; border-collapse: collapse; margin-top:5px;">
        <tbody>
        <tr>
            <td colspan="2" style="height: 43px; text-align: left; color: rgb(136, 136, 136); padding-right: 20px; padding-left: 20px; font-size: 13px; border-bottom-color: rgb(229, 229, 229); border-bottom-width: 1px; border-bottom-style: solid; background-color: rgb(247, 247, 247);">추가배송지{=.key_}</td>
        </tr>
        <tr>
            <td style="height: 43px; text-align: left; color: rgb(136, 136, 136); padding-right: 20px; padding-left: 20px; font-size: 13px; border-bottom-color: rgb(229, 229, 229); border-bottom-width: 1px; border-bottom-style: solid; background-color: rgb(247, 247, 247);">받는사람</td>
            <td style="width: 80%; height: 43px; color: rgb(51, 51, 51); padding-left: 20px; font-size: 13px; border-bottom-color: rgb(229, 229, 229); border-bottom-width: 1px; border-bottom-style: solid;">{=.value_}</td>
        </tr>
        <tr>
            <td style="height: 43px; text-align: left; color: rgb(136, 136, 136); padding-right: 20px; padding-left: 20px; font-size: 13px; border-bottom-color: rgb(229, 229, 229); border-bottom-width: 1px; border-bottom-style: solid; background-color: rgb(247, 247, 247);">주소</td>
            <td style="width: 80%; height: 43px; color: rgb(51, 51, 51); padding-left: 20px; font-size: 13px; border-bottom-color: rgb(229, 229, 229); border-bottom-width: 1px; border-bottom-style: solid;">{rc_receiverZonecodeAdd[.key_]} {rc_receiverAddressAdd[.key_]} {rc_receiverAddressSubAdd[.key_]}</td>
        </tr>
        <tr>
            <td style="height: 43px; text-align: left; color: rgb(136, 136, 136); padding-right: 20px; padding-left: 20px; font-size: 13px; border-bottom-color: rgb(229, 229, 229); border-bottom-width: 1px; border-bottom-style: solid; background-color: rgb(247, 247, 247);">전화번호</td>
            <td style="width: 80%; height: 43px; color: rgb(51, 51, 51); padding-left: 20px; font-size: 13px; border-bottom-color: rgb(229, 229, 229); border-bottom-width: 1px; border-bottom-style: solid;">{rc_receiverPhoneAdd[.key_]}</td>
        </tr>
        <tr>
            <td style="height: 43px; text-align: left; color: rgb(136, 136, 136); padding-right: 20px; padding-left: 20px; font-size: 13px; border-bottom-color: rgb(229, 229, 229); border-bottom-width: 1px; border-bottom-style: solid; background-color: rgb(247, 247, 247);">휴대폰번호</td>
            <td style="width: 80%; height: 43px; color: rgb(51, 51, 51); padding-left: 20px; font-size: 13px; border-bottom-color: rgb(229, 229, 229); border-bottom-width: 1px; border-bottom-style: solid;">{rc_receiverCellPhoneAdd[.key_]}</td>
        </tr>
        <tr>
            <td style="height: 43px; text-align: left; color: rgb(136, 136, 136); padding-right: 20px; padding-left: 20px; font-size: 13px; border-bottom-color: rgb(229, 229, 229); border-bottom-width: 1px; border-bottom-style: solid; background-color: rgb(247, 247, 247);">배송메시지</td>
            <td style="width: 80%; height: 43px; color: rgb(51, 51, 51); padding-left: 20px; font-size: 13px; border-bottom-color: rgb(229, 229, 229); border-bottom-width: 1px; border-bottom-style: solid;">{rc_orderMemoAdd[.key_]}</td>
        </tr>
        </tbody>
    </table>
    <!--{ / }-->
    <!--{ / }-->
    <div style="color: rgb(229, 229, 229); margin-top: 70px; margin-bottom: 20px; border-bottom-color: currentColor; border-bottom-width: 1px; border-bottom-style: solid;"></div>
    <div style="margin-bottom: 20px;"><!--{ @ gd_get_footer_logo_tag() }-->{=.tag}<!--{ / }--> </div>
    <div style="color: rgb(102, 102, 102); font-size: 13px; margin-bottom: 25px;">
        <p>본 메일은 발신 전용으로 회신되지 않습니다. 추가 문의는 <a style="color: rgb(68, 68, 68); font-size: 12px; font-weight: bold;" href="#">[고객센터]</a>를 이용해주시기 바랍니다.
        </p>
        <p style="color: rgb(153, 153, 153); font-size: 11px;">Copyright(C) <b style="color: rgb(153, 153, 153); font-size: 11px;">{rc_mallNm}</b> All right reserved.</p>
    </div>
</div>
