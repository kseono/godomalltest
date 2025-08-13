<?php /* Template_ 2.2.7 2025/07/30 05:47:24 /www/newmanjoo14_godomall_com/data/skin/front/story_g/outline/footer/standard.html 000005269 */  $this->include_("includeWidget","dataBanner","dataEggBanner");?>
<hr />
<div class="bottom">
    <div class="container">
        <div class="cs-center">
            <h3>CS CENTER</h3>
            <strong><?php echo $TPL_VAR["gMall"]["centerPhone"]?></strong>
            <p><?php echo nl2br($TPL_VAR["gMall"]["centerHours"])?></p>
        </div>
<?php if(!$TPL_VAR["gGlobal"]["isFront"]){?>
        <div class="bank-info">
            <h3>BANK INFO</h3>
            <strong><?php echo $TPL_VAR["gBank"]["accountNumber"]?></strong>
            <p><strong><?php echo $TPL_VAR["gBank"]["bankName"]?></strong> <br /><?php echo __('예금주')?> : <?php echo $TPL_VAR["gBank"]["depositor"]?></p>
        </div>
<?php }?>
<?php if($TPL_VAR["canNotice"]){?>
        <div class="notice">
            <h3><a href="../board/list.php?bdId=<?php echo $TPL_VAR["noticeBdId"]?>" title="<?php echo __('공지 리스트')?>">NOTICE</a></h3>
            <?php echo includewidget('board/board_article','bdId',$TPL_VAR["noticeBdId"],'listCount', 5,'strCut', 20)?>

        </div>
<?php }?>
<?php if($TPL_VAR["canGoodsReview"]){?>
        <div class="review">
            <h3><a href="../board/list.php?bdId=<?php echo $TPL_VAR["goodsReviewBdId"]?>" title="<?php echo __('리뷰 리스트')?>">REVIEW</a></h3>
            <?php echo includewidget('board/board_article','bdId',$TPL_VAR["goodsReviewBdId"],'listCount', 5,'strCut', 10)?>

        </div>
<?php }?>
    </div>
</div>
<div class="footer">
    <div class="link">
        <div class="container">
            <ul>
                <li><a href="../service/company.php"><?php echo __('회사소개')?></a></li>
                <li><a href="../service/agreement.php"><?php echo __('이용약관')?></a></li>
                <li><a href="../service/private.php" class="privacy"><?php echo __('개인정보처리방침')?></a></li>
                <li><a href="../service/guide.php"><?php echo __('이용안내')?></a></li>
                <li><a href="../service/cooperation.php"><?php echo __('광고/제휴 문의')?></a></li>
            </ul>
        </div>
    </div>
    <div class="container">
        <div class="logo">
<?php if((is_array($TPL_R1=databanner('781726638'))&&!empty($TPL_R1)) || (is_object($TPL_R1) && in_array("Countable", class_implements($TPL_R1)) && $TPL_R1->count() > 0)) {foreach($TPL_R1 as $TPL_V1){?><?php echo $TPL_V1["tag"]?><?php }}?>
        </div>
        <div class="policy">
            <address><strong><?php echo $TPL_VAR["gMall"]["companyNm"]?></strong>  <?php echo $TPL_VAR["gMall"]["address"]?> <?php echo $TPL_VAR["gMall"]["addressSub"]?> </address>
            <ul>
                <li><?php echo __('대표')?> : <?php echo $TPL_VAR["gMall"]["ceoNm"]?></li>
                <li><?php echo __('사업자등록번호')?> : <?php echo $TPL_VAR["gMall"]["businessNo"]?> <img src="/data/skin/front/story_g/img/btn/btn_bizinfo.gif" class="va-m hand" onclick="popup_bizInfo('<?php echo str_replace('-','',$TPL_VAR["gMall"]["businessNo"])?>');" alt="<?php echo __('사업자정보확인')?>" /></li>
                <li><?php echo __('통신판매업신고번호')?> : <?php echo $TPL_VAR["gMall"]["onlineOrderSerial"]?></li>
                <li><?php echo __('개인정보관리자')?> : <?php echo $TPL_VAR["gMall"]["privateNm"]?></li>
            </ul>
            <ul>
                <li><?php echo __('대표번호')?> : <strong><?php echo $TPL_VAR["gMall"]["phone"]?></strong></li>
                <li><?php echo __('팩스번호')?> : <?php echo $TPL_VAR["gMall"]["fax"]?></li>
                <li><?php echo __('메일')?> : <button type="button" onclick="popup_email('<?php echo $TPL_VAR["gMall"]["email"]?>');"><?php echo $TPL_VAR["gMall"]["email"]?></button></li>
                <li><?php echo __('호스팅제공 : 엔에이치엔커머스(주)')?></li>
            </ul>
            <p>copyright. <?php echo $TPL_VAR["gMall"]["startYear"]?>. <strong><?php echo $TPL_VAR["gMall"]["mallDomain"]?></strong>. All rights reserved.</p>
        </div>
    </div>
    <div class="container">
        <div class="certify-mark">
<?php if($TPL_VAR["gFairTrade"]['logoFl']=='default'){?>
            <span><a href="https://www.ftc.go.kr/www/cop/bbs/selectBoardList.do?key=201&bbsId=BBSMSTR_000000002320&bbsTyCode=BBST01" target="_blank"><img alt="<?php echo __('공정거래위원회')?>" src="/data/skin/front/story_g/img/certify/logo_kftc.png"></a></span>
<?php }elseif($TPL_VAR["gFairTrade"]['logoFl']=='upload'){?>
            <span><img alt="<?php echo __('공정거래위원회')?>" src="<?php echo $TPL_VAR["gFairTrade"]['uploadLogoPath']?>"></span>
<?php }?>
            <span><?php echo $TPL_VAR["displaySSLSeal"]?></span>
            <span><?php echo dataeggbanner()?></span>
            <span><?php echo $TPL_VAR["dataReceiptBanner"]?></span>
        </div>
    </div>
<?php if($TPL_VAR["isMobileDevice"]==true){?>
    <div class="container">
        <p class="ta-c">
            <a href="<?php echo $TPL_VAR["currentPageMobileUri"]?>"><img src="/data/skin/front/story_g/img/etc/btn_go_mobile.png"></a>
        </p>
    </div>
<?php }?>
</div>