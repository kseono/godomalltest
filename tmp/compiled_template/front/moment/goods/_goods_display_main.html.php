<?php /* Template_ 2.2.7 2025/05/22 10:03:57 /www/newmanjoo14_godomall_com/data/skin/front/moment/goods/_goods_display_main.html 000006296 */ ?>
<?php if($TPL_VAR["mainData"]["displayFl"]=='y'){?>
<?php if(($TPL_VAR["mainData"]["kind"]=='event'&&$TPL_VAR["mainData"]["displayCategory"]=='g'&&$TPL_VAR["firstGroup"]=='y')){?>
<div class="item-display-wrap">

<?php if($TPL_VAR["mainData"]["eventThemeName"]){?>
    <h2><?php echo $TPL_VAR["mainData"]["eventThemeName"]?></h2>
<?php }?>

<?php if($TPL_VAR["mainData"]["eventThemePcContents"]){?>
    <div class="contents">
        <?php echo $TPL_VAR["mainData"]["eventThemePcContents"]?>

    </div>
<?php }?>

<?php if($TPL_VAR["mainData"]["otherEventData"]){?>
    <div style="text-align: right; width: 100%; margin: 10px 0 10px 0;">
        <select name="otherEventData" onchange="javascript:location.href='/goods/event_sale.php?sno=' + this.value;">
<?php if((is_array($TPL_R1=$TPL_VAR["mainData"]["otherEventData"])&&!empty($TPL_R1)) || (is_object($TPL_R1) && in_array("Countable", class_implements($TPL_R1)) && $TPL_R1->count() > 0)) {foreach($TPL_R1 as $TPL_V1){?>
            <option value="<?php echo $TPL_V1['sno']?>"><?php echo $TPL_V1['themeNm']?></option>
<?php }}?>
        </select>
    </div>
<?php }?>
</div>
<?php }?>

<div class="goods_list main_wrap_<?php echo $TPL_VAR["mainData"]["sno"]?><?php echo $TPL_VAR["mainData"]["groupSno"]?>">
<?php if($TPL_VAR["mainData"]["themeNm"]){?>
    <div class="goods_list_tit">
        <h3><?php echo __($TPL_VAR["mainData"]["themeNm"])?></h3>
<?php if($TPL_VAR["mainData"]["moreTopFl"]=='y'){?>
        <div class="btn_goods_more">
<?php if($TPL_VAR["mainData"]["displayCategory"]=='g'){?>
            <a href="/goods/goods_main.php?sno=<?php echo $TPL_VAR["mainData"]["sno"]?>&groupSno=<?php echo $TPL_VAR["mainData"]["groupSno"]?>" class="btn_goods_view_more">+ <?php echo __('더보기')?></a>
<?php }else{?>
            <a href="../goods/goods_main.php?sno=<?php echo $TPL_VAR["mainData"]["sno"]?>" class="btn_goods_view_more">+ <?php echo __('더보기')?></a>
<?php }?>
        </div>
<?php }?>
    </div>
<?php }?>
<?php if($TPL_VAR["mainData"]["pcContents"]){?>
    <div>
        <?php echo $TPL_VAR["mainData"]["pcContents"]?>

    </div>
<?php }?>

<?php if($TPL_VAR["mainData"]["kind"]=='event'&&$TPL_VAR["mainData"]["displayCategory"]!='g'){?>
<?php if($TPL_VAR["mainData"]["otherEventData"]){?>
        <div style="text-align: right; width: 100%; margin: 10px 0 10px 0;">
            <select name="otherEventData" onchange="javascript:location.href='/goods/event_sale.php?sno=' + this.value;">
<?php if((is_array($TPL_R1=$TPL_VAR["mainData"]["otherEventData"])&&!empty($TPL_R1)) || (is_object($TPL_R1) && in_array("Countable", class_implements($TPL_R1)) && $TPL_R1->count() > 0)) {foreach($TPL_R1 as $TPL_V1){?>
             <option value="<?php echo $TPL_V1['sno']?>"><?php echo $TPL_V1['themeNm']?></option>
<?php }}?>
            </select>
         </div>
<?php }?>
<?php }?>

    <div class="goods_list_cont goods_content_<?php echo $TPL_VAR["mainData"]["sno"]?><?php echo $TPL_VAR["mainData"]["groupSno"]?>">
<?php $this->print_("goodsTemplate",$TPL_SCP,1);?>

    </div>
<?php if($TPL_VAR["totalPage"]> 1&&$TPL_VAR["mainData"]["moreBottomFl"]=='y'&&$TPL_VAR["themeInfo"]["displayType"]!='04'&&$TPL_VAR["themeInfo"]["displayType"]!='05'&&$TPL_VAR["themeInfo"]["displayType"]!='06'&&$TPL_VAR["themeInfo"]["displayType"]!='07'){?>
    <div class="btn_goods_down_more">
        <button class="btn_goods_view_down_more" data-page="2"><?php echo __('더보기')?></button>
    </div>
<?php }?>
</div>


<script type="text/javascript">
    <!--
    var keyValue<?php echo $TPL_VAR["mainData"]["sno"]?> = '<?php echo $TPL_VAR["gGlobal"]["locale"]?>' + '<?php echo $TPL_VAR["mainData"]["sno"]?>';
    var key<?php echo $TPL_VAR["mainData"]["sno"]?> = {
        html: 'html' + keyValue<?php echo $TPL_VAR["mainData"]["sno"]?>,
        page: 'page' + keyValue<?php echo $TPL_VAR["mainData"]["sno"]?>

    };
    var gdStorage<?php echo $TPL_VAR["mainData"]["sno"]?> = loadSession(key<?php echo $TPL_VAR["mainData"]["sno"]?>.html);
    var page<?php echo $TPL_VAR["mainData"]["sno"]?> = loadSession(key<?php echo $TPL_VAR["mainData"]["sno"]?>.page);
    $(document).ready(function() {
        if (gdStorage<?php echo $TPL_VAR["mainData"]["sno"]?>) {
            $('.goods_content_<?php echo $TPL_VAR["mainData"]["sno"]?>').html(gdStorage<?php echo $TPL_VAR["mainData"]["sno"]?>);
            if (page<?php echo $TPL_VAR["mainData"]["sno"]?>) {
                $('.main_wrap_<?php echo $TPL_VAR["mainData"]["sno"]?> .btn_goods_view_down_more').attr('data-page',page<?php echo $TPL_VAR["mainData"]["sno"]?>);
            }
        }
        $('.main_wrap_<?php echo $TPL_VAR["mainData"]["sno"]?><?php echo $TPL_VAR["mainData"]["groupSno"]?> .btn_goods_view_down_more').on('click', function(e){
            gd_get_list_<?php echo $TPL_VAR["mainData"]["sno"]?><?php echo $TPL_VAR["mainData"]["groupSno"]?>($(this).data('page'));
        });
    });

    function gd_get_list_<?php echo $TPL_VAR["mainData"]["sno"]?><?php echo $TPL_VAR["mainData"]["groupSno"]?>(page) {
        $.get('../goods/goods_main.php', {'mode' : 'get_main', 'more' : page, 'sno' : '<?php echo $TPL_VAR["mainData"]["sno"]?>', 'groupSno' : '<?php echo $TPL_VAR["mainData"]["groupSno"]?>'}, function (data) {
            $(".goods_content_<?php echo $TPL_VAR["mainData"]["sno"]?><?php echo $TPL_VAR["mainData"]["groupSno"]?>").html(data);
            saveSession(key<?php echo $TPL_VAR["mainData"]["sno"]?>.html, data);
            if (parseInt(page) + 1 > <?php echo $TPL_VAR["totalPage"]?>) {
                $('.main_wrap_<?php echo $TPL_VAR["mainData"]["sno"]?><?php echo $TPL_VAR["mainData"]["groupSno"]?> .btn_goods_view_down_more').hide();
            } else {
                saveSession(key<?php echo $TPL_VAR["mainData"]["sno"]?>.page, parseInt(page)+1);
                $('.main_wrap_<?php echo $TPL_VAR["mainData"]["sno"]?><?php echo $TPL_VAR["mainData"]["groupSno"]?> .btn_goods_view_down_more').data('page', parseInt(page) + 1);
            }
        });
    }
    //-->
</script>
<?php }?>