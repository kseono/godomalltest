<?php /* Template_ 2.2.7 2025/05/22 10:03:57 /www/newmanjoo14_godomall_com/data/skin/front/moment/proc/_global_select.html 000003098 */ 
if (is_array($TPL_VAR["mallList"])) $TPL_mallList_1=count($TPL_VAR["mallList"]); else if (is_object($TPL_VAR["mallList"]) && in_array("Countable", class_implements($TPL_VAR["mallList"]))) $TPL_mallList_1=$TPL_VAR["mallList"]->count();else $TPL_mallList_1=0;?>
<?php if($TPL_VAR["mallCnt"]> 1){?>
<?php if($TPL_VAR["iconType"]=='check'){?>
<div class="top_country_list0">
    <ul>
<?php if($TPL_mallList_1){foreach($TPL_VAR["mallList"] as $TPL_K1=>$TPL_V1){?>
        <li><a href="#" class="js_mall" data-domain-fl="<?php echo $TPL_V1["domainFl"]?>" data-domain="<?php echo $TPL_V1["domain"]?>"><img src="<?php echo $TPL_VAR["uriCommon"]?>/<?php echo $TPL_VAR["mallIcon"][$TPL_K1]?>" alt="<?php echo $TPL_VAR["mallNm"][$TPL_K1]?>"></a></li>
<?php }}?>
    </ul>
</div>
<?php }elseif($TPL_VAR["iconType"]=='select_flag'){?>
<div class="top_country_list1">
    <div class="country_tit"><a href="#"><img src="<?php echo $TPL_VAR["uriCommon"]?>/<?php echo $TPL_VAR["mallIcon"][$TPL_VAR["nowMall"]]?>" alt="<?php echo $TPL_VAR["mallNm"][$TPL_VAR["nowMall"]]?>"></a></div>
    <ul style="display:none;">
<?php if($TPL_mallList_1){foreach($TPL_VAR["mallList"] as $TPL_K1=>$TPL_V1){?>
        <li><a href="#" class="js_mall" data-domain-fl="<?php echo $TPL_V1["domainFl"]?>" data-domain="<?php echo $TPL_V1["domain"]?>"><img src="<?php echo $TPL_VAR["uriCommon"]?>/<?php echo $TPL_VAR["mallIcon"][$TPL_K1]?>" alt="<?php echo $TPL_VAR["mallNm"][$TPL_K1]?>"></a></li>
<?php }}?>
    </ul>
</div>
<?php }elseif($TPL_VAR["iconType"]=='select_language'){?>
<div class="top_country_list2">
    <div class="country_tit"><a href="#"><img src="<?php echo $TPL_VAR["uriCommon"]?>/<?php echo $TPL_VAR["mallIcon"][$TPL_VAR["nowMall"]]?>" alt="<?php echo $TPL_VAR["mallNm"][$TPL_VAR["nowMall"]]?>"><span><?php echo $TPL_VAR["mallList"][$TPL_VAR["nowMall"]]["languageFl"]?></span></a></div>
    <ul style="display:none;">
<?php if($TPL_mallList_1){foreach($TPL_VAR["mallList"] as $TPL_K1=>$TPL_V1){?>
        <li><a href="#" class="js_mall" data-domain-fl="<?php echo $TPL_V1["domainFl"]?>" data-domain="<?php echo $TPL_V1["domain"]?>"><img src="<?php echo $TPL_VAR["uriCommon"]?>/<?php echo $TPL_VAR["mallIcon"][$TPL_K1]?>" alt="<?php echo $TPL_VAR["mallNm"][$TPL_K1]?>"><span><?php echo $TPL_V1["languageFl"]?></span></a></li>
<?php }}?>
    </ul>
</div>
<?php }?>
<!-- //top_country_list -->

<script type="text/javascript">
    $(function(){
        $('.js_mall').click(function(){
            var url = $(this).data('domain');
            var lastStr = url.substr(url.length - 1);
            if (lastStr != '/') {
                url = url+'/';
            }
            switch($(this).data('domain-fl')) {
                case 'kr':
                    window.open(url+'main/index.php', "_blank");
                    break;
                default:
                    window.open(url, "_blank");
                    break;
            }
        });
    })
</script>
<?php }?>