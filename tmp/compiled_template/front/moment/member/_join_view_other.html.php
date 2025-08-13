<?php /* Template_ 2.2.7 2025/05/22 10:03:57 /www/newmanjoo14_godomall_com/data/skin/front/moment/member/_join_view_other.html 000034312 */ 
if (is_array($TPL_VAR["privateApprovalOption"])) $TPL_privateApprovalOption_1=count($TPL_VAR["privateApprovalOption"]); else if (is_object($TPL_VAR["privateApprovalOption"]) && in_array("Countable", class_implements($TPL_VAR["privateApprovalOption"]))) $TPL_privateApprovalOption_1=$TPL_VAR["privateApprovalOption"]->count();else $TPL_privateApprovalOption_1=0;
if (is_array($TPL_VAR["privateConsign"])) $TPL_privateConsign_1=count($TPL_VAR["privateConsign"]); else if (is_object($TPL_VAR["privateConsign"]) && in_array("Countable", class_implements($TPL_VAR["privateConsign"]))) $TPL_privateConsign_1=$TPL_VAR["privateConsign"]->count();else $TPL_privateConsign_1=0;
if (is_array($TPL_VAR["privateOffer"])) $TPL_privateOffer_1=count($TPL_VAR["privateOffer"]); else if (is_object($TPL_VAR["privateOffer"]) && in_array("Countable", class_implements($TPL_VAR["privateOffer"]))) $TPL_privateOffer_1=$TPL_VAR["privateOffer"]->count();else $TPL_privateOffer_1=0;?>
<?php if($TPL_VAR["joinField"]["options"]["use"]=='y'){?>
<div class="addition_info_box">
    <h3><?php echo __('부가 정보')?></h3>
    <div class="addition_info_sec">
        <table border="0" cellpadding="0" cellspacing="0">
            <colgroup>
                <col width="25%">
                <col width="75%">
            </colgroup>
            <tbody>
<?php if($TPL_VAR["joinField"]["fax"]["use"]=='y'){?>
            <tr>
                <th><span><?php echo __('팩스번호')?></span></th>
                <td>
                    <div class="member_warning">
                        <input type="text" id="fax" name="fax" class="text" data-pattern="gdNum" maxlength="12" placeholder="- <?php echo __('없이 입력하세요.')?>" value="<?php echo $TPL_VAR["data"]["fax"]?>"/>
                    </div>
                </td>
            </tr>
<?php }?>
<?php if($TPL_VAR["joinField"]["sexFl"]["use"]=='y'){?>
            <tr>
                <th><span <?php echo $TPL_VAR["data"]["authClassRequired"]?>><?php echo __('성별')?></span></th>
                <td>
                    <div class="member_warning">
                        <div class="form_element">
                            <ul>
                                <li>
                                    <input type="radio" id="sexFlMan" name="sexFl" value="m" <?php if($TPL_VAR["data"]["sexFl"]=='m'){?>checked="checked"<?php }else{?><?php echo $TPL_VAR["data"]["authDisabled"]?><?php }?>/>
                                    <label for="sexFlMan" class="choice_s <?php if($TPL_VAR["data"]["sexFl"]=='m'){?>on<?php }?>"><?php echo __('남자')?></label>
                                </li>
                                <li>
                                    <input type="radio" id="sexFlWoman" name="sexFl" value="w" <?php if($TPL_VAR["data"]["sexFl"]=='w'){?>checked="checked"<?php }else{?><?php echo $TPL_VAR["data"]["authDisabled"]?><?php }?>/>
                                    <label for="sexFlWoman" class="choice_s <?php if($TPL_VAR["data"]["sexFl"]=='w'){?>on<?php }?>"><?php echo __('여자')?></label>
                                </li>
                            </ul>
                        </div>
                    </div>
                </td>
            </tr>
<?php }?>
<?php if($TPL_VAR["joinField"]["birthDt"]["use"]=='y'){?>
            <tr>
                <th><span <?php echo $TPL_VAR["data"]["authClassRequired"]?>><?php echo __('생일')?></span></th>
                <td class="member_birthday">
                    <div class="member_warning">
<?php if($TPL_VAR["joinField"]["calendarFl"]["use"]=='y'){?>
                        <select id="calendarFl" name="calendarFl" class="chosen-select" <?php echo $TPL_VAR["data"]["limitAgeDisabled"]?>>
                            <option value=""><?php echo __('선택')?></option>
                            <option value="s" <?php if($TPL_VAR["data"]["calendarFl"]=='s'){?>selected<?php }?>><?php echo __('양력')?></option>
                            <option value="l" <?php if($TPL_VAR["data"]["calendarFl"]=='l'){?>selected<?php }?>><?php echo __('음력')?></option>
                        </select>
<?php }?>
                    </div>
                    <div class="member_warning"><?php echo gd_select_box('birthYear','birthYear',$TPL_VAR["DateYear"],null,$TPL_VAR["data"]["birthYear"],__('년'),'style="width: 100px;"'.$TPL_VAR["data"]["authDisabled"].' '.$TPL_VAR["data"]["limitAgeDisabled"],'chosen-single')?></div>
                    <div class="member_warning"><?php echo gd_select_box('birthMonth','birthMonth',$TPL_VAR["DateMonth"],null,$TPL_VAR["data"]["birthMonth"],__('월'),'style="width: 80px;"'.$TPL_VAR["data"]["authDisabled"].' '.$TPL_VAR["data"]["limitAgeDisabled"],'chosen-single')?></div>
                    <div class="member_warning"><?php echo gd_select_box('birthDay','birthDay',$TPL_VAR["DateDay"],null,$TPL_VAR["data"]["birthDay"],__('일'),'style="width: 80px;"'.$TPL_VAR["data"]["authDisabled"].' '.$TPL_VAR["data"]["limitAgeDisabled"],'chosen-single')?></div>
                </td>
            </tr>
<?php }?>
<?php if($TPL_VAR["joinField"]["marriFl"]["use"]=='y'){?>
            <tr>
                <th><span><?php echo __('결혼여부')?></span></th>
                <td>
                    <div class="member_warning">
                        <div class="form_element">
                            <ul>
                                <li>
                                    <input type="radio" id="marriFlNo" name="marriFl" value="n" <?php if($TPL_VAR["data"]["marriFl"]=='n'){?>checked="checked"<?php }?>/>
                                    <label for="marriFlNo" class="choice_s <?php if($TPL_VAR["data"]["marriFl"]=='n'){?>on<?php }?>"><?php echo __('미혼')?></label>
                                </li>
                                <li>
                                    <input type="radio" id="marriFlYes" name="marriFl" value="y" <?php if($TPL_VAR["data"]["marriFl"]=='y'){?>checked="checked"<?php }?>/>
                                    <label for="marriFlYes" class="choice_s <?php if($TPL_VAR["data"]["marriFl"]=='y'){?>on<?php }?>"><?php echo __('기혼')?></label>
                                </li>
                            </ul>
                        </div>
                    </div>
                </td>
            </tr>
<?php }?>
<?php if($TPL_VAR["joinField"]["marriDate"]["use"]=='y'){?>
            <tr class="js_marridateinfo <?php if($TPL_VAR["data"]["marriFl"]=='n'){?>dn<?php }?>">
                <th><span><?php echo __('결혼기념일')?></span></th>
                <td>
                    <div class="member_warning"><?php echo gd_select_box('marriYear','marriYear',$TPL_VAR["DateYearMarri"],null,$TPL_VAR["data"]["marriYear"],__('년'),'style="width: 100px;"','chosen-single')?></div>
                    <div class="member_warning"><?php echo gd_select_box('marriMonth','marriMonth',$TPL_VAR["DateMonth"],null,$TPL_VAR["data"]["marriMonth"],__('월'),'style="width: 80px;"','chosen-single')?></div>
                    <div class="member_warning"><?php echo gd_select_box('marriDay','marriDay',$TPL_VAR["DateDay"],null,$TPL_VAR["data"]["marriDay"],__('일'),'style="width: 80px;"','chosen-single')?></div>
                </td>
            </tr>
<?php }?>
<?php if($TPL_VAR["joinField"]["job"]["use"]=='y'){?>
            <tr>
                <th><span><?php echo __('직업')?></span></th>
                <td>
                    <div class="member_warning">
                        <select name=job class="chosen-select select_jop">
                            <option value=""><?php echo __('직업을 선택해 주세요.')?></option>
<?php if((is_array($TPL_R1=$TPL_VAR["joinField"]["job"]["data"])&&!empty($TPL_R1)) || (is_object($TPL_R1) && in_array("Countable", class_implements($TPL_R1)) && $TPL_R1->count() > 0)) {foreach($TPL_R1 as $TPL_K1=>$TPL_V1){?><?php if($TPL_K1==$TPL_VAR["data"]['job']){?>
                            <option value="<?php echo $TPL_K1?>" selected="selected"><?php echo $TPL_V1?></option>
<?php }else{?>
                            <option value="<?php echo $TPL_K1?>"><?php echo $TPL_V1?></option>
<?php }?><?php }}?>
                        </select>
                    </div>
                    <!-- //member_warning -->
                </td>
            </tr>
<?php }?>
<?php if($TPL_VAR["joinField"]["interest"]["use"]=='y'&&gd_count($TPL_VAR["joinField"]["interest"]["data"])> 0){?>
            <tr>
                <th><span><?php echo __('관심분야')?></span></th>
                <td>
                    <div class="member_warning">
                        <div class="form_element">
                            <ul class="hobby_list">
<?php if((is_array($TPL_R1=$TPL_VAR["joinField"]["interest"]["data"])&&!empty($TPL_R1)) || (is_object($TPL_R1) && in_array("Countable", class_implements($TPL_R1)) && $TPL_R1->count() > 0)) {$TPL_I1=-1;foreach($TPL_R1 as $TPL_K1=>$TPL_V1){$TPL_I1++;?>
                                <li>
<?php if(isset($TPL_VAR["data"]["interest"])&&is_array($TPL_VAR["data"]["interest"])&&gd_array_search($TPL_K1,$TPL_VAR["data"]["interest"])){?>
                                    <input type="checkbox" id="<?php echo 'interest'.$TPL_I1?>" name="interest[]" value="<?php echo $TPL_K1?>" checked="checked"/>
                                    <label for="<?php echo 'interest'.$TPL_I1?>" class="check_s on"><?php echo $TPL_V1?></label>
<?php }else{?>
                                    <input type="checkbox" id="<?php echo 'interest'.$TPL_I1?>" name="interest[]" value="<?php echo $TPL_K1?>"/>
                                    <label for="<?php echo 'interest'.$TPL_I1?>" class="check_s"><?php echo $TPL_V1?></label>
<?php }?>
                                </li>
<?php }}?>
                            </ul>
                        </div>
                    </div>
                </td>
            </tr>
<?php }?>
<?php if($TPL_VAR["joinField"]["recommId"]["use"]=='y'){?>
            <tr>
                <th><span><?php echo __('추천인 아이디')?></span></th>
                <td>
<?php if($TPL_VAR["data"]["recommId"]!=''||($TPL_VAR["isMyPage"]&&$TPL_VAR["joinField"]["recommFl"]["use"]=='y')){?>
                    <input type="hidden" name="recommId" value="<?php echo $TPL_VAR["data"]["recommId"]?>"/>
                    <span><?php echo $TPL_VAR["data"]["recommId"]?></span>
<?php }else{?>
                    <div class="member_warning">
                        <input type="text" id="recommId" name="recommId" value="<?php echo $TPL_VAR["data"]["recommId"]?>"/>
                    </div>
<?php }?>
                </td>
            </tr>
<?php }?>
<?php if($TPL_VAR["joinField"]["expirationFl"]["use"]=='y'&&!$TPL_VAR["getMemberLifeEventCount"]&&$TPL_VAR["data"]["expirationFl"]!='999'){?>
            <tr>
                <th><span><?php echo __('휴면회원 방지기간')?></span></th>
                <td>
                    <div class="member_warning">
                        <div class="form_element">
                            <ul>
                                <li>
                                    <input type="radio" id="expirationFl1" name="expirationFl" value="1" <?php if($TPL_VAR["data"]["expirationFl"]=='1'){?>checked="checked"<?php }?>/>
                                    <label for="expirationFl1" class="choice_s <?php if($TPL_VAR["data"]["expirationFl"]=='1'){?>on<?php }?>">1<?php echo __('년')?></label>
                                </li>
                                <li>
                                    <input type="radio" id="expirationFl3" name="expirationFl" value="3" <?php if($TPL_VAR["data"]["expirationFl"]=='3'){?>checked="checked"<?php }?>/>
                                    <label for="expirationFl3" class="choice_s <?php if($TPL_VAR["data"]["expirationFl"]=='3'){?>on<?php }?>">3<?php echo __('년')?></label>
                                </li>
                                <li>
                                    <input type="radio" id="expirationFl5" name="expirationFl" value="5" <?php if($TPL_VAR["data"]["expirationFl"]=='5'){?>checked="checked"<?php }?>/>
                                    <label for="expirationFl5" class="choice_s <?php if($TPL_VAR["data"]["expirationFl"]=='5'){?>on<?php }?>">5<?php echo __('년')?></label>
                                </li>
                                <li>
                                    <input type="radio" id="expirationFl0" name="expirationFl" value="999" <?php if($TPL_VAR["data"]["expirationFl"]=='999'){?>checked="checked"<?php }?>/>
                                    <label for="expirationFl0" class="choice_s <?php if($TPL_VAR["data"]["expirationFl"]=='999'){?>on<?php }?>"><?php echo __('탈퇴 시 - 평생회원')?></label>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- //member_warning -->

                    <!-- 평생회원 이벤트 안내문구 -->
                    <div class="member_warning_info <?php if(!$TPL_VAR["activeEvent"]||$TPL_VAR["memberLifeEventCnt"]> 0||$TPL_VAR["memberLifeEventView"]==='hidden'){?>dn<?php }?>">
                        <div class="info_title">평생회원 이벤트</div>
                        <div class="info_text">
                            휴면회원 방지기간을 ‘탈퇴 시’로 변경하시면,<br>
                            휴면회원으로 전환되지 않으며 고객님의 정보가 탈퇴 시까지 안전하게 보관됩니다.<br>
<?php if($TPL_VAR["benefitType"]!='manual'&&$TPL_VAR["benefitInfo"]){?>
                            <br>
                            지금 평생회원으로 전환 시 <span class="text_red"><?php echo $TPL_VAR["benefitInfo"]?></span> 제공!
<?php }?>
                        </div>
                    </div>
                    <!-- 평생회원 이벤트 안내문구 -->
                </td>
            </tr>
<?php }?>
<?php if($TPL_VAR["joinField"]["memo"]["use"]=='y'){?>
            <tr>
                <th><span><?php echo __('남기는 말씀')?></span></th>
                <td>
                    <div class="member_warning">
                        <textarea name="memo" maxlength="300"><?php echo $TPL_VAR["data"]["memo"]?></textarea>
                    </div>
                    <!-- //member_warning -->
                </td>
            </tr>
<?php }?>
<?php if((is_array($TPL_R1=$TPL_VAR["joinField"]["ex"])&&!empty($TPL_R1)) || (is_object($TPL_R1) && in_array("Countable", class_implements($TPL_R1)) && $TPL_R1->count() > 0)) {foreach($TPL_R1 as $TPL_K1=>$TPL_V1){?>
            <tr>
                <th><span><?php echo $TPL_V1["title"]?></span></th>
                <td>
                    <div class="member_warning">
<?php if($TPL_V1["type"]=='SELECT'){?>
                        <select name="<?php echo $TPL_K1?>" class="chosen-select" style="width:380px;">
                            <option value=""><?php echo __('선택')?></option>
<?php if((is_array($TPL_R2=$TPL_V1["items"])&&!empty($TPL_R2)) || (is_object($TPL_R2) && in_array("Countable", class_implements($TPL_R2)) && $TPL_R2->count() > 0)) {foreach($TPL_R2 as $TPL_V2){?>
<?php if(($TPL_K1=='ex1'&&gd_trim($TPL_V2)==$TPL_VAR["data"]["ex1"])||($TPL_K1=='ex2'&&gd_trim($TPL_V2)==$TPL_VAR["data"]["ex2"])||($TPL_K1=='ex3'&&gd_trim($TPL_V2)==$TPL_VAR["data"]["ex3"])||($TPL_K1=='ex4'&&gd_trim($TPL_V2)==$TPL_VAR["data"]["ex4"])||($TPL_K1=='ex5'&&gd_trim($TPL_V2)==$TPL_VAR["data"]["ex5"])||($TPL_K1=='ex6'&&gd_trim($TPL_V2)==$TPL_VAR["data"]["ex6"])){?>
                            <option value="<?php echo $TPL_V2?>" selected="selected"><?php echo $TPL_V2?></option>
<?php }else{?>
                            <option value="<?php echo $TPL_V2?>"><?php echo $TPL_V2?></option>
<?php }?>
<?php }}?>
                        </select>
<?php }elseif($TPL_V1["type"]=='RADIO'){?>
                        <div class="form_element">
                            <ul>
<?php if((is_array($TPL_R2=$TPL_V1["items"])&&!empty($TPL_R2)) || (is_object($TPL_R2) && in_array("Countable", class_implements($TPL_R2)) && $TPL_R2->count() > 0)) {$TPL_I2=-1;foreach($TPL_R2 as $TPL_V2){$TPL_I2++;?>
                                <li>
<?php if(($TPL_K1=='ex1'&&gd_trim($TPL_V2)==$TPL_VAR["data"]["ex1"])||($TPL_K1=='ex2'&&gd_trim($TPL_V2)==$TPL_VAR["data"]["ex2"])||($TPL_K1=='ex3'&&gd_trim($TPL_V2)==$TPL_VAR["data"]["ex3"])||($TPL_K1=='ex4'&&gd_trim($TPL_V2)==$TPL_VAR["data"]["ex4"])||($TPL_K1=='ex5'&&gd_trim($TPL_V2)==$TPL_VAR["data"]["ex5"])||($TPL_K1=='ex6'&&gd_trim($TPL_V2)==$TPL_VAR["data"]["ex6"])){?>
                                    <input id="<?php echo $TPL_K1?>_<?php echo $TPL_I2?>" name="<?php echo $TPL_K1?>" value="<?php echo $TPL_V2?>"type="radio" checked="checked"/>
                                    <label for="<?php echo $TPL_K1?>_<?php echo $TPL_I2?>" class="choice_s on"><?php echo $TPL_V2?></label>
<?php }else{?>
                                    <input id="<?php echo $TPL_K1?>_<?php echo $TPL_I2?>" name="<?php echo $TPL_K1?>" value="<?php echo $TPL_V2?>"type="radio"/>
                                    <label for="<?php echo $TPL_K1?>_<?php echo $TPL_I2?>" class="choice_s"><?php echo $TPL_V2?></label>
<?php }?>
                                </li>
<?php }}?>
                            </ul>
                        </div>
<?php }elseif($TPL_V1["type"]=='CHECKBOX'){?>
                        <div class="form_element">
                            <ul>
<?php if((is_array($TPL_R2=$TPL_V1["items"])&&!empty($TPL_R2)) || (is_object($TPL_R2) && in_array("Countable", class_implements($TPL_R2)) && $TPL_R2->count() > 0)) {$TPL_I2=-1;foreach($TPL_R2 as $TPL_V2){$TPL_I2++;?>
                                <li>
<?php if(is_array($TPL_VAR["data"]["ex1"])&&gd_in_array(gd_trim($TPL_V2),$TPL_VAR["data"]["ex1"])||is_array($TPL_VAR["data"]["ex2"])&&gd_in_array(gd_trim($TPL_V2),$TPL_VAR["data"]["ex2"])||is_array($TPL_VAR["data"]["ex3"])&&gd_in_array(gd_trim($TPL_V2),$TPL_VAR["data"]["ex3"])||is_array($TPL_VAR["data"]["ex4"])&&gd_in_array(gd_trim($TPL_V2),$TPL_VAR["data"]["ex4"])||is_array($TPL_VAR["data"]["ex5"])&&gd_in_array(gd_trim($TPL_V2),$TPL_VAR["data"]["ex5"])||is_array($TPL_VAR["data"]["ex6"])&&gd_in_array(gd_trim($TPL_V2),$TPL_VAR["data"]["ex6"])){?>
                                    <input id="<?php echo $TPL_K1?>_<?php echo $TPL_I2?>" name="<?php echo $TPL_K1?>[]" value="<?php echo $TPL_V2?>" type="checkbox" checked="checked"/>
                                    <label for="<?php echo $TPL_K1?>_<?php echo $TPL_I2?>" class="check_s on"><?php echo $TPL_V2?></label>
<?php }else{?>
                                    <input id="<?php echo $TPL_K1?>_<?php echo $TPL_I2?>" name="<?php echo $TPL_K1?>[]" value="<?php echo $TPL_V2?>" type="checkbox"/>
                                    <label for="<?php echo $TPL_K1?>_<?php echo $TPL_I2?>" class="check_s"><?php echo $TPL_V2?></label>
<?php }?>
                                </li>
<?php }}?>
                            </ul>
                        </div>
<?php }else{?>
                        <input type="text" class="text" name="<?php echo $TPL_K1?>" id="<?php echo $TPL_K1?>" value="<?php echo $TPL_VAR["data"][$TPL_K1]?>"/>
<?php }?>
                    </div>
                </td>
            </tr>
<?php }}?>
            </tbody>
        </table>
    </div>
    <!-- //addition_info_sec -->
</div>
<!-- //addition_info_box -->
<?php }?>

<?php if($TPL_VAR["isMyPage"]){?>
<?php if($TPL_VAR["usePaycoLogin"]||$TPL_VAR["useFacebookLogin"]||$TPL_VAR["useNaverLogin"]||$TPL_VAR["useKakaoLogin"]||$TPL_VAR["useWonderLogin"]||$TPL_VAR["useAppleLogin"]||$TPL_VAR["useGoogleLogin"]){?>
<div class="site_info_box">
    <h3><?php echo __('계정 연결정보')?></h3>
<?php if($TPL_VAR["connectFacebook"]){?>
    <div class="site_sns_info">
        <div class="site_sns_list_disconnect">
            <em><?php echo __('연결 계정')?></em>
<?php if($TPL_VAR["data"]['snsJoinFl']=='n'){?>
            <a href="#" class="my_facebook js_btn_sns_disconnect" data-sns="facebook" data-facebook-url="<?php echo $TPL_VAR["facebookUrl"]?>"><span><img src="/data/skin/front/moment/img/mypage/site_join_facebook.png" alt="<?php echo __('페이스북')?>"/><?php echo __('연결해제')?></span></a>
<?php }else{?>
            <span><img src="/data/skin/front/moment/img/mypage/site_login_facebook.png" alt="<?php echo __('페이스북')?>"/></span>
<?php }?>
        </div>
    </div>
<?php }elseif($TPL_VAR["connectPayco"]){?>
    <div class="site_sns_info">
        <div class="site_sns_list_disconnect">
            <em><?php echo __('연결 계정')?></em>
<?php if($TPL_VAR["data"]['snsJoinFl']=='n'){?>
            <a href="#;" class="my_payco js_btn_sns_disconnect" data-sns="payco"><span><img src="/data/skin/front/moment/img/mypage/site_join_payco.png" alt="<?php echo __('페이코')?>"/><?php echo __('연결해제')?></span></a>
<?php }else{?>
            <span><img src="/data/skin/front/moment/img/mypage/site_login_payco.png" alt="<?php echo __('페이코')?>"/></span>
<?php }?>
        </div>
    </div>
<?php }elseif($TPL_VAR["connectNaver"]){?>
    <div class="site_sns_info">
        <div class="site_sns_list_disconnect">
            <em><?php echo __('연결 계정')?></em>
<?php if($TPL_VAR["data"]['snsJoinFl']=='n'){?>
            <a href="#;" class="my_naver js_btn_sns_disconnect" data-sns="naver"><span><img src="/data/skin/front/moment/img/mypage/site_join_naver.png" alt="<?php echo __('네이버')?>"/><?php echo __('연결해제')?></span></a>
<?php }else{?>
            <span><img src="/data/skin/front/moment/img/mypage/site_login_naver.png" alt="<?php echo __('네이버')?>"/></span>
<?php }?>
        </div>
    </div>
<?php }elseif($TPL_VAR["connectKakao"]){?>
    <div class="site_sns_info">
        <div class="site_sns_list_disconnect">
            <em><?php echo __('연결 계정')?></em>
<?php if($TPL_VAR["data"]['snsJoinFl']=='n'){?>
            <a href="#;" class="my_kakao js_btn_sns_disconnect" data-sns="kakao" data-kakao-url="<?php echo $TPL_VAR["kakaoUrl"]?>"><span><img src="/data/skin/front/moment/img/mypage/site_join_kakao.png" alt="<?php echo __('카카오')?>"/><?php echo __('연결해제')?></span></a>
<?php }else{?>
            <span><img src="/data/skin/front/moment/img/mypage/site_login_kakao.png" alt="<?php echo __('카카오')?>"/></span>
<?php }?>
        </div>
    </div>
<?php }elseif($TPL_VAR["connectWonder"]){?>
    <div class="site_sns_info">
        <div class="site_sns_list_disconnect">
            <em><?php echo __('연결 계정')?></em>
<?php if($TPL_VAR["data"]['snsJoinFl']=='n'){?>
            <a href="#;" class="my_wonder js_btn_sns_disconnect" data-sns="wonder"><span><img src="/data/skin/front/moment/img/mypage/site_join_wonder.png" alt="<?php echo __('위메프')?>"/><?php echo __('연결해제')?></span></a>
<?php }else{?>
            <span><img src="/data/skin/front/moment/img/mypage/site_join_wonder.png" alt="<?php echo __('위메프')?>"/></span>
<?php }?>
        </div>
    </div>
<?php }elseif($TPL_VAR["connectApple"]){?>
    <div class="site_sns_info">
        <div class="site_sns_list_disconnect">
            <em><?php echo __('연결 계정')?></em>
<?php if($TPL_VAR["data"]['snsJoinFl']=='n'){?>
            <a href="#" class="my_apple js_btn_sns_disconnect" data-sns="apple">
                <span><img src="/data/skin/front/moment/img/mypage/site_join_apple.png" alt="<?php echo __('Apple')?>"><?php echo __('연결해제')?></span>
            </a>
<?php }else{?>
            <span><img src="/data/skin/front/moment/img/mypage/pc_square_apple.png"/></span>
<?php }?>
        </div>
    </div>
<?php }elseif($TPL_VAR["connectGoogle"]){?>
    <div class="site_sns_info">
        <div class="site_sns_list_disconnect">
            <em><?php echo __('연결 계정')?></em>
<?php if($TPL_VAR["data"]['snsJoinFl']=='n'){?>
            <a href="#;" class="my_google js_btn_sns_disconnect" data-sns="google"><span><img src="/data/skin/front/moment/img/mypage/site_join_google.png" alt="<?php echo __('구글')?>"/><?php echo __('연결해제')?></span></a>
<?php }else{?>
            <span><img src="/data/skin/front/moment/img/mypage/site_login_google.png" alt="<?php echo __('구글')?>"/></span>
<?php }?>
        </div>
    </div>
<?php }else{?>
    <div class="site_sns_info">
        <div class="site_sns_list">
            <em><?php echo __('연결된 계정이 없습니다.')?></em>
<?php if($TPL_VAR["useAppleLogin"]){?>
            <a href="#" id="apple_btn" class="my_apple js_btn_sns_connect" data-sns="apple">
                <span><img src="/data/skin/front/moment/img/mypage/pc_apple_s.png" alt="<?php echo __('애플 연결')?>"></span>
            </a>
            <div id="appleid-signin" style="display: none"></div>
<?php }?>
<?php if($TPL_VAR["usePaycoLogin"]){?>
            <a href="#;" class="my_payco js_btn_sns_connect" data-sns="payco"><span><img src="/data/skin/front/moment/img/mypage/pc_payco_s.png" alt="<?php echo __('페이코 연결')?>"></span></a>
<?php }?>
<?php if($TPL_VAR["useFacebookLogin"]){?>
            <a href="#;" class="my_facebook js_btn_sns_connect" data-sns="facebook" data-facebook-url="<?php echo $TPL_VAR["facebookUrl"]?>"><span><img src="/data/skin/front/moment/img/mypage/pc_facebook_s.png" alt="<?php echo __('페이스북 연결')?>"></span></a>
<?php }?>
<?php if($TPL_VAR["useNaverLogin"]){?>
            <a href="#;" class="my_naver js_btn_sns_connect" data-sns="naver"><span><img src="/data/skin/front/moment/img/mypage/pc_naver_s.png" alt="<?php echo __('네이버 연결')?>"></span></a>
<?php }?>
<?php if($TPL_VAR["useKakaoLogin"]){?>
            <a href="#;" class="my_kakao js_btn_sns_connect" data-sns="kakao"><span><img src="/data/skin/front/moment/img/mypage/pc_kakao_s.png" alt="<?php echo __('카카오 연결')?>"/></span></a>
<?php }?>
<?php if($TPL_VAR["useWonderLogin"]){?>
            <a href="#;" class="my_wonder js_btn_sns_connect" data-sns="wonder" data-wonder-url="<?php echo $TPL_VAR["wonderReturnUrl"]?>"><span><img src="/data/skin/front/moment/img/mypage/pc_wonder_s.png" alt="<?php echo __('위메프 연결')?>"/></span></a>
<?php }?>
<?php if($TPL_VAR["useGoogleLogin"]){?>
            <a href="#;" class="my_google js_btn_sns_connect" data-sns="google"><span><img src="/data/skin/front/moment/img/mypage/pc_google_s.png" alt="<?php echo __('구글 연결')?>"/></span></a>
<?php }?>
        </div>
    </div>
<?php }?>
</div>
<?php }?>

<!-- N : 약관동의 시작 -->
<?php if($TPL_VAR["privateApprovalOption"][ 0]['modeFl']=='y'||$TPL_VAR["privateConsign"][ 0]['modeFl']=='y'||$TPL_VAR["privateOffer"][ 0]['modeFl']=='y'){?>
<div class="join_agreement_cont">
    <h3><?php echo __('약관동의현황')?></h3>
<?php if($TPL_VAR["privateApprovalOption"][ 0]['modeFl']=='y'){?>
    <div class="join_agreement_box">
        <div class="form_element">
            <input type="checkbox" id="termsAgree3"/>
            <label for="termsAgree3" class="check_s"><strong class="choice">(<?php echo __('선택')?>)</strong> <?php echo __('개인정보 수집 및 이용')?> </label>
            <span><a href="../service/agreement.php?code=<?php echo $TPL_VAR["privateApprovalOption"][ 0]['informCd']?>" target="_blank"><?php echo __('전체보기')?></a></span>
        </div>
        <div class="agreement_choice_box">
<?php if($TPL_privateApprovalOption_1){foreach($TPL_VAR["privateApprovalOption"] as $TPL_V1){?>
            <table border="0" cellpadding="0" cellspacing="0" summary="<?php echo __('개인정보 취급위탁 내용입니다.')?>">
                <colgroup>
                    <col width="10px">
                    <col width="300px">
                </colgroup>
                <thead>
                <tr>
                    <th><?php echo __('선택')?></th>
                    <th><?php echo nl2br($TPL_V1["informNm"])?></th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>
                        <div class="form_element">
<?php if(isset($TPL_VAR["data"]['privateApprovalOptionFl'])&&is_array($TPL_VAR["data"]['privateApprovalOptionFl'])&&key_exists($TPL_V1["sno"],$TPL_VAR["data"]['privateApprovalOptionFl'])){?>
                            <input type="checkbox" id="privateApprovalOption_<?php echo $TPL_V1["sno"]?>" name="privateApprovalOptionFl[<?php echo $TPL_V1["sno"]?>]" checked="checked"/>
                            <label for="privateApprovalOption_<?php echo $TPL_V1["sno"]?>" class="check_s on"></label>
<?php }else{?>
                            <input type="checkbox" id="privateApprovalOption_<?php echo $TPL_V1["sno"]?>" name="privateApprovalOptionFl[<?php echo $TPL_V1["sno"]?>]"/>
                            <label for="privateApprovalOption_<?php echo $TPL_V1["sno"]?>" class="check_s"></label>
<?php }?>
                        </div>
                    </td>
                    <td><?php echo nl2br($TPL_V1["content"])?></td>
                </tr>
                </tbody>
            </table>
<?php }}?>
        </div>
    </div>
    <!-- //join_agreement_box -->
<?php }?>
<?php if($TPL_VAR["privateConsign"][ 0]['modeFl']=='y'){?>
    <div class="join_agreement_box">
        <div class="form_element">
            <input type="checkbox" id="termsAgree4"/>
            <label for="termsAgree4" class="check_s"><strong class="choice">(<?php echo __('선택')?>)</strong> <?php echo __('개인정보 취급위탁')?> </label>
            <span><a href="../service/agreement.php?code=<?php echo $TPL_VAR["privateConsign"][ 0]['informCd']?>" target="_blank"><?php echo __('전체보기')?></a></span>
        </div>
        <div class="agreement_choice_box">
<?php if($TPL_privateConsign_1){foreach($TPL_VAR["privateConsign"] as $TPL_V1){?>
            <table border="0" cellpadding="0" cellspacing="0" summary="<?php echo __('개인정보 취급위탁 내용입니다.')?>">
                <colgroup>
                    <col width="10px">
                    <col width="300px">
                </colgroup>
                <thead>
                <tr>
                    <th><?php echo __('선택')?></th>
                    <th><?php echo nl2br($TPL_V1["informNm"])?></th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>
                        <div class="form_element">
<?php if(isset($TPL_VAR["data"]['privateConsignFl'])&&is_array($TPL_VAR["data"]['privateConsignFl'])&&key_exists($TPL_V1["sno"],$TPL_VAR["data"]['privateConsignFl'])){?>
                            <input type="checkbox" id="privateConsign_<?php echo $TPL_V1["sno"]?>" name="privateConsignFl[<?php echo $TPL_V1["sno"]?>]" checked="checked"/>
                            <label for="privateConsign_<?php echo $TPL_V1["sno"]?>" class="check_s on"></label>
<?php }else{?>
                            <input type="checkbox" id="privateConsign_<?php echo $TPL_V1["sno"]?>" name="privateConsignFl[<?php echo $TPL_V1["sno"]?>]"/>
                            <label for="privateConsign_<?php echo $TPL_V1["sno"]?>" class="check_s"></label>
<?php }?>
                        </div>
                    </td>
                    <td>
                        <?php echo nl2br($TPL_V1["content"])?>

                    </td>
                </tr>
                </tbody>
<?php }}?>
            </table>

        </div>
        <!-- //agreement_choice_box -->
    </div>
    <!-- //join_agreement_box -->
<?php }?>

<?php if($TPL_VAR["privateOffer"][ 0]['modeFl']=='y'){?>
    <div class="join_agreement_box">
        <div class="form_element">
            <input type="checkbox" id="termsAgree5"/>
            <label for="termsAgree5" class="check_s"><strong class="choice">(<?php echo __('선택')?>)</strong> <?php echo __('개인정보 제 3자 제공')?> </label>
            <span>><a href="../service/agreement.php?code=<?php echo $TPL_VAR["privateOffer"][ 0]['informCd']?>" target="_blank"><?php echo __('전체보기')?></a></span>
        </div>
        <div class="agreement_choice_box">
<?php if($TPL_privateOffer_1){foreach($TPL_VAR["privateOffer"] as $TPL_V1){?>
            <table border="0" cellpadding="0" cellspacing="0" summary="<?php echo __('개인정보 제 3자 제공 내용입니다.')?>">
                <colgroup>
                    <col width="10px">
                    <col width="300px">
                </colgroup>
                <thead>
                <tr>
                    <th><?php echo __('선택')?></th>
                    <th><?php echo nl2br($TPL_V1["informNm"])?></th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>
                        <div class="form_element">
<?php if(isset($TPL_VAR["data"]['privateOfferFl'])&&is_array($TPL_VAR["data"]['privateOfferFl'])&&key_exists($TPL_V1["sno"],$TPL_VAR["data"]['privateOfferFl'])){?>
                            <input type="checkbox" id="privateOffer_<?php echo $TPL_V1["sno"]?>" name="privateOfferFl[<?php echo $TPL_V1["sno"]?>]" checked="checked"/>
                            <label for="privateOffer_<?php echo $TPL_V1["sno"]?>" class="check_s on"></label>
<?php }else{?>
                            <input type="checkbox" id="privateOffer_<?php echo $TPL_V1["sno"]?>" name="privateOfferFl[<?php echo $TPL_V1["sno"]?>]"/>
                            <label for="privateOffer_<?php echo $TPL_V1["sno"]?>" class="check_s"></label>
<?php }?>
                        </div>
                    </td>
                    <td>
                        <div class="agreement_scroll">
                            <?php echo nl2br($TPL_V1["content"])?>

                        </div>
                    </td>
                </tr>
                </tbody>
            </table>
<?php }}?>
        </div>
        <!-- //agreement_choice_box -->
    </div>
    <!-- //join_agreement_box -->
<?php }?>
</div>
<!-- //join_agreement_cont -->
<?php }?>
<!-- N : 약관동의 끝 -->
<?php }?>