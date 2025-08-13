<?php /* Template_ 2.2.7 2025/07/30 05:47:24 /www/newmanjoo14_godomall_com/data/skin/front/story_g/outline/_footer.html 000002183 */  $this->include_("plusShop");
if (is_array($TPL_VAR["footerScript"])) $TPL_footerScript_1=count($TPL_VAR["footerScript"]); else if (is_object($TPL_VAR["footerScript"]) && in_array("Countable", class_implements($TPL_VAR["footerScript"]))) $TPL_footerScript_1=$TPL_VAR["footerScript"]->count();else $TPL_footerScript_1=0;?>
</div>
        <!-- 본문 끝 : end -->

<?php if($TPL_VAR["tpls"]["side_inc"]&&$TPL_VAR["layout"]["outline_sidefloat"]=='right'){?>
        <div id="side">
<?php $this->print_("side_inc",$TPL_SCP,1);?>

        </div>
<?php }?>
    </div>

<?php if($TPL_VAR["tpls"]["footer_inc"]){?>
    <div id="footer">
<?php $this->print_("footer_inc",$TPL_SCP,1);?>

    </div>
<?php }?>

    <!-- 좌측 스크롤 배너 : start -->
    <div id="scroll-left">
<?php $this->print_("scroll_banner_left",$TPL_SCP,1);?>

    </div>
    <!-- 좌측 스크롤 배너 : end -->

    <!-- 우측 스크롤 배너 : start -->
    <div id="scroll-right">
<?php $this->print_("scroll_banner_right",$TPL_SCP,1);?>

    </div>
    <!-- 우측 스크롤 배너 : end -->

<?php if(is_array(gd_isset($TPL_VAR["footerScript"]))){?>
    <!-- Add footer script : start -->
<?php if($TPL_footerScript_1){foreach($TPL_VAR["footerScript"] as $TPL_V1){?>
    <script type="text/javascript" src="<?php echo $TPL_V1?>"></script>
<?php }}?>
    <!-- Add footer script : end -->
<?php }?>
</div>

<?php echo plusshop('proc/_cart_tab.html')?>


<!-- 회원가입 유도 푸시 -->
<?php echo plusshop('proc/_simple_join_push.html')?>

<!-- //회원가입 유도 푸시 -->

<!-- 절대! 지우지마세요 : Start -->
<div class="dn" id="layerDim">&nbsp;</div>
<iframe name="ifrmProcess" src='/blank.php' style="display:none<?php if(!$TPL_VAR["isProduction"]){?>block<?php }?>" width="100%" height="<?php if(!$TPL_VAR["isProduction"]){?>50<?php }?>0" bgcolor="#000"></iframe>
<!-- 절대! 지우지마세요 : End -->

<!-- 외부 스크립트 -->
<?php echo $TPL_VAR["customFooter"]?>


</body>
</html>