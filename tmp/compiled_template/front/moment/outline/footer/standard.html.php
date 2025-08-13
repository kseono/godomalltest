<?php /* Template_ 2.2.7 2025/05/22 10:03:57 /www/newmanjoo14_godomall_com/data/skin/front/moment/outline/footer/standard.html 000005826 */  $this->include_("includeWidget","dataBanner","dataEggBanner");?>
<div class="content_info_wrap">
    <div class="content_info">
        <div class="cs_center">
            <h3>CS CENTER</h3>
            <strong><?php echo $TPL_VAR["gMall"]["centerPhone"]?></strong>
            <p><?php echo nl2br($TPL_VAR["gMall"]["centerHours"])?></p>
        </div>
        <!-- //cs_center -->
<?php if(!$TPL_VAR["gGlobal"]["isFront"]){?>
        <div class="bank_info">
            <h3>BANK INFO</h3>
            <strong><?php echo $TPL_VAR["gBank"]["accountNumber"]?></strong>
            <p><em><?php echo $TPL_VAR["gBank"]["bankName"]?></em> <br><?php echo __('예금주')?> : <?php echo $TPL_VAR["gBank"]["depositor"]?></p>
        </div>
<?php }?>
        <!-- //bank_info -->
<?php if($TPL_VAR["canNotice"]){?>
        <div class="notice_list">
            <h3><a href="../board/list.php?bdId=<?php echo $TPL_VAR["noticeBdId"]?>" title="<?php echo __('공지 리스트')?>">NOTICE</a></h3>
            <?php echo includewidget('board/board_article','bdId',$TPL_VAR["noticeBdId"],'listCount', 5,'strCut', 20)?>

        </div>
<?php }?>
        <!-- //notice_list -->
    </div>
    <!-- //content_info -->
</div>
<!-- //content_info_wrap -->

<div id="footer">
    <div class="foot_list">
        <ul>
            <li><a href="../service/company.php"><?php echo __('회사소개')?></a></li>
            <li><a href="../service/agreement.php"><?php echo __('이용약관')?></a></li>
            <li><a href="../service/private.php"><strong><?php echo __('개인정보처리방침')?></strong></a></li>
            <li><a href="../service/guide.php"><?php echo __('이용안내')?></a></li>
            <li><a href="../service/cooperation.php"><?php echo __('광고/제휴 문의')?></a></li>
        </ul>
    </div>
    <!-- //foot_list -->
    <div class="foot_cont">
        <div class="foot_logo">
<?php if((is_array($TPL_R1=databanner('2838517793'))&&!empty($TPL_R1)) || (is_object($TPL_R1) && in_array("Countable", class_implements($TPL_R1)) && $TPL_R1->count() > 0)) {foreach($TPL_R1 as $TPL_V1){?><?php echo $TPL_V1["tag"]?><?php }}?>
        </div>
        <!-- //foot_logo -->
        <div class="foot_info">
            <address>
                <strong><?php echo $TPL_VAR["gMall"]["companyNm"]?></strong>
                <span><?php echo $TPL_VAR["gMall"]["address"]?> <?php echo $TPL_VAR["gMall"]["addressSub"]?></span>
            </address>
            <div class="foot_info_list">
                <dl>
                    <dt><?php echo __('대표')?> :</dt>
                    <dd><?php echo $TPL_VAR["gMall"]["ceoNm"]?></dd>
                </dl>
                <dl>
                    <dt><?php echo __('사업자등록번호')?> :</dt>
                    <dd><?php echo $TPL_VAR["gMall"]["businessNo"]?> <a href="#" class="btn_licensee_info" onclick="gd_popup_bizInfo('<?php echo str_replace('-','',$TPL_VAR["gMall"]["businessNo"])?>'); return false;"><?php echo __('사업자번호조회')?> ></a></dd>
                </dl>
                <dl>
                    <dt><?php echo __('통신판매업신고번호')?> :</dt>
                    <dd><?php echo $TPL_VAR["gMall"]["onlineOrderSerial"]?></dd>
                </dl>
                <dl>
                    <dt><?php echo __('개인정보관리자')?> :</dt>
                    <dd><?php echo $TPL_VAR["gMall"]["privateNm"]?></dd>
                </dl>
            </div>
            <div class="foot_info_list">
                <dl>
                    <dt><?php echo __('대표번호')?> :</dt>
                    <dd><strong><?php echo $TPL_VAR["gMall"]["phone"]?></strong></dd>
                </dl>
                <dl>
                    <dt><?php echo __('팩스번호')?> :</dt>
                    <dd><?php echo $TPL_VAR["gMall"]["fax"]?></dd>
                </dl>
                <dl>
                    <dt><?php echo __('메일')?> :</dt>
                    <dd><a href="mailto:godo@godo.co.kr" class="btn_email"><?php echo $TPL_VAR["gMall"]["email"]?></a></dd>
                </dl>
                <dl>
                    <dt></dt>
                    <dd><?php echo __('호스팅제공 : 엔에이치엔커머스(주)')?></dd>
                </dl>
            </div>
            <!-- // -->
            <p class="copyright">copyright. <?php echo $TPL_VAR["gMall"]["startYear"]?>. <strong><?php echo $TPL_VAR["gMall"]["mallDomain"]?></strong>. All rights reserved.</p>
        </div>
        <!-- //foot_info -->
    </div>
    <!-- //foot_cont -->
    <div class="foot_certify">
<?php if($TPL_VAR["gFairTrade"]['logoFl']=='default'){?>
        <span><a href="https://www.ftc.go.kr/www/cop/bbs/selectBoardList.do?key=201&bbsId=BBSMSTR_000000002320&bbsTyCode=BBST01" target="_blank"><img alt="<?php echo __('공정거래위원회')?>" src="/data/skin/front/moment/img/certify/logo_kftc.png"></a></span>
<?php }elseif($TPL_VAR["gFairTrade"]['logoFl']=='upload'){?>
        <span><img alt="<?php echo __('공정거래위원회')?>" src="<?php echo $TPL_VAR["gFairTrade"]['uploadLogoPath']?>"></span>
<?php }?>
        <span><?php echo $TPL_VAR["displaySSLSeal"]?></span>
        <span><?php echo dataeggbanner()?></span>
        <span><?php echo $TPL_VAR["dataReceiptBanner"]?></span>
    </div>
    <!-- //foot_certify -->
<?php if($TPL_VAR["isMobileDevice"]==true){?>
    <div class="foot_mobile">
        <p class="btn_center_box">
            <a href="<?php echo $TPL_VAR["currentPageMobileUri"]?>"><img src="/data/skin/front/moment/img/etc/btn_go_mobile.png" alt="<?php echo __('모바일 화면으로 보기')?>"></a>
        </p>
    </div>
<?php }?>
</div>
<!-- //footer -->