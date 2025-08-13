<?php /* Template_ 2.2.7 2025/05/22 10:03:57 /www/newmanjoo14_godomall_com/data/skin/front/moment/member/_join_view_business.html 000004452 */ ?>
<?php if($TPL_VAR["joinField"]["businessinfo"]["use"]=='y'){?>
<div class="business_info_box <?php if(!$TPL_VAR["isMyPage"]){?>dn<?php }?>">
    <h3><?php echo __('사업자 정보')?></h3>
    <div class="business_info_sec">
        <table border="0" cellpadding="0" cellspacing="0">
            <colgroup>
                <col width="25%">
                <col width="75%">
            </colgroup>
            <tbody>
<?php if($TPL_VAR["joinField"]["company"]["use"]=='y'){?>
            <tr>
                <th><span><?php echo __('상호')?></span></th>
                <td>
                    <div class="member_warning">
                        <input type="text" name="company" value="<?php echo $TPL_VAR["data"]["company"]?>" maxlength="50" data-pattern="gdMemberNmGlobal"/>
                    </div>
                </td>
            </tr>
<?php }?>
<?php if($TPL_VAR["joinField"]["busiNo"]["use"]=='y'){?>
            <tr>
                <th><span><?php echo __('사업자번호')?></span></th>
                <td>
                    <div class="member_warning">
                        <input type="text" name="busiNo" id="busiNo" data-pattern="gdNum" maxlength="10" placeholder="- <?php echo __('-없이 입력하세요.')?>" value="<?php echo $TPL_VAR["data"]["busiNo"]?>" data-overlap-businofl="<?php echo $TPL_VAR["joinField"]["busiNo"]["overlapBusiNoFl"]?>" data-charlen="<?php echo $TPL_VAR["joinField"]["busiNo"]["charlen"]?>" data-oldbusino="<?php echo $TPL_VAR["data"]["busiNo"]?>"/>
                    </div>
                </td>
            </tr>
<?php }?>
<?php if($TPL_VAR["joinField"]["ceo"]["use"]=='y'){?>
            <tr>
                <th><span><?php echo __('대표자명')?></span></th>
                <td>
                    <div class="member_warning">
                        <input type="text" name="ceo" value="<?php echo $TPL_VAR["data"]["ceo"]?>" maxlength="20" data-pattern="gdEngKor"/>
                    </div>
                </td>
            </tr>
<?php }?>
<?php if($TPL_VAR["joinField"]["service"]["use"]=='y'){?>
            <tr>
                <th><span><?php echo __('업태')?></span></th>
                <td>
                    <div class="member_warning">
                        <input type="text" name="service" value="<?php echo $TPL_VAR["data"]["service"]?>" maxlength="30" data-pattern="gdServiceId"/>
                    </div>
                </td>
            </tr>
<?php }?>
<?php if($TPL_VAR["joinField"]["item"]["use"]=='y'){?>
            <tr>
                <th><span><?php echo __('종목')?></span></th>
                <td>
                    <div class="member_warning">
                        <input type="text" name="item" value="<?php echo $TPL_VAR["data"]["item"]?>" maxlength="30" data-pattern="gdServiceId"/>
                    </div>
                </td>
            </tr>
<?php }?>
<?php if($TPL_VAR["joinField"]["comAddress"]["use"]=='y'){?>
            <tr>
                <th><span><?php echo __('주소')?></span></th>
                <td class="member_address">
                    <div class="address_postcode">
                        <div class="member_warning">
                            <input type="text" name="comZonecode" readonly="readonly" value="<?php echo $TPL_VAR["data"]["comZonecode"]?>"/> <button type="button" id="btnCompanyPostcode" class="btn_post_search"><?php echo __('우편번호검색')?></button>
                        </div>
                        <input type="hidden" name="comZipcode" value="<?php echo $TPL_VAR["data"]["comZipcode"]?>"/>
                    </div>
                    <div class="address_input">
                        <div class="member_warning">
                            <input type="text" name="comAddress" readonly="readonly" value="<?php echo $TPL_VAR["data"]["comAddress"]?>"/>
                        </div>
                        <div class="member_warning js_com_address_sub">
                            <input type="text" name="comAddressSub" value="<?php echo $TPL_VAR["data"]["comAddressSub"]?>"/>
                        </div>
                    </div>
                </td>
            </tr>
<?php }?>
            </tbody>
        </table>
    </div>
    <!-- //business_info_sec -->
</div>
<!-- //business_info_box -->
<?php }?>