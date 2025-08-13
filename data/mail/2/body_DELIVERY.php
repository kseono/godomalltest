<div style="margin: auto; width: 600px; padding-right: 20px; padding-left: 20px; background-color: rgb(255, 255, 255);">
    <div style="color: rgb(85, 85, 85); font-family: " malgun="" gothic
    ";="" font-size:="" 13px;="" height:="" 46px;="" text-align:="" right;="" margin-top:="" 20px;="" margin-bottom:="" 50px;="" border-bottom:="" 2px="" solid="" rgb(102,="" 102,="" 102);"=""> <a
        style="color: rgb(68, 68, 68); font-weight: bold; text-decoration: none; cursor: pointer;" href="#" target="_blank">{rc_mallDomain}</a>
</div>
<div style="margin-bottom: 50px;">
    <div><font color="#444444" face="Malgun Gothic">
            <span style="font-size: 32px; letter-spacing: -2px;"><b>Your order has been shipped.</b></span>
        </font></div>
    <div style="color: rgb(68, 68, 68); font-family: " malgun="" gothic
    ";="" font-size:="" 32px;="" letter-spacing:="" -2px;"=""><img style="margin-top: -40px; margin-right: 10px; float: right;" alt="mailimg_delivery top image" src="/data/mail/img/mailimg_delivery.png">
</div>
<div style="line-height: 22px; margin-top: 30px;">
    <font color="#555555" face="Malgun Gothic">
        <span style="font-size: 13px;">Dear&nbsp;</span>
    </font>
    <strong style="color: rgb(85, 85, 85); font-family: " malgun="" gothic
    ";="" font-size:="" 13px;"="">{rc_orderNm}</strong><font color="#555555" face="Malgun Gothic">
        <span style="font-size: 13px;">,&nbsp;thank you for using our shopping mall.</span>
    </font><br><font color="#555555" face="Malgun Gothic">
        <span style="font-size: 13px;">The order of {rc_orderNm} has been shipped as below.&nbsp;</span>
    </font><br><font color="#555555" face="Malgun Gothic">
        <span style="font-size: 13px;">We will do our best to ensure that our products are delivered to you fast and accurately.</span>
    </font><br></div>
</div>
<div style="color: rgb(68, 68, 68); font-family: " malgun="" gothic";="" font-size:="" 15px;="" font-weight:="" bold;="" margin-bottom:="" 10px;"="">Product Shipping Information</div>
<table class="__se_tbl_ext" style="color: rgb(85, 85, 85); font-family: " malgun="" gothic";="" font-size:="" 13px;="" width:="" inherit;="" border-top:="" 1px="" solid="" rgb(181,="" 181,="" 181);="" border-collapse:="" collapse;"="">
<colgroup>
    <col width="20%">
    <col width="">
    <col width="10%">
    <col width="">
</colgroup>
<thead>
<tr>
    <th style="height: 43px; font-size: 13px; border-bottom-color: rgb(218, 218, 218); border-bottom-width: 1px; border-bottom-style: solid; background-color: rgb(247, 247, 247);">Order Number<br></th>
    <th style="height: 43px; font-size: 13px; border-bottom-color: rgb(218, 218, 218); border-bottom-width: 1px; border-bottom-style: solid; background-color: rgb(247, 247, 247);">Product<br></th>
    <th style="height: 43px; font-size: 13px; border-bottom-color: rgb(218, 218, 218); border-bottom-width: 1px; border-bottom-style: solid; background-color: rgb(247, 247, 247);">Quantity<br></th>
    <th style="height: 43px; font-size: 13px; border-bottom-color: rgb(218, 218, 218); border-bottom-width: 1px; border-bottom-style: solid; background-color: rgb(247, 247, 247);">Shipping address info</th>
</tr>
</thead>
<tbody>
<!--{@ rc_goods}-->
<tr>
    <!--{? .index_ == 0}-->
    <td style="height: 43px; text-align: center; padding-top: 15px; padding-bottom: 15px; padding-left: 20px; font-size: 13px; border-bottom-color: rgb(218, 218, 218); border-bottom-width: 1px; border-bottom-style: solid;"
        rowspan="{.size_}">{rc_orderNo}
    </td>
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
        <br>option&nbsp;
        <span style="color: rgb(153, 153, 153); font-size: 12px;">: {..optionValue}</span>
        <!--{/}-->
    </td>
    <td style="height: 43px; text-align: center; padding-top: 15px; padding-bottom: 15px; font-size: 13px; border-bottom-color: rgb(218, 218, 218); border-bottom-width: 1px; border-bottom-style: solid;">{.goodsCnt}</td>
    <td style="height: 43px; text-align: center; padding-top: 15px; padding-bottom: 15px; font-size: 13px; border-bottom-color: rgb(218, 218, 218); border-bottom-width: 1px; border-bottom-style: solid;">{.invoiceCompanyName}<br><a
            href="{.invoiceLink}" target="_blank">{.invoiceNo}</a></td>
</tr>
<!--{/}-->
</tbody>
</table>
<div style="color: rgb(68, 68, 68); font-family: " malgun="" gothic";="" font-size:="" 15px;="" margin:="" 40px="" 0px="" 10px;="" font-weight:="" bold;"="">
<div style="margin: 40px 0px 10px;">Shipping address info</div></div>
<table class="__se_tbl_ext" style="color: rgb(85, 85, 85); font-family: " malgun="" gothic";="" font-size:="" 13px;="" width:="" inherit;="" border-top:="" 1px="" solid="" rgb(181,="" 181,="" 181);="" border-collapse:="" collapse;"="">
<tbody>
<tr>
    <td style="height: 43px; color: rgb(136, 136, 136); padding-right: 20px; padding-left: 20px; font-size: 13px; border-bottom-color: rgb(229, 229, 229); border-bottom-width: 1px; border-bottom-style: solid; background-color: rgb(247, 247, 247);">
        <p>Recipient</p>
        <p>name</p>
    </td>
    <td style="width: 80%; height: 43px; color: rgb(51, 51, 51); padding-left: 20px; font-size: 13px; border-bottom-color: rgb(229, 229, 229); border-bottom-width: 1px; border-bottom-style: solid;">{rc_receiverNm}</td>
</tr>
<tr>
    <td style="height: 43px; color: rgb(136, 136, 136); padding-right: 20px; padding-left: 20px; font-size: 13px; border-bottom-color: rgb(229, 229, 229); border-bottom-width: 1px; border-bottom-style: solid; background-color: rgb(247, 247, 247);">Address<br>
    </td>
    <td style="width: 80%; height: 43px; color: rgb(51, 51, 51); padding-left: 20px; font-size: 13px; border-bottom-color: rgb(229, 229, 229); border-bottom-width: 1px; border-bottom-style: solid;">{rc_receiverZonecode} {rc_receiverAddressSub} {rc_receiverAddress} {rc_receiverState} {rc_receiverCity} {rc_receiverCountry}</td>
</tr>
<tr>
    <td style="height: 43px; color: rgb(136, 136, 136); padding-right: 20px; padding-left: 20px; font-size: 13px; border-bottom-color: rgb(229, 229, 229); border-bottom-width: 1px; border-bottom-style: solid; background-color: rgb(247, 247, 247);">
        <p>Phone</p>
        <p>number</p>
    </td>
    <td style="width: 80%; height: 43px; color: rgb(51, 51, 51); padding-left: 20px; font-size: 13px; border-bottom-color: rgb(229, 229, 229); border-bottom-width: 1px; border-bottom-style: solid;">(+ {rc_receiverPhonePrefix}) {rc_receiverPhone}</td>
</tr>
<tr>
    <td style="height: 43px; color: rgb(136, 136, 136); padding-right: 20px; padding-left: 20px; font-size: 13px; border-bottom-color: rgb(229, 229, 229); border-bottom-width: 1px; border-bottom-style: solid; background-color: rgb(247, 247, 247);">
        <p>Mobile</p>
        <p>number</p>
    </td>
    <td style="width: 80%; height: 43px; color: rgb(51, 51, 51); padding-left: 20px; font-size: 13px; border-bottom-color: rgb(229, 229, 229); border-bottom-width: 1px; border-bottom-style: solid;">(+ {rc_receiverCellPhonePrefix}) {rc_receiverCellPhone}</td>
</tr>
<tr>
    <td style="height: 43px; color: rgb(136, 136, 136); padding-right: 20px; padding-left: 20px; font-size: 13px; border-bottom-color: rgb(229, 229, 229); border-bottom-width: 1px; border-bottom-style: solid; background-color: rgb(247, 247, 247);">
        <p>Shipping</p>
        <p>Message</p>
    </td>
    <td style="width: 80%; height: 43px; color: rgb(51, 51, 51); padding-left: 20px; font-size: 13px; border-bottom-color: rgb(229, 229, 229); border-bottom-width: 1px; border-bottom-style: solid;">{rc_receiverMemo}</td>
</tr>
</tbody>
</table>
<div style="color: rgb(229, 229, 229); font-family: " malgun="" gothic";="" font-size:="" 13px;="" margin-top:="" 70px;="" margin-bottom:="" 20px;="" border-bottom:="" 1px="" solid="" currentcolor;"=""></div>
<div style="color: rgb(85, 85, 85); font-family: " malgun="" gothic";="" font-size:="" 13px;="" margin-bottom:="" 20px;"=""><!--{ @ gd_get_footer_logo_tag() }-->{=.tag}<!--{ / }--> </div>
<div style="color: rgb(102, 102, 102); font-family: " malgun="" gothic";="" font-size:="" 13px;="" margin-bottom:="" 25px;"="">
<p>This is a Send Only No Reply Email Address. Please use&nbsp;<a href="#" style="color: rgb(68, 68, 68); font-size: 12px; font-weight: bold;">[Customer Center]</a>&nbsp;for further inquiries.&nbsp;</p>
<p style="color: rgb(153, 153, 153); font-size: 11px;">Copyright(C) <b style="color: rgb(153, 153, 153); font-size: 11px;">{rc_mallNm}</b> All right reserved.</p>
</div>
</div>
