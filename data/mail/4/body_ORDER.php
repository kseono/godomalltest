<div style="margin: auto; width: 600px; padding-right: 20px; padding-left: 20px; background-color: rgb(255, 255, 255);">
    <div style="color: rgb(85, 85, 85); font-family: &quot;Malgun Gothic&quot;; font-size: 13px; height: 46px; text-align: right; margin-top: 20px; margin-bottom: 50px; border-bottom: 2px solid rgb(102, 102, 102);"><a
            style="color: rgb(68, 68, 68); font-weight: bold; text-decoration: none; cursor: pointer;" href="#" target="_blank">
            <strong>{rc_mallDomain}</strong>
        </a></div>
    <div style="margin-bottom: 50px;">
        <div><font color="#444444" face="Malgun Gothic">
                <span style="font-size: 32px; letter-spacing: -2px;"><b>ご注文内容をお知らせします。</b></span>
            </font></div>
        <div style="color: rgb(68, 68, 68); font-family: &quot;Malgun Gothic&quot;; font-size: 32px; letter-spacing: -2px;"><img style="margin-top: -40px; margin-right: 10px; float: right;" alt="mailimg_order top image"
                                                                                                                                 src="/data/mail/img/mailimg_order.png">
        </div>
        <div style="color: rgb(85, 85, 85); font-family: &quot;Malgun Gothic&quot;; font-size: 13px; line-height: 22px; margin-top: 30px;">
            <strong>{rc_orderNm}</strong>
            様、当ショッピングモールをご利用いただきありがとうございます。&nbsp;<br> {rc_orderNm}様のご注文が下記の通り受け付けられました。<br> ご注文内容及び配送情報は、<a style="color: rgb(17, 126, 249); font-size: 13px; font-weight: bold;" href="/jp/mypage/order_list.php">マイページ&gt;注文リスト/配送照会</a>でもご確認いただけます。
            <br> お客様に迅速かつ正確に製品をお届けできるよう最善を尽くします。
        </div>
    </div>
    <div style="color: rgb(68, 68, 68); font-family: &quot;Malgun Gothic&quot;; font-size: 15px; font-weight: bold; margin-bottom: 10px;">注文履歴</div>
    <table class="__se_tbl_ext" style="color: rgb(85, 85, 85); font-family: &quot;Malgun Gothic&quot;; font-size: 13px; width: inherit; border-top: 1px solid rgb(181, 181, 181); border-collapse: collapse;">
        <tbody>
        <tr>
            <td style="height: 43px; text-align: left; color: rgb(136, 136, 136); padding-right: 20px; padding-left: 20px; font-size: 13px; border-bottom-color: rgb(229, 229, 229); border-bottom-width: 1px; border-bottom-style: solid; background-color: rgb(247, 247, 247);">注文日</td>
            <td style="width: 80%; height: 43px; color: rgb(51, 51, 51); padding-left: 20px; font-size: 13px; border-bottom-color: rgb(229, 229, 229); border-bottom-width: 1px; border-bottom-style: solid;">{rc_orderDt}</td>
        </tr>
        <tr>
            <td style="height: 43px; text-align: left; color: rgb(136, 136, 136); padding-right: 20px; padding-left: 20px; font-size: 13px; border-bottom-color: rgb(229, 229, 229); border-bottom-width: 1px; border-bottom-style: solid; background-color: rgb(247, 247, 247);">注文者名<br>
            </td>
            <td style="width: 80%; height: 43px; color: rgb(51, 51, 51); padding-left: 20px; font-size: 13px; border-bottom-color: rgb(229, 229, 229); border-bottom-width: 1px; border-bottom-style: solid;">{rc_orderNm}</td>
        </tr>
        <tr>
            <td style="height: 43px; text-align: left; color: rgb(136, 136, 136); padding-right: 20px; padding-left: 20px; font-size: 13px; border-bottom-color: rgb(229, 229, 229); border-bottom-width: 1px; border-bottom-style: solid; background-color: rgb(247, 247, 247);">注文番号</td>
            <td style="width: 80%; height: 43px; color: rgb(51, 51, 51); padding-left: 20px; font-size: 13px; border-bottom-color: rgb(229, 229, 229); border-bottom-width: 1px; border-bottom-style: solid;">{rc_orderNo}</td>
        </tr>
        <tr>
            <td style="height: 43px; text-align: left; color: rgb(136, 136, 136); padding-right: 20px; padding-left: 20px; font-size: 13px; border-bottom-color: rgb(229, 229, 229); border-bottom-width: 1px; border-bottom-style: solid; background-color: rgb(247, 247, 247);">決済金額</td>
            <td style="width: 80%; height: 43px; color: rgb(51, 51, 51); padding-left: 20px; font-size: 13px; border-bottom-color: rgb(229, 229, 229); border-bottom-width: 1px; border-bottom-style: solid;">{=gd_global_currency_display(rc_settlePrice)}</td>
        </tr>
        <tr>
            <td style="height: 43px; text-align: left; color: rgb(136, 136, 136); padding-right: 20px; padding-left: 20px; font-size: 13px; border-bottom-color: rgb(229, 229, 229); border-bottom-width: 1px; border-bottom-style: solid; background-color: rgb(247, 247, 247);">決済方法</td>
            <td style="width: 80%; height: 43px; color: rgb(51, 51, 51); padding-left: 20px; font-size: 13px; border-bottom-color: rgb(229, 229, 229); border-bottom-width: 1px; border-bottom-style: solid;">{rc_settleKind}</td>
        </tr>
        </tbody>
    </table>
    <div style="color: rgb(68, 68, 68); font-family: &quot;Malgun Gothic&quot;; font-size: 15px; margin: 40px 0px 10px; font-weight: bold;">商品情報</div>
    <table class="__se_tbl_ext" style="color: rgb(85, 85, 85); font-family: &quot;Malgun Gothic&quot;; font-size: 13px; width: inherit; border-top: 1px solid rgb(181, 181, 181); border-collapse: collapse;">
        <colgroup>
            <col width="70%">
            <col width="10%">
            <col width="">
        </colgroup>
        <thead>
        <tr>
            <td style="height: 43px; text-align: center; border-bottom: 1px solid rgb(229, 229, 229); background-color: rgb(243, 243, 243);">商品名</td>
            <td style="height: 43px; text-align: center; font-size: 13px; border-bottom-color: rgb(229, 229, 229); border-bottom-width: 1px; border-bottom-style: solid; background-color: rgb(243, 243, 243);">数</td>
            <td style="height: 43px; text-align: center; font-size: 13px; border-bottom-color: rgb(229, 229, 229); border-bottom-width: 1px; border-bottom-style: solid; background-color: rgb(243, 243, 243);">価格</td>
        </tr>
        </thead>
        <tbody>
        <!--{@ rc_goods}-->
        <tr>
            <td style="height: 43px; text-align: left; padding-top: 15px; padding-bottom: 15px; padding-left: 20px; border-bottom: 1px solid rgb(229, 229, 229);">
                <!--{? .goodsType == 'addGoods'}-->
                <img style="vertical-align: middle;" alt="add goods icon" src="/data/mail/img/icon_plus.gif">
                <!--{/}-->{.goodsNm}
                <!--{? .optionInfo}-->
                <br>
                <span style="font-size: 12px; color: rgb(153, 153, 153);">
                    <!--{@ .optionInfo}-->{..optionName} : {..optionValue}
                    <!--{? (..size_ - 1 ) != ..index_}--> / <!--{/}-->
                    <!--{/}-->
                </span>
                <!--{/}-->
                <!--{@ .optionTextInfo}-->
                <br><font color="#999999">
                    <span style="font-size: 12px;">オプション : {..optionValue}</span>
                </font>
                <!--{/}-->
            </td>
            <td style="height: 43px; text-align: center; padding-top: 15px; padding-bottom: 15px; font-size: 13px; border-bottom-color: rgb(229, 229, 229); border-bottom-width: 1px; border-bottom-style: solid;">{.goodsCnt}</td>
            <td style="height: 43px; text-align: center; padding-top: 15px; padding-bottom: 15px; font-size: 13px; border-bottom-color: rgb(229, 229, 229); border-bottom-width: 1px; border-bottom-style: solid;">{=gd_global_currency_display(.settlePrice + .totalMemberDcPrice + .totalMemberOverlapDcPrice + .totalCouponGoodsDcPrice)}</td>
        </tr>
        <!--{/}-->
        <tr>
            <td style="height: 43px; text-align: right; padding-top: 20px; padding-bottom: 20px; border-bottom: 1px solid rgb(229, 229, 229);" colspan="3">
                商品購入総額
                <span style="font-size: 13px; color: rgb(51, 51, 51); font-weight: bold;">{=gd_global_currency_display(rc_totalGoodsPrice)}</span>
                + 総配送料
                <span style="font-size: 13px; color: rgb(51, 51, 51); font-weight: bold;">{=gd_global_currency_display(rc_totalDeliveryCharge)}</span>
                + 海外保険料
                <span style="font-size: 13px; color: rgb(51, 51, 51); font-weight: bold;">{=gd_global_currency_display(rc_totalDeliveryInsuranceFee)}</span>
                - 割引総額
                <span style="font-size: 13px; color: rgb(51, 51, 51); font-weight: bold;">{=gd_global_currency_display(rc_totalSumMemberDcPrice)}</span>
                &nbsp;<br> <font color="#f91d11">
                    <span style="font-size: 14px;"><b>= 決済総額&nbsp;{=gd_global_currency_display(rc_settlePrice)}</b></span>
                </font>
            </td>
        </tr>
        </tbody>
    </table>
    <!--{ ? rc_gift }-->
    <div style="color: rgb(68, 68, 68); font-family: &quot;Malgun Gothic&quot;; font-size: 15px; margin: 40px 0px 10px; font-weight: bold;">景品情報</div>
    <table class="__se_tbl_ext" style="color: rgb(85, 85, 85); font-family: &quot;Malgun Gothic&quot;; font-size: 13px; width: inherit; border-top: 1px solid rgb(181, 181, 181); border-collapse: collapse;">
        <colgroup>
            <col width="70%">
            <col width="10%">
            <col width="">
        </colgroup>
        <thead>
        <tr>
            <td style="height: 43px; text-align: center; font-size: 13px; border-bottom-color: rgb(229, 229, 229); border-bottom-width: 1px; border-bottom-style: solid; background-color: rgb(243, 243, 243);">商品名<br></td>
            <td style="height: 43px; text-align: center; font-size: 13px; border-bottom-color: rgb(229, 229, 229); border-bottom-width: 1px; border-bottom-style: solid; background-color: rgb(243, 243, 243);">数<br></td>
            <td style="height: 43px; text-align: center; font-size: 13px; border-bottom-color: rgb(229, 229, 229); border-bottom-width: 1px; border-bottom-style: solid; background-color: rgb(243, 243, 243);">備考</td>
        </tr>
        </thead>
        <tbody>
        <!--{ @ rc_gift }-->
        <tr>
            <td style="height: 43px; text-align: left; padding-top: 15px; padding-bottom: 15px; padding-left: 20px; font-size: 13px; border-bottom-color: rgb(229, 229, 229); border-bottom-width: 1px; border-bottom-style: solid;">{.giftNm}</td>
            <td style="height: 43px; text-align: center; padding-top: 15px; padding-bottom: 15px; font-size: 13px; border-bottom-color: rgb(229, 229, 229); border-bottom-width: 1px; border-bottom-style: solid;">{.giveCnt}</td>
            <td style="height: 43px; text-align: center; padding-top: 15px; padding-bottom: 15px; font-size: 13px; border-bottom-color: rgb(229, 229, 229); border-bottom-width: 1px; border-bottom-style: solid;">{.presentTitle}</td>
        </tr>
        <!--{ / }-->
        </tbody>
    </table>
    <!--{ / }-->
    <div style="color: rgb(68, 68, 68); font-family: &quot;Malgun Gothic&quot;; font-size: 15px; margin: 40px 0px 10px; font-weight: bold;">配送情報</div>
    <table class="__se_tbl_ext" style="color: rgb(85, 85, 85); font-family: &quot;Malgun Gothic&quot;; font-size: 13px; width: inherit; border-top: 1px solid rgb(181, 181, 181); border-collapse: collapse;">
        <tbody>
        <tr>
            <td style="height: 43px; text-align: left; color: rgb(136, 136, 136); padding-right: 20px; padding-left: 20px; font-size: 13px; border-bottom-color: rgb(229, 229, 229); border-bottom-width: 1px; border-bottom-style: solid; background-color: rgb(247, 247, 247);">受取人名</td>
            <td style="width: 80%; height: 43px; color: rgb(51, 51, 51); padding-left: 20px; font-size: 13px; border-bottom-color: rgb(229, 229, 229); border-bottom-width: 1px; border-bottom-style: solid;">{rc_receiverNm}</td>
        </tr>
        <tr>
            <td style="height: 43px; text-align: left; color: rgb(136, 136, 136); padding-right: 20px; padding-left: 20px; font-size: 13px; border-bottom-color: rgb(229, 229, 229); border-bottom-width: 1px; border-bottom-style: solid; background-color: rgb(247, 247, 247);">住所</td>
            <td style="width: 80%; height: 43px; color: rgb(51, 51, 51); padding-left: 20px; font-size: 13px; border-bottom-color: rgb(229, 229, 229); border-bottom-width: 1px; border-bottom-style: solid;">{rc_receiverZonecode} {rc_receiverAddressSub} {rc_receiverAddress} {rc_receiverState} {rc_receiverCity} {rc_receiverCountry}</td>
        </tr>
        <tr>
            <td style="height: 43px; text-align: left; color: rgb(136, 136, 136); padding-right: 20px; padding-left: 20px; font-size: 13px; border-bottom-color: rgb(229, 229, 229); border-bottom-width: 1px; border-bottom-style: solid; background-color: rgb(247, 247, 247);">電話番号</td>
            <td style="width: 80%; height: 43px; color: rgb(51, 51, 51); padding-left: 20px; font-size: 13px; border-bottom-color: rgb(229, 229, 229); border-bottom-width: 1px; border-bottom-style: solid;">(+ {rc_receiverPhonePrefix}) {rc_receiverPhone}</td>
        </tr>
        <tr>
            <td style="height: 43px; text-align: left; padding-right: 20px; padding-left: 20px; border-bottom: 1px solid rgb(229, 229, 229); background-color: rgb(247, 247, 247);"><font color="#888888">携帯電話番号</font></td>
            <td style="width: 80%; height: 43px; color: rgb(51, 51, 51); padding-left: 20px; font-size: 13px; border-bottom-color: rgb(229, 229, 229); border-bottom-width: 1px; border-bottom-style: solid;">(+ {rc_receiverCellPhonePrefix}) {rc_receiverCellPhone}</td>
        </tr>
        <tr>
            <td style="height: 43px; text-align: left; color: rgb(136, 136, 136); padding-right: 20px; padding-left: 20px; font-size: 13px; border-bottom-color: rgb(229, 229, 229); border-bottom-width: 1px; border-bottom-style: solid; background-color: rgb(247, 247, 247);">配送メッセージ</td>
            <td style="width: 80%; height: 43px; color: rgb(51, 51, 51); padding-left: 20px; font-size: 13px; border-bottom-color: rgb(229, 229, 229); border-bottom-width: 1px; border-bottom-style: solid;">{rc_receiverMemo}</td>
        </tr>
        </tbody>
    </table>
    <div style="color: rgb(229, 229, 229); font-family: &quot;Malgun Gothic&quot;; font-size: 13px; margin-top: 70px; margin-bottom: 20px; border-bottom: 1px solid currentcolor;"></div>
    <div style="color: rgb(85, 85, 85); font-family: &quot;Malgun Gothic&quot;; font-size: 13px; margin-bottom: 20px;"><!--{ @ gd_get_footer_logo_tag() }-->{=.tag}<!--{ / }--> </div>
    <div style="color: rgb(102, 102, 102); font-family: &quot;Malgun Gothic&quot;; font-size: 13px; margin-bottom: 25px;">
        <p>本メールの送信アドレスは送信専用となっておりますので、このメールアドレスでは返信はお受けできません。追加のお問い合わせは<a style="color: rgb(68, 68, 68); font-size: 12px; font-weight: bold;" href="#">[カスタマーセンター]</a>をご利用ください。
        </p>
        <p style="color: rgb(153, 153, 153); font-size: 11px;">Copyright(C) <b style="color: rgb(153, 153, 153); font-size: 11px;">{rc_mallNm}</b> All right reserved.</p>
    </div>
</div>
