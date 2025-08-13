<?php /* Template_ 2.2.7 2025/05/22 10:03:57 /www/newmanjoo14_godomall_com/data/skin/front/moment/outline/_footer.html 000002770 */  $this->include_("includeWidget","plusShop");
if (is_array($TPL_VAR["footerScript"])) $TPL_footerScript_1=count($TPL_VAR["footerScript"]); else if (is_object($TPL_VAR["footerScript"]) && in_array("Countable", class_implements($TPL_VAR["footerScript"]))) $TPL_footerScript_1=$TPL_VAR["footerScript"]->count();else $TPL_footerScript_1=0;?>
<?php if($TPL_VAR["tpls"]["side_inc"]&&$TPL_VAR["layout"]["outline_sidefloat"]=='right'){?>
                <div class="side_cont">
<?php $this->print_("side_inc",$TPL_SCP,1);?>

                </div>
<?php }?>
            </div>
            <!-- //sub_content -->
        </div>
        <!-- //본문 끝 contents -->
    </div>
    <!-- //container -->

<?php if($TPL_VAR["tpls"]["footer_inc"]){?>
    <div id="footer_wrap">
<?php $this->print_("footer_inc",$TPL_SCP,1);?>

    </div>
<?php }?>
    <!-- //footer_wrap -->


    <div class="scroll_wrap">

        <!-- 좌측 스크롤 배너 -->
        <div id="scroll_left">
<?php $this->print_("scroll_banner_left",$TPL_SCP,1);?>

        </div>
        <!-- //scroll_left -->
        <!-- //좌측 스크롤 배너 -->


        <!-- 우측 스크롤 배너 -->
        <div id="scroll_right">
<?php $this->print_("scroll_banner_right",$TPL_SCP,1);?>

        </div>
        <!-- //scroll_right -->
        <!-- //우측 스크롤 배너 -->

<?php if(is_array(gd_isset($TPL_VAR["footerScript"]))){?>
        <!-- Add footer script : start -->
<?php if($TPL_footerScript_1){foreach($TPL_VAR["footerScript"] as $TPL_V1){?>
        <script type="text/javascript" src="<?php echo $TPL_V1?>"></script>
<?php }}?>
        <!-- Add footer script : end -->
<?php }?>

    </div>
    <!-- //scroll_wrap -->


    <!-- 퀵 검색 폼 -->
<?php if($TPL_VAR["tpls"]["quick_search"]){?>
    <?php echo includewidget('proc/_quick_search.html')?>

<?php }?>
    <!-- 퀵 검색 폼 -->

</div>
<!-- //wrap -->

<!-- 쇼핑 카트 탭 -->
<?php echo plusshop('proc/_cart_tab.html')?>

<!-- //쇼핑 카트 탭 -->

<!-- 회원가입 유도 푸시 -->
<?php echo plusshop('proc/_simple_join_push.html')?>

<!-- //회원가입 유도 푸시 -->

<!-- 절대! 지우지마세요 : Start -->
<div id="layerDim" class="dn">&nbsp;</div>
<iframe name="ifrmProcess" src='/blank.php' style="display:none<?php if(!$TPL_VAR["isProduction"]){?>block<?php }?>" width="100%" height="<?php if(!$TPL_VAR["isProduction"]){?>50<?php }?>0" bgcolor="#000"></iframe>
<!-- 절대! 지우지마세요 : End -->

<!-- 외부 스크립트 -->
<?php echo $TPL_VAR["customFooter"]?>


</body>
</html>