<?php /* Template_ 2.2.7 2025/07/30 05:47:24 /www/newmanjoo14_godomall_com/data/skin/front/story_g/main/index.html 000001303 */  $this->include_("includeWidget","pollViewBanner","dataBanner");?>
<?php $this->print_("header",$TPL_SCP,1);?>


<div class="contents">
    <div class="big-banner">
        <?php echo includewidget('proc/_slider_banner.html','bannerCode','2399462003')?>

    </div>

    <div class="view">
        <!-- 설문조사 배너 --><?php echo pollviewbanner()?><!-- 설문조사 배너 -->
        <!-- 메인 상품 노출 --><?php echo includewidget('goods/_goods_display_main.html','sno','1')?><!-- 메인 상품 노출 -->
        <div class="goad-banner">
<?php if((is_array($TPL_R1=databanner('2073718706'))&&!empty($TPL_R1)) || (is_object($TPL_R1) && in_array("Countable", class_implements($TPL_R1)) && $TPL_R1->count() > 0)) {foreach($TPL_R1 as $TPL_V1){?><?php echo $TPL_V1["tag"]?><?php }}?>
        </div>
        <!-- 메인 상품 노출 --><?php echo includewidget('goods/_goods_display_main.html','sno','2')?><!-- 메인 상품 노출 -->
        <!-- 메인 상품 노출 --><?php echo includewidget('goods/_goods_display_main.html','sno','3')?><!-- 메인 상품 노출 -->
    </div>
</div>
<hr/>

<?php $this->print_("footer",$TPL_SCP,1);?>