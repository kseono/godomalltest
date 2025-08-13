<div style="padding-left:20px;padding-right:20px;margin:auto;width:600px;background-color:#ffffff;font-family:Malgun Gothic; font-size:13px; color:#555;">
    <div style="height: 46px; text-align: right; margin-top: 20px; margin-bottom: 50px; border-bottom-color: rgb(102, 102, 102); border-bottom-width: 2px; border-bottom-style: solid;">
        <a style="color: #888; font-weight: bold; text-decoration: none; cursor: pointer;" href="#" target="_blank">{rc_mallDomain}</a>
    </div>
    <div style="margin-bottom: 50px;">
        <div style="color:#444; font-size: 32px; letter-spacing:-2px;">
            <b>회원등급</b>이<br>변경되었습니다. <img style="margin-top: -40px; margin-right: 10px; float: right;" alt="mailimg_grade top image" src="/data/mail/img/mailimg_grade.png">
        </div>
        <div style="margin-top: 30px; line-height:22px;"> 안녕하세요.
            <strong>{rc_mallNm}</strong>
            입니다. <br> {rc_mallNm}을 이용해주시는 {rc_memNm}님께 감사드리며,<br> {rc_memNm}님의 회원등급이 {rc_groupNm} {rc_grpLabel}으로 변경되어 안내드립니다. <br> 회원등급에 따라 주어지는 혜택은 다음과 같습니다.
        </div>
    </div>
    <div style="font-size:15px;color:#444;font-weight:bold;margin-bottom:10px;">회원등급정보</div>
    <table class="__se_tbl_ext" style="width: inherit; border-top-color: #bababa;; border-top-width: 1px; border-top-style: solid; border-collapse: collapse;">
        <tbody>
        <tr>
            <td style="height: 43px; color: #888; padding-right: 20px; padding-left: 20px; font-size: 13px; border-bottom-color: #e5e5e5; border-bottom-width: 1px; border-bottom-style: solid; background-color: #f7f7f7;">회원등급명</td>
            <td style="width: 80%; height: 43px; color: rgb(51, 51, 51); padding-left: 20px; font-size: 13px; border-bottom-color: #e5e5e5; border-bottom-width: 1px; border-bottom-style: solid;">{rc_groupNm}</td>
        </tr>
        <tr>
            <td style="height: 43px; color: #888; padding-right: 20px; padding-left: 20px; font-size: 13px; border-bottom-color: #e5e5e5; border-bottom-width: 1px; border-bottom-style: solid; background-color: #f7f7f7;">회원혜택</td>
            <td style="width: 80%; height: 43px; color: rgb(51, 51, 51); padding-left: 20px; font-size: 13px; border-bottom-color: #e5e5e5; border-bottom-width: 1px; border-bottom-style: solid;">
                <div>
                    <p>- 추가할인: {rc_dcLine} 이상 구매 시 구매금액당 {rc_dcPercent}%</p>
                    <p style="padding-left:20px;">* 추가할인 적용제외</p>
                    <ul>
                        <!-- {? rc_dcExScm} -->
                        <li><!-- {@ rc_dcExScm} -->{.value_['companyNm']}<!-- {? .index_ < .size_-1} -->, <!-- {/} --><!-- {/} --></li>
                        <!-- {/} -->
                        <!-- {? rc_dcExCategory} -->
                        <li><!-- {@ rc_dcExCategory} -->{.value_['cateNm']}<!-- {? .index_ < .size_-1} -->, <!-- {/} --><!-- {/} --></li>
                        <!-- {/} -->
                        <!-- {? rc_dcExBrand} -->
                        <li><!-- {@ rc_dcExBrand} -->{.value_['brandNm']}<!-- {? .index_ < .size_-1} -->, <!-- {/} --><!-- {/} --></li>
                        <!-- {/} -->
                        <!-- {? rc_dcExGoods} -->
                        <li><!-- {@ rc_dcExGoods} -->{.value_['goodsNm']}<!-- {? .index_ < .size_-1} -->, <!-- {/} --><!-- {/} --></li>
                        <!-- {/} -->
                    </ul>
                </div>
                <div>
                    <p>- 중복할인: {rc_overlapDcLine} 이상 구매 시 구매금액당 {rc_overlapDcPercent}%</p>
                    <p style="padding-left:20px;">* 중복할인 적용</p>
                    <ul>
                        <!-- {? rc_overlapDcScm} -->
                        <li><!-- {@ rc_overlapDcScm} -->{.value_['companyNm']}<!-- {? .index_ < .size_-1} -->, <!-- {/} --><!-- {/} --></li>
                        <!-- {/} -->
                        <!-- {? rc_overlapDcCategory} -->
                        <li><!-- {@ rc_overlapDcCategory} -->{.value_['cateNm']}<!-- {? .index_ < .size_-1} -->, <!-- {/} --><!-- {/} --></li>
                        <!-- {/} -->
                        <!-- {? rc_overlapDcBrand} -->
                        <li><!-- {@ rc_overlapDcBrand} -->{.value_['brandNm']}<!-- {? .index_ < .size_-1} -->, <!-- {/} --><!-- {/} --></li>
                        <!-- {/} -->
                        <!-- {? rc_overlapDcGoods} -->
                        <li><!-- {@ rc_overlapDcGoods} -->{.value_['goodsNm']}<!-- {? .index_ < .size_-1} -->, <!-- {/} --><!-- {/} --></li>
                        <!-- {/} -->
                    </ul>
                </div>
                <div>
                    <p>- 추가 적립 마일리지 : {rc_mileageLine} 이상 구매 시 구매금액당 {rc_mileagePercent}%</p>
                </div>
                <br>
                <div>구매금액 기준 : 판매가<!-- {? rc_fixedRateOption} --> +<!-- {@ rc_fixedRateOption} -->
                    <!-- {? .value_ == 'option'} -->옵션가<!-- {: .value_ == 'goods'} --> + 추가상품가<!-- {: .value_ == 'text'} --> + 텍스트옵션가<!-- {/} -->
                    <!-- {/} -->
                    <!-- {/} -->
                </div>
            </td>
        </tr>
        <tr>
            <td style="height: 43px; color: #888; padding-right: 20px; padding-left: 20px; font-size: 13px; border-bottom-color: #e5e5e5; border-bottom-width: 1px; border-bottom-style: solid; background-color: #f7f7f7;">사용가능한 결제수단</td>
            <td style="width: 80%; height: 43px; color: rgb(51, 51, 51); padding-left: 20px; font-size: 13px; border-bottom-color: #e5e5e5; border-bottom-width: 1px; border-bottom-style: solid;">{rc_settleGb}</td>
        </tr>
        <tr>
            <td style="height: 43px; color: #888; padding-right: 20px; padding-left: 20px; font-size: 13px; border-bottom-color: #e5e5e5; border-bottom-width: 1px; border-bottom-style: solid; background-color: #f7f7f7;">등급평가일</td>
            <td style="width: 80%; height: 43px; color: rgb(51, 51, 51); padding-left: 20px; font-size: 13px; border-bottom-color: #e5e5e5; border-bottom-width: 1px; border-bottom-style: solid;">{rc_changeDt}</td>
        </tr>
        </tbody>
    </table>
    <div style="margin-bottom: 50px;">
        <div style="margin-top: 30px;">
            <p style="font-size:12px;color:#666666; line-height:20px;">- 기타문의사항이 있으시면 고객센터로 연락주시기 바랍니다.<br>&nbsp;&nbsp;감사합니다.</p>
        </div>
    </div>
    <div style="color: #e5e5e5; margin-top: 80px; margin-bottom: 20px; border-bottom-color: currentColor; border-bottom-width: 1px; border-bottom-style: solid;"></div>
    <div style="margin-bottom: 20px;"><!--{ @ gd_get_footer_logo_tag() }-->{=.tag}<!--{ / }--> </div>
    <div style="margin-bottom: 25px; font-size: 13px;color:#666666;">
        <p>본 메일은 발신 전용으로 회신되지 않습니다. 추가 문의는 <a href="#" style="font-size: 12px;color:#444;font-weight: bold;">[고객센터]</a>를 이용해주시기 바랍니다.
        </p>
        <p style="font-size:11px;color:#999;">Copyright(C) <b style="font-size:11px;color:#999;">{rc_mallNm}</b> All right reserved.</p>
    </div>


</div>
