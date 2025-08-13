<?php /* Template_ 2.2.7 2025/05/22 10:03:57 /www/newmanjoo14_godomall_com/data/skin/front/moment/member/_join_view.html 000013084 */ ?>
<div class="base_info_box">
    <h3><?php echo __('기본정보')?></h3>
    <span class="important"><?php echo __('표시는 반드시 입력하셔야 하는 항목입니다.')?></span>
    <div class="base_info_sec">
        <table border="0" cellpadding="0" cellspacing="0">
            <colgroup>
                <col width="25%">
                <col width="75%">
            </colgroup>
            <tbody>
            <tr>
                <th><span class="important"><?php echo __('아이디')?></span></th>
                <td>
<?php if($TPL_VAR["isMyPage"]){?>
                    <input type="hidden" name="memId" value="<?php echo $TPL_VAR["data"]["memId"]?>"/>
                    <?php echo $TPL_VAR["data"]["memId"]?>

<?php }else{?>
                    <div class="member_warning">
                        <input type="text" id="memId" name="memId" data-pattern="gdMemberId" <?php if($TPL_VAR["isGoogleJoin"]){?>readonly<?php }?>/>
                    </div>
<?php }?>
                </td>

            </tr>
            <tr class="<?php if($TPL_VAR["isPaycoJoin"]||$TPL_VAR["isNaverJoin"]||$TPL_VAR["isThirdParty"]||$TPL_VAR["isKakaoJoin"]||$TPL_VAR["isWonderJoin"]||$TPL_VAR["isAppleJoin"]||$TPL_VAR["isGoogleJoin"]){?>dn<?php }?>">
                <th><span class="important"><?php echo __('비밀번호')?></span></th>
                <td class="member_password">
<?php if($TPL_VAR["isMyPage"]){?>
                    <div class="btn_common_box">
<?php if($TPL_VAR["useSnsLogin"]=='n'){?>
                        <span class="btn_gray_list"><a href="#memberNewPw" class="btn_gray_mid"><em><?php echo __('비밀번호 변경')?></em></a></span>
<?php }else{?>
                        <span class="btn_gray_list"><a href="#memberNewPw" class="btn_gray_mid"><em><?php echo __('비밀번호 설정')?></em></a></span>
<?php }?>
                        <span class="btn_gray_list"><a href="#lyMemberPw" class="btn_gray_mid"><em><?php echo __('비밀번호 도움말')?></em></a></span>
                    </div>

                    <div id="lyMemberPw" class="layer_area" style="display:none;">
                        <div class="ly_wrap pw_advice_layer">
                            <div class="ly_tit">
                                <strong><?php echo __('비밀번호 도움말')?></strong>
                            </div>
                            <div class="ly_cont">
                                <div class="pw_advice_list">
                                    <ul>
                                        <li><?php echo __('영문대소문자는 구분이 되며, 한가지 문자로만 입력은 위험합니다.')?></li>
                                        <li><strong><?php echo __('사용가능 특수문자')?> :</strong> <strong class="fc_red">!@#$%^&*()_+-=`~</strong></li>
                                        <li><?php echo __('ID/주민번호/생일/전화번호 등의 개인정보와 통상 사용 순서대로의 3자 이상 연속 사용은 피해주세요.')?>

                                            <br/><?php echo __('비밀번호는 주기적으로 바꾸어 사용하시는 것이 안전합니다.')?></li>
                                    </ul>
                                </div>
                            </div>
                            <!-- //ly_cont -->
                            <a href="#close" class="ly_close"><img src="/data/skin/front/moment/img/common/layer/btn_layer_close.png" alt="<?php echo __('닫기')?>"></a>
                        </div>
                        <!-- //ly_wrap -->
                    </div>
                    <!-- //layer_area -->

                    <div id="memberNewPw" class="member_pw_change" style="display:none;">
                        <dl class="<?php if($TPL_VAR["isEmptyPassword"]){?> dn <?php }?>">
                            <dt><?php echo __('현재 비밀번호')?></dt>
                            <dd>
                                <div class="member_warning">
                                    <input type="password" id="currentPassword" name="oldMemPw"/>
                                </div>
                            </dd>
                        </dl>
                        <dl>
                            <dt><?php echo __('새 비밀번호')?></dt>
                            <dd>
                                <div class="member_warning">
                                    <input type="password" id="newPassword" name="memPw"/>
                                </div>
                            </dd>
                        </dl>
                        <dl>
                            <dt><?php echo __('새 비밀번호 확인')?></dt>
                            <dd>
                                <div class="member_warning">
                                    <input type="password" id="newPasswordCheck" name="memPwRe"/>
                                </div>
                            </dd>
                        </dl>
                    </div>
                    <!-- //member_pw_change -->
<?php }else{?>
                    <div class="member_warning">
                        <input type="password" id="newPassword" name="memPw" autocomplete="off" placeholder="<?php echo $TPL_VAR["message"]["memPw"]["placeholder"]?>"/>
                    </div>
<?php }?>
                </td>
            </tr>
<?php if(!$TPL_VAR["isMyPage"]){?>
            <tr class="<?php if($TPL_VAR["isPaycoJoin"]||$TPL_VAR["isNaverJoin"]||$TPL_VAR["isThirdParty"]||$TPL_VAR["isKakaoJoin"]||$TPL_VAR["isWonderJoin"]||$TPL_VAR["isAppleJoin"]||$TPL_VAR["isGoogleJoin"]){?>dn<?php }?>">
                <th><span class="important"><?php echo __('비밀번호 확인')?></span></th>
                <td>
                    <div class="member_warning">
                        <input type="password" class="check-id" name="memPwRe" autocomplete="off"/>
                    </div>
                </td>
            </tr>
<?php }?>
            <tr>
                <th><span class="important"><?php echo __('이름')?></span></th>
                <td>
                    <div class="member_warning">
                        <input type="text" name="memNm" data-pattern="gdMemberNmGlobal" value="<?php echo $TPL_VAR["data"]["memNm"]?>" maxlength="30" <?php echo $TPL_VAR["data"]["authReadOnly"]?>/>
                    </div>
                </td>
            </tr>
<?php if($TPL_VAR["joinField"]["pronounceName"]["use"]=='y'){?>
            <tr>
                <th><span class="important"><?php echo __('이름')?>(<?php echo __('발음')?>)</span></th>
                <td>
                    <div class="member_warning">
                        <input type="text" name="pronounceName" maxlength="30" value="<?php echo $TPL_VAR["data"]["pronounceName"]?>" data-pattern="<?php if($TPL_VAR["gGlobal"]['isFront']){?>gdMemberNmGlobal<?php }else{?>gdEngKor<?php }?>"/>
                    </div>
                </td>
            </tr>
<?php }?>
<?php if($TPL_VAR["joinField"]["nickNm"]["use"]=='y'){?>
            <tr>
                <th><span><?php echo __('닉네임')?></span></th>
                <td>
                    <div class="member_warning">
                        <input type="text" name="nickNm" maxlength="20" value="<?php echo $TPL_VAR["data"]["nickNm"]?>"/>
                    </div>
                </td>
            </tr>
<?php }?>
<?php if($TPL_VAR["joinField"]["email"]["use"]=='y'){?>
            <tr>
                <th><span><?php echo __('이메일')?></span></th>
                <td class="member_email">
                    <div class="member_warning">
                        <input type="text" name="email" id="email" value="<?php echo $TPL_VAR["data"]["email"]?>" tabindex="-1"/>
                        <select id="emailDomain" name="emailDomain" class="chosen-select">
<?php if((is_array($TPL_R1=$TPL_VAR["joinField"]["email"]["data"])&&!empty($TPL_R1)) || (is_object($TPL_R1) && in_array("Countable", class_implements($TPL_R1)) && $TPL_R1->count() > 0)) {foreach($TPL_R1 as $TPL_K1=>$TPL_V1){?><?php if($TPL_V1==$TPL_VAR["data"]["emailDomain"]){?>
                            <option value="<?php echo $TPL_K1?>" selected="selected"><?php echo $TPL_V1?></option>
<?php }else{?>
                            <option value="<?php echo $TPL_K1?>"><?php echo $TPL_V1?></option>
<?php }?><?php }}?>
                        </select>
                    </div>
					<div class="member_warning js_email"></div>
<?php if($TPL_VAR["joinField"]["maillingFl"]["use"]==='y'){?>
                    <div class="form_element">
                        <input type="checkbox" id="maillingFl" name="maillingFl" value="y" <?php if($TPL_VAR["data"]["maillingFl"]=='y'){?>checked="checked"<?php }?>/>
                        <label for="maillingFl" class="check_s <?php if($TPL_VAR["data"]["maillingFl"]=='y'){?>on<?php }?>"><?php echo __('정보/이벤트 메일 수신에 동의합니다.')?></label>
                    </div>
<?php }?>
                </td>
            </tr>
<?php }?>
<?php if($TPL_VAR["joinField"]["cellPhone"]["use"]=='y'){?>
            <tr>
                <th><span <?php echo $TPL_VAR["data"]["authClassRequired"]?>><?php echo __('휴대폰번호')?></span></th>
                <td class="member_address">
<?php if($TPL_VAR["gGlobal"]["isFront"]){?>
                    <?php echo gd_select_box('cellPhoneCountryCode','cellPhoneCountryCode',$TPL_VAR["countryPhone"],null,$TPL_VAR["data"]["cellPhoneCountryCode"],__('국가코드'),'style="width: 120px;"','chosen-select')?>

<?php }?>
                    <div class="address_postcode">
                        <input type="text" id="cellPhone" name="cellPhone" maxlength="12" placeholder="- <?php echo __('없이 입력하세요.')?>" data-pattern="gdNum" value="<?php echo $TPL_VAR["data"]["cellPhone"]?>" <?php echo $TPL_VAR["data"]["authReadOnly"]?>/>
<?php if($TPL_VAR["isMyPage"]){?>
<?php if($TPL_VAR["data"]["authReadOnly"]!=''){?>
                        <button class="btn_post_search" type="button" id="btnAuthPhone">
                            <?php echo __('휴대폰번호 변경')?>

                        </button>
<?php }?>
<?php }?>
                    </div>
<?php if($TPL_VAR["joinField"]["smsFl"]["use"]==='y'){?>
                    <div class="form_element">
                        <input type="checkbox" id="smsFl" name="smsFl" value="y" <?php if($TPL_VAR["data"]["smsFl"]=='y'){?>checked="checked"<?php }?>/>
                        <label for="smsFl" class="check_s <?php if($TPL_VAR["data"]["smsFl"]=='y'){?>on<?php }?>"><?php echo __('정보/이벤트 SMS 수신에 동의합니다.')?></label>
                    </div>
<?php }?>
                </td>
            </tr>
<?php }?>
<?php if($TPL_VAR["joinField"]["phone"]["use"]=='y'){?>
            <tr>
                <th><span><?php echo __('전화번호')?></span></th>
                <td>
<?php if($TPL_VAR["gGlobal"]["isFront"]){?>
                    <?php echo gd_select_box('phoneCountryCode','phoneCountryCode',$TPL_VAR["countryPhone"],null,$TPL_VAR["data"]["phoneCountryCode"],__('국가코드'),'style="width: 120px;"','chosen-select')?>

<?php }?>
                    <div class="member_warning">
                        <input type="text" id="phone" name="phone" maxlength="12" placeholder="- <?php echo __('없이 입력하세요.')?>" data-pattern="gdNum" value="<?php echo $TPL_VAR["data"]["phone"]?>"/>
                    </div>
                </td>
            </tr>
<?php }?>
<?php if($TPL_VAR["joinField"]["address"]["use"]=='y'){?>
            <tr>
                <th><span><?php echo __('주소')?></span></th>
                <td class="member_address">
                    <div class="address_postcode">
                        <input type="text" name="zonecode" readonly="readonly" value="<?php if($TPL_VAR["data"]["zonecode"]==''){?><?php echo $TPL_VAR["data"]["zipcode"]?><?php }else{?><?php echo $TPL_VAR["data"]["zonecode"]?><?php }?>"/>
                        <button type="button" id="btnPostcode" class="btn_post_search"><?php echo __('우편번호검색')?></button>
                        <input type="hidden" name="zipcode" value="<?php echo $TPL_VAR["data"]["zipcode"]?>"/>
                    </div>
                    <div class="address_input">
                        <div class="member_warning">
                            <input type="text" name="address" readonly="readonly" value="<?php echo $TPL_VAR["data"]["address"]?>"/>
                        </div>
                        <div class="member_warning js_address_sub">
                            <input type="text" name="addressSub" value="<?php echo $TPL_VAR["data"]["addressSub"]?>"/>
                        </div>
                    </div>
                </td>
            </tr>
<?php }?>
            </tbody>
        </table>
    </div>
    <!-- //base_info_sec -->
</div>
<!-- //base_info_box -->