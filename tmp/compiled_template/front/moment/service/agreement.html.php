<?php /* Template_ 2.2.7 2025/05/22 10:03:57 /www/newmanjoo14_godomall_com/data/skin/front/moment/service/agreement.html 000000498 */ ?>
<?php $this->print_("header",$TPL_SCP,1);?>

<div class="content_box">
    <div class="service_tit">
        <h2><?php echo $TPL_VAR["codeData"]["informNm"]?></h2>
    </div>
    <div class="service_cont">
        <?php echo nl2br($TPL_VAR["terms"]['content'])?>

    </div>
</div>
<!-- //content_box -->
<?php $this->print_("footer",$TPL_SCP,1);?>