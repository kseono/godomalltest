<?php /* Template_ 2.2.7 2025/07/30 05:47:24 /www/newmanjoo14_godomall_com/data/skin/front/story_g/popup/layer.html 000002711 */ ?>
<style type="text/css">
	#<?php echo $TPL_VAR["popupCode"]?>_form .box .view {background: <?php echo $TPL_VAR["data"]["popupBgColor"]?>; width:<?php echo ($TPL_VAR["popupWidth"])?><?php echo $TPL_VAR["data"]["sizeTypeW"]?>; height:<?php echo ($TPL_VAR["popupHeight"])?><?php echo $TPL_VAR["data"]["sizeTypeH"]?>; overflow: hidden;}

	#<?php echo $TPL_VAR["popupCode"]?>_form .check {background-color:<?php echo $TPL_VAR["todayUnSee"]["todayUnSeeBgColor"]?>; color:<?php echo $TPL_VAR["todayUnSee"]["todayUnSeeFontColor"]?>; text-align:<?php echo $TPL_VAR["todayUnSee"]["todayUnSeeAlign"]?>;}
	#<?php echo $TPL_VAR["popupCode"]?>_form .check .form-element .check-s {background-color:<?php echo $TPL_VAR["todayUnSee"]["todayUnSeeBgColor"]?>;}
<?php if($TPL_VAR["data"]["contentImgFl"]=='y'){?>
	#<?php echo $TPL_VAR["popupCode"]?>_form .box .view img {max-width:<?php echo $TPL_VAR["data"]["popupSizeW"]?><?php echo $TPL_VAR["data"]["sizeTypeW"]?>;}
	#<?php echo $TPL_VAR["popupCode"]?>_form .box .view {overflow-y:auto;}
<?php }?>
</style>

<div id="<?php echo $TPL_VAR["popupCode"]?>_form" class="sys-pop">
	<div class="box">
		<div class="view" >
			<?php echo $TPL_VAR["viewPopupContent"]?>

		</div>

<?php if($TPL_VAR["todayUnSee"]["todayUnSeeFl"]=='y'){?>
		<!-- 오늘 하루 보이지 않음 : start -->
		<div class="check">
				<span class="form-element">
					<label for="todayUnSee_<?php echo $TPL_VAR["popupCode"]?>" class="check-s" ><?php echo __('오늘 하루 보이지 않음')?></label>
					<input type="checkbox" id="todayUnSee_<?php echo $TPL_VAR["popupCode"]?>" class="checkbox" onClick="popup_cookie('<?php echo $TPL_VAR["popupCode"]?>', this);">
				</span>
		</div>
		<!-- 오늘 하루 보이지 않음 : end -->
<?php }?>
		<button type="button" class="close" title="<?php echo __('닫기')?>" onclick="$('#<?php echo $TPL_VAR["popupCode"]?>').hide();"><?php echo __('닫기')?></button>
	</div>
</div>

<script type="text/javascript">
    $(function(){
<?php if($TPL_VAR["data"]["sizeTypeW"]=='%'){?>
        var percentWidth = ($(window).width() * (Number('<?php echo $TPL_VAR["popupWidth"]?>') / 100)) - 36;
        $('#<?php echo $TPL_VAR["popupCode"]?>_form .box .view').css('width', percentWidth + 'px');
<?php }?>
<?php if($TPL_VAR["data"]["sizeTypeH"]=='%'){?>
        var percentHeight = $(window).height() * (Number('<?php echo $TPL_VAR["popupHeight"]?>') / 100) - 102;
        $('#<?php echo $TPL_VAR["popupCode"]?>_form .box .view').css('height', percentHeight + 'px');
<?php }?>
    });
</script>