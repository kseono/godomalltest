<?php /* Template_ 2.2.7 2025/05/22 10:03:57 /www/newmanjoo14_godomall_com/data/skin/front/moment/main/index.html 000002945 */  $this->include_("includeWidget","dataBanner","pollViewBanner");?>
<?php $this->print_("header",$TPL_SCP,1);?>

<?php echo includewidget('proc/_populate.html','sno','100')?>

<div class="main_visual">
    <?php echo includewidget('proc/_slider_banner.html','bannerCode','511517418')?>

</div>
<!-- //main_visual -->
<div class="main_content">
    <div class="main_slide_ban">
        <div class="main_slide">
<?php if((is_array($TPL_R1=databanner('378864211'))&&!empty($TPL_R1)) || (is_object($TPL_R1) && in_array("Countable", class_implements($TPL_R1)) && $TPL_R1->count() > 0)) {foreach($TPL_R1 as $TPL_V1){?><?php echo $TPL_V1["tag"]?><?php }}?>
        </div>
        <!-- //main_slide -->

        <div class="main_banner">
            <div class="main_ban_img01">
<?php if((is_array($TPL_R1=databanner('735864301'))&&!empty($TPL_R1)) || (is_object($TPL_R1) && in_array("Countable", class_implements($TPL_R1)) && $TPL_R1->count() > 0)) {foreach($TPL_R1 as $TPL_V1){?><?php echo $TPL_V1["tag"]?><?php }}?>
            </div>
            <div class="main_ban_img02">
<?php if((is_array($TPL_R1=databanner('3959528376'))&&!empty($TPL_R1)) || (is_object($TPL_R1) && in_array("Countable", class_implements($TPL_R1)) && $TPL_R1->count() > 0)) {foreach($TPL_R1 as $TPL_V1){?><?php echo $TPL_V1["tag"]?><?php }}?>
            </div>
            <div class="main_ban_img03">
<?php if((is_array($TPL_R1=databanner('701821562'))&&!empty($TPL_R1)) || (is_object($TPL_R1) && in_array("Countable", class_implements($TPL_R1)) && $TPL_R1->count() > 0)) {foreach($TPL_R1 as $TPL_V1){?><?php echo $TPL_V1["tag"]?><?php }}?>
            </div>
        </div>
        <!-- //main_banner -->
    </div>
    <!-- //main_slide_ban -->
    <div class="main_goods_cont">
    <!-- 설문조사 배너 --><?php echo pollviewbanner()?><!-- 설문조사 배너 -->
    </div>
    <div class="main_goods_cont">
        <!-- 메인 상품 노출 --><?php echo includewidget('goods/_goods_display_main.html','sno','1')?><!-- 메인 상품 노출 -->
    </div>
    <!-- //main_goods_cont -->

    <div class="main_cont_slide_ban">
        <div class="main_cont_slide">
            <?php echo includewidget('proc/_slider_banner.html','bannerCode','3040312042')?>

        </div>
        <!-- //main_cont_slide -->
    </div>
    <!-- //main_cont_slide_ban -->

    <div class="main_goods_cont">
        <!-- 메인 상품 노출 --><?php echo includewidget('goods/_goods_display_main.html','sno','2')?><!-- 메인 상품 노출 -->
        <!-- 메인 상품 노출 --><?php echo includewidget('goods/_goods_display_main.html','sno','3')?><!-- 메인 상품 노출 -->
    </div>
    <!-- //main_goods_cont -->
</div>
<!-- //main_content -->



<?php $this->print_("footer",$TPL_SCP,1);?>